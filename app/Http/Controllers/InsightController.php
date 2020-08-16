<?php

namespace App\Http\Controllers;

use App\Locality;
use App\State;
use App\AgeGroup;
use App\Sex;
use App\IndigenousStatus;
use App\Language;
use App\CountryOfBirth;
use App\Person;
use App\ADL;
use App\BEH;
use App\CHC;
use App\DementiaStatus;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class InsightController extends Controller
{
    public function listLocalities(Request $request) {
        $people = DB::table('people');

        $selectedStates = $request->states;
        if ($selectedStates) {
            $people->where(function ($query) use ($selectedStates) {
                foreach ($selectedStates as $key => $state) {
                    $query->orWhere('state_id', $state);
                }
            });
        } else {
            $selectedStates = [];
        }

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

        $selectedADLs = $request->adls;
        if ($selectedADLs) {
            $people->where(function ($query) use ($selectedADLs) {
                foreach ($selectedADLs as $key => $selectedADL) {
                    $query->orWhere('a_d_l_id', $selectedADL);
                }
            });
        } else {
            $selectedADLs = [];
        }

        $selectedBEHs = $request->behs;
        if ($selectedBEHs) {
            $people->where(function ($query) use ($selectedBEHs) {
                foreach ($selectedBEHs as $key => $selectedBEH) {
                    $query->orWhere('b_e_h_id', $selectedBEH);
                }
            });
        } else {
            $selectedBEHs = [];
        }

        $selectedCHCs = $request->chcs;
        if ($selectedCHCs) {
            $people->where(function ($query) use ($selectedCHCs) {
                foreach ($selectedCHCs as $key => $selectedCHC) {
                    $query->orWhere('c_h_c_id', $selectedCHC);
                }
            });
        } else {
            $selectedCHCs = [];
        }

        $selectedDementiaStatuses = $request->dementia_statuses;
        if ($selectedDementiaStatuses) {
            $people->where(function ($query) use ($selectedDementiaStatuses) {
                foreach ($selectedDementiaStatuses as $key => $selectedDementiaStatus) {
                    $query->orWhere('dementia_status_id', $selectedDementiaStatus);
                }
            });
        } else {
            $selectedDementiaStatuses = [];
        }

        $localitiesWithCount = $people->get()->groupBy('locality_id')->map(function ($item, $key) {
            return [
                "locality" => Locality::find($item->first()->locality_id),
                "count" => collect($item)->count(),
            ];
        })->sortByDesc("count")->take(10);

        $states = State::all();
        $ages = AgeGroup::all();
        $sexes = Sex::all();
        $indigenousStatuses = IndigenousStatus::all();
        $languages = Language::all();
        $countryOfBirths = CountryOfBirth::all();
        $ADLs = ADL::all();
        $BEHs = BEH::all();
        $CHCs = CHC::all();
        $dementiaStatuses = DementiaStatus::all();
        return view('insights')
            ->with(compact("localitiesWithCount", "states", "ages", "sexes", "indigenousStatuses", "languages", "countryOfBirths", "ADLs", "BEHs", "CHCs", "dementiaStatuses", "selectedStates", "selectedAgeGroups", "selectedSexes", "selectedIndigenousStatuses", "selectedLanguages", "selectedCountryOfBirths", "selectedADLs", "selectedBEHs", "selectedCHCs", "selectedDementiaStatuses"));
    }
        
}
