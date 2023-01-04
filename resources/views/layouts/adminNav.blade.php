<nav class="navbar bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        Admin Dashboard
      </a>
      <div class="btn-group me-4">
        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span>{{ auth()->user()->name }}</span>
        </button>
        <div class="dropdown-menu">
            
            <a class="dropdown-item" href="/profile/{{ auth()->user()->name }}"><span>My Profile</span></a>
            <a class="dropdown-item" href=""
            onclick="event.preventDefault();document.getElementById('logout-user').submit();">Logout</a>
            <form action="{{ route('logout') }}" method="post" id="logout-user"
            style="display: none;">
          @csrf
      </form>
        </div>
      </div>
      
    </div>
  </nav>
