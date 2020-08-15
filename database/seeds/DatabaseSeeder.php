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

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // AgeGroup::create(["range" => "0–49"]);
        // AgeGroup::create(["range" => "50–54"]);
        // AgeGroup::create(["range" => "55–59"]);
        // AgeGroup::create(["range" => "60–64"]);
        // AgeGroup::create(["range" => "65–69"]);
        // AgeGroup::create(["range" => "70–74"]);
        // AgeGroup::create(["range" => "75–79"]);
        // AgeGroup::create(["range" => "80–84"]);
        // AgeGroup::create(["range" => "85–89"]);
        // AgeGroup::create(["range" => "90–94"]);
        // AgeGroup::create(["range" => "95–99"]);
        // AgeGroup::create(["range" => "100+"]);

        // Sex::create(["name" => "Male"]);
        // Sex::create(["name" => "Female"]);
        // Sex::create(["name" => "Unknown/Other"]);

        // IndigenousStatus::create(["name" => "Indigenous"]);
        // IndigenousStatus::create(["name" => "Non-Indigenous"]);
        // IndigenousStatus::create(["name" => "Unknown"]);
        
        // $json = Storage::disk('local')->get('people_sample_largest.json');
        // $json = json_decode($json, true);
        // foreach ($json as $person) {
        //     $locality = Locality::firstOrCreate([
        //         "code" => $person['ACPR_CODE'],
        //         "name" => $person['ACPR_NAME'],
        //     ]);

        //     $careType = CareType::firstOrCreate([
        //         "name" => $person['CARE_TYPE'],
        //     ]);

        //     $ageGroup = AgeGroup::where(["range" => $person['AGE_GROUP']])->first();

        //     $language = Language::firstOrCreate([
        //         "name" => $person['LAN'],
        //     ]);

        //     $countryOfBirth = CountryOfBirth::firstOrCreate([
        //         "name" => $person['COB'],
        //     ]);

        //     if ($person["INDIGENOUS_STATUS"] > 3) $person["INDIGENOUS_STATUS"] = 3;

        //     Person::create([
        //         "locality_id" => $locality->id,
        //         "care_type_id" => $careType->id,
        //         "age_group_id" => $ageGroup->id,
        //         "sex_id" => $person['SEX'],
        //         "indigenous_status_id" => $person["INDIGENOUS_STATUS"],
        //         "language_id" => $language->id,
        //         "country_of_birth_id" => $countryOfBirth->id,
        //     ]);
        // }
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
