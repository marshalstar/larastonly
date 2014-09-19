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

    <link rel="stylesheet" href="http://dimsemenov.com/plugins/magnific-popup/site-assets/all.min.css?v=0.9.9"/>
    {{--    MAGNIFIC MODAL --}}

    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://getbootstrap.com/assets/css/docs.min.css" rel="stylesheet">
    {{-- BOOTSTRAP --}}

    <div id="bg">
        <img src="http://upload.wikimedia.org/wikipedia/commons/0/0d/Amanecer_en_la_Torre_Eiffel_(8163660325).jpg" alt="">
    </div>

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

<!--[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="http://getbootstrap.com/assets/js/ie-emulation-modes-warning.js"></script>
{{-- BOOTSTRAP--}}

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
{{-- FAZ O SITE FUNCIONAR DIREITO NO INTERNET EXPLORER--}}

<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script>
<script src="https://code.angularjs.org/1.2.8/angular-route.js"></script>
{{-- ANGULAR--}}

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
{{-- JQUERY--}}

<script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
<script src="http://getbootstrap.com/assets/js/docs.min.js"></script>
{{-- JS BOOTSTRAP--}}

<script src="http://dimsemenov.com/plugins/magnific-popup/dist/jquery.magnific-popup.min.js?v=0.9.9"></script>
{{-- MAGNIFIC MODAL--}}

<script src="/js/anchor.js" async></script>

{{-- nosso--}}

<script>
    $('[data-loading-text]').on('click', function () {
        $(this).button('loading')
    });
</script>
{{-- isto faz o efeito de "carregando..." em um botão depois que ele é clicado --}}


@yield('script')

</html>