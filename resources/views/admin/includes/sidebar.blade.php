<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="" class="logo">
                <img src="https://www.novnat.co.uk/assets/images/resources/logo_novnat.png"
                     alt="navbar brand" class="navbar-brand" height="50"/>
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item active">
                    <a data-bs-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="dashboard">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('about.edit', 1) }}">
                                    <span class="sub-item">About Us</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                    <h4 class="text-section">Components</h4>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#base">
                        <i class="fas fa-layer-group"></i>
                        <p>Gallery</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('gallery.index')}}">
                                    <span class="sub-item">All Galleries</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('gallery.create')}}">
                                    <span class="sub-item">Add Gallery</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarLayouts">
                        <i class="fas fa-th-list"></i>
                        <p>Sliders</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sidebarLayouts">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('sliders.index') }}">
                                    <span class="sub-item">All Slider Photos</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('sliders.create') }}">
                                    <span class="sub-item">Add Slider</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#features">
                        <i class="fa-solid fa-list-ol"></i>
                        <p>Stories</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="features">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('stories.index') }}">
                                    <span class="sub-item">All Stories</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('stories.create') }}">
                                    <span class="sub-item">Add Story</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#features">
                        <i class="fas fa-table"></i>
                        <p>Features</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="features">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('features.index') }}">
                                    <span class="sub-item">All Features</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('features.create') }}">
                                    <span class="sub-item">Add Features</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#tech">
                        <i class="fa-solid fa-microchip"></i>
                        <p>Technologies</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="tech">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('technologies.index') }}">
                                    <span class="sub-item">All Technologies</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('technologies.create') }}">
                                    <span class="sub-item">Add Technology</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#forms">
                        <i class="fas fa-pen-square"></i>
                        <p>Partners</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="forms">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('partners.index') }}">
                                    <span class="sub-item">All Partners</span>
                                </a>
                                <a href="{{ route('partners.create') }}">
                                    <span class="sub-item">Add Partner</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#comments">
                        <i class="fas fa-desktop"></i>
                        <p>Goals</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="comments">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('goals.index') }}">
                                    <span class="sub-item">All Goals</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('goals.create') }}">
                                    <span class="sub-item">Add Goal</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#tables">
                        <i class="fa-solid fa-users"></i>
                        <p>Teams</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="tables">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('teams.index') }}">
                                    <span class="sub-item">All Members Teams</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('teams.create') }}">
                                    <span class="sub-item">Add Member</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#FAQs">
                        <i class="fas fa-layer-group"></i>
                        <p>FAQs</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="FAQs">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('faqs.index') }}">
                                    <span class="sub-item">All FAQs</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('faqs.create') }}">
                                    <span class="sub-item">Add FAQ</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
