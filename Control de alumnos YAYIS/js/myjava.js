function eliminarAlumno(id){
	//correcto
	var url = 'eliminar.php';
	var pregunta = confirm('¿Esta seguro de eliminar este alumno?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+ id,
		success: function(registro){
			$('#agrega_alumno').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}
