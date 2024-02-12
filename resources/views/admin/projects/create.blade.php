@extends('layouts.admin')

@section('content')
    <h1>crea un nuovo proj</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" placeholder="titolo" name="title"
                value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control" id="image" placeholder="image" name="image"
                value="{{ old('image') }}">
        </div>
        <label for="category_id" class="form-label">Category</label>
        <select class="form-select" aria-label="Default select example" name="category_id" id="category_id">
            <option selected> - </option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if (old('category_id') == $category->id) selected @endif>
                    {{ $category->title }}</option>
            @endforeach
        </select>
        <div class="mb-3">
            <label for="year" class="form-label">year</label>
            <input type="year" class="form-control" id="year" placeholder="year" name="year"
                value="{{ old('year') }}">
        </div>
        <div class="mb-3">
            <div>
                <label for="technologies" class="form-label">Tecnologie usate</label>
            </div>


            @foreach ($technologies as $technology)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="{{ $technology->id }}" value="{{ $technology->id }}"
                        name="technologies[]" {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="{{ $technology->id }}">{{ $technology->title }}</label>
                </div>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <textarea class="form-control" id="description" rows="3" name="description" placeholder="description"
                value="{{ old('description') }}"></textarea>
        </div>
        <button class="btn btn-success">Invia il proj</button>
    </form>
@endsection
