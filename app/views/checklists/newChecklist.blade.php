@extends('templates.default')

@section('title'){{ Str::title(Lang::get('Novo Checklist')) }} @stop
<script src="/js/newChecklist.js" async></script>
@section('content')

<div id = "div_titulo_1" class="container" style="display: block; background-color: white; padding: 10px;">
      
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