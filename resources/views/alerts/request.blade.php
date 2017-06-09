@if(count($errors) > 0)
    <div class="alert alert-danger">
        <p>
            El formulario no se ha validado correctamente:
        </p>
        <ul>
            @foreach($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
@endif