<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Listonly">
    <meta name="keywords" content="Listonly, Larastonly, acessibilidade">
    <meta name="author" content="Nauj, Palestina/Póbson, Marshal">

    <title>@yield('title')| Listonly</title>

    <div id="bg">
        <img src="/img/background.jpg" alt="">
    </div>

    <link rel="stylesheet" href="/packages/magnific-popup/0.9.9/css/all.min.css"/>

    <link href="/packages/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="/packages/bootstrap/3.2.0/css/docs.min.css" rel="stylesheet">
    <style src="/packages/bootstrap/3.2.0/css/bootstrap-theme.min.css"></style>
    <link href="/packages/bootgrid/1.1.1/css/jquery.bootgrid.css" rel="stylesheet"/>

    <style>
        @-webkit-viewport { width: device-width; }
        @-moz-viewport { width: device-width; }
        @-ms-viewport { width: device-width; }
        @-o-viewport { width: device-width; }
        @viewport { width: device-width; }
    </style>

    <style>

        .container-main {
            background-color: white;
            display: block;

            margin-top: 50px;
            box-shadow: 0 0 30px black;
            padding:10px 10px 10px 10px;
            border:10px 10px 10px 10px;

            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }

        #bg {
            position: fixed;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            z-index: -99999;
        }
        #bg img {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            min-width: 50%;
            min-height: 50%;
            z-index: -99999;
        }
    </style>

    <style>
        html, body {
            overflow: hidden;
            height: 100%;
        }
        body {
            padding-top: 57px;
        }
        .wrap {
            padding-top: 10px;
            height: 100%;
            overflow: auto;
        }
    </style>

</head>
<body>

    <div class="wrap">

        @include('templates.partials.header')
            @yield('content')
        @include('templates.partials.footer')

    </div>

</body>

<!--[if lt IE 9]>
<script src="/packages/bootstrap/3.2.0/js/ie8-responsive-file-warning.js"></script>
<![endif]-->
<script src="/packages/bootstrap/3.2.0/js/ie-emulation-modes-warning.js"></script>
<!--[if lt IE 9]>
<script src="/packages/bootstrap/3.2.0/js/html5shiv.min.js"></script>
<script src="/packages/bootstrap/3.2.0/js/respond.min.js"></script>
<![endif]-->

<script src="/packages/angular/1.2.8/js/angular.min.js"></script>
<script src="/packages/angular/1.2.8/js/angular-route.js"></script>

<script src="/packages/jquery/1.9.1/js/jquery.min.js"></script>
<script src="/packages/bootgrid/1.1.1/js/jquery.bootgrid.js"></script>

<script src="/packages/bootstrap/3.2.0/js/ie10-viewport-bug-workaround.js"></script>
<script src="/packages/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="/packages/bootsrap/3.2.0/js/docs.min.js"></script> {{-- provavelmente não usaremos--}}

<script src="/packages/magnific-popup/0.9.9/js/jquery.magnific-popup.min.js"></script>

<script src="/js/anchor.js" async></script>

<script>
    $('[data-loading-text]').on('click', function () {
        $(this).button('loading')
    });
</script> {{-- isto faz o efeito de "carregando..." em um botão depois que ele é clicado --}}

@yield('script')

</html>