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
                  <h4 class="card-title ">All tasks</h4>
                  <p class="card-category"> Here is the list of all assignments</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Title
                        </th>
                        <th>
                          Description
                        </th>
                        <th>
                          User
                        </th>
                        <th>
                          Status_By_User
                        </th>
                        <th>
                          Status_By_Admin
                        </th>
                        <th>
                          Assigned_Date
                        </th>
                        <th>Actions</th>
                      </thead>
                      <tbody>

                      @foreach($tasks as $task)
                        <tr>
                          <td>
                            {{$task['id']}}
                          </td>
                          <td>
                            {{$task['title']}}
                          </td>
                          <td>
                            {{$task['description']}}
                          </td>
                     
                          <td>
                          @foreach($users as $user)
                          @if($user['id']===$task['user_id'])
                            {{$user['name']}}
                            @endif
                        @endforeach
                          
                          </td>
                         
                          
                          <td>
                          @if($task['status_by_user']===0)
                           
                          <span class="badge badge-danger">

                            Pending
                          </span>
                          @else
                          
                          <span class="badge badge-success">
                          Completed
                          </span>
                          @endif
                          </td>
                          

                          <td>
                          @if($task['status_by_admin']===0)
                            
                          <span class="badge badge-danger">

                            Pending
                          </span>
                          @else
                         
                          <span class="badge badge-success">
                          Completed
                          </span>
                          @endif
                          </td>
                          
                          
                        

                          <td class="text-primary">
                          {{$task['date']}}
                          </td>
                          <td>

                          <a class="btn btn-xs  btn-danger btn-flat show_confirm" href="task/delete/{{$task['id']}}">Delete</a>
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