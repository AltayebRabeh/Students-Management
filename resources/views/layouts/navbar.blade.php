<nav class="topnav navbar navbar-light">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
      <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
    <form class="form-inline mr-auto searchform text-muted" method="get" action="{{ route('search') }}">
      <input name="search" class="form-control mr-sm-0 bg-transparent border-0 pl-2 text-muted" type="search" placeholder="بحث..." aria-label="Search">
    </form>
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
          <i class="fe fe-sun fe-16"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
          <span class="fe fe-grid fe-16"></span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-muted pr-0 d-flex align-items-center" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span style="width:33px;height:33px;border-radius:50%;background-image: url({{ url(Auth::user()->profile_photo_url) }});background-size:cover;background-position:center">
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item text-left" href="{{ route('profile.show') }}">الملف الشخصي</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a class="dropdown-item text-left" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                            this.closest('form').submit();">
                {{ __('تسجيل خروج') }}
            </a>
        </form>
        </div>
      </li>
    </ul>
  </nav>
