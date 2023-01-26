<?php include '../include/encabezados.php' ?></php>
<?php
//Cargar sesion del usuario logueado
session_start();
if (!isset($_SESSION['autenticado'])) { //Si no hay un usuario logueado, regresar al logueo**
  header("Location: ../login.php");
}
?>

<body>
  <div class="pagina_completa">
    <div class="sidebar">
      <div class="logo">
        <img class="img_logo" src="../img/Logotipo_crema.svg" alt="">
      </div>
      <div class="opciones">
        <a class="opcion" href="dashboard.php"><img class="img_opcion" src="../img/monitor.png" alt=""> Dashboard</a>
        <a class="opcion" href="dashboardusuario.php"><img class="img_opcion" src="../img/grupo.png" alt=""> Usuarios</a>
        <a class="opcion seleccionado" href="#"><img class="img_opcion" src="../img/monumentalActivo.png" alt=""> Monumentos</a>
        <a class="opcion" href="dashboardcomentarios.php"><img class="img_opcion" src="../img/conversacion.png" alt=""> Comentarios</a>
      </div>
    </div>
    <div class="cuerpo">
      <div class="top">
        <h1 class="titulo">Administrar monumentos</h1>
        <a class="cerrar_sesion" href="../controladores/cerrar_sesion.php">Cerrar Sesión</a>
      </div>
      <div style="display: flex; justify-content: flex-end; margin-right: 20px;"><b>Usuario logueado: </b> <br><?php echo $_SESSION['nombre'];?></div>
      <div class="bottom">
        <div id="tabla">
          <?php include '../include/tablas.php'; ?>
        </div>
      </div>
      <!-- Modal para registros-->
      <div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Agregar Monumento</h4>
            </div>
            <div class="modal-body">
              <form id="nuevoRegistro">
              <label for="id_ciudad">Ciudad:</label>
              <select name="id_ciudad" id="id_ciudad">
                <option value="1">Chetumal</option>
                <option value="2" disabled>Cancún</option>
                <option value="3" disabled>Tulum</option>
                <option value="4" disabled>Mérida</option>
                <option value="5" disabled>Tapachula</option>
                <option value="6" disabled>Guadalajara</option>
                <option value="7" disabled>Florencia</option>
              </select><br>
                <label>Nombre</label>
                <input class="form-control input-lm" type="text" name="nombre" id="nombre">
                <label>Descripción</label>
                <input class="form-control input-lm" type="text" name="descripcion" id="descripcion">
                <label>Año</label>
                <input class="form-control input-lm" type="text" name="anio" id="anio"><br>
                <label for="tipo">Tipo:</label>
                <select name="tipo" id="tipo">
                  <option value="Monumento">Monumento</option>
                  <option value="Estatua">Estatua</option>
                  <option value="Fuente">Fuente</option>
                  <option value="Efigie">Efigie</option>
                  <option value="Sitio de Interes">Sitio de Interes</option>
                </select><br>
                <label>Modelado 3d HP</label>
                <input class="form-control input-lm" type="text" name="modelado_3d_hp" id="modelado_3d_hp">
                <label>Modelado 3d LP</label>
                <input class="form-control input-lm" type="text" name="modelado_3d_lp" id="modelado_3d_lp">
                <label>Latitud</label>
                <input class="form-control input-lm" type="text" name="latitud" id="latitud">
                <label>Longitud</label>
                <input class="form-control input-lm" type="text" name="longitud" id="longitud">
              </form>
            </div>
            <center><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalIdCiudad">
                <b>ID Ciudad</b>
              </button></center>
            <br>
            <!-- Modal -->
            <div class="modal fade" id="modalIdCiudad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                    <h4 class="modal-title" id="myModalLabel">Consultar ID</h4>
                  </div>
                  <div class="modal-body">
                    <pre>    Ciudad:           ID:
      -Chetumal             1
      -Cancún               2 
      -Tulum                3
      -Mérida               4
      -Tapachula            5
      -Guadalajara          6
      -Florencia            7
                      </pre>
                  </div>
                  <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div> -->
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary" id="btnGuardarRegistro">Guardar</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal para editar-->
      <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Editar Monumento</h4>
            </div>
            <div class="modal-body">
              <form id="frmEditarRegistro">
                <label>ID</label>
                <input class="form-control input-lm" type="text" name="id_monumento" id="id_monumento" readonly>
                <label>ID Ciudad</label>
                <input class="form-control input-lm" type="text" name="id_ciudadE" id="id_ciudadE">
                <label>Nombre</label>
                <input class="form-control input-lm" type="text" name="nombreE" id="nombreE">
                <label>Descripción</label>
                <input class="form-control input-lm" type="text" name="descripcionE" id="descripcionE">
                <label>Año</label>
                <input class="form-control input-lm" type="text" name="anioE" id="anioE">
                <label>Tipo</label>
                <input class="form-control input-lm" type="text" name="tipoE" id="tipoE">
                <label>Modelado 3d HP</label>
                <input class="form-control input-lm" type="text" name="modelado_3d_hpE" id="modelado_3d_hpE">
                <label>Modelado 3d LP</label>
                <input class="form-control input-lm" type="text" name="modelado_3d_lpE" id="modelado_3d_lpE">
                <label>Latitud</label>
                <input class="form-control input-lm" type="text" name="latitudE" id="latitudE">
                <label>Longitud</label>
                <input class="form-control input-lm" type="text" name="longitudE" id="longitudE">
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary" id="btnGuardarEdicion">Guardar</button>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <script src="../js/librerias/sweetalert.min.js"></script>
  <script src="../js/librerias/jquery-3.2.1.min.js"></script>
  <script src="../js/librerias/bootstrap/js/bootstrap.js"></script>
  <script src="../js/librerias/DataTables/datatables.min.js"></script>
</body>

</html>

<script src="../js/tablaMonumentoAJAX.js"></script>