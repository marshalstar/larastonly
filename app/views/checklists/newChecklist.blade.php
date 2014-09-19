@extends('templates.default')

@section('title'){{ Str::title(Lang::get('Novo Checklist')) }} @stop



<!--DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Prueba</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<SCRIPT src="js/newChecklist.js"></SCRIPT>
  
    <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <script src="http://getbootstrap.com/assets/js/docs.min.js"></script>
    <!--    JS BOOTSTRAP- ->
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://getbootstrap.com/assets/css/docs.min.css" rel="stylesheet">
    <!--[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]- ->
    <script src="http://getbootstrap.com/assets/js/ie-emulation-modes-warning.js"></script>
    <!--    BOOTSTRAP- ->

</head>
<body> -->
@section('content')

<div class="container" style="display: block; background-color: white; padding: 10px;">
  <div id = "div_titulo_1" style="margin: 0px 0px 0px 15px;">
      
    <table border="0"> 
      <tr>
        <td>
        <h3 onclick= "JavaScript:mudarTexto('titulo_1');" id="titulo_1" onBlur="alert('oi')" >Teste</h3>
        </td>
        <td>
          <div class="btn-group">
            <button onclick= 'JavaScript:remover("div_titulo_1");'  class="btn btn-xs btn-danger">
              Remover titulo
            </button>
          </div>
        </td>
      </tr> 
    </table> 
      <div class="btn-group">
        <button onclick= "JavaScript:novoTitulo('titulo_1'); " class="btn btn-sm btn-primary">
          Novo titulo
        </button>
        <button onclick= "JavaScript:novaQuestao('titulo_1');" class="btn btn-sm btn-info">
          Nova questao
        </button>
      </div>

    <div id = "questoes_titulo_1" style="margin: 0px 0px 0px 15px;">

    
    <!--<lu class="list-unstyled">
      <li>
        <select >
          <option>CheckBox</option>
          <option>RadionButton</option>
          <option>Text</option>
          <option>Numero</option>
        </select>
        <label for=""><input type="text"></input></label>
        <div class="btn-group">
          <button class="btn btn-xs btn-danger">
            Remover
          </button>
        </div>
      </li>
      <li>
        <select >
          <option>CheckBox</option>
          <option>RadionButton</option>
          <option>Text</option>
          <option>Numero</option>
        </select>
        <label for=""><input type="text"></input></label>
        <button class="btn btn-xs btn-danger">
          Remover
        </button>
      </li>
      <li>
        <select >
          <option>CheckBox</option>
          <option>RadionButton</option>
          <option>Text</option>
          <option>Numero</option>
        </select>
        <label for=""><input type="text"></input></label>
        <div class="btn-group">
          <button class="btn btn-xs btn-danger">
            Remover
          </button>
        </div>
      </li>
      <li>
        <button class="btn btn-sm btn-primary">Nova alternativa</button>
      </li>
    </lu>



    <lu>
      <li><label for=""><input type="checkbox">Sim</input>   </label></li>
      <li><label for=""><input type="checkbox">Nao</input>   </label></li>
      <li><label for=""><input type="checkbox">Talvez</input></label></li>
    </lu>

    <table>
      <div>
        <label>
          <input type="checkbox"> Sim </input>
        </label>
      </div>

      <div>
        <label>
          <input type="checkbox"> Nao </input>
        </label>
      </div>

      <div>
        <label>
          <input type="checkbox"> Talvez </input>
        </label>
      </div>

      </div> 
    </table> -->
  </div>
    <div id = "sub_div_titulo_1" style="margin: 0px 0px 0px 15px;">
    </div>

    </div>
@stop
<!--</body>
</html> -->