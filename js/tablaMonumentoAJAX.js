var tablaMonumentos;
function eliminarMonumentos(id_monumento){
	swal({
		title: "¿Estás seguro de eliminar el registro?",
		text: "Una vez eliminado, no podra recuperarse",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	  })
	  .then((willDelete) => {
		if (willDelete) {
		  /*swal("Poof! Your imaginary file has been deleted!", {
			icon: "success",
		  });*/
		  //Uso de ajax para procesar la eliminacion del profesionista
		  $.ajax({
			
			type: "GET",
			dataType: "json",
			url: "../controladores/ctrl_monumentoT.php?opcion=5",
			data: "id_monumento="+id_monumento,
			cache: false,
			contentType: false,
			processData: false,
			success: function(data){
				if(data['success']==1){
					swal(data['message'], "", "success", {buttons:"Aceptar"});
					//tablaProfesionistas.ajax.url("../controladores/ctrl_profesionistas.php?opcion=5&periodo="+$('#cmbPeriodos').val()+"&carrera="+$('#cmbCarreras').val());
					tablaMonumentos.ajax.reload();
				}//Fin if data success
				else{
					swal({
						title: "Error!",
						text: "Error al eliminar el registro",
						icon: "warning",
						button: "Aceptar",
						dangerMode: true,
					});
				}
			} //Fin success						
		}); //Fin ajax	
		}
    });
}
$(document).ready(function(){
    //$('#tabla').load('../include/tablas.php');

     var id_monumento = "";
     var disabled = "";
     tablaMonumentos = $('#tablaMonumentos').DataTable({
         "ajax":{
            "url": "../controladores/ctrl_monumentoT.php?opcion=1",
            "type": "GET",
        },
 
        "columns":[
 
                {"data":"id_monumento"},
                {"data":"id_ciudad"},
                {"data":"nombre"},
                {"data":"descripcion"},
                {"data":"anio"},
                {"data":"tipo"},
                {"data": "id_monumento",
                "render":function(data,type,row){
                 var id_monumento = data;										
                 return '<center>   <button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEditar" id="btnEditarDatos" name="'+id_monumento+'"></button> '+ 
                 '<button class="btn btn-danger glyphicon glyphicon-trash" onclick="eliminarMonumentos('+id_monumento+')"></button></center>';
                 }
                 }
        ],
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu": 'Mostrar <select>'+
                   '<option value="5">5</option>'+
                '<option value="10">10</option>'+
                '<option value="20">20</option>'+
                '<option value="30">30</option>'+
                '<option value="40">40</option>'+
                '<option value="50">50</option>'+
                '<option value="-1">Todos</option>'+
                '</select> registros',    
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "No hay registros en esta tabla",
            "sInfo":           "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Búsqueda:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
     
     });

     //Guardar datos para el Nuevo Registro
     $('#btnGuardarRegistro').click(function(){
        //Validar datos
        if (!validaCamposDatosRegistro())
        return;
        //Obtener los datos del formulario
        var formData = new FormData(document.getElementById("nuevoRegistro"));
        //Enviar formulario y procesar datos
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../controladores/ctrl_monumentoT.php?opcion=2",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data['success']==1){
                    swal(data['message'], "", "success", {buttons:"Aceptar"});

                    limpiaCamposDatosRegistro();
                    tablaMonumentos.ajax.reload();
                }
                else{
                    swal({
                        title: "Error!",
                        text: "Error al insertar el registro",
                        icon: "warning",
                        button: "Aceptar",
                        dangerMode: true,
                    });
                }
            }
        });
     });
     function limpiaCamposDatosRegistro(){
        $('#id_ciudad').val(""); 
        $('#nombre').val("");
        $('#descripcion').val("");
        $('#anio').val("");
        $('#tipo').val("");			
        $('#modelado_3d_hp').val("");			
        $('#modelado_3d_lp').val("");
        $('#latitud').val("");			
        $('#longitud').val("");						
    }

    function validaCamposDatosRegistro(){
        //Variable bandera
        var faltaCampo=0;
        var mensaje = "Todos los campos son obligatorios"
        //Obtener los valores de los campos
        var id_ciudad = document.getElementById("id_ciudad").value;
        var nombre = document.getElementById("nombre").value;
        var descripcion = document.getElementById("descripcion").value;
        var anio = document.getElementById("anio").value;
        var tipo = document.getElementById("tipo").value;
        var modelado_3d_hp = document.getElementById("modelado_3d_hp").value;
        var modelado_3d_lp = document.getElementById("modelado_3d_lp").value;
        var latitud = document.getElementById("latitud").value;
        var longitud = document.getElementById("longitud").value;
        
        if(id_ciudad == ""){
            faltaCampo = 1;			
        }
        if(nombre == ""){
            faltaCampo = 1;			
        }
        if(descripcion == ""){
            faltaCampo = 1;			
        }
        if(anio == ""){
            faltaCampo = 1;			
        }
        if(tipo == ""){
            faltaCampo = 1;			
        }
        if(modelado_3d_hp == ""){
            faltaCampo = 1;			
        }
        if(modelado_3d_lp == ""){
            faltaCampo = 1;			
        }
        if(latitud == ""){
            faltaCampo = 1;			
        }
        if(longitud == ""){
            faltaCampo = 1;			
        }
    


        if(faltaCampo){
            swal({
                        title: "Faltan campos!",//Avisa duplicidad
                        text: mensaje,
                        icon: "warning",
                        button :"Aceptar",
                        dangerMode: true,
                    });
            return 0;
        }

        return 1;
    }

    //Mostrar datos en el formulario de edicion de monumento
    $('body').on('click','#btnEditarDatos',function(){
            id_monumento = $(this).attr('name');
            traerDatosMonumento();
        });

    //Traer lso datos de una carrera
    function traerDatosMonumento(){
        $.ajax({
            type: "POST",
            data: "id_monumento=" + id_monumento,
            url: "../controladores/ctrl_monumentoT.php?opcion=3",
            success: function(respuesta){
                datos = JSON.parse(respuesta);

                $('#id_monumento').val(datos[0]['id_monumento']);
                $('#id_ciudadE').val(datos[0]['id_ciudad']);
                $('#nombreE').val(datos[0]['nombre']);
                $('#descripcionE').val(datos[0]['descripcion']);
                $('#anioE').val(datos[0]['anio']);
                $('#tipoE').val(datos[0]['tipo']);
                $('#modelado_3d_hpE').val(datos[0]['modelado_3d_hp']);
                $('#modelado_3d_lpE').val(datos[0]['modelado_3d_lp']);
                $('#latitudE').val(datos[0]['latitud']);
                $('#longitudE').val(datos[0]['longitud']);
                
            }
        });
    }

    //Actualizar datos del monumento
    $('#btnGuardarEdicion').click(function(){
        //Validar que no exista campo vacio
        if(!validaCamposEdicion())
            return;

        //Mandar formulario
        var formData = new FormData(document.getElementById("frmEditarRegistro"));
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "../controladores/ctrl_monumentoT.php?opcion=4&id_monumento="+id_monumento,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success:function(data){
                if(data['success']==1){
                    swal("Registro guardado con éxito", "", "success",{buttons: "Aceptar"});
					tablaMonumentos.ajax.reload();
                }
                else{
                    swal({
						title: "Error!",
						text: "Error al realizar la actualización",
						icon: "warning",
						button :"Aceptar",
						dangerMode: true,
					});
                }
            }
        });
    });

    //Validar campos de edición del monuemento
    function validaCamposEdicion(){
        var faltaCampo = 0;
        var mensaje = "Todos los campos son obligatorios"

        var id_ciudad = document.getElementById("id_ciudadE").value;
        var nombre = document.getElementById("nombreE").value;
        var descripcion = document.getElementById("descripcionE").value;
        var anio = document.getElementById("anioE").value;
        var tipo = document.getElementById("tipoE").value;
        var modeladoHP = document.getElementById("modelado_3d_hpE").value;
        var modeladoLP = document.getElementById("modelado_3d_lpE").value;
        var latitud = document.getElementById("latitudE").value;
        var longitud = document.getElementById("longitudE").value;

        if(id_ciudad == ""){
            faltaCampo = 1;			
        }
        if(nombre == ""){
            faltaCampo = 1;			
        }
        if(descripcion == ""){
            faltaCampo = 1;			
        }
        if(anio == ""){
            faltaCampo = 1;			
        }
        if(tipo == ""){
            faltaCampo = 1;			
        }
        if(modeladoHP == ""){
            faltaCampo = 1;			
        }
        if(modeladoLP == ""){
            faltaCampo = 1;			
        }
        if(latitud == ""){
            faltaCampo = 1;			
        }
        if(longitud == ""){
            faltaCampo = 1;			
        }

        if(faltaCampo){
			swal({
						title: "Faltan campos!",//Avisa duplicidad
						text: mensaje,
						icon: "warning",
						button :"Aceptar",
						dangerMode: true,
					});
			return 0;
		}

		return 1;
    }
});