@extends('layout')
@section('title','About')
@section('contenidos')
<div class="container">
    <div class="row">
    <div class="col-12">
            <img class="img-fluid bm-4" src="/img/about.svg" alt="Quien soy"></div>
    </div>

        <div class="col-12 col-lg-6">
            <h1 class="display-4 primary"> Desarrollo Web </h1>
            <p class="lead text-secondary">Desarollo con laravel</p>
            <a class="btn btn-lg btn-block btn-primary" href="{{ route('contactos') }}">Contacto</a>
            <a class="btn btn-lg btn-block btn-outline-primary" href="{{ route('portafolio.index') }}">Portafolio</a>
            <!--@auth
            {{ auth()->user()->name }}
            @endauth
-->

        </div>
        
</div>
</div>
@endsection