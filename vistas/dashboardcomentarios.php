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
                <a class="opcion" href="dashboardmonumentos.php"><img class="img_opcion" src="../img/monumental.png" alt=""> Monumentos</a>
                <a class="opcion seleccionado" href="#"><img class="img_opcion" src="../img/conversacionActivo.png" alt=""> Comentarios</a>
            </div>
        </div>
        <div class="cuerpo">
            <div class="top">
                <h1 class="titulo">Administrar Usuarios</h1>
                <a class="cerrar_sesion" href="../controladores/cerrar_sesion.php">Cerrar Sesión</a>
            </div>
            <div style="display: flex; justify-content: flex-end; margin-right: 20px;"><b>Usuario logueado: </b> <br><?php echo $_SESSION['nombre'];?></div>
            <div class="bottom">
                <div id="tabla">
                    <?php include '../include/tablaComentarios.php'; ?>
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

<script src="../js/tablaComentariosAJAX.js"></script>