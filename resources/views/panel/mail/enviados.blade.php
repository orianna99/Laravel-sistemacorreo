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
                        <h4 class="card-title">Buzon de Salida</h4>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>Remitente</th>
                                        <th>Destinatario</th>
                                        <th>Asunto</th>
                                        <th>Plantilla</th>
                                        <th>Fecha</th>
                                        <th>Detalles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Auth::user()->mail as $mail)
                                        <tr>
                                            <td>{{ $mail->from }}</td>
                                            <td>{{ $mail->to }}</td>
                                            <td>{{ $mail->subject }}</td>
                                            <td>None</td>
                                            <td>{{ $mail->created_at }}</td>
                                            <td><Button class="btn btn-primary"><a class=" text-decoration-none text-white"
                                                        href="{{ route('mail.show', $mail->id) }}">Ver correo</a></Button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Remitente</th>
                                        <th>Destinatario</th>
                                        <th>Asunto</th>
                                        <th>Plantilla</th>
                                        <th>Fecha</th>
                                        <th>Detalles</th>
                                    </tr>
                                </tfoot>
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
