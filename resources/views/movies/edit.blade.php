@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="mb-3">Edit Pelicula</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('movies.update', $movie->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Titulo:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $movie->title }}">
                </div>
                <div class="form-group">
                    <label for="description">Descripcion:</label>
                    <textarea class="form-control" id="description" name="description">{{ $movie->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="category_id">Categoria:</label>
                    <select class="form-control" id="category_id" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $movie->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-warning mt-3">Actualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection
