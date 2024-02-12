@extends('layouts.admin')

@section('content')
    <div class="container index">
        <h1 class="proj">My projects</h1>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-success btn-sm" role="button">Add a project <i
                class="fa-solid fa-arrow-right"></i></a>



        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Titolo</th>
                    <th scope="col">Anno</th>
                    <th scope="col">Bottoni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->year }}</td>
                        <td>
                            <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-outline-success btn-sm"
                                role="button">Show <i class="fa-solid fa-magnifying-glass"></i></i></a>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary btn-sm"
                                role="button">Edit <i class="fa-regular fa-pen-to-square"></i></a>
                            {{-- <a href="#" class="btn btn-danger btn-sm" role="button">Delete</a> --}}
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Elimina <i
                                        class="fa-solid fa-trash-can ms-1"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
