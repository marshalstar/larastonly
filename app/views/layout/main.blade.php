<!DOCTYPE html>
<html>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script>
    <script src="https://code.angularjs.org/1.2.8/angular-route.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="/javascript/rails.js"></script>
<head>
	<title>Página de Login e Autenticação</title>

	{{HTML::style('/css/bootstrap.css')}}
	{{HTML::style('/css/bootstrap-theme.css')}}
	{{HTML::style('/fonts/glyphicons-halflings-regular.ttf')}}

</head>
<body>
	<div id="nav">
		<div class="navbar navbar-default">
			<a class="navbar-brand">Listonly - Checklists de acessibilidade</a>
	</div>
</div>


	<h2 style="text-align:center"></h2>
	<br><br>
	<center>
	@yield('conteudo')

	<script src="/js/bootstrap.js"></script>
</center>
</body>
</html> 