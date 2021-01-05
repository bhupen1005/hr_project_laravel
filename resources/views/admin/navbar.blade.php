@section('navbar')
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
         
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
            @if(session()->has('admin_name'))
            <li class="nav-item">{{session()->get('admin_name')}}</li>
            @endif
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="{{url('/admin/editprofile')}}">Profile</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{url('/admin')}}/changepassword">Change Password</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{url('/admin')}}/logout">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      @endsection