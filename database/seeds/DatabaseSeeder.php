<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Locality;
use App\Sex;
use App\AgeGroup;
use App\IndigenousStatus;
use App\CareType;
use App\Language;
use App\CountryOfBirth;
use App\Person;
use App\CareHome;
use App\State;
use App\ADL;
use App\BEH;
use App\CHC;
use App\DementiaStatus;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        State::create(["code" => "QLD", "name" => "Queensland"]);
        State::create(["code" => "NSW", "name" => "New South Wales"]);
        State::create(["code" => "VIC", "name" => "Victoria"]);
        State::create(["code" => "TAS", "name" => "Tasmania"]);
        State::create(["code" => "SA", "name" => "South Australia"]);
        State::create(["code" => "WA", "name" => "Western Australia"]);
        State::create(["code" => "NT", "name" => "Northern Territory"]);
        State::create(["code" => "ACT", "name" => "Australian Capital Territory"]);

        AgeGroup::create(["range" => "0–49"]);
        AgeGroup::create(["range" => "50–54"]);
        AgeGroup::create(["range" => "55–59"]);
        AgeGroup::create(["range" => "60–64"]);
        AgeGroup::create(["range" => "65–69"]);
        AgeGroup::create(["range" => "70–74"]);
        AgeGroup::create(["range" => "75–79"]);
        AgeGroup::create(["range" => "80–84"]);
        AgeGroup::create(["range" => "85–89"]);
        AgeGroup::create(["range" => "90–94"]);
        AgeGroup::create(["range" => "95–99"]);
        AgeGroup::create(["range" => "100+"]);

        Sex::create(["name" => "Male"]);
        Sex::create(["name" => "Female"]);
        Sex::create(["name" => "Unknown/Other"]);

        IndigenousStatus::create(["name" => "Indigenous"]);
        IndigenousStatus::create(["name" => "Non-Indigenous"]);
        IndigenousStatus::create(["name" => "Unknown"]);

        ADL::create(["code" => "H", "name" => "High"]);
        ADL::create(["code" => "M", "name" => "Mid"]);
        ADL::create(["code" => "L", "name" => "Low"]);
        ADL::create(["code" => "N", "name" => "Nil"]);

        BEH::create(["code" => "H", "name" => "High"]);
        BEH::create(["code" => "M", "name" => "Mid"]);
        BEH::create(["code" => "L", "name" => "Low"]);
        BEH::create(["code" => "N", "name" => "Nil"]);

        CHC::create(["code" => "H", "name" => "High"]);
        CHC::create(["code" => "M", "name" => "Mid"]);
        CHC::create(["code" => "L", "name" => "Low"]);
        CHC::create(["code" => "N", "name" => "Nil"]);

        DementiaStatus::create(["description" => "Has dementia"]);
        DementiaStatus::create(["description" => "Does not have dementia"]);
        DementiaStatus::create(["description" => "Not stated / inadequately described"]);
        
        $json = Storage::disk('local')->get('people_sample_with_care_needs.json');
        $json = json_decode($json, true);
        foreach ($json as $person) {
            $state = State::where(["code" => $person['STATE']])->first();
            $locality = Locality::firstOrCreate([
                "code" => $person['ACPR_CODE'],
                "name" => $person['ACPR_NAME'],
            ]);

            $careType = CareType::firstOrCreate([
                "name" => $person['CARE_TYPE'],
            ]);

            $ageGroup = AgeGroup::where(["range" => $person['AGE_GROUP']])->first();
            
            if (!$ageGroup) continue;

            $language = Language::firstOrCreate([
                "name" => $person['LAN'],
            ]);

            $countryOfBirth = CountryOfBirth::firstOrCreate([
                "name" => $person['COB'],
            ]);

            if ($person["INDIGENOUS_STATUS"] > 3) $person["INDIGENOUS_STATUS"] = 3;

            $adl = ADL::where(["code" => $person['ADL']])->first();
            $beh = BEH::where(["code" => $person['BEH']])->first();
            $chc = CHC::where(["code" => $person['ADL']])->first();

            Person::create([
                "state_id" => $state->id,
                "locality_id" => $locality->id,
                "care_type_id" => $careType->id,
                "age_group_id" => $ageGroup->id,
                "sex_id" => $person['SEX'],
                "indigenous_status_id" => $person["INDIGENOUS_STATUS"],
                "language_id" => $language->id,
                "country_of_birth_id" => $countryOfBirth->id,
                "a_d_l_id" => $adl->id,
                "b_e_h_id" => $beh->id,
                "c_h_c_id" => $chc->id,
                "dementia_status_id" => $person['DEMSTAT'],
            ]);
        }
        $json = Storage::disk('local')->get('homes.json');
        $json = json_decode($json, true);
        foreach ($json as $home) {
            CareHome::create([
                "name" => $home['SERVICE_NAME'],
                "description" => $home['DESCRIPTION'],
                "street_address" => $home['STREET_ST_ADDRESS'],
                "suburb" => $home['STREET_SUBURB'],
                "postcode" => $home['STREET_PCODE'],
                "state" => $home['STREET_STATE'],
                "locality_id" => rand(1,70),
            ]);
        }
    }
}
