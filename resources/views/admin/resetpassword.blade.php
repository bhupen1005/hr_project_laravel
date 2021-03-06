@extends('admin.main')
@extends('admin.sidebar')
@section('content')
<div class="main-panel">
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Reset Password..</h4>
                        <p class="card-category">For HR only..</p>
                    </div>
                    <div class="card-body">
                    @if(@session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                        <form class="needs-validation" method="POST">
                        @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">New Password</label>
                                        
                                        <input type="password" name="password" class="form-control">
                                        @error('password')
                                                <div class="alert alert-danger">

                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Confirm Password</label>
                                        <input type="password" name="confirm_password" class="form-control">
                                        @error('confirm_password')
                                                <div class="alert alert-danger">

                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mt-4" name="submit">Reset Password</button>
                            
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection