<?php
	include("Conexion.php");
	$alumno;
	$admin = false;
	if(isset($_GET['Admin'])){
		$boleta = $_GET["boleta"];
		$conexion = new Conexion;
		$alumno = $conexion->consultarAlumno($boleta);
		$admin = true;
	}else{
		session_start();
		$alumno = $_SESSION["alumno"];
		$admin = false;
	}

	if($admin && $alumno->boleta==0){
			echo '<script>alert("El alumno no existe");</script>';
			echo '<script>window.location.href="menuAdmin.php";</script>';
	}

echo "
<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>.:Registro de alumnos:.</title>
	<link rel='stylesheet' href='formatocss/estilo.css'>
</head>
	<body>

		
			<img class='icono' src='escom.png' width='10%' height='auto' align='right' />
			<img src='res/ipnTransparent.png'  width='7%' height='auto' align='left'/>
	<h2>REGISTRO DE DATOS GENERALES PARA ALUMNOS DE NUEVO INGRESO (AGOSTO 2021)</h2>
			<p><br/><h4>Bienvenido(a) a la Escuela Superior de Cómputo (<b>ESCOM</b>), a continuación llena el siguiente formulario para asignarte el salón y horario en el que realizarás tu examen y poder formar parte de la <b>ESCOMUNIDAD</b>. </h4></p>";

			echo "<form action='".($admin?"editar.php":"registrarAlumno.php")."' method='POST' class='formulario' id='formulario'>";
		echo "<div class='form_Identidad'>
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
			<label for='genero' class='etiqueta'> G&eacute;nero:  <br/></label>";

			if($alumno->genero == "M"){
				echo "<input type='radio' class='form_radio' name='genero' id='M'  value='$alumno->genero' checked><label for='M'>Masculino</label>
				<input type='radio' class='form_radio' name='genero' id='F'  value='$alumno->genero'><label for='F'>Femenino</label><br/>";
			}else{
				echo "<input type='radio' class='form_radio' name='genero' id='M'  value='$alumno->genero'><label for='M'>Masculino</label>
				<input type='radio' class='form_radio' name='genero' id='F'  value='$alumno->genero' checked><label for='F'>Femenino</label><br/>";
			}
			

			echo "</div>	
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
			<label for='escuela' class='etiqueta'> Selecciona tu escuela de procedencia $alumno->idEscuela</label>
			<select name='escuela' id='escuela' onChange='validarOpc()'>";
				echo "<option value='1'".($alumno->idEscuela==1?"selected":"")."> CECyT 1 &quot;Gonzalo V&aacute;zquez Vela&quot;</option>";
				echo "<option value='2'".($alumno->idEscuela==2?"selected":"")."> CECyT 2 &quot;Miguel Bernard Perales&quot;</option>";
				echo "<option value='3'".($alumno->idEscuela==3?"selected":"")."> CECyT 3 &quot;Estanislao Ramirez Ru&iacute;z&quot;</option>";
				echo "<option value='4'".($alumno->idEscuela==4?"selected":"")."> CECyT 4 &quot;L&aacute;zaro C&aacute;rdenas&quot;</option>";
				echo "<option value='5'".($alumno->idEscuela==5?"selected":"")."> CECyT 5 &quot;Benito Ju&aacute;rez Garc&iacute;a&quot;</option>";
				echo "<option value='6'".($alumno->idEscuela==6?"selected":"")."> CECyT 6 &quot;Miguel Oth&oacute;n de Mendizabal&quot;</option>";
				echo "<option value='7'".($alumno->idEscuela==7?"selected":"")."> CECyT 7 &quot;Cuauht&eacute;moc&quot;</option>";
				echo "<option value='8'".($alumno->idEscuela==8?"selected":"")."> CECyT 8 &quot;Narciso Bassols Garc&iacute;a&quot;</option>";
				echo "<option value='9'".($alumno->idEscuela==9?"selected":"")."> CECyT 9 &quot;Juan de Dios B&aacute;tiz Paredes&quot;</option>";
				echo "<option value='10'".($alumno->idEscuela==10?"selected":"")."> CECyT 10 &quot;Carlos Vallejo M&aacute;rquez&quot;</option>";
				echo "<option value='11'".($alumno->idEscuela==11?"selected":"")."> CECyT 11 &quot;Wilfrido Massieu&quot;</option>";
				echo "<option value='12'".($alumno->idEscuela==12?"selected":"")."> CECyT 12 &quot;Jos&eacute; Mar&iacute;a Morelos&quot;</option>";
				echo "<option value='13'".($alumno->idEscuela==13?"selected":"")."> CECyT 13 &quot;Ricardo Flores Mag&oacute;n&quot;</option>";
				echo "<option value='14'".($alumno->idEscuela==14?"selected":"")."> CECyT 14 &quot;Luis Enrique Erro Soler&quot;</option>";
				echo "<option value='15'".($alumno->idEscuela==15?"selected":"")."> CECyT 15 &quot;Di&oacute;doro Ant&uacute;nez Echagaray&quot;</option>";
				echo "<option value='16'".($alumno->idEscuela==16?"selected":"")."> CECyT 16 &quot;Unidad Hidalgo&quot;</option>";
				echo "<option value='17'".($alumno->idEscuela==17?"selected":"")."> CECyT 17 &quot;Unidad Guanajuato&quot;</option>";
				echo "<option value='18'".($alumno->idEscuela==18?"selected":"")."> CET 1 &quot;Walter Cross Buchanan&quot;</option>";
				echo "<option value='0'".($alumno->idEscuela>18?"selected":"")."> Otra</option>";
			echo "</select><br/>
				<div class='form_All' id='form_otra'>
			<!--<label for='otra' class='etiqueta'> Promedio:</label>-->
				<div class='form_input_general_otra'>
					<input type='text' name='otra' id='otra'  class='form_input_otra' placeholder='Otra' style='display: none;' value='$alumno->procedencia'/>
					<i class='validacion_estado far fa-times-circle'></i>
					</div>
					<p class='form_error'>La escuela no debe tener caracteres especiales </p>
					</div>

			<label for='estado' class='etiqueta'>Selecciona tu entidad federativa de procedencia </label>
			<select name='estado' id='procedencia' onChange='validarOpcE()'>";
				echo "<option value='1'".($alumno->idEstado==1?"selected":"")."> Aguascalientes </option>";
				echo "<option value='2'".($alumno->idEstado==2?"selected":"")."> Baja California</option>";
				echo "<option value='3'".($alumno->idEstado==3?"selected":"").">Baja California Sur</option>";
				echo "<option value='4'".($alumno->idEstado==4?"selected":"")."> Campeche </option>";
				echo "<option value='5'".($alumno->idEstado==5?"selected":"")."> CDMX </option>";
				echo "<option value='6'".($alumno->idEstado==6?"selected":"").">Chiapas </option>";
				echo "<option value='7'".($alumno->idEstado==7?"selected":"").">Chihuahua </option>";
				echo "<option value='8'".($alumno->idEstado==8?"selected":"").">Coahuila </option>";
				echo "<option value='9'".($alumno->idEstado==9?"selected":"").">Colima</option>";
				echo "<option value='10'".($alumno->idEstado==10?"selected":"").">Durango </option>";
				echo "<option value='11'".($alumno->idEstado==11?"selected":"").">Estado de M&eacute;xico </option>";
				echo "<option value='12'".($alumno->idEstado==12?"selected":"").">Guanajuato </option>";
				echo "<option value='13'".($alumno->idEstado==13?"selected":"").">Guerrero </option>";
				echo "<option value='14'".($alumno->idEstado==14?"selected":"").">Hidalgo </option>";
				echo "<option value='15'".($alumno->idEstado==15?"selected":"").">Jalisco </option>";
				echo "<option value='16'".($alumno->idEstado==16?"selected":"").">Michoac&aacute;n de Ocampo </option>";
				echo "<option value='17'".($alumno->idEstado==17?"selected":"").">Morelos </option>";
				echo "<option value='18'".($alumno->idEstado==18?"selected":"").">Nayarit </option>";
				echo "<option value='19'".($alumno->idEstado==19?"selected":"").">Nuevo Le&oacute;n </option>";
				echo "<option value='20'".($alumno->idEstado==20?"selected":"").">Oaxaca</option>";
				echo "<option value='21'".($alumno->idEstado==21?"selected":"").">Puebla </option>";
				echo "<option value='22'".($alumno->idEstado==22?"selected":"").">Quer&eacute;taro </option>";
				echo "<option value='23'".($alumno->idEstado==23?"selected":"").">Quintana Roo </option>";
				echo "<option value='24'".($alumno->idEstado==24?"selected":"").">San Luis Potos&iacute; </option>";
				echo "<option value='25'".($alumno->idEstado==25?"selected":"").">Sinaloa </option>";
				echo "<option value='26'".($alumno->idEstado==26?"selected":"").">Sonora </option>";
				echo "<option value='27'".($alumno->idEstado==27?"selected":"").">Tabasco </option>";
				echo "<option value='28'".($alumno->idEstado==28?"selected":"").">Tamaulipas  </option>";
				echo "<option value='29'".($alumno->idEstado==29?"selected":"").">Tlaxcala </option>";
				echo "<option value='30'".($alumno->idEstado==30?"selected":"")."> Veracruz </option>";
				echo "<option value='31'".($alumno->idEstado==31?"selected":"").">Yucat&aacute;n </option>";
				echo "<option value='32'".($alumno->idEstado==32?"selected":"").">Zacatecas </option>";
			echo "</select><br/>

			<div class='form_All' id='form_promedio'>
			<label for='promedio' class='etiqueta'> Promedio:</label>
					<div class='form_input_general'>
					<input type='text' name='promedio' id='promedio' class='form_input_prom' value='$alumno->promedio'>
					<i class='validacion_estado_prom far fa-times-circle'></i>
					</div>
					<p class='form_error'>El promedio debe tener dos decimales </p>
					</div>


			<label for='opcionEscom' class='etiqueta'>ESCOM fue tu:</label>
			<select name='opcionESCOM' id='opcionESCOM'  onChange='validarOpcO()' value='$alumno->opcion' >";
				echo "<option value='Primer' ".($alumno->opcion=="Primer"?"selected":"").">Primera opci&oacute;n</option>";
				echo "<option value='Segunda' ".($alumno->opcion=="Segunda"?"selected":"").">Segunda opci&oacute;n</option>";
				echo "<option value='Tercera' ".($alumno->opcion=="Tercera"?"selected":"").">Tercera opci&oacute;n</option>";
				echo "<option value='Cuarta' ".($alumno->opcion=="Cuarta"?"selected":"").">Cuarta opci&oacute;n</option>";
			echo "</select>
			</fieldset>

			<div class='form_mensaje' id='form_mensaje'>
				<p>
					<i class='fas fa-exclamation-triangle'></i> Completa el formulario correctamente
				</p></div>
			</div>
		   <div class='form_All_enviar'>
			<input type='submit' class='formulario_btnE' value='Guardar'>
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