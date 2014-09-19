var arrayTotal = [{}];


var titulos = 1;

function mudou(id) {	
	arrayTotal[(id)].valor = document.getElementById(id).value;
}


function novoTitulo(id)
{
	titulos = titulos + 1;

	arrayTotal[("titulo_"+titulos)] = {tipo : "titulo", id : ("titulo_"+titulos), pai : id, valor : ""};

	var div = document.getElementById("sub_div_" + id);
	
	div.innerHTML = div.innerHTML +


	'<div id = "div_titulo_1" class="container" style="display: block; background-color: white; padding: 10px;">'+
	'  <table class="table table-bordered"> '+
	'    <tr> '+
	'      <td>'+
	'        <table>'+
	'          <tr>'+
	'            <td>'+
	'              <h3><input id = "titulo_'+titulos+'" value = "" type = "text" style="width:700" onChange = "JavaScript:mudou(\'titulo_'+titulos+'\')"/></h3>'+
	'            </td>'+
	'            <td>'+
	'              <div class="btn-group">'+
	'                <button onclick= "JavaScript:remover(\'div_titulo_'+titulos+'\');"  class="btn btn-xs btn-danger">'+
	'                  Remover titulo'+
	'                </button>'+
	'              </div>'+
	'            </td>'+
	'          </tr> '+
	'          <tr>'+
	'            <td>'+
	'              <div class="btn-group">'+
	'                <button onclick= "JavaScript:novoTitulo(\'titulo_'+titulos+'\'); " class="btn btn-sm btn-primary">'+
	'                  Novo titulo'+
	'                </button>'+
	'                <button onclick= "JavaScript:novaQuestao(\'titulo_'+titulos+'\');" class="btn btn-sm btn-info">'+
	'                  Nova questao'+
	'                </button>'+
	'              </div>'+
	'            </td>'+
	'          </tr>'+
	'        </table>'+
	'        <div id = "questoes_titulo_'+titulos+'" style="margin: 0px 0px 0px 15px;">'+
	'        </div>'+
	'        <div id = "sub_div_titulo_'+titulos+'" style="margin: 0px 0px 0px 15px;">'+
	'        </div>'+
	'      </td>'+
	'    </tr>'+
	'  </table>'+
	' </div>';

	mudou('titulo_'+titulos);
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
	
	arrayTotal[("questao_"+questoes)] = {tipo : "questao", id : ("questao_"+questoes), pai : id, valor : ""};

	var div = document.getElementById("questoes_" + id);

	div.innerHTML = div.innerHTML + 
	
	"		<div id = 'div_questao_"+questoes+"'>"+
	"        <table border='0'> "+
	"          <tr>"+
	"            <td>"+
	"              <h4> <input id = 'questao_"+questoes+"' value = '' onChange = 'JavaScript:mudou(\"questao_"+questoes+"\")' /></h4>"+
	"            </td>      "+
	"            <td>"+
	"              <button onclick= 'JavaScript:remover(\"div_questao_"+questoes+"\");' class='btn btn-xs btn-danger'>"+
	"              	 Remover questao"+
	"              </button>"+
	"            </td>"+
	"          </tr> "+
	"        </table> "+

	"        <lu id = 'alternativas_questao_"+questoes+"' class='list-unstyled'>"+

	"        </lu>"+
	"        <button onclick= 'JavaScript:novaAlternativa(\"questao_"+questoes+"\"); ' class='btn btn-sm btn-primary'>"+
	"          Nova alternativa"+
	"        </button>"+
	"      </div>";

	mudou(("questao_"+questoes));

}

var alternativas = 0;

function novaAlternativa(id)
{
	alternativas = alternativas + 1;

	arrayTotal[("alternativa_"+alternativas)] = {tipo : "alternativa", id : ("alternativa_"+alternativas), pai : id, valor : "", tipo_alternativa : ""};

	var lu = document.getElementById("alternativas_" + id);

	lu.innerHTML = lu.innerHTML	+
	"<li id = 'li_alternativa_'"+alternativas+">"+
	"	<select id = 'select_alternativa_"+alternativas+"' onChange = 'JavaScript:mudouTipoAlternativa(\""+alternativas+"\")'>"+
	"		<option>CheckBox</option>"+
	"		<option>RadionButton</option>"+
	"		<option>Text</option>"+
	"		<option>Numero</option>"+
	"	</select>"+
	"	<label for=''><input id = 'alternativa_"+alternativas+"' type='text' value = '' onChange = 'JavaScript:mudou(\"alternativa_"+alternativas+"\")'></input></label>"+
	"	"+
	"	<button class='btn btn-xs btn-danger' onClick('JavaScript:remover(\"li_alternativa_"+alternativas+"\");')>"+
	"		Remover"+
	"	</button>"+
	"</li>";

	mudouTipoAlternativa(alternativas);
}

function mudouTipoAlternativa(id)
{

	arrayTotal["alternativa_"+id].tipo_alternativa = document.getElementById("select_alternativa_"+id).value;


}