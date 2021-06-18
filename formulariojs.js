const formulario =document.getElementById('formulario');
const inputs= document.querySelectorAll('#formulario input');



const expresiones = {
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,30}$/, //Solo letras y espacios (pueden ir acentos) con longitud maxima de 30
	apeP: /^[a-zA-ZÀ-ÿ\s]{1,15}$/, //Letras sin espacio con longitud maxima de 15
	apeM: /^[a-zA-ZÀ-ÿ\s]{1,15}$/, 
	boleta: /((PE|PP)[0-9]{8})|([0-9]{10})/, //La boleta debe empezar con PP o PE seguido de una longitud maxima de 8 digitos
	curp: /^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$/,
	cp: /^[0-9]{5}/, //longitud de 5 numeros
	tel: /^55[0-9]{8}/, //longitud maxima de 8 digitos despues del 55
	correo: /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/,
	calle: /^[0-9a-zA-ZÀ-ÿ. ]+$/,
	colonia: /^[0-9a-zA-ZÀ-ÿ. ]+$/, 
	promedio: /^[0-9]+([.][0-9]{2})?$/,
	otra: /^[0-9a-zA-ZÀ-ÿ. ]+$/,
	fecha: /^\d{4}\-\d{2}\-\d{2}$/
	
}




const campos = {
	nombre: false,
	apeP: false,
	apeM: false,
	boleta: false,
	nacimiento: true,
	curp: false,
	calle: false,
	colonia: false,
	cp: false,
	telefono: false,
	correo: false,
	otra: false,
	promedio: false
}

const selectores = {
	escuela: false,
	estado: false,
	escom: false
}



const ValidarForm = (e) => {
	switch(e.target.name)

	{
		case "nombre":
			ValidarCampos(expresiones.nombre, e.target, 'nombre');
			
			break;
	
			case "apeP":
            ValidarCampos(expresiones.apeP, e.target, 'apeP');
			break;
			case "apeM":
            ValidarCampos(expresiones.apeM, e.target, 'apeM');
			break;
			case "boleta":
			ValidarCampos(expresiones.boleta, e.target, 'boleta');
			break;
			case "curp":
			ValidarCampos(expresiones.curp, e.target, 'curp');
			break;
			case "calle":
			ValidarCampos(expresiones.calle, e.target, 'calle');
			break;
			case "colonia":
			ValidarCampos(expresiones.colonia, e.target, 'colonia');
			break;
			case "cp":
			ValidarCampos(expresiones.cp, e.target, 'cp');
			break;
			case "telefono":
			ValidarCampos(expresiones.tel, e.target, 'telefono');
			
			break;
			case "correo":
			ValidarCampos(expresiones.correo, e.target, 'correo');
			break;
			case "promedio":
			ValidarCampos(expresiones.promedio, e.target, 'promedio');
			break;
		    case "fecha":
			ValidarFecha(expresiones.fecha, e.target);
			break;
		    case "otra":
			ValidarCampos(expresiones.otra, e.target,'otra');
			break;
			
	}
}

const ValidarFormOnSubmit = (input) => {
	switch(input.name)

	{
		case "nombre":
			ValidarCampos(expresiones.nombre, input, 'nombre');
			
			break;
	
			case "apeP":
            ValidarCampos(expresiones.apeP, input, 'apeP');
			break;
			case "apeM":
            ValidarCampos(expresiones.apeM, input, 'apeM');
			break;
			case "boleta":
			ValidarCampos(expresiones.boleta, input, 'boleta');
			break;
			case "curp":
			ValidarCampos(expresiones.curp, input, 'curp');
			break;
			case "calle":
			ValidarCampos(expresiones.calle, input, 'calle');
			break;
			case "colonia":
			ValidarCampos(expresiones.colonia, input, 'colonia');
			break;
			case "cp":
			ValidarCampos(expresiones.cp, input, 'cp');
			break;
			case "telefono":
			ValidarCampos(expresiones.tel, input, 'telefono');
			
			break;
			case "correo":
			ValidarCampos(expresiones.correo, input, 'correo');
			break;
			case "promedio":
			ValidarCampos(expresiones.promedio, input, 'promedio');
			break;
		    case "fecha":
			ValidarFecha(expresiones.fecha, input);
			break;
		    case "otra":
			ValidarCampos(expresiones.otra, input,'otra');
			break;
			
	}
}



