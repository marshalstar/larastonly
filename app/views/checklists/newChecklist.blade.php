@extends('templates.default')

@section('title'){{ Str::title(Lang::get('Novo Checklist')) }} @stop
<script src="/js/newChecklist.js" async></script>
@section('content')

<!-- <div style='padding:30px;width:200px;background:red'>
  <form action='' method='post' style='width:200px;background:blue;padding:3px'>
    <input size='' style='width:100%;margin:-3px;border:2px inset #eee' />
    <br /><br />
    <input size='' style='width:100%' />
  </form>
</div> -->


<div id = "div_titulo_1" class="container" style="display: block; background-color: white; padding: 10px;">
<div class = "btn-group">
  <button id = "controlZ" onclick = "JavaScript:controlZ();" class="btn btn-sm btn-warning">Control Z</button>
  <button id = "controlY" onclick = "JavaScript:controlZ();" class="btn btn-sm btn-danger">Control Y</button>
</div>

  <table class="table table-bordered"> 
    <tr> 
      <td>
        <table>
          <tr>
            <td>
              <h3><input id = 'titulo_1' value = 'Teste' type = 'text' style='width:700' onChange = "JavaScript:mudou('titulo_1')" /></h3>
            </td>
            <td>
              <div class="btn-group">
                <button onclick= 'JavaScript:remover("div_titulo_1");'  class="btn btn-xs btn-danger">
                  Remover titulo
                </button>
              </div>
            </td>
          </tr> 
          <tr>
            <td>
              <div class="btn-group">
                <button onclick= "JavaScript:novoTitulo('titulo_1'); " class="btn btn-sm btn-primary">
                  Novo titulo
                </button>
                <button onclick= "JavaScript:novaQuestao('titulo_1');" class="btn btn-sm btn-info">
                  Nova questao
                </button>
              </div>
            </td>
          </tr>
        </table>

        <div id = "questoes_titulo_1" style="margin: 0px 0px 0px 15px;">
        </div>

        <div id = "sub_div_titulo_1" style="margin: 0px 0px 0px 15px;">
        </div>

      </td>
    </tr>
  </table>

  <button id = "salvarbt" onclick = "JavaScript:salvar();" class="btn btn-sm btn-primary">Salvar</button>

</div>
@stop

    
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
 
<!--</body>
</html> -->