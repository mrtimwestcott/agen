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
                
            <div class="bg-gray-400 mb-16 rounded-lg p-8 shadow-md">
                <h2 class="text-2xl font-bold">{{ $locality->name }}</h2>
                <div class="text-gray-600">Patients: {{ $numPatients }}</div>
                
                <div class="flex mt-8">
                    <div class="">
                        <h3 class="text-xl font-bold">Care Facilities</h3>
                        <ul>
                            @foreach ($careHomes as $careHome)
                            <li class="">
                                <a href="/carehomes/{{ $careHome->id }}" class="w-full my-4 rounded overflow-hidden shadow-sm bg-white p-4 hover:shadow-lg cursor-pointer flex flex-row justify-between items-start h-32">
                                    <div class="flex-1">
                                        <div class="font-bold">{{ $careHome->name }}</div>
                                        <div class="text-sm text-gray-700"><span class="text-gray-500">{{ str_replace("_x000D_", '', $careHome->description) }}</span></div>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- <div class="w-1/2 p-4">
                        <h3 class="text-xl font-bold">Home Based Services</h3>

                        
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection