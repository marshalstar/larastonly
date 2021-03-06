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

    <link rel="stylesheet" href="/packages/magnific-popup/0.9.9/css/all.min.css"/>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/packages/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="/packages/bootstrap/3.2.0/css/docs.min.css" rel="stylesheet">
    <style src="/packages/bootstrap/3.2.0/css/bootstrap-theme.min.css"></style>
    <link href="/packages/bootgrid/1.1.1/css/jquery.bootgrid.css" rel="stylesheet"/>
    <style src="/packages/bootstrap-accessibility/3/css/bootstrap-accessibility.css"></style>
    <script href="/packages/bootstrap-accessibility/3/js/bootstrap-accessibility.min.js" rel="stylesheet"></script>

    <link rel="shortcut icon" href="/img/checked_checkbox.png" />

    <style>
        @-webkit-viewport { width: device-width; }
        @-moz-viewport { width: device-width; }
        @-ms-viewport { width: device-width; }
        @-o-viewport { width: device-width; }
        @viewport { width: device-width; }
        {{-- serve para fazer a tela funcionar com a imagem de fundo --}}

        table.table td a { display:block; }
        {{-- serve para fazer os links numa tabela funcionarem na linha inteira--}}
    </style>

    <link href="/css/main.css" rel="stylesheet"/>

    <script src="/packages/jquery/2.1.1/js/jquery.min.js"></script>

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

    <script src="/packages/jquery/2.1.1/js/jquery.min.js"></script>

    <script src="/packages/bootgrid/1.1.1/js/jquery.bootgrid.min.js"></script>

    <script src="/packages/bootstrap/3.2.0/js/ie10-viewport-bug-workaround.js"></script>
    <script src="/packages/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="/packages/bootstrap/3.2.0/js/docs.min.js"></script> {{-- provavelmente não usaremos--}}

    <script src="/packages/magnific-popup/0.9.9/js/jquery.magnific-popup.min.js"></script>

    <script src="/js/anchor.js" async></script>

    <script>
        $('[data-loading-text]').on('click', function () {
            $(this).button('loading')
        });
    </script> {{-- isto faz o efeito de "carregando..." em um botão depois que ele é clicado --}}

    <style>
        * {
            font-size: 102%;
        }
        #breadCrumb {
            font-size: 102%;
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

<script type="text/javascript">
    console.error('\n\n\n\
                                            \n\
 .d8888b.  888                       888    \n\
d88P  Y88b 888                       888    Esta é uma funcionalidade do navegador \n\
Y88b.      888                       888    destinada aos programadores. Se alguém \n\
 "Y888b.   888888  .d88b.  88888b.   888    te disse para copiar e colar algo aqui \n\
    "Y88b. 888    d88""88b 888 "88b  888    para ativar uma funcionalidade ou para \n\
      "888 888    888  888 888  888  Y8P    "piratear" a conta de alguém, isto trata-se \n\
Y88b  d88P Y88b.  Y88..88P 888 d88P         de uma fraude que lhe irá dar acesso \n\
 "Y8888P"   "Y888  "Y88P"  88888P"   888    à tua conta do Facebook.\n\
                           888              \n\
                           888              \n\
                           888              \n\n\
Para obteres mais informações consulta a página https://www.facebook.com/selfxss.');


    {{-- controle de tamanho de fonte --}}

    function setZoom(z) {
        localStorage.setItem('listonly-zoom', z);
    }

    function getZoom() {
        return parseFloat(localStorage.getItem('listonly-zoom'));
    }

    if (!getZoom()) {
        setZoom(1);
    }

    $("body").css("zoom", getZoom());

    $(document).on('click', '#font-up', function () {
        setZoom(getZoom() + 0.1);
        $("body").css("zoom", getZoom());
        //console.info("zoom:" + getZoom());
    });

    $(document).on('click', '#font-down', function () {
        setZoom(getZoom() - 0.1);
        $("body").css("zoom", getZoom());
        //console.info("zoom:" + getZoom());
    });

    $(document).on('click', '#font', function () {
        setZoom(1);
        $("body").css("zoom", getZoom());
        //console.info("zoom:" + getZoom());
    });


    {{-- controle de alto contraste --}}

    function setContrast(c) {
        localStorage.setItem('listonly-constrast', c);
    }

    function getContrast() {
        return localStorage.getItem('listonly-constrast') == "true";
    }

    if (getContrast() == undefined) {
        setContrast(false);
    }

    renderContrast(getContrast());
    $(document).on('click', '#high-contrast', function () {
        renderContrast(!getContrast());
        setContrast(!getContrast());
    });

    var all = $("*").each(function() {
        var rgba = $(this).css("background-color");
        $(this).attr("data-original-color", rgba);
    });

    function renderContrast(c) {

        if (!c) {
            $("html").css("-webkit-filter", "invert(0%)");
            $("html").css("-moz-filter", "invert(0%)");
            $("html").css("-o-filter", "invert(0%)");
            $("html").css("-ms-filter", "invert(0%)");
            //console.info("contrast (p):" + getContrast());
        } else {
            $("html").css("-webkit-filter", "invert(100%)");
            $("html").css("-moz-filter", "invert(100%)");
            $("html").css("-o-filter", "invert(100%)");
            $("html").css("-ms-filter", "invert(100%)");
            //console.info("contrast (n):" + getContrast());
        }/**/

        /*function red(rgba) {
            var r = rgba.replace(/\D*(\d+)\D+(\d+)\D+(\d+)\D+(\d+)?\D*.*.?/, "$1");
            return parseInt(r);
        }

        function green(rgba) {
            var g = rgba.replace(/\D*(\d+)\D+(\d+)\D+(\d+)\D+(\d+)?\D*.*.?/, "$2");
            return parseInt(g);
        }

        function blue(rgba) {
            var b = rgba.replace(/\D*(\d+)\D+(\d+)\D+(\d+)\D+(\d+)?\D*.*.?/, "$3");
            return parseInt(b);
        }

        function alpha(rgba) {
            var a = rgba.replace(/\D*(\d+)\D+(\d+)\D+(\d+)\D+(\d+)?\D*.*.?/, "$4");
            if(a === "") {
                return 255;
            }
            return parseInt(a);
        }

        function negative(n) {
            return 255 -n;
        }

        function contrast(c) {
            if (c >= 127) {
                c = c +(255 -c) * 0.6;
                c = parseInt(c);
                return c;

            } else {
                c = c -(255 -c) * 0.6;
                c = parseInt(c);
                return c;
            }
        }

        var all = $("*");
        //all.each(function() {
        //    var rgba = $(this).css("background-color");
        //    var nrgb = "rgba(" + negative(red(rgba)) + "," + negative(green(rgba)) + "," + negative(blue(rgba)) + "," + alpha(rgba) + ")";
        //    $(this).css("background-color", nrgb);
        //});

        all.each(function() {
            var rgba = $(this).css("color");
            var nrgb = "rgba(" + negative(contrast(red(rgba))) + "," + negative(contrast(green(rgba))) + "," + negative(contrast(blue(rgba))) + "," + alpha(rgba) + ")";
            console.log(rgba + " --> " + nrgb);
            $(this).css("color", nrgb);
        });/**/
    }

</script>

@yield('script')

</html>