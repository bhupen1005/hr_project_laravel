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
                        <h4 class="card-title">Assign Task</h4>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Task Title</label>
                                  
                                        <input type="text" value = "{{old('task')}}" name="task" class="form-control">
                                        @error('task') 
              <p class="text-danger">
              {{$message}}
              </p>
              @enderror

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Description</label>
                                        <input type="text"  value = "{{old('description')}}"  name="description" class="form-control">
                                        @error('description') 
              <p class="text-danger">
              {{$message}}
              </p>
              @enderror

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="date" name="date" class="form-control">
                                        @error('date') 
              <p class="text-danger">
              {{$message}}
              </p>
              @enderror

                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mt-4" name="submit">Assign</button>
                            
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