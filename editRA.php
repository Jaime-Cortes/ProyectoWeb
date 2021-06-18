<?php
	include("Conexion.php");
	$alumno;

	if(isset($_GET['Admin'])){
		$boleta = $_GET["boleta"];
		$conexion = new Conexion;
		$alumno = $conexion->consultarAlumno($boleta);
	}else{
		session_start();
		$alumno = $_SESSION["alumno"];
	}

echo "
<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>.:Registro de alumnos:.</title>
	<link rel='stylesheet' href='formatocss/estilo.css'>
	<script language='JavaScript'>
function pregunta(){
    if (confirm('¿Estas seguro de enviar este formulario?')){
       document.tuformulario.submit()
    }
}
</script>
	
</head>
	<body>

		
			<img class='icono' src='escom.png' width='10%' height='auto' align='right' />
			<img src='res/ipnTransparent.png'  width='7%' height='auto' align='left'/>
	<h2>REGISTRO DE DATOS GENERALES PARA ALUMNOS DE NUEVO INGRESO (AGOSTO 2021)</h2>
			<p><br/><h4>Bienvenido(a) a la Escuela Superior de Cómputo (<b>ESCOM</b>), a continuación llena el siguiente formulario para asignarte el salón y horario en el que realizarás tu examen y poder formar parte de la <b>ESCOMUNIDAD</b>. </h4></p>

			<form action='editar.php' method='POST' class='formulario' id='formulario'> <!-- Cambiar direccion destino -->
		<div class='form_Identidad'>
			<fieldset>
			<legend><h3>Identidad</h3></legend>
				<div class='form_All' id='form_nombre'>
			<label for='nombre' class='etiqueta'> Nombre(s): </label>
					<div class='form_input_general'>
					<input type='text' name='nombre' id='nombre' class='form_input' maxlength='30' value='$alumno->nombre'>
					<i class='validacion_estado far fa-times-circle'></i>
					</div>
					<p class='form_error'>El nombre no puede contener s&iacute;mbolos o n&uacute;meros </p>
					</div>


			<div class='form_All' id='form_apeP'>
			<label for='apeP' class='etiqueta'> Apellido paterno: </label>
					<div class='form_input_general'>
					<input type='text' name='apeP' id='apeP' class='form_input' maxlength='15'value='$alumno->paterno'>
					<i class='validacion_estado far fa-times-circle'></i>
					</div>
					<p class='form_error'>El apellido no puede contener s&iacute;mbolos o n&uacute;meros </p>
					</div>


			<div class='form_All' id='form_apeM'>
			<label for='apeM' class='etiqueta'> Apellido materno: </label>
					<div class='form_input_general'>
					<input type='text' name='apeM' id='apeM' class='form_input' maxlength='15' value='$alumno->materno'>
					<i class='validacion_estado far fa-times-circle'></i>
					</div>
					<p class='form_error'>El apellido no puede contener s&iacute;mbolos o n&uacute;meros </p>
					</div>


			<div class='form_All' id='form_boleta'>
			<label for='boleta' class='etiqueta'> N&uacute;mero de boleta: </label>
					<div class='form_input_general'>
					<input type='text' name='boleta' id='boleta' class='form_input' maxlength='10' value='$alumno->boleta'>
					<i class='validacion_estado far fa-times-circle'></i>
					</div>
					<p class='form_error'>El n&uacute;mero de boleta debe empezar con PP o PE y debe tener 8 d&iacute;gitos depu&eacute;s</p>
					</div>


			<div class='form_ALL' id='form_fecha'>
			<label for='nacimiento' class='etiqueta'> Fecha de nacimiento:  <br></label>
		  <input type='date' name='fecha' id='fecha'  class='form_fecha' min='1930-12-31' max='2005-12-31' value='$alumno->nacimiento'><br/>
				</div>


			<div class='form_All' id='form_genero'>
			<label for='genero' class='etiqueta'> G&eacute;nero:  <br/></label>
			<input type='radio' class='form_radio' name='genero' id='M'  value='$alumno->genero'>Masculino
			<input type='radio' class='form_radio' name='genero' id='F'  value='$alumno->genero'>Femenino<br/>
			</div>	

			<div class='form_ALL' id='form_curp'>
			<label for='curp' class='etiqueta'> CURP: </label>
					<div class='form_input_general'>
					<input type='text' name='curp' id='curp' class='form_input' maxlength='18' value='$alumno->curp'>
					<i class=' validacion_estado far fa-times-circle'></i>
					</div>
					<p class='form_error'>El CURP debe tener 18 caracteres</p>
					</div>

			</fieldset>
			</div>

			<div class='form_All' id='form_contacto'>
			<fieldset>
			<legend><h3> Contacto </h3></legend>

			<div class='form_All' id='form_calle'>
			<label for='calle' class='etiqueta'> Calle y n&uacute;mero: </label>
					<div class='form_input_general'>
					<input type='text' name='calle' id='calle' class='form_input' maxlength='50' value='$alumno->calle'>
					<i class='validacion_estado far fa-times-circle'></i>
					</div>
					<p class='form_error'>La calle no puede contener s&iacute;mbolos </p>
					</div>


			<div class='form_All' id='form_colonia'>
			<label for='colonia' class='etiqueta'> Colonia: </label>
					<div class='form_input_general'>
					<input type='text' name='colonia' id='colonia' class='form_input' maxlength='70' value='$alumno->colonia'>
					<i class='validacion_estado far fa-times-circle'></i>
					</div>
					<p class='form_error'>La colonia no puede contener s&iacute;mbolos </p>
					</div>


				<div class='form_All' id='form_cp'>
			<label for='cp' class='etiqueta'> C&oacute;digo postal:</label>
					<div class='form_input_general'>
					<input type='text' name='cp' id='cp' class='form_input' maxlength='5' value='$alumno->cp'>
					<i class='validacion_estado far fa-times-circle'></i>
					</div>
					<p class='form_error'>Este campo solo puede tener n&uacute;meros (m&aacute;ximo cinco) </p>
					</div>

			<div class='form_All' id='form_telefono'>
			<label for='telefono' class='etiqueta'> Tel&eacute;fono:</label>
					<div class='form_input_general'>
					<input type='tel' name='telefono' id='telefono' class='form_input' maxlength='10' value='$alumno->tel'>
					<i class='validacion_estado far fa-times-circle'></i>
					</div>
					<p class='form_error'>El tel&eacute;fono debe tener 10 d&iacute;gitos y empezar con 55 </p>
					</div>

			<div class='form_All' id='form_correo'>
			<label for='correo' class='etiqueta'> Correo electr&oacute;nico:</label>
					<div class='form_input_general'>
					<input type='email' name='correo' id='correo' class='form_input' maxlength='30' value='$alumno->email'>
					<i class='validacion_estado far fa-times-circle'></i>
					</div>
					<p class='form_error'>El correo debe tener un dominio </p>
					</div>

			</fieldset>
			</div>


			<div class='form_Procedencia'>
			<fieldset>
			<legend><h3>Procedencia</h3></legend>
			<label for='escuela' class='etiqueta'> Selecciona tu escuela de procedencia</label>
			<select name='escuela' id='escuela' onChange='validarOpc()' value='$alumno->procedencia'>
				<option value='NS' > Selecciona una</option>
				<option value='1'> CECyT 1 &quot;Gonzalo V&aacute;zquez Vela&quot;</option>
				<option value='2'> CECyT 2 &quot;Miguel Bernard Perales&quot;</option>
				<option value='3'> CECyT 3 &quot;Estanislao Ramirez Ru&iacute;z&quot;</option>
				<option value='4'> CECyT 4 &quot;L&aacute;zaro C&aacute;rdenas&quot;</option>
				<option value='5'> CECyT 5 &quot;Benito Ju&aacute;rez Garc&iacute;a&quot;</option>
				<option value='6'> CECyT 6 &quot;Miguel Oth&oacute;n de Mendizabal&quot;</option>
				<option value='7'> CECyT 7 &quot;Cuauht&eacute;moc&quot;</option>
				<option value='8'> CECyT 8 &quot;Narciso Bassols Garc&iacute;a&quot;</option>
				<option value='9'> CECyT 9 &quot;Juan de Dios B&aacute;tiz Paredes&quot;</option>
				<option value='10'> CECyT 10 &quot;Carlos Vallejo M&aacute;rquez&quot;</option>
				<option value='11'> CECyT 11 &quot;Wilfrido Massieu&quot;</option>
				<option value='12'> CECyT 12 &quot;Jos&eacute; Mar&iacute;a Morelos&quot;</option>
				<option value='13'> CECyT 13 &quot;Ricardo Flores Mag&oacute;n&quot;</option>
				<option value='14'> CECyT 14 &quot;Luis Enrique Erro Soler&quot;</option>
				<option value='15'> CECyT 15 &quot;Di&oacute;doro Ant&uacute;nez Echagaray&quot;</option>
				<option value='16'> CECyT 16 &quot;Unidad Hidalgo&quot;</option>
				<option value='17'> CECyT 17 &quot;Unidad Guanajuato&quot;</option>
				<option value='18'> CET 1 &quot;Walter Cross Buchanan&quot;</option>
				<option value='0'> Otra</option>
			</select><br/>

				<div class='form_All' id='form_otra'>
			<!--<label for='otra' class='etiqueta'> Promedio:</label>-->
				<div class='form_input_general_otra'>
					<input type='text' name='otra' id='otra'  class='form_input_otra' placeholder='Otra' style='display: none;' value='$alumno->otra'/>
					<i class='validacion_estado far fa-times-circle'></i>
					</div>
					<p class='form_error'>La escuela no debe tener caracteres especiales </p>
					</div>


			<label for='estado' class='etiqueta'>Selecciona tu entidad federativa de procedencia</label>
			<select name='estado' id='procedencia' onChange='validarOpcE()' value='$alumno->estado'>
				<option value='NS'> Selecciona una </option>
				<option value='1'> Aguascalientes </option>
				<option value='2'> Baja California</option>
				<option value='3'>Baja California Sur</option>
				<option value='4'> Campeche </option>
				<option value='5'> CDMX </option>
				<option value='6'>Chiapas </option>
				<option value='7'>Chihuahua </option>
				<option value='8'>Coahuila </option>
				<option value='9'>Colima</option>
				<option value='10'>Durango </option>
				<option value='11'>Estado de M&eacute;xico </option>
				<option value='12'>Guanajuato </option>
				<option value='13'>Guerrero </option>
				<option value='14'>Hidalgo </option>
				<option value='15'>Jalisco </option>
				<option value='16'>Michoac&aacute;n de Ocampo </option>
				<option value='17'>Morelos </option>
				<option value='18'>Nayarit </option>
				<option value='19'>Nuevo Le&oacute;n </option>
				<option value='20'>Oaxaca</option>
				<option value='21'>Puebla </option>
				<option value='22'>Quer&eacute;taro </option>
				<option value='23'>Quintana Roo </option>
				<option value='24'>San Luis Potos&iacute; </option>
				<option value='25'>Sinaloa </option>
				<option value='26'>Sonora </option>
				<option value='27'>Tabasco </option>
				<option value='28'>Tamaulipas  </option>
				<option value='29'>Tlaxcala </option>
				<option value='30'> Veracruz </option>
				<option value='31'>Yucat&aacute;n </option>
				<option value='32'>Zacatecas </option>
			</select><br/>

			<div class='form_All' id='form_promedio'>
			<label for='promedio' class='etiqueta'> Promedio:</label>
					<div class='form_input_general'>
					<input type='text' name='promedio' id='promedio' class='form_input_prom' value='$alumno->promedio'>
					<i class='validacion_estado_prom far fa-times-circle'></i>
					</div>
					<p class='form_error'>El promedio debe tener dos decimales </p>
					</div>


			<label for='opcionEscom' class='etiqueta'>ESCOM fue tu:</label>
			<select name='opcionESCOM' id='opcionESCOM'  onChange='validarOpcO()' value='$alumno->opcion' >
				<option value='NS'> Selecciona una </option>
				<option value='Primer'>Primera opci&oacute;n</option>
				<option value='Segunda'>Segunda opci&oacute;n</option>
				<option value='Tercera'>Tercera opci&oacute;n</option>
				<option value='Cuarta'>Cuarta opci&oacute;n</option>
			</select>



			</fieldset>

			<div class='form_mensaje' id='form_mensaje'>
				<p>
					<i class='fas fa-exclamation-triangle'></i> Completa el formulario correctamente
				</p></div>
			</div>
		   <div class='form_All_enviar'>
			<input type='submit' class='formulario_btnE'  onclick='pregunta()' value='Guardar'>
			   </div>

			<div class='form_All_limpiar'>
			<input type='reset' class='formulario_btnL' value='Limpiar'>
			   </div>
		</form>
		
		<script src='formulariojs.js'></script>
		<script src='https://kit.fontawesome.com/2c36e9b7b1.js' crossorigin='anonymous'></script> <!-- Agregar iconos -->
</body>
</html>";

?>