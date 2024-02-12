@extends('layouts.admin')

@section('content')
    <a href="{{ route('admin.projects.index') }}" class="btn btn-dark btn-sm my-3" role="button">Torna alla Lista <i
            class="fa-regular fa-hand-point-left"></i></a>
    @if (session('message'))
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">
                        {{ $project->title }}
                        <i class="fa-solid fa-square-check text-success"></i>
                    </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('message') }}
                </div>
            </div>
        </div>
    @endif

    <div class="d-flex justify-content-between container proj left gap-5">
        <div>
            <h1>My projects</h1>
        </div>
        <div>
            <h5>{{ $project->title }}</h5>
            <p>{{ $project->category?->title }} - {{ $project->year }}</p>
            <p>{{ $project->description }}</p>
        </div>
    </div>
@endsection
