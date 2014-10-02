var memoZ = [];
var memoY = [];
var moves = -1;

var teste = [{}];

var arrayTotal = [{}];

var titulos = 1;

function mudou(id) {	
	memoZ[++moves] = {idobjeto : id, valor : arrayTotal[id].valor, acao: "editar"};
	arrayTotal[(id)].valor = document.getElementById(id).value;
}


function novoTitulo(id)
{
	titulos = titulos + 1;

	arrayTotal[("titulo_"+titulos)] = {tipo : "titulo", id : ("titulo_"+titulos), pai : id, valor : ""};

	var div = document.getElementById("sub_div_" + id);
	var divNova = document.createElement("div");
	divNova.id = "div_titulo_"+titulos;
	divNova.class = "container"
	divNova.style = "display: block; background-color: white; padding: 10px;";

	divNova.innerHTML = //div.innerHTML +


	//'<div id = "div_titulo_'+titulos+'" class="container" style="display: block; background-color: white; padding: 10px;">'+
	'  <table class="table table-bordered"> '+
	'    <tr> '+
	'      <td>'+
	'        <table>'+
	'          <tr>'+
	'            <td>'+
	'              <h3><input id = "titulo_'+titulos+'" type = "text" style="width:" onchange = "JavaScript:mudou(\'titulo_'+titulos+'\')"/></h3>'+
	'            </td>'+
	'            <td>'+
	'              <div class="btn-group">'+
	'                <button onClick= "JavaScript:remover(\'titulo_'+titulos+'\');"  class="btn btn-xs btn-danger">'+
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
	'  </table>';//+
	//' </div>';

	div.appendChild(divNova);

	memoZ[++moves] = {idobjeto : ("titulo_"+titulos), acao: "add"};

}

function remover(id)
{
	var element = document.getElementById("div_"+id);
	element.parentNode.removeChild(element);

	memoZ[++moves] = {idobjeto : id, old : arrayTotal[id], acao : "remover"};

	arrayTotal[id] = null;
}

var questoes = 0;
function novaQuestao(id)
{
	questoes = questoes + 1;
	
	arrayTotal[("questao_"+questoes)] = {tipo : "questao", id : ("questao_"+questoes), pai : id, valor : ""};

	var div = document.getElementById("questoes_" + id);

	var divNova = document.createElement("div");
	divNova.id = 'div_questao_'+questoes;
	divNova.innerHTML = 

	//div.innerHTML = div.innerHTML + 
	
	//"		<div id = 'div_questao_"+questoes+"'>"+
	"        <table border='0'> "+
	"          <tr>"+
	"            <td>"+
	"              <h4> <input id = 'questao_"+questoes+"' value = '' onChange = 'JavaScript:mudou(\"questao_"+questoes+"\")' /></h4>"+
	"            </td>      "+
	"            <td>"+
	"              <button onclick= 'JavaScript:remover(\"questao_"+questoes+"\");' class='btn btn-xs btn-danger'>"+
	"              	 Remover questao"+
	"              </button>"+
	"            </td>"+
	"          </tr> "+
	"        </table> "+

	"        <lu id = 'alternativas_questao_"+questoes+"' class='list-unstyled'>"+

	"        </lu>"+
	"        <button onclick= 'JavaScript:novaAlternativa(\"questao_"+questoes+"\"); ' class='btn btn-sm btn-primary'>"+
	"          Nova alternativa"+
	"        </button>";//+
	//"      </div>";

	div.appendChild(divNova);

	//mudou(("questao_"+questoes));

	memoZ[++moves] = {idobjeto : ("questao_"+questoes), acao: "add"};
}

var alternativas = 0;

function novaAlternativa(id)
{
	alternativas = alternativas + 1;

	arrayTotal[("alternativa_"+alternativas)] = {tipo : "alternativa", id : ("alternativa_"+alternativas), pai : id, valor : "", tipo_alternativa : "CheckBox"};

	var lu = document.getElementById("alternativas_" + id);

	var liNova = document.createElement("li");
	liNova.id = 'div_alternativa_'+alternativas;

	liNova.innerHTML = //lu.innerHTML	+
	//"<li id = 'li_alternativa_'"+alternativas+">"+
	"	<select id = 'select_alternativa_"+alternativas+"' onChange = 'JavaScript:mudouTipoAlternativa(\"alternativa_"+alternativas+"\")'>"+
	"		<option>CheckBox</option>"+
	"		<option>RadionButton</option>"+
	"		<option>Text</option>"+
	"		<option>Numero</option>"+
	"	</select>"+
	"	<label for='alternativa_"+alternativas+"'><input id = 'alternativa_"+alternativas+"' type='text' value = '' onChange = 'JavaScript:mudou(\"alternativa_"+alternativas+"\")'></input></label>"+
	"	"+
	"	<button class='btn btn-xs btn-danger' onClick('JavaScript:remover(\"alternativa_"+alternativas+"\");')>"+
	"		Remover"+
	"	</button>";//+
	//"</li>";

	lu.appendChild(liNova);

	memoZ[++moves] = {idobjeto : ("alternativa_"+alternativas), acao: "add"};
}

function mudouTipoAlternativa(id)
{

	arrayTotal[id].tipo_alternativa = document.getElementById("select_"+id).value;


}


