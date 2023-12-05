@extends('panel.panel')
@section('title')
    {{ $mail->subject }}
@endsection
@section('main')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Enviado a: {{ $mail->to }}</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('mail.index') }}" class="text-muted">Mail</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">{{ $mail->subject }}</li>
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
                    <div class="card-header">
                        <h3>{{ $mail->subject }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Para: <span class=" text-info">{{ $mail->to }}</span></p>
                                <p>Desde: <span class=" text-info"> {{ $mail->from }}</span></p>
                                <p>{{ $mail->subject }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class=" text-muted float-right">Enviado: {{ $mail->created_at }}</p>
                            </div>
                            <div class="col-md-12 mt-3">
                                <p class=" text-black">{!! $mail->message !!}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
