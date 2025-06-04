@extends('layouts.template')

@section('title', 'Data Movie')

@section('content')

<div class="container">
    <h1>Data Movie</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="/movie/create" class="btn btn-primary">Tambah Movie Baru</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Cover</th>
                <th>Title</th>
                <th>Category</th>
                <th>Year</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $index => $movie)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    @if($movie->cover_image)
                        <img src="{{ asset('storage/' . $movie->cover_image) }}" alt="{{ $movie->title }}" width="80">
                    @else
                        No Image
                    @endif
                </td>
                <td>{{ $movie->title }}</td>
                <td>{{ $movie->category->category_name ?? 'No Category' }}</td>
                <td>{{ $movie->year }}</td>
                <td>
                    <a href="/movie/{{ $movie->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <form action="/movie/{{ $movie->id }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus movie ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection