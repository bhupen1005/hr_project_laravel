@extends('layouts.main')
@extends('sidebar')
@extends('navbar')

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
                          Description                        </th>
                        <th>
                          Assigned_Date
                        </th>
                        <th>
                          Status
                        </th>
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
                      
                          {{$task['date']}}
                      </td>
                          <td>
<!--                             @if($task['status_by_user']==1)
                            <a href="{{url('/user/task')}}/updateTaskStatus/{{$task['id']}}" class="btn btn-success btn-sm">Completed</a>
                            @else
                            <a href="{{url('/user/task')}}/updateTaskStatus/{{$task['id']}}"  class="btn btn-sm btn-danger">Pending</a>
                            @endif -->
                            <!-- <a href="{{url('/user/task')}}/completed/{{$task['id']}}">Mark as Completed</a> -->
                            <button onclick="createLink(parseInt({{$task['id']}}))" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Mark as completed</button>

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


      

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form id="completed" class="m-4" method="POST"> 
  @csrf
    <div class="mb-3">
    <label for="audio">Audio</label>
    <input type="file" class='form-control mb-3'/>
    </div>   
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Notes:</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <button class="btn btn-info" type="submit">Send</button>
</form>
    </div>
  </div>
</div>
</div>

<script>
function createLink(id){
let form = document.getElementById('completed');
console.log(form);
let attr = document.createAttribute('action');
attr.value = `{{url('/user')}}/task/completed/${id}`;
form.setAttributeNode(attr);
}
</script>


@endsection