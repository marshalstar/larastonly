function mudarTexto(id)
{
	var i = document.getElementById("input_" + id);
	if(i != null){

		var p = document.getElementById(id);
		var textoOld = p.innerHTML;

		p.innerHTML = "<input id = 'input_"+id+"' value = '"+textoOld+"' type = 'text' onchange = 'mudou(\""+id+"\")'> </input>";
	}
}

function mudou(id)
{	
	document.getElementById(id).innerHTML = document.getElementById("input_" + id).value;
}


var titulos = 1;
function novoTitulo(id)
{
	titulos = titulos + 1;

	var div = document.getElementById("sub_div_" + id);
	
	div.innerHTML = div.innerHTML +
		/*"<div id = 'div_titulo_"+titulos+"' style='margin: 0px 0px 0px 15px;'>"+
		""+
		"<table border='0'> "+
		"<tr>"+
		"<td id = 'titulo_"+titulos+"'>Teste</td><td></td>         "+
		"<td><button onclick= 'JavaScript:mudarTexto(\"titulo_"+titulos+"\");'>Mudar texto</button></td>"+
		"<td><button onclick= 'JavaScript:removerTitulo(\"div_titulo_"+titulos+"\");'>Remover titulo</button></td>"+
		"</tr> "+
		"</table> "+
		"<button onclick= 'JavaScript:novoTitulo(\"titulo_"+titulos+"\");'>Novo titulo</button>"+
		
		"<button onclick= 'JavaScript:novaQuestao(\"titulo_"+titulos+"\");'>Nova questao</button>"+
		
		"<div id = 'questoes_titulo_"+titulos+"' style='margin: 0px 0px 0px 15px;'>"+
		"</div>"+

		"<div id = 'sub_div_titulo_"+titulos+"'  style='margin: 0px 0px 0px 15px;'>"+
		"</div>"+
		""+
		"</div>";*/

'<div id = "div_titulo_'+titulos+'" style="margin: 0px 0px 0px 15px;">'+
''+
'	<table border="0"> '+
'	  <tr>'+
'	    <td>'+
'	    <h3 id = "titulo_'+titulos+'" >NovoTitulo</h3>'+
'	    </td>'+
'	    <td>'+
'	      <div class="btn-group">'+
'	        <button onclick= "JavaScript:mudarTexto(\'titulo_'+titulos+'\');" class="btn btn-xs btn-warning">'+
'	          Mudar texto'+
'	        </button>'+
'	        <button onclick= "JavaScript:remover(\'div_titulo_'+titulos+'\');" class="btn btn-xs btn-danger">'+
'	          Remover titulo'+
'	        </button>'+
'	      </div>'+
'	    </td>'+
'	  </tr> '+
'	</table> '+
'	  <div class="btn-group">'+
'	    <button onclick= "JavaScript:novoTitulo(\'titulo_'+titulos+'\'); " class="btn btn-sm btn-primary">'+
'	      Novo titulo'+
'	    </button>'+
'	    <button onclick= "JavaScript:novaQuestao(\'titulo_'+titulos+'\');" class="btn btn-sm btn-info">'+
'	      Nova questao'+
'	    </button>'+
'	  </div>'+
''+
'	<div id = "questoes_titulo_'+titulos+'" style="margin: 0px 0px 0px 15px;">'+
''+
''+
'	</div>'+
'	<div id = "sub_div_titulo_'+titulos+'" style="margin: 0px 0px 0px 15px;">'+
'	</div>'+
'</div>';


mudarTexto('titulo_'+titulos);
}

function remover(id)
{
	var element = document.getElementById(id);
	element.parentNode.removeChild(element);
}

var questoes = 0;
function novaQuestao(id)
{
	questoes = questoes + 1;
	var div = document.getElementById("questoes_" + id);

	div.innerHTML = div.innerHTML + 
		/*"<div id = 'div_questao_"+questoes+"'>"+
		"	<table border='0'> "+
		"		<tr>"+
		"			<td id = 'questao_"+questoes+"'>TesteQ</td><td></td>         "+
		"			<td><button onclick= 'JavaScript:mudarTexto(\"questao_"+questoes+"\");'>Mudar texto</button></td>"+
		"		</tr> "+
		"	</table> "+
		"	<div id = 'alternativas_questao_"+questoes+"'>"+
		""+
		"	</div>"+
		"	<button onclick= 'JavaScript:novaAlternativa(\"questao_"+questoes+"\");'>Nova alternativa</button>"+
		"</div>"
									;*/


"		<div id = 'div_questao_"+questoes+"'>"+
"        <table border='0'> "+
"          <tr>"+
"            <td>"+
"              <h4 id = 'questao_"+questoes+"' >NovaQuestao</h3>"+
"            </td>      "+
"            <td>"+
"              <div class='btn-group'>"+
"             <button onclick= 'JavaScript:mudarTexto(\"questao_"+questoes+"\");' class='btn btn-xs btn-warning'>"+
"               Mudar enunciado"+
"                </button>"+
"                <button onclick= 'JavaScript:remover(\"div_questao_"+questoes+"\");' class='btn btn-xs btn-danger'>"+
"                  Remover questao"+
"                </button>"+
"              </div>"+
"            </td>"+
"          </tr> "+
"        </table> "+
""+
"        <lu id = 'alternativas_questao_"+questoes+"' class='list-unstyled'>"+
""+
"        </lu>"+
"        <button onclick= 'JavaScript:novaAlternativa(\"questao_"+questoes+"\"); ' class='btn btn-sm btn-primary'>"+
"          Nova alternativa"+
"        </button>"+
"      </div>";

mudarTexto("questao_"+questoes);
//class="col-sm-2 control-label"
}

function novaAlternativa(id)
{

	var lu = document.getElementById("alternativas_" + id);

	lu.innerHTML = lu.innerHTML	+
	"<li>"+
	"	<select>"+
	"		<option>CheckBox</option>"+
	"		<option>RadionButton</option>"+
	"		<option>Text</option>"+
	"		<option>Numero</option>"+
	"	</select>"+
	"	<label for=''><input type='text'></input></label>"+
	"	"+
	"	<button class='btn btn-xs btn-danger'>"+
	"		Remover"+
	"	</button>"+
	"</li>";

}