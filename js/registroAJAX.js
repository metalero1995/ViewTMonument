$(document).ready(function(){

    $('#signupR').click(function(){
        //Validar campos
       
        var formData = new FormData(document.getElementById("formRegistro"));
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../controladores/ctrl_usuarios.php?opcion=1",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                alert('hola');
                if(data['success']==1){
                    swal(data['message'], "", "success", {buttons:"Aceptar"});
                    //Limpiar los campos de la ventana modal
                    

                }//Fin if data success
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
});