@csrf
<div class="form-group">
<label for="title">
            Titulo del proyecto <br />
                <input class="form-control boder-0 bg-light shadow-sm"  type="text" name="title" value="{{ old('title',$project->title) }}" >
        </label>
        <br />
        <label for="description">
            Descripcion <br />
                <input class="form-control boder-0 bg-light shadow-sm"  type="text" name="description" value="{{ old('description',$project->description) }}">
        </label>
        </div>
            
            <button class="btn btn-primary btn-lg btn-block">{{$btnText}}</button>
           
            <a class="btn btn-link btn-block" href="{{ route('portafolio.index') }}">Cancelar</a>
                
        