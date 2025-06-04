@extends('layouts.template')

@section('title','Edit Movie')

@section('content')

<h1>Edit Data Movie</h1>
<form action="/movie/{{ $movie->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- Title --}}
    <div class="mb-3 row">
        <label for="title" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="title" name="title" value="{{ $movie->title }}" required>
        </div>
    </div>

    {{-- Synopsis --}}
    <div class="mb-3 row">
        <label for="synopsis" class="col-sm-2 col-form-label">Synopsis</label>
        <div class="col-sm-10">
            <textarea class="form-control" id="synopsis" name="synopsis" rows="5" required>{{ $movie->synopsis }}</textarea>
        </div>
    </div>

    {{-- Category --}}
    <div class="mb-3 row">
        <label for="category_id" class="col-sm-2 col-form-label">Category</label>
        <div class="col-sm-10">
            <select class="form-select" id="category_id" name="category_id" required>
                <option value="" disabled>-- Pilih Category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $movie->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- Year --}}
    <div class="mb-3 row">
        <label for="year" class="col-sm-2 col-form-label">Year</label>
        <div class="col-sm-10">
            <select class="form-select" id="year" name="year" required>
                @php
                    $currentYear = date('Y');
                    for ($year = $currentYear; $year >= 1990; $year--) {
                        $selected = $movie->year == $year ? 'selected' : '';
                        echo "<option value=\"$year\" $selected>$year</option>";
                    }
                @endphp
            </select>
        </div>
    </div>

    {{-- Actors --}}
    <div class="mb-3 row">
        <label for="actors" class="col-sm-2 col-form-label">Actors</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="actors" name="actors" 
                   value="{{ $movie->actors }}" placeholder="Contoh: Tom Holland, Zendaya" required>
        </div>
    </div>

    {{-- Cover Image --}}
    <div class="mb-3 row">
        <label for="cover_image" class="col-sm-2 col-form-label">Cover Image</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*">
            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
            @if($movie->cover_image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $movie->cover_image) }}" alt="Current Cover" width="100">
                </div>
            @endif
        </div>
    </div>

    {{-- Submit Button --}}
    <div class="mb-3 row">
        <div class="col-sm-10 offset-sm-2">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/movie" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</form>

@endsection