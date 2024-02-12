@extends('layouts.app')

{{-- @extends('layouts.admin') --}}

@section('content')
    <div class="d-flex justify-content-between container">
        <div class="left">
            <h1 class="proj">My projects</h1>
            {{-- <a href="{{ route('admin.projects.create')}}" class="btn btn-success btn-sm" role="button">Add a project</a> --}}
        </div>
        <div class="scorrevole">
            <ul class="d-flex flex-column gap-3 mt-5">
                @foreach ($projects as $project)
                    <li class="me-5">
                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="{{ $project->image }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $project->title }}</h5>
                                <p class="card-text">{{ $project->year }}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