const ValidarCampos = (expresion, input, campo) => {
				if(expresion.test(input.value)){
			       document.getElementById(`form_${campo}`).classList.remove('form_incorrecto');
				   document.getElementById(`form_${campo}`).classList.add('form_correcto');
				   document.querySelector(`#form_${campo} i`).classList.add('fa-check-circle');
				   document.querySelector(`#form_${campo} i`).classList.remove('fa-times-circle');
				   document.querySelector(`#form_${campo} .form_error`).classList.remove('form_error_activo');
				   campos[campo]=true;
			   }else{
				   document.getElementById(`form_${campo}`).classList.add('form_incorrecto');
				   document.getElementById(`form_${campo}`).classList.remove('form_correcto');
				   document.querySelector(`#form_${campo} i`).classList.add('fa-times-circle');
				   document.querySelector(`#form_${campo} i`).classList.remove('fa-check-circle');
				   document.querySelector(`#form_${campo} .form_error`).classList.add('form_error_activo');
				   campos[campo]=false;
			   }
}

var ValidarFecha = (expresion, input) => {
	if(expresion.test(input.value)){
		campos.nacimiento=true;
	}else{
		campos.nacimiento=false;
	}
}



inputs.forEach((input) => {
	input.addEventListener('keypress', ValidarForm); //Validacion al soltar la tecla
	input.addEventListener('blur', ValidarForm);   // Validacion al dar clic en otro sitio			   
});

function validarOpc(){
	var opcion = document.getElementById('escuela');
	if(opcion.value == 'NS'){
		selectores.escuela=false;
	}else if(opcion.value == '0'){
		
		document.getElementById(`otra`).style.display="";
		selectores.escuela=true;
	}else{
	document.getElementById(`otra`).style.display="none";
	document.getElementById(`form_otra`).classList.remove('form_incorrecto');
	document.getElementById(`form_otra`).classList.remove('form_correcto');
	document.querySelector(`#form_otra i`).classList.remove('fa-times-circle');
	document.querySelector(`#form_otra i`).classList.remove('fa-check-circle');
	document.querySelector(`#form_otra .form_error`).classList.remove('form_error_activo');
	document.getElementById('form_mensaje').classList.remove('form_mensaje_activo');
	selectores.escuela=true;
	campos.otra=true;
		
		
	}
}

function validarOpcE(){
	var opcion = document.getElementById('procedencia');
	console.log("Hoaaaaaaa validacion procedencia")
	if(opcion.value == 'NS'){
		selectores.estado=false;
		console.log("Procedencia not selected");
	}else{
		console.log("Procedencia selected");
	selectores.estado=true;
	document.getElementById('form_mensaje').classList.remove('form_mensaje_activo');
	}
}


function validarOpcO(){
	var opcion = document.getElementById('opcionESCOM');
	if(opcion.value == 'NS'){
		selectores.escom=false;
	}else{
	selectores.escom=true;	
	document.getElementById('form_mensaje').classList.remove('form_mensaje_activo');
	}
}


formulario.addEventListener('reset', (e) =>{
	
	let camposl = ["nombre","apeP","apeM","boleta","curp","calle","colonia","cp","telefono","correo","promedio"]

	for(let i=0;i<camposl.length;i++){
	
	document.getElementById(`form_${camposl[i]}`).classList.remove('form_incorrecto');
	document.getElementById(`form_${camposl[i]}`).classList.remove('form_correcto');
	document.querySelector(`#form_${camposl[i]} i`).classList.remove('fa-times-circle');
	document.querySelector(`#form_${camposl[i]} i`).classList.remove('fa-check-circle');
	document.querySelector(`#form_${camposl[i]} .form_error`).classList.remove('form_error_activo');
	document.getElementById('form_mensaje').classList.remove('form_mensaje_activo');
	campos[`camposl[i]`]=false;
		
	}
				  
	
});

formulario.addEventListener('submit',(e) =>{
	e.preventDefault();

	//En caso de que ya esten cargados
	inputs.forEach((input) => {
		console.log(input.name +"--" + input.value);
		ValidarFormOnSubmit(input)		   
	});
	ValidarFecha(expresiones.fecha, document.getElementById("fecha"));
	validarOpcO();
	validarOpcE();
	validarOpc();
	//Validar campo de genero
	var  sexo;
		if(formulario.genero[0].checked == true || formulario.genero[1].checked == true ){
			sexo = true;
		}else{
		sexo = false;
	}
	
	if(campos.nombre && campos.apeP && campos.apeM && campos.boleta && campos.curp && campos.calle && campos.colonia && campos.cp && campos.telefono && campos.correo  && sexo == true && campos.nacimiento && campos.promedio && selectores.escuela && campos.otra && selectores.estado && selectores.escom){ 
	    alert("terminado");
		document.getElementById('form_mensaje').classList.remove('form_mensaje_activo');
		e.currentTarget.submit();
	   }else{
		  document.getElementById('form_mensaje').classList.add('form_mensaje_activo');
	   }


});






