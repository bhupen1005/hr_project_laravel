
@section('sidebar')

    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Infonic@MEMBER
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
<!--           <li class="nav-item  ">
            <a class="nav-link" href="./Users.html">
              <i class="material-icons">people</i>
              <p>Users</p>
            </a>
          </li> -->
          @if(session()->has('user_id'))
          <li class="nav-item ">
            <a class="nav-link" href="{{url('/')}}/user/tasks">
              <i class="material-icons">add_task</i>
              <p>Tasks</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{url('/')}}/user/logout">
              <i class="material-icons">exit_to_app</i>
              <p>Logout</p>
            </a>
          </li>
          @else
          <li class="nav-item ">
            <a class="nav-link" href="{{url('/')}}/login">
              <i class="material-icons">login</i>
              <p>Login</p>
            </a>
          </li>
          @endif
<!--           <li class="nav-item ">
            <a class="nav-link" href="./icons.html">
              <i class="material-icons">task_alt</i>
              <p>Task Completed</p>
            </a>
          </li> -->
        </ul>
      </div>
    </div>


    @endsection
