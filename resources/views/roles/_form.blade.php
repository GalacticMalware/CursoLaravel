@csrf
<div class="form-group">
<label for="title">
            Titulo del proyecto <br />
                <input class="form-control boder-0 bg-light shadow-sm"  type="text" name="name" value="{{ old('name',$user->name) }}" >
        </label>
        <br />
        <label for="description">
            Descripcion <br />
                <input class="form-control boder-0 bg-light shadow-sm"  type="text" name="email" value="{{ old('email',$user->email) }}">
        </label>
        </div>

        <div class="checkbox">
            @foreach($roles as $id=>$name)
            <label>
          
            <input type="checkbox" value="{{$id}}" 
            {{ $user->roles->pluck('id')->contains($id) ? 'checked' : "" }}
             name="roles[]">
            {{$name}}
            </label>
            @endforeach
        </div>
            
            <button class="btn btn-primary btn-lg btn-block">{{$btnText}}</button>
           
            <a class="btn btn-link btn-block" href="{{ route('roles.index') }}">Cancelar</a>
                
        