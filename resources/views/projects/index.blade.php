@extends('layout')

@section('title','Portafolio')

@section('contenidos')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="display-4">Portafolio</h1>
        @include('parcials.session-status')

        @auth
        <a class="btn btn-primary" href="{{ route('portafolio.create') }}">Crear proyecto</a>
        @endauth
    </div>
    <p><span class="mb-0 lead text-secondary">Proyectos realizados</span></p>

    <!--<ul>
        @if($portafolio)
            @foreach($portafolio as $portafolios)
                <li>{{ $portafolios->title }}</li>
            @endforeach
        @else
        <li>No hay informacion</li>
        @endif
    </ul>-->

        {{$portafolio->pluck('title')->implode(', ')}}
    <ul class="list-group">

        @forelse($portafolio as $portafolios)
        <li class="list-group-item borde-0 mb-3 shadow-sm">
            <a class="text-secondary d-flex justify-content-between" href="{{ route('portafolio.show', $portafolios ?? '') }} ">
                <span class=" font-weight-blod">
                    {{ $portafolios->title }}
                </span>
                <span class="text-black-50">
                    {{ $portafolios->created_at->format('d/m/y')}}
                </span>
            </a></li>
        @empty
        <li class="list-group-item borde-0 mb-3 shadow-sm">No hay informacion</li>

        @endforelse

    </ul>

</div>
@endsection