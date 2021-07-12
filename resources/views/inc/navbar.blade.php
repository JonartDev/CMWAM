<nav class="nav nav-tabs navbar-expand-md" style="color:black;">
    <div class="navbar-collapse collapse justify-content-between align-items-center w-100" >
        <ul class="nav mr-auto" style="font-size:16px;">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/home') ? 'active' : '' }}" href="{{ url('/admin/home') }}">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/customer*') ? 'active' : '' }}" href="{{ url('/admin/customer') }}">CUSTOMERS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}" href="{{ url('/admin/users') }}">USERS</a>
            </li>
        </ul>
            <ul class="nav">
                <a id="impScale" href="{{ route('auth.logout')}}"
                onclick="return confirm('Are You sure you want to logout?');"
                style="color:#455357; font-size:16px;"><b>Logout</b>&nbsp;&nbsp;<i class="fa fa-sign-out pr-5" aria-hidden="true"></i></a>
            </ul>
    </div>
</nav>

@section('javascripts')
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
@endsection