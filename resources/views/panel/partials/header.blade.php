<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md">
        <div class="navbar-header" data-logobg="skin6">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                    class="ti-menu ti-close"></i></a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-brand">
                <!-- Logo icon -->
                <a href="index.html">
                    <b class="logo-icon">
                        <!-- Dark Logo icon -->
                        <img src="{{ asset('assets/images/logo-icon.png') }}" alt="homepage" class="dark-logo" />
                        <span class="logo-text mt-2 align-items-center strong" style="font-size: 30px">
                            Mailer
                        </span>
                        <!-- Light Logo icon -->
                        <img src="{{ asset('assets/images/logo-icon.png') }}" alt="homepage" class="light-logo" />
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->

                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">

            <ul class="navbar-nav float-left  ">

                <li class="nav-item dropdown float-right">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('assets/images/users/profile-pic.jpg') }}" alt="user" class="rounded-circle"
                            width="40">
                        <span class="ml-2 d-none d-lg-inline-block"><span>Hola,</span> <span
                                class="text-dark">{{ Auth::user()->name }}
                            </span>
                    </a>

                </li>

            </ul>
        </div>
    </nav>
</header>
