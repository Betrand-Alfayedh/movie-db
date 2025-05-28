@extends('layouts.template')
@section('title', 'Detail')
@section('content')

    <div class="container mt-5">
        <h2 class="mb-4">{{ $movie->title }}</h2>
        <div class="card d-flex flex-row h-100">
            <img src="{{ $movie->cover_image_url }}" alt="Cover" class="card-img-left img-fluid" style="height: 70vh">

            <div class="card-body">
                <p class="card-text text-secondary">{{ $movie->slug }}</p>
                <p class="card-text">Actors : {{ $movie->actors }}</p>
                <p class="card-text">Category : {{ $movie->category->category_name }}</p>
                <p class="card-text">{{ $movie->synopsis }}</p>
                <p class="card-text small text-secondary"> Year : {{ $movie->year }}</p>
                <a href="/" class="btn btn-success btn-sm">Back
                </a>
            </div>
        </div>

    </div>
@endsection