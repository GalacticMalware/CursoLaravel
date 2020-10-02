
@if(session('status'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
{{session('status')}}
    <buttom class="close" type="button" data-dismiss="alert" aria-label="Clse">
        <span aria-hidden="true">&times;</span>
    </buttom>
</div>

@endif