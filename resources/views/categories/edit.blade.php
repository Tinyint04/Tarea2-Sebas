@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Categoria</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>
@endsection
