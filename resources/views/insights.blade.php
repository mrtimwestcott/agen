@extends('layouts.layout')

@section('title', 'A-GEN Insights')

@section('content')
    <div>
        <div class="container mx-auto">
            <div class="relative">
                <div class="py-4 px-8 flex flex-row justify-between items-center bg-cover h-64 my-16 rounded-lg shadow-md" style="background-image: url('/images/hero-background.jpg')">
                    <div class="absolute top-0 left-0 bg-gray-900 w-full h-full rounded-lg z-0 bg-opacity-75"></div>

                    <div class="z-10">
                        <h1 class="text-4xl font-extrabold text-blue-100">A-GEN <span class="italic">Insights</span></h1>
                        <div class="text-2xl text-gray-700 text-blue-200">A new future for A-GEN</div>
                    </div>
                    <div>
                        
                    </div>
                </div>
            </div>
                
            <div class="flex bg-gray-400 mb-16 rounded-lg p-8 shadow-md">
                <div class="w-1/3">
                    <form method="POST" action="/insights">
                        @csrf
                        <div class="bg-gray-200 p-4 my-4 rounded shadow-xs hover:shadow">
                            <div class="checkbox-title flex justify-between cursor-pointer items-center {{ $selectedStates ? "active" : "" }}">
                                <h2 class="text-xl"><span class="expander-symbol w-6 inline-block">{{ $selectedStates ? "-" : "+" }}</span> State</h2>
                                <span class="text-sm text-blue-400 clear-checkboxes">clear</span>
                            </div>
                            <div class="checkboxes mt-2" {!! $selectedStates ? "" : "style='display: none;'" !!}>
                            @foreach ($states as $state)
                                <label class="md:w-2/3 block font-bold">
                                    <input class="mr-2 leading-tight" type="checkbox" name="states[]" value="{{ $state->id }}" {{ in_array($state->id, $selectedStates) ? "checked" : "" }}>
                                    <span class="text-sm">
                                        {{ $state->name }}
                                    </span>
                                </label>    
                            @endforeach
                            </div>
                        </div>

                        <div class="bg-gray-200 p-4 my-4 rounded shadow-xs hover:shadow">
                            <div class="checkbox-title flex justify-between cursor-pointer items-center {{ $selectedAgeGroups ? "active" : "" }}">
                                <h2 class="text-xl"><span class="expander-symbol w-6 inline-block">{{ $selectedAgeGroups ? "-" : "+" }}</span> Age</h2>
                                <span class="text-sm text-blue-400 clear-checkboxes">clear</span>
                            </div>
                            <div class="checkboxes" {!! $selectedAgeGroups ? "" : "style='display: none;'" !!}>
                                @foreach ($ages as $age)
                                <label class="md:w-2/3 block font-bold">
                                    <input class="mr-2 leading-tight" type="checkbox" name="age_groups[]" value="{{ $age->id }}" {{ in_array($age->id, $selectedAgeGroups) ? "checked" : "" }}>
                                    <span class="text-sm">
                                        {{ $age->range }}
                                    </span>
                                </label>    
                            @endforeach
                            </div>
                        </div>
                        

                        <div class="bg-gray-200 p-4 my-4 rounded shadow-xs hover:shadow">
                            <div class="checkbox-title flex justify-between cursor-pointer items-center {{ $selectedSexes ? "active" : "" }}">
                                <h2 class="text-xl"><span class="expander-symbol w-6 inline-block">{{ $selectedSexes ? "-" : "+" }}</span> Sex</h2>
                                <span class="text-sm text-blue-400 clear-checkboxes">clear</span>
                            </div>
                            <div class="checkboxes" {!! $selectedSexes ? "" : "style='display: none;'" !!}>
                                @foreach ($sexes as $sex)
                                    <label class="md:w-2/3 block font-bold">
                                        <input class="mr-2 leading-tight" type="checkbox" name="sexes[]" value="{{ $sex->id }}" {{ in_array($sex->id, $selectedSexes) ? "checked" : "" }}>
                                        <span class="text-sm">
                                            {{ $sex->name }}
                                        </span>
                                    </label>     
                                @endforeach
                            </div>
                        </div>
                        

                        <div class="bg-gray-200 p-4 my-4 rounded shadow-xs hover:shadow">
                            <div class="checkbox-title flex justify-between cursor-pointer items-center {{ $selectedIndigenousStatuses ? "active" : "" }}">
                                <h2 class="text-xl"><span class="expander-symbol w-6 inline-block">{{ $selectedIndigenousStatuses ? "-" : "+" }}</span> Indigenous Status</h2>
                                <span class="text-sm text-blue-400 clear-checkboxes">clear</span>
                            </div>
                            <div class="checkboxes" {!! $selectedIndigenousStatuses ? "" : "style='display: none;'" !!}>
                                @foreach ($indigenousStatuses as $indigenousStatus)
                                    <label class="md:w-2/3 block font-bold">
                                        <input class="mr-2 leading-tight" type="checkbox" name="indigenous_statues[]" value="{{ $indigenousStatus->id }}" {{ in_array($indigenousStatus->id, $selectedIndigenousStatuses) ? "checked" : "" }}>
                                        <span class="text-sm">
                                            {{ $indigenousStatus->name }}
                                        </span>
                                    </label>    
                                @endforeach
                            </div>
                        </div>
                       
                        <div class="bg-gray-200 p-4 my-4 rounded shadow-xs hover:shadow">
                            <div class="checkbox-title flex justify-between cursor-pointer items-center {{ $selectedLanguages ? "active" : "" }}">
                                <h2 class="text-xl"><span class="expander-symbol w-6 inline-block">{{ $selectedLanguages ? "-" : "+" }}</span> Language</h2>
                                <span class="text-sm text-blue-400 clear-checkboxes">clear</span>
                            </div>
                            <div class="checkboxes" {!! $selectedLanguages ? "" : "style='display: none;'" !!}>
                                @foreach ($languages as $language)
                                    <label class="md:w-2/3 block font-bold">
                                        <input class="mr-2 leading-tight" type="checkbox" name="languages[]" value="{{ $language->id }}" {{ in_array($language->id, $selectedLanguages) ? "checked" : "" }}>
                                        <span class="text-sm">
                                            {{ $language->name }}
                                        </span>
                                    </label>    
                                @endforeach
                            </div>
                        </div>

                        <div class="bg-gray-200 p-4 my-4 rounded shadow-xs hover:shadow">
                            <div class="checkbox-title flex justify-between cursor-pointer items-center {{ $selectedCountryOfBirths ? "active" : "" }}">
                                <h2 class="text-xl"><span class="expander-symbol w-6 inline-block">{{ $selectedCountryOfBirths ? "-" : "+" }}</span> Country of Birth</h2>
                                <span class="text-sm text-blue-400 clear-checkboxes">clear</span>
                            </div>
                            <div class="checkboxes" {!! $selectedCountryOfBirths ? "" : "style='display: none;'" !!}>
                                @foreach ($countryOfBirths as $countryOfBirth)
                                    <label class="md:w-2/3 block font-bold">
                                        <input class="mr-2 leading-tight" type="checkbox" name="country_of_births[]" value="{{ $countryOfBirth->id }}" {{ in_array($countryOfBirth->id, $selectedCountryOfBirths) ? "checked" : "" }}>
                                        <span class="text-sm">
                                            {{ $countryOfBirth->name }}
                                        </span>
                                    </label>    
                                @endforeach
                            </div>
                        </div>

                        <div class="bg-gray-200 p-4 my-4 rounded shadow-xs hover:shadow">
                            <div class="checkbox-title flex justify-between cursor-pointer items-center {{ $selectedADLs ? "active" : "" }}">
                                <h2 class="text-xl"><span class="expander-symbol w-6 inline-block">{{ $selectedADLs ? "-" : "+" }}</span> Activities of Daily Living Needs</h2>
                                <span class="text-sm text-blue-400 clear-checkboxes">clear</span>
                            </div>
                            <div class="checkboxes" {!! $selectedADLs ? "" : "style='display: none;'" !!}>
                                @foreach ($ADLs as $ADL)
                                    <label class="md:w-2/3 block font-bold">
                                        <input class="mr-2 leading-tight" type="checkbox" name="adls[]" value="{{ $ADL->id }}" {{ in_array($ADL->id, $selectedADLs) ? "checked" : "" }}>
                                        <span class="text-sm">
                                            {{ $ADL->name }}
                                        </span>
                                    </label>    
                                @endforeach
                            </div>
                        </div>

                        <div class="bg-gray-200 p-4 my-4 rounded shadow-xs hover:shadow">
                            <div class="checkbox-title flex justify-between cursor-pointer items-center {{ $selectedBEHs ? "active" : "" }}">
                                <h2 class="text-xl"><span class="expander-symbol w-6 inline-block">{{ $selectedBEHs ? "-" : "+" }}</span> Behavioural Needs</h2>
                                <span class="text-sm text-blue-400 clear-checkboxes">clear</span>
                            </div>
                            <div class="checkboxes" {!! $selectedBEHs ? "" : "style='display: none;'" !!}>
                                @foreach ($BEHs as $BEH)
                                    <label class="md:w-2/3 block font-bold">
                                        <input class="mr-2 leading-tight" type="checkbox" name="behs[]" value="{{ $BEH->id }}" {{ in_array($BEH->id, $selectedBEHs) ? "checked" : "" }}>
                                        <span class="text-sm">
                                            {{ $BEH->name }}
                                        </span>
                                    </label>    
                                @endforeach
                            </div>
                        </div>

                        <div class="bg-gray-200 p-4 my-4 rounded shadow-xs hover:shadow">
                            <div class="checkbox-title flex justify-between cursor-pointer items-center {{ $selectedCHCs ? "active" : "" }}">
                                <h2 class="text-xl"><span class="expander-symbol w-6 inline-block">{{ $selectedCHCs ? "-" : "+" }}</span> Complex Health Care Needs</h2>
                                <span class="text-sm text-blue-400 clear-checkboxes">clear</span>
                            </div>
                            <div class="checkboxes" {!! $selectedCHCs ? "" : "style='display: none;'" !!}>
                                @foreach ($CHCs as $CHC)
                                    <label class="md:w-2/3 block font-bold">
                                        <input class="mr-2 leading-tight" type="checkbox" name="chcs[]" value="{{ $CHC->id }}" {{ in_array($CHC->id, $selectedCHCs) ? "checked" : "" }}>
                                        <span class="text-sm">
                                            {{ $CHC->name }}
                                        </span>
                                    </label>    
                                @endforeach
                            </div>
                        </div>

                        <div class="bg-gray-200 p-4 my-4 rounded shadow-xs hover:shadow">
                            <div class="checkbox-title flex justify-between cursor-pointer items-center {{ $selectedDementiaStatuses ? "active" : "" }}">
                                <h2 class="text-xl"><span class="expander-symbol w-6 inline-block">{{ $selectedDementiaStatuses ? "-" : "+" }}</span> Dementia Status</h2>
                                <span class="text-sm text-blue-400 clear-checkboxes">clear</span>
                            </div>
                            <div class="checkboxes" {!! $selectedDementiaStatuses ? "" : "style='display: none;'" !!}>
                                @foreach ($dementiaStatuses as $dementiaStatus)
                                    <label class="md:w-2/3 block font-bold">
                                        <input class="mr-2 leading-tight" type="checkbox" name="dementia_statuses[]" value="{{ $dementiaStatus->id }}" {{ in_array($dementiaStatus->id, $selectedDementiaStatuses) ? "checked" : "" }}>
                                        <span class="text-sm">
                                            {{ $dementiaStatus->description }}
                                        </span>
                                    </label>    
                                @endforeach
                            </div>
                        </div>

                        <div class="mt-4">
                            <input type="submit" value="Apply Filters" class="bg-blue-500 w-full hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-sm hover:shadow-inner cursor-pointer">
                        </div>
                    </form>
                </div>
                <div class="w-2/3 ml-8 p-4">
                    <ul>
                        @foreach ($localitiesWithCount as $locality)
                        <li class="">
                            <a href="/localities/{{ $locality['locality']->id }}" class="w-full my-4 rounded overflow-hidden shadow-sm bg-white p-4 hover:shadow-lg cursor-pointer flex flex-row justify-between items-center">
                                <div class="flex-1">
                                    <div class="font-bold">{{ $locality['locality']->name }}</span></div>
                                    <div class="text-sm text-gray-700"><span class="text-gray-500">ACPR Code: </span>{{ $locality['locality']->code }}</div>
                                </div>
                                <div class="flex flex-col items-center">
                                    <div class="font-bold">{{ $locality['count'] }}</div>
                                    <div class="text-sm text-gray-500">Count</div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection