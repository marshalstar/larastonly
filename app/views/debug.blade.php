<html>
<head>
  <script type="text/javascript">

  	function nulo(){};

  	function Titulo()
  	{
  		return {
  			nome : "",
  			titulo : nulo
  		};
  	};

	var campos = 1;

	var checklist = {
		nome : "CheckList do Futuro",
		titulo : Titulo()
	};


	function agregarCampo(){
		campos = campos + 1;
		var NvoCampo= document.createElement("div");
		NvoCampo.id= "divcampo_"+(campos);
		NvoCampo.innerHTML= 
			"<h3>BLA</h3>"
			;
		var contenedor= document.getElementById("contenedorcampos");
	    contenedor.appendChild(NvoCampo);

	    NvoCampo.innerHTML= 
			"<h3>BLA</h3>"
			;

		contenedor.
	  }


	function quitarCampo(iddiv){
	  var eliminar = document.getElementById("divcampo_" + iddiv);
	  var contenedor= document.getElementById("contenedorcampos");
	  contenedor.removeChild(eliminar);

	}
	</script>

</head>
<body>


  <h3>Muestra de campos dinámicos</h3>
  
  <form id="formdinamico" name="formdinamico" action="prueba.php">
  
   <table border="0" width="100%">   
      <tr>
        <td></td>
        <a href='JavaScript:agregarCampo();'> Agregar campo de captura </a>
      </tr>
   </table> 
   
   <div id="contenedorcampos">
   
   </div>
  
   <input type="submit" value="Guardar" name="Guardar"> 
  
  </form>
  

</body>
</html>

<?php /*<head>
	<title>TTTTTTTTT</title>
</head>

{{ Form::open(['url' => 'http://localhost:8000/debug']) }}
 
  <table border="0" width="100%">  
      <tr>
        <td></td>
        <a href='JavaScript:agregarCampo();'> Agregar campo de captura </a>
      </tr>
   </table>
 
   <div id="contenedorcampos">
 
   </div>
 
{{ Form::close() }} 

<! - - <html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Prueba</title>
<SCRIPT src="addcampo.js"></SCRIPT>
  
</head>
<body>


  <h3>Muestra de campos dinámicos</h3>
  
  <form id="formdinamico" name="formdinamico" action="prueba.php">
  
   <table border="0" width="100%">   
      <tr>
        <td></td>
        <a href='JavaScript:agregarCampo();'> Agregar campo de captura </a>
      </tr>
   </table> 
   
   <div id="contenedorcampos">
   
   </div>
  
   <input type="submit" value="Guardar" name="Guardar"> 
  
  </form>
  

</body>
</html>
*/ ?>