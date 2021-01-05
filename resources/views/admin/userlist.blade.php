
@extends('admin.main')
@extends('admin.sidebar')
@extends('admin.navbar')

@section('content')
<div class="main-panel">
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">User's Table</h4>
                  <p class="card-category">Here you can see all users</p>

                </div>
@if(session()->has('success'))
<div class="alert mt-4 alert-success">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="material-icons">close</i>
                            </button>
<span>
{{session()->get('success')}}
</span>
@endif
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          Phone
                        </th>
                        <th>
                          Profile_Picture
                        </th>
                        <th>
                          Status
                        </th>
                        <th>
                          Tasks
                        </th>
                        <th>
                          Update Info
                        </th>
                      </thead>
                      <tbody>
                      @foreach($users as $user)
                        <tr>
                          <td>
                            {{$user['id']}}
                          </td>
                          <td>
                            {{$user['name']}}
                          </td>
                          <td>
                            {{$user['email']}}
                
                          </td>
                          <td>
                            {{$user['phone']}}
                          </td>
                          <td class="text-primary">
                          @if($user['profile_picture'])
                            <img class="img-fluid" width="100" src="{{url('/')}}/public/profileimages/{{$user['profile_picture']}}" alt="">
                          @endif
                          </td>
                          <td>
                            @if($user['status']==1)
                            <a href="updatestatus/{{$user['id']}}" class="btn btn-success btn-sm">Active</a>
                            @else
                            <a href="updatestatus/{{$user['id']}}"  class="btn btn-sm btn-danger">Deactivated</a>
                            @endif
                          </td>
                         
                          <td>
                          <a  href="task/add/{{$user['id']}}">Assign Task</a>
                          </td>
                          <td>
                          <a  href="edituser/{{$user['id']}}">Edit</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>


@endsection