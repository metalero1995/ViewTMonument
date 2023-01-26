//Se utiliza el metodo $(document).ready(), que viene la la libreria JQUERY, para ejecutar el codigo, cuando el documento HTML se a cargado

//Este AJAX tiene dos tareas importantes:
/*
-Validar el formulario
-Enviar el formulario para que se procese*/

$(document).ready(function () {
  $("#loguearse").click(function () {
    //Validar que los campos no se encuentren vacios

    //Variable para validar
    let campoV = false;

    //Condiciones para validar que se hayan llenado
    //Con el .val, se conpara si el valor del elemento con el id indicado se encuentra vacio o no
    if ($("#datosLogueo").val() == "") {
      campoV = true;
    }

    if ($("#contraseñaLogueo").val() == "") {
      campoV = true;
    }

    //Lo que ocurrira si existe un campo vacio
    if (campoV) {
      swal("Ningún campo puede estar vacio", {
        icon: "warning",
        button: "Aceptar",
      });
      return false;
    } //Fin de la validación de campos vacios

    //En caso de que los datos no esten vacios, se especifica lo que se debe hacer
    //Obtener los datos que pertenecen al formulario, y almacenarlos en una variable
    let datos = $("#formLogueo").serialize();

    //Ejecución de AJAX
    $.ajax({
      type: "POST",
      data: datos,
      url: "controladores/ctrl_sesion.php?inicia_sesion=1",
      success: function (r) {
        v = r;
        console.log(r);

        if (r == '"1"') {
          window.location = "vistas/dashboard.php";
        }
        if (r == '"2"') {
          window.location = "index.php";
        }
        if (r == '"0"') {
          alert("otro");
          swal("Usuario y/o contraseña incorrectos", {
            icon: "error",
            button: "Aceptar",
          });
        }
      },
    });
  });

  $("#signupR").click(function () {
    //Validar campos
    if (!validaCampos())
        return;

    var formData = new FormData(document.getElementById("formRegistro"));
        
    var contra1 = document.getElementById("contraseniaR").value;
    var contra2 = document.getElementById("contraseniaR2").value;

    if (contra1 != contra2){
      swal({
        title: "Error!", //Avisa duplicidad
        text: "Las contraseñas no coincide",
        icon: "warning",
        button: "Aceptar",
        dangerMode: true,
      });
    }else{
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "http://localhost/www/controladores/ctrl_usuarios.php?opcion=1",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
          if (data["success"] == 1) {
            swal(data["message"], "", "success", { buttons: "Aceptar" });
            //Limpiar los campos de la ventana modal
            limpiarCampos();
          } //Fin if data success
          else {
            swal({
              title: "Error!",
              text: "Error al insertar el registro",
              icon: "warning",
              button: "Aceptar",
              dangerMode: true,
            });
          }
        },
      });
    }
  });

  function validaCampos() {
    var faltaCampo = 0;
    var mensaje = "Todos los campos son obligatorios";

    var txtNombre = document.getElementById("nombreR").value;
    var txtApellido = document.getElementById("apellidoR").value;
    var txtCorreo = document.getElementById("emailR").value;
    var txtTelefono = document.getElementById("numberR").value;
    var txtContrasenia = document.getElementById("contraseniaR").value;
    var txtContraseniaR = document.getElementById("contraseniaR2").value;

    if (txtNombre == "") {
      faltaCampo = 1;
    }
    if (txtApellido == "") {
      faltaCampo = 1;
    }
    if (txtCorreo == "") {
      faltaCampo = 1;
    }
    if (txtTelefono == "") {
      faltaCampo = 1;
    }
    if (txtContrasenia == "") {
      faltaCampo = 1;
    }
    if (txtContraseniaR == "") {
      faltaCampo = 1;
    }

    if (faltaCampo) {
      swal({
        title: "Faltan campos!", //Avisa duplicidad
        text: mensaje,
        icon: "warning",
        button: "Aceptar",
        dangerMode: true,
      });
      return 0;
    }

    return 1;
  }

  //Limpiar campos
  function limpiarCampos(){
    $('#nombreR').val("");
    $('#apellidoR').val("");
    $('#emailR').val("");
    $('#numberR').val("");
    $('#contraseniaR').val("");
    $('#contraseniaR2').val("");
  }
});
