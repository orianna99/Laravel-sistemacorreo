<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav pt-0">
            <ul id="sidebarnav">

                <li class="list-divider mt-1"></li>
                <li class="nav-small-cap"><span class="hide-menu">Applications</span></li>
                @if (Auth::user()->rol->key == 'admin' || Auth::user()->rol->key == 'master')
                    <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('register') }}"
                            aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
                                class="hide-menu">Crear usuarios
                            </span></a>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('usuarios') }}"
                            aria-expanded="false"><i data-feather="user" class="feather-icon"></i><span
                                class="hide-menu">Tabla usuarios
                            </span></a>
                    </li>
                @endif
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('mail.create') }}"
                        aria-expanded="false"><i data-feather="send" class="feather-icon"></i><span
                            class="hide-menu">Enviar</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('mail.index') }}"
                        aria-expanded="false"><i data-feather="mail" class="feather-icon"></i><span
                            class="hide-menu">Bandeja</span></a></li>


                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" aria-expanded="false"
                        href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i data-feather="log-out"
                            class="feather-icon"></i><span class="hide-menu">Logout</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
