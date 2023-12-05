<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- Css Principal --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- Css del panel --}}
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">


</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Para: <span class=" text-info">{{ $mail->to }}</span></p>
                                <p>Desde: <span class=" text-info"> {{ $mail->from }}</span></p>
                                <p>Asunto:{{ $mail->subject }}</p>
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
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('js/feather.min.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
</body>

</html>
