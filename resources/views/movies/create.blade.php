@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="mb-3">Añadir Pelicula</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('movies.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Titulo:</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="description">Descripcion:</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="category_id">Categoria:</label>
                    <select class="form-control" id="category_id" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success mt-3">Agregar</button>
            </form>
        </div>
    </div>
</div>
@endsection
