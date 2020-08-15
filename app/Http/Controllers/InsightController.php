<?php

namespace App\Http\Controllers;

use App\Locality;
use App\AgeGroup;
use App\Sex;
use App\IndigenousStatus;
use App\Language;
use App\CountryOfBirth;
use App\Person;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class InsightController extends Controller
{
    public function listLocalities(Request $request) {
        $people = DB::table('people');

        $selectedAgeGroups = $request->age_groups;
        if ($selectedAgeGroups) {
            $people->where(function ($query) use ($selectedAgeGroups) {
                foreach ($selectedAgeGroups as $key => $age_group) {
                    $query->orWhere('age_group_id', $age_group);
                }
            });
        } else {
            $selectedAgeGroups = [];
        }

        $selectedSexes = $request->sexes;
        if ($selectedSexes) {
            $people->where(function ($query) use ($selectedSexes) {
                foreach ($selectedSexes as $key => $sex) {
                    $query->orWhere('sex_id', $sex);
                }
            });
        } else {
            $selectedSexes = [];
        }

        $selectedIndigenousStatuses = $request->indigenous_statues;
        if ($selectedIndigenousStatuses) {
            $people->where(function ($query) use ($selectedIndigenousStatuses) {
                foreach ($selectedIndigenousStatuses as $key => $indigenousStatus) {
                    $query->orWhere('indigenous_status_id', $indigenousStatus);
                }
            });
        } else {
            $selectedIndigenousStatuses = [];
        }

        $selectedLanguages = $request->languages;
        if ($selectedLanguages) {
            $people->where(function ($query) use ($selectedLanguages) {
                foreach ($selectedLanguages as $key => $language) {
                    $query->orWhere('language_id', $selectedLanguages);
                }
            });
        } else {
            $selectedLanguages = [];
        }

        $selectedCountryOfBirths = $request->country_of_births;
        if ($selectedCountryOfBirths) {
            $people->where(function ($query) use ($selectedCountryOfBirths) {
                foreach ($selectedCountryOfBirths as $key => $countryOfBirth) {
                    $query->orWhere('country_of_birth_id', $countryOfBirth);
                }
            });
        } else {
            $selectedCountryOfBirths = [];
        }

        $localitiesWithCount = $people->get()->groupBy('locality_id')->map(function ($item, $key) {
            return [
                "locality" => Locality::find($item->first()->locality_id),
                "count" => collect($item)->count(),
            ];
        })->sortByDesc("count")->take(10);

        $ages = AgeGroup::all();
        $sexes = Sex::all();
        $indigenousStatuses = IndigenousStatus::all();
        $languages = Language::all();
        $countryOfBirths = CountryOfBirth::all();
        return view('insights')
            ->with(compact("localitiesWithCount", "ages", "sexes", "indigenousStatuses", "languages", "countryOfBirths", "selectedAgeGroups", "selectedSexes", "selectedIndigenousStatuses", "selectedLanguages", "selectedCountryOfBirths"));
    }
        
}
