@if($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        @foreach($errors->all as $error)
            <p>{{$error}}</p>
        @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


@if(Session::has('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <p>{{ Session::get('success') }}</p>
    </div>
@endif



@if(Session::has('sticky_error'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <p>{{ Session::get('sticky_error') }}</p>
    </div>
@endif


