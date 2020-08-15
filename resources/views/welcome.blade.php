@extends('layouts.layout')

@section('title', 'A-GEN')

@section('content')
<div class="container mx-auto h-full">
    <div class="flex flex-col content-center items-center justify-center h-screen">
        <h1 class="text-4xl font-extrabold text-blue-800 mb-8">A-GEN</h1>
        <div>
            <a href="/insights" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block w-48 text-center mx-4">Insights</a>
            <a href="/learn-more" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block w-48 text-center mx-4">Learn More</a>
        </div>
    </div>
</div>
@endsection