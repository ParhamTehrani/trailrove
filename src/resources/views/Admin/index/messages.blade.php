@if($message = Session::get('success'))
    <div>
        <div class="alert alert-success" role="alert">
            <strong>{!! $message !!}</strong>
        </div>
    </div>

@elseif($message = Session::get('warning'))
    <div>
        <div class="alert alert-warning" role="alert">
            <strong>{!! $message !!}</strong>
        </div>
    </div>

@elseif($message = Session::get('info'))
    <div>
        <div class="alert alert-info" role="alert">
            <strong>{!! $message !!}</strong>
        </div>
    </div>


@elseif($message = Session::get('fail'))
    <div>
        <div class="alert alert-danger" role="alert">
            <strong>{!! $message !!}</strong>
        </div>
    </div>
@elseif($message = Session::get('abs'))
    <div class="w-100">
        <div class="alert alert-success alert-dismissible w-50" style="position: absolute; top: 200px; left: 25%; z-index: 1000;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{!! $message !!}</strong>
        </div>
    </div>
@elseif($errors->any())
    <div>
        @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            <strong> {{ $error }} </strong>
        </div>
        @endforeach

    </div>
@endif

