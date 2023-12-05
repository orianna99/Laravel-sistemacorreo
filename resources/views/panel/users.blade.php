@extends('panel.panel')

@section('title')
    Enviados
@endsection

@section('main')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Mensajes Enviados</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Enviados</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tabla de usuarios</h4>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Correo</th>
                                        <th>Rol</th>
                                        <th>ip</th>
                                        <th>Fecha</th>
                                        <th>Activo</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        @if ($user->rol->key == 'regular')
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->rol->key }}</td>
                                                <td>{{ $user->ip }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>{{ $user->activo }}</td>

                                                <td>
                                                    <Button class="btn btn-primary"><a class="sidebar-link sidebar-link"
                                                            aria-expanded="false"
                                                            onclick="event.preventDefault();
                                                                                                        document.getElementById('disable-user').submit();"><i
                                                                data-feather="log-out"
                                                                class="feather-icon text-decoration-none text-white"></i><span
                                                                class="hide-menu text-decoration-none text-white">Cambiar</span></a></Button>


                                                    <form id="disable-user" action="{{ route('disable.user') }}"
                                                        method="POST" class="d-none">
                                                        @method('PUT')
                                                        @csrf
                                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection


@section('js')
    <script src="{{ asset('assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/pages/datatable/datatable-basic.init.js') }}"></script>
@endsection
