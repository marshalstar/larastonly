@extends('templates.default')

@section('title'){{ Str::title(Lang::get('alternativas')) }} @stop

@section('content')

<!--http://upload.wikimedia.org/wikipedia/commons/6/60/Green_Park,_London_-_April_2007.jpg-->

<style type="text/css">
    body {
        margin: 0;
    }
    #layer1 {
        position: fixed;
        /*background: url("http://upload.wikimedia.org/wikipedia/commons/6/60/Green_Park,_London_-_April_2007.jpg") no-repeat;*/
        background: url("http://upload.wikimedia.org/wikipedia/commons/6/60/Green_Park,_London_-_April_2007.jpg") no-repeat;
        width: 100%;
        height: 2000px;
        top: 0;
        z-index: -999999;
    }
    #main {
        margin: 0 auto;
        max-width: 1920px;
        position: relative;
        top: -111px;
        width: 100%;
    }
</style>

<div id="layer1"></div>
<div id="main" class="container theme-showcase">

    <lu>
        <li>A</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
    </lu>
    
<!--    <div id="preload">-->
<!--        <img src="http://upload.wikimedia.org/wikipedia/commons/6/60/Green_Park,_London_-_April_2007.jpg">-->
<!--    </div>-->

<!--    <section id="slide-1" class="homeSlide">-->
<!--        <div class="bcg"-->
<!--             data-center="background-position: 50% 0px;"-->
<!--             data-top-bottom="background-position: 50% -100px;"-->
<!--             data-anchor-target="#slide-1"-->
<!--            >-->
<!--            <div class="hsContainer">-->
<!--                <div class="hsContent"-->
<!--                     data-center="bottom: 200px; opacity: 1"-->
<!--                     data-top="bottom: 1200px; opacity: 0"-->
<!--                     data-anchor-target="#slide-1 h2"-->
<!--                    >-->
<!---->
<!--                    <a href="{{ URL::route('alternatives.index') }}">{{ Str::title(Lang::get('alternativas')) }}</a>-->
<!--                    <a href="{{ URL::route('checklists.index') }}">{{ Str::title(Lang::get('checklists')) }}</a>-->
<!--                    <a href="{{ URL::route('evaluations.index') }}">{{ Str::title(Lang::get('avaliações')) }}</a>-->
<!--                    <a href="{{ URL::route('questions.index') }}">{{ Str::title(Lang::get('questões')) }}</a>-->
<!--                    <a href="{{ URL::route('tags.index') }}">{{ Str::title(Lang::get('tags')) }}</a>-->
<!--                    <a href="{{ URL::route('titles.index') }}">{{ Str::title(Lang::get('títulos')) }}</a>-->
<!--                    <a href="{{ URL::route('types.index') }}">{{ Str::title(Lang::get('tipos')) }}</a>-->
<!--                    <a href="{{ URL::route('users.index') }}">{{ Str::title(Lang::get('usuários')) }}</a>-->
<!---->
<!--                    <p>larastonly1</p>-->
<!--                    <p>larastonly2</p>-->
<!--                    <p>larastonly3</p>-->
<!--                    <p>larastonly4</p>-->
<!--                    <p>larastonly5</p>-->
<!--                    <p>larastonly6</p>-->
<!--                    <p>larastonly7</p>-->
<!--                    <p>larastonly8</p>-->
<!--                    <p>larastonly9</p>-->
<!---->
<!--                    <p>http://getbootstrap.com/javascript/#scrollspy</p>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->
</div>

<script>
    function parallax() {
        var layer1 = document.getElementById("layer1");
        layer1.style.top = -(window.pageYOffset /4)+'px';
    }
    window.addEventListener("scroll", parallax, false);
</script>

@stop