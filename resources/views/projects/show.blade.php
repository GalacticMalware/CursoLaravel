@extends('layout')

@section('title', 'Portafolio | '.$project->title)

@section('contenidos')

@include('parcials.session-status')
<!--{{ $project }} -->
<div class="container btn-group-sm">
    <div class="bg-white p-5 shadow rounded">
        <h1>{{ $project->title }}</h1>

        <p class="text-secondary">{{ $project->description }}</p>
        <p class="text-black-50">{{ $project->created_at->diffForHumans() }}</p>
        <div class="d-flex">
            <a class="justify-content-between align-items-center" href="{{ route('portafolio.index') }}">Regresar</a>
        </div>
        @auth
        <a class="btn btn-primary" href="{{ route('portafolio.edit', $project)}}">Editar</a>
        <a class="btn btn-danger btn-black" href="#" onclick="document.getElementById('delete-project').submit()">Eliminar</a>
        @endauth
        <form class="d-none" id="delete-project" method="POST" actions="{{ route('portafolio.destroy',$project) }}">
            @csrf @method('DELETE')
            <!-- <button>Eliminar</button> -->
        </form>
    </div>
</div>
@endsection