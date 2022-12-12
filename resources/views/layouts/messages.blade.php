@if(isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        <h4>Algo salio mal</h4>
        <ul class="list-unstyled mb-0">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::get('success', false))
    <?php $data = Session::get('success'); ?>
    @if (is_array($data))
        @foreach ($data as $message)
            <div class="alert alert-success">
                <i class="fa fa-check"></i>
                <h1>{{$message}}</h1>
            </div>
        @endforeach
    @else
        <div class="alert alert-success">
            <i class="fa fa-check"></i>
            <h1>{{$data}}</h1>
        </div>
    @endif
@endif