function controlZ()
{
	if(memoZ[moves].acao == "add")
	{
		var element = document.getElementById("div_"+memoZ[moves].idobjeto);
		element.parentNode.removeChild(element);
		arrayTotal[memoZ[moves].idobjeto] = {};
	}
	else if(memoZ[moves].acao == "remover")
	{
		if(memoZ[moves].old.tipo == "titulo"){
			arrayTotal[memoZ[moves].idobjeto] = memoZ[moves].old;

			var div = document.getElementById("sub_div_" + memoZ[moves].old.pai);
			var divNova = document.createElement("div");
			divNova.id = "div_"+memoZ[moves].idobjeto;
			divNova.class = "container"
			divNova.style = "display: block; background-color: white; padding: 10px;";

			divNova.innerHTML = 
			'  <table class="table table-bordered"> '+
			'    <tr> '+
			'      <td>'+
			'        <table>'+
			'          <tr>'+
			'            <td>'+
			'              <h3><input id = "'+memoZ[moves].idobjeto+'" value = "'+memoZ[moves].old.valor+'" type = "text" style="width:" onchange = "JavaScript:mudou(\'titulo_'+titulos+'\')"/></h3>'+
			'            </td>'+
			'            <td>'+
			'              <div class="btn-group">'+
			'                <button onClick= "JavaScript:remover(\''+memoZ[moves].idobjeto+'\');"  class="btn btn-xs btn-danger">'+
			'                  Remover titulo'+
			'                </button>'+
			'              </div>'+
			'            </td>'+
			'          </tr> '+
			'          <tr>'+
			'            <td>'+
			'              <div class="btn-group">'+
			'                <button onclick= "JavaScript:novoTitulo(\''+memoZ[moves].idobjeto+'\'); " class="btn btn-sm btn-primary">'+
			'                  Novo titulo'+
			'                </button>'+
			'                <button onclick= "JavaScript:novaQuestao(\''+memoZ[moves].idobjeto+'\');" class="btn btn-sm btn-info">'+
			'                  Nova questao'+
			'                </button>'+
			'              </div>'+
			'            </td>'+
			'          </tr>'+
			'        </table>'+
			'        <div id = "questoes_'+memoZ[moves].idobjeto+'" style="margin: 0px 0px 0px 15px;">'+
			'        </div>'+
			'        <div id = "sub_div_'+memoZ[moves].idobjeto+'" style="margin: 0px 0px 0px 15px;">'+
			'        </div>'+
			'      </td>'+
			'    </tr>'+
			'  </table>';

			div.appendChild(divNova);
		}
		else if (memoZ[moves].old.tipo == "questao")
		{
			arrayTotal[memoZ[moves].idobjeto] = memoZ[moves].old;

			var div = document.getElementById("questoes_" + memoZ[moves].old.pai);

			var divNova = document.createElement("div");
			divNova.id = 'div_'+memoZ[moves].idobjeto;
			divNova.innerHTML = 
			"        <table border='0'> "+
			"          <tr>"+
			"            <td>"+
			"              <h4> <input id = '"+memoZ[moves].idobjeto+"' value = '"+memoZ[moves].old.valor+"' onChange = 'JavaScript:mudou(\""+memoZ[moves].idobjeto+"\")' /></h4>"+
			"            </td>      "+
			"            <td>"+
			"              <button onclick= 'JavaScript:remover(\""+memoZ[moves].idobjeto+"\");' class='btn btn-xs btn-danger'>"+
			"              	 Remover questao"+
			"              </button>"+
			"            </td>"+
			"          </tr> "+
			"        </table> "+

			"        <lu id = 'alternativas_"+memoZ[moves].idobjeto+"' class='list-unstyled'>"+

			"        </lu>"+
			"        <button onclick= 'JavaScript:novaAlternativa(\""+memoZ[moves].idobjeto+"\"); ' class='btn btn-sm btn-primary'>"+
			"          Nova alternativa"+
			"        </button>";

			div.appendChild(divNova);
		}
		else if (memoZ[moves].old.tipo == "alternativa")
		{
			arrayTotal[memoZ[moves].idobjeto] = memoZ[moves].old;

			var lu = document.getElementById("alternativas_" + memoZ[moves].old.pai);

			var liNova = document.createElement("li");
			liNova.id = 'div_'+memoZ[moves].idobjeto;

			liNova.innerHTML =
			"	<select id = 'select_"+memoZ[moves].idobjeto+"' onChange = 'JavaScript:mudouTipoAlternativa(\""+memoZ[moves].idobjeto+"\")'>"+
			"		<option>CheckBox</option>"+
			"		<option>RadionButton</option>"+
			"		<option>Text</option>"+
			"		<option>Numero</option>"+
			"	</select>"+
			"	<label for=''><input id = '"+memoZ[moves].idobjeto+"' type='text' value = '"+memoZ[moves].old.valor+"' onChange = 'JavaScript:mudou(\""+memoZ[moves].idobjeto+"\")'></input></label>"+
			"	"+
			"	<button class='btn btn-xs btn-danger' onClick('JavaScript:remover(\""+memoZ[moves].idobjeto+"\");')>"+
			"		Remover"+
			"	</button>";

			lu.appendChild(liNova);
		}	
	}
	else if(memoZ[moves].acao == "editar")
	{
		document.getElementById(memoZ[moves].idobjeto).value = memoZ[moves].valor;
		arrayTotal[memoZ[moves].idobjeto].valor = document.getElementById(memoZ[moves].idobjeto).value;
	}
	moves--;
}