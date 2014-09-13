<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--    <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
        <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">-->

    <title>@yield('title')| Listonly</title>

    <link rel="stylesheet" href="http://dimsemenov.com/plugins/magnific-popup/site-assets/all.min.css?v=0.9.9"/>
    <!--    MAGNIFIC MODAL, está aqui em cima porque é bobão e pode sobreescrever os estilos do bootstrap-->

    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://getbootstrap.com/assets/css/docs.min.css" rel="stylesheet">
    <!--[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="http://getbootstrap.com/assets/js/ie-emulation-modes-warning.js"></script>
    <!--    BOOTSTRAP-->

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script>
    <script src="https://code.angularjs.org/1.2.8/angular-route.js"></script>
    <!--    ANGULAR-->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!--    JQUERY-->

    <script src="/javascript/rails.js"></script>
    <!--    JS RAILS, depreciado-->

    <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <script src="http://getbootstrap.com/assets/js/docs.min.js"></script>
    <!--    JS BOOTSTRAP-->

    <script src="http://dimsemenov.com/plugins/magnific-popup/dist/jquery.magnific-popup.min.js?v=0.9.9"></script>
    <!--    MAGNIFIC MODAL-->

</head>
<body>

    @include('templates.partials.header')
        @yield('content')
    @include('templates.partials.footer')

    <p> <!-- Não use <div> dentro de <p>! Eu peguei lá do código fonte do bootstrap. Por favor, ache uma alternativa -->
    <div class="well well-sm">
        <a href="http://getbootstrap.com/css/#forms">ver Formulários do bootstrap</a>
    </div>
    </p>

</body>
</html>