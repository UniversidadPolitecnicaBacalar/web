




function validacion(){
	
	// variable, que toma el elemento por su id, y tomara su valor
	var verificar = true;

	
	var apellidoPaterno = document.getElementById("apellidoPaterno");
	var apellidoMaterno = document.getElementById("apellidoMaterno");
	var nombre = document.getElementById("nombre");

	var domicilio = document.getElementById("domicilio");
	var ciudad = document.getElementById("ciudad");
	var colonia = document.getElementById("colonia");
	var numeroExterior = document.getElementById("numeroExterior");
	var telefonoMovil = document.getElementById("telefonoMovil");
	var telefonoFijo = document.getElementById("telefonoFijo");
	//expresiones regulares de nombre y correo
	var expRegNombre = /^[a-zA-ZÑñÁáÉéÍíÓóÚú\s]+$/;
	var expRegTelefonoMovil = /^[0-9]{3}-? ?[0-9]{10}$/;
	var expRegTelefonoFijo = /^[0-9]{3}-? ?[0-9]{7}$/;
	


	//verifica si el nombre 
	if (!apellidoPaterno.value){
		alert("Campo apellido paterno requerido");
		apellidoPaterno.focus();
		verificar = false;
	}
	
	else if(!expRegNombre.exec(apellidoPaterno.value)){
		alert("Apellido paterno invalido");
		apellidoPaterno.focus();
		verificar = false;
	}
	else if (!apellidoMaterno.value){
		alert("Campo apellido materno requerido");
		apellidoMaterno.focus();
		verificar = false;
	}
	else if(!expRegNombre.exec(apellidoMaterno.value)){
		alert("Apellido materno invalido");
		apellidoMaterno.focus();
		verificar = false;
	}
	else if (!nombre){
		alert("Campo nombre requerido");
		nombre.focus();
		verificar = false;
	}
	else if(!expRegNombre.exec(nombre.value)){
		alert("Nombre invalido");
		nombre.focus();
		verificar = false;
	}
	else if (!domicilio){
		alert("Campo domicilio requerido");
		domicilio.focus();
		verificar = false;
	}	
	else if (!ciudad){
		alert("Campo ciudad requerido");
		ciudad.focus();
		verificar = false;
	}	
	else if(!expRegNombre.exec(ciudad.value)){
		alert("Ciudad invalido");
		ciudad.focus();
		verificar = false;
	}
	else if (!numeroExterior){
		alert("Campo numero exterior requerido");
		numeroExterior.focus();
		verificar = false;
	}	
	else if (!telefonoFijo){
		alert("Campo telefono fijo requerido");
		telefonoFijo.focus();
		verificar = false;
	}	
	else if(!expRegTelefonoFijo.exec(telefonoFijo.value))
	{ 
		alert("Telefono fijo invalido");
		telefonoFijo.focus();
		verificar = false;
	}

	else if (!telefonoMovil){
		alert("Campo telefono movil requerido");
		telefonoMovil.focus();
		verificar = false;
	}
	else if(!expRegTelefonoMovil.exec(telefonoMovil.value))//is not a number
	{ 
		alert("Telefono movil invalido");
		telefonoMovil.focus();
		verificar = false;
	}



	if (verificar == true)
	{
	alert("Datos guardados correctamente!");
	document.formulario.submit();
	}
}
function limpiarForm(){
	alert("Limpiando");
	document.getElementById("formulario").reset();
}
 window.onload = function(){

 	var botonEnviar, botonLimpiar;
 	botonLimpiar= document.getElementById("limpiar");
 	botonLimpiar.onclick = limpiarForm;


 	botonEnviar= document.formulario.enviar_btn;
 	botonEnviar.onclick = validacion;


 }