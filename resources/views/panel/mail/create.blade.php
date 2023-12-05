@extends('panel.panel')


@section('title')
    Crear Mail
@endsection

@section('main')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Enviar un E-mail</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Crear correo</li>
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
                        <h4 class="card-title">Formulario de Correo Electronico</h4>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span>{{ session('status') }}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        
                        {{-- <form action="{{ route('mail.store') }}" method="POST">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <label for="from">De:</label>
                                            <input type="email" id="from" name="from" class="form-control w-60"
                                                placeholder="ej. remitente@correo.com" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <label for="to">Para:</label>
                                            <input type="email" id="to" name="to" class="form-control w-60"
                                                placeholder="ej. destinatario@correo.com" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <label for="subject">Asunto:</label>
                                            <input type="text" id="subject" name="subject" class="form-control"
                                                placeholder="ej. Mi ausunto es el siguiente" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <label for="message">Escriba su mensaje:</label>
                                            <div>

                                                <textarea class="form-control" name="message" id="summary-ckeditor" rows="5"
                                                    id="message" placeholder="Mi mensaje.." required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10">

                                        <label for="plantilla">Plantillas:</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <btn class="input-group-text btn btn-success">Agregar</btn>
                                                </div>
                                                <select class=" form-control w-45" name="plantilla" id="plantilla">
                                                    <option value=""></option>
                                                </select>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                                <div class="form-actions">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-success">Enviar mensajes</button>
                                        <button type="reset" class="btn btn-dark">Limpiar
                                            campos</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> --}}

                    <mail-form></mail-form>
                </div>
            </div>
        </div>
    </div>


    </div>

@endsection

@section('js')
    {{-- <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('summary-ckeditor', {
            filebrowserUploadUrl: "{{ route('upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });

    </script> --}}
@endsection
