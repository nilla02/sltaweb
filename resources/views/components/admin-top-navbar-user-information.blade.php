<li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
            @if(Auth::check())
            {{Session::get('propertyName')}} -
            {{auth()->user()->username}}
            @endif
        </span>
    </a>
    <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

        <a class="dropdown-item" href="{{route('user.profile.show', auth()->user())}}">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profile
        </a>

        @if(auth()->user()->userHasRole('Admin'))
        <a class="dropdown-item" href="{{route('user.index')}}">
            <i class="fas fa-users fa-sm fa-fw mr-2 text-gray-400"></i>
            Create Users
        </a>
        @endif

        @if(auth()->user()->userHasRole('Super Admin'))
        <a class="dropdown-item" href="">
            <i class="fas fa-building fa-sm fa-fw mr-2 text-gray-400"></i>
            Create Property
        </a>
        @endif

        @if(Session::get('propertyCount') > 1)
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{route('admin.select')}}">
            <i class="fas fa-bed fa-sm fa-fw mr-2 text-gray-400"></i>
            Change Property
        </a>
        @endif

        @if(auth()->user()->userHasRole('Super Admin'))
        @if(Session::get('propertyCount') > 1)
        <a class="dropdown-item" href="">
            <i class="fas fa-link fa-sm fa-fw mr-2 text-gray-400"></i>
            link users to properties
        </a>
        @endif
        @endif

        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
        </a>
    </div>
</li>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form action="/logout" method="post">
                    @csrf
                    <button class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>