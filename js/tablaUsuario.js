var tablaUsuarios;
function eliminarUsuario(id_usuario){
	swal({
		title: "¿Estás seguro de eliminar el registro?",
		text: "Una vez eliminado, no podra recuperarse",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	  })
	  .then((willDelete) => {
		if (willDelete) {
		  $.ajax({
			
			type: "GET",
			dataType: "json",
			url: "../controladores/ctrl_usuarioT.php?opcion=2",
			data: "id_usuario="+id_usuario,
			cache: false,
			contentType: false,
			processData: false,
			success: function(data){
				if(data['success']==1){
					swal(data['message'], "", "success", {buttons:"Aceptar"});
					
					tablaUsuarios.ajax.reload();
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
			}					
		}); 
		}
    });
}
$(document).ready(function(){

     var id_usuario = "";
     var disabled = "";
     tablaUsuarios = $('#tablaUsuarios').DataTable({
         "ajax":{
            "url": "../controladores/ctrl_usuarioT.php?opcion=1",
            "type": "GET",
        },
 
        "columns":[
 
                {"data":"id_usuario"},
                {"data":"nombre"},
                {"data":"apellido_p"},
                {"data":"correo"},
                {"data":"telefono"},
                {"data":"tipo"},
                {"data": "id_usuario",
                "render":function(data,type,row){
                 var id_usuario = data;										
                 return '<center><button class="btn btn-danger glyphicon glyphicon-trash" onclick="eliminarUsuario('+id_usuario+')"></button></center>';
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
});