@extends('layouts.layout')

@section('title', 'A-GEN Insights')

@section('content')
<div>
    <div class="container mx-auto">
        <div class="relative">
            <div class="py-4 px-8 flex flex-row justify-between items-center bg-cover h-64 my-16 rounded-lg shadow-md" style="background-image: url('/images/hero-background.jpg')">
                <div class="absolute top-0 left-0 bg-gray-900 w-full h-full rounded-lg z-0 bg-opacity-75"></div>

                <div class="z-10">
                    <h1 class="text-4xl font-extrabold text-blue-100">A-GEN</h1>
                    <div class="text-2xl text-gray-700 text-blue-200">A new future for A-GEN</div>
                </div>
                <div>
                    
                </div>
            </div>
        </div>
            
        <div class="bg-gray-200 mb-16 rounded-lg p-8 shadow-md">
            <h2 class="text-2xl font-bold">About A-GEN</h2>
            <p>A-GEN was developed by Deb & Tim as a project for GovHack 2020. Learn more in this highly polished video presentation:</p>

        </div>
    </div>
</div>
@endsection