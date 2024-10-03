<div class="container-fluid">
    <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
        <li class="nav-item topbar-user dropdown hidden-caret">
            <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown"
               href="#" aria-expanded="false">
                <div class="avatar-sm">
                    <img src="{{ asset('assets/img/profile.jpg') }}"
                         class="avatar-img rounded-circle"/>
                </div>
                <span class="profile-username">
                    <span class="op-7">Hi,</span>
                    <span class="fw-bold">{{ Auth::user()->name }}</span>
                </span>
            </a>
            <ul class="dropdown-menu dropdown-user animated fadeIn">
                <div class="dropdown-user-scroll scrollbar-outer">
                    <li>
                        <div class="user-box">
                            <div class="avatar-lg">
                                <img src="{{ asset('assets/img/profile.jpg') }}"
                                     alt="image profile" class="avatar-img rounded"/>
                            </div>
                            <div class="u-text">
                                <h4>{{ Auth::user()->name }}</h4>
                                <p class="text-muted">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('about.edit', 1) }}">About Us</a>
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">Account Setting</a>
                        <div class="dropdown-divider"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" class="dropdown-item"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                Logout
                            </x-dropdown-link>
                        </form>

                    </li>
                </div>
            </ul>
        </li>
    </ul>
</div>
