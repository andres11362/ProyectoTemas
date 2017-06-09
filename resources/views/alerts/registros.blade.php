@if(Session::has('creado'))
    <div class="alert alert-success">
        <p>
            {{ Session::get('creado') }}
        </p>
    </div>
    {{--Session::get('message')(para usar un solo mensaje por sesion)--}}
@endif
@if(Session::has('editado'))
    <div class="alert alert-warning">
        <p>
            {{ Session::get('editado') }}
        </p>
    </div>
@endif
@if(Session::has('eliminado'))
    <div class="alert alert-danger">
        <p>
            {{ Session::get('eliminado') }}
        </p>
    </div>
@endif
