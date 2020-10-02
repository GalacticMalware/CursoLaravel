@extends('layout')

@section('title','Roles')

@section('contenidos')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="display-4">Usuarios</h1>
        <!--include('parcials.session-status') -->

      <a class="btn btn-success pull-right" href="{{ route('register')}}">Crear nuevo usuario</a>
    </div>
    <p><span class="mb-0 lead text-secondary">Usuarios</span></p>

   

    <ul class="list-group">
    <!--links() des de bootstrap -->
  {!! $mensajes->fragment('hash')->appends(request()->query())->links('pagination::bootstrap-4') !!}
        @forelse($usuarios as $usuario )
        <li class="list-group-item borde-0 mb-3 shadow-sm">
            {{$usuario->present()->link()}}
         <a class="text-secondary d-flex justify-content-between" href="{{ route('roles.show', $usuario ?? '') }} ">
                <span class=" font-weight-blod">
                    {{ $usuario->name }}
                </span>

                <span class=" font-weight-blod">
                    {{ $usuario->email }}
                </span>

                <span class="text-black-50 ">
                    {{ $usuario->created_at->format('d/m/y')}}
                </span>

                {{ $usuario->present()->notes() }}
            @if($usuario->note->first()  == '')
                @else
                    <span class="text-black-50">
                        {{ $usuario->note->first()->body }}
                    </span>
            @endif

            @if( $usuario->tags->first() == '')
                @else
                    <span class="text-black-50">
                        {{ $usuario->tags->first()->pluck('texto')->implode(', ') }}
                    </span>
            @endif
           
           
        @empty
        <li class="list-group-item borde-0 mb-3 shadow-sm">No hay informacion</li>

        @endforelse

    </ul>

    <br />

    
    <ul class="list-group">
    
  
        @forelse($mensajes as $mensaje )
        <li class="list-group-item borde-0 mb-3 shadow-sm">

                <span class=" font-weight-blod">
                    {{ $mensaje->present()->userName() }}
                </span>

                <span class=" font-weight-blod">
                    {{ $mensaje->present()->userEmail() }}
                </span>

               
                <span class="text-black-50 ">
                    {{ $mensaje->subject}}
                </span>

                

                <span class="text-black-50">
                    {{ $mensaje->note->first() ? $mensaje->note->first()->body : '' }}
                </span>
            </a></li>
            
        @empty
       
        <li class="list-group-item borde-0 mb-3 shadow-sm">No hay mensaje</li>

        @endforelse

      
        
    </ul>

</div>
@endsection