@section('sidebar')
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Infonic@HR
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
        @if(session()->has('admin_id'))
          <li class="nav-item ">
            <a class="nav-link" href="{{url('/admin')}}/dashboard">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="{{url('/admin')}}/user/add">
              <i class="material-icons">person_add</i>
              <p>Add User</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{url('/admin')}}/tasks">
              <i class="material-icons">task_alt</i>
              <p>Tasks</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{url('/admin')}}/users">
              <i class="material-icons">groups</i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{url('/admin')}}/logout">
              <i class="material-icons">exit_to_app</i>
              <p>Logout</p>
            </a>
          </li>
          @else
          <li class="nav-item ">
            <a class="nav-link" href="{{url('/admin')}}/login">
              <i class="material-icons">login</i>
              <p>Login</p>
            </a>
          </li>
          @endif
        </ul>
      </div>
    </div>
@endsection

