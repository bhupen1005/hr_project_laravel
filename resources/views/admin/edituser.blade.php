@extends('admin.main')
@extends('admin.sidebar')
@extends('admin.navbar')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Edit user..</h4>
                            <p class="card-category">For HR only..</p>
                        </div>
                        <div class="card-body">
                            @if(@session()->has('success'))
                            <div class="alert alert-success">
                            {{session()->get('success')}}
                            </div>
                            @endif
                            <form class="" method="POST"  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Name</label>
                                            <input type="text" name="name" class="form-control"  value="{{$user['name']}}" >
                                            @error('name')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" >
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Email address</label>
                                            <input readonly="readonly"  type="email" name="email" class="form-control"  value="{{$user['email']}}">
                                            @error('email')
                                                <div class="alert alert-danger">

                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Password</label>
                                            <input type="password" name="password" class="form-control"  value="{{$user['password']}}">
                                            @error('password')
                                                <div class="alert alert-danger">

                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Phone</label>
                                            <input type="text" name="phone" class="form-control"  value="{{$user['phone']}}">
                                            @error('phone')
                                                <div class="alert alert-danger">

                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="">
                                            <label class="bmd-label-floating pr-4">Update Picture</label>
                                            <input type="file" name="profile_picture" class="">
                                            <img width="200" class="img-fluid rounded" src="{{url('/')}}/public/profileimages/{{$user['profile_picture']}}" alt="">
                                            @error('profile_picture')
                                                <div class="alert alert-danger">

                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success mt-4" name="submit">Update</button>

                               <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection