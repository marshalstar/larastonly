<!DOCTYPE html>
<html>
<head>
	<title>Página de Login e Autenticação</title>

	{{HTML::style('/css/bootstrap.css')}}
	{{HTML::style('/css/bootstrap-theme.css')}}
	

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