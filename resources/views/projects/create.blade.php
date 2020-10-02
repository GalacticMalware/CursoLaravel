@extends('layout')

@section('title','Crear projecto')

@section('contenidos')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
           

            @include('parcials.session-status')

            @include('parcials.validation-errors')

            <form class="bg-whote py-3 px-4 shadow rounded" method="POST" action="{{ route('portafolio.store') }}">
            <h1 class="diplay-4">Crear poryecto</h1>
            <hr>
                @include('projects._form', ['btnText'=>'Guardar'])

            </form>
        </div>
    </div>
</div>
@endsection