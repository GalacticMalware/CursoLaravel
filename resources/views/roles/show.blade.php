@extends('layout')

@section('title', 'Usuario | '.$user->name)

@section('contenidos')

@include('parcials.session-status')
<!--{{ $user }} -->
<div class="container btn-group-sm">
    <div class="bg-white p-5 shadow rounded">
        <h1>{{ $user->name }}</h1>

        <p class="text-secondary">{{ $user->name }}</p>
        <p class="text-black-50">{{ $user->email }}</p>
        
        <div class="d-flex">
            <a class="justify-content-between align-items-center" href="{{ route('roles.index') }}">Regresar</a>
        </div>
        @auth
        <a class="btn btn-primary" href="{{ route('roles.edit', $user->id)}}">Editar</a>
        @endauth
    </div>
</div>
@endsection