@extends('admin.main')
@extends('admin.sidebar')
@extends('admin.navbar')

@section('content')
@if(@session()->has('success'))
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="material-icons">close</i>
                            </button>
                            <span>
                                {{ session()->get('success') }}
                            </span>
                        </div>
@endif
</div>
</div>
</div>
</div>
</div>
@endsection