@extends('layout')

@section('title','User')

@section('contenidos')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
         
    

    @include('parcials.session-status')
   @include('parcials.validation-errors')
    
    <form class="bg-whote py-3 px-4 shadow rounded" method="POST" action="{{ route('roles.update', $user) }}">
        @method('PATCH')
        <h1 class="display-4">Editar usuario</h1>
        <hr>
        @include('roles._form',['btnText'=>'Actualizar'])

    </form>
        </div>
    </div>
</div>
    
@endsection