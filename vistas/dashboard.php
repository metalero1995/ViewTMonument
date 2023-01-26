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
                <a class="opcion seleccionado" href=""><img class="img_opcion" src="../img/monitorActivo.png" alt=""> Dashboard</a>
                <a class="opcion" href="dashboardusuario.php"><img class="img_opcion" src="../img/grupo.png" alt=""> Usuarios</a>
                <a class="opcion" href="dashboardmonumentos.php"><img class="img_opcion" src="../img/monumental.png" alt=""> Monumentos</a>
                <a class="opcion" href="dashboardcomentarios.php"><img class="img_opcion" src="../img/conversacion.png" alt=""> Comentarios</a>
            </div>
        </div>
        <div class="cuerpo">
            <div class="top" style = "border-bottom:solid #D9D9D9;">
                <div style="widht: 100%;">
                    <h1 class="titulo" style="float: left;">DASHBOARD</h1>
                </div>
                <br>
                <div style="display: flex; justify-content: flex-end; widht: 95%; margin-right: 20px;">
                    <b style="float: right; margin-right: 5px;">Usuario logueado: </b> <?php echo $_SESSION['nombre'];?>
                    <br>
                    <a class="cerrar_sesion" href="../controladores/cerrar_sesion.php" style="float: right; margin-left: 10px;">Cerrar Sesión</a>
                </div>
                
            </div>
            <div class="bottom">
            <h1 style="margin-left: 30px;">Información usuarios</h1>
                <div class="graficas" style="display: flex; justify-content: space-evenly;">
                    <!-- <center> -->
                        <div class="panel panel-default" style="width: 10%;">
                            <div class="panel-heading">Total Usuarios</div>
                            <div class="panel-body" style="float: right;">
                                <?php
                                require("../nuevaConexion.php");
                                $con = conectar();
                                $count = current($con->query("SELECT COUNT(id_usuario) FROM usuarios")->fetch());
                                echo $count;
                                ?>
                            </div>

                        </div>
                        <div class="panel panel-default" style="width: 10%;">
                            <div class="panel-heading">Usuarios Comunes</div>
                            <div class="panel-body" style="float: right;">
                                <?php
                                $count = current($con->query("SELECT COUNT(id_usuario) FROM usuarios WHERE tipo = 2")->fetch());
                                echo $count;
                                ?>
                            </div>
                        </div>
                        <div class="panel panel-default" style="width: 10%;">
                            <div class="panel-heading">Admin</div>
                            <div class="panel-body" style="float: right;">
                                <?php
                                $count = current($con->query("SELECT COUNT(id_usuario) FROM usuarios WHERE tipo = 1")->fetch());
                                echo $count;
                                ?>
                            </div>
                        </div>
                    <!-- </center> -->
                </div>
                <h1 style="margin-left: 30px;">Información monumentos</h1>
                <div class="graficas" style="display: flex; justify-content: space-evenly;">
                    <!-- <center> -->
                        <div class="panel panel-default" style="width: 10%;">
                            <div class="panel-heading">Total Monumentos</div>
                            <div class="panel-body" style="float: right;">
                                <?php
                                
                                $count = current($con->query("SELECT COUNT(id_monumento) FROM monumento")->fetch());
                                echo $count;
                                ?>
                            </div>

                        </div>
                        <div class="panel panel-default" style="width: 10%;">
                            <div class="panel-heading">Monumentos</div>
                            <div class="panel-body" style="float: right;">
                                <?php
                                $count = current($con->query("SELECT COUNT(id_monumento) FROM monumento WHERE tipo = 'Monumento'")->fetch());
                                echo $count;
                                ?>
                            </div>
                        </div>
                        <div class="panel panel-default" style="width: 10%;">
                            <div class="panel-heading">Fuentes</div>
                            <div class="panel-body" style="float: right;">
                                <?php
                                $count = current($con->query("SELECT COUNT(id_monumento) FROM monumento WHERE tipo = 'Fuente'")->fetch());
                                echo $count;
                                ?>
                            </div>
                        </div>
                        <div class="panel panel-default" style="width: 10%;">
                            <div class="panel-heading">Estatuas</div>
                            <div class="panel-body" style="float: right;">
                                <?php
                                $count = current($con->query("SELECT COUNT(id_monumento) FROM monumento WHERE tipo = 'Estatua'")->fetch());
                                echo $count;
                                ?>
                            </div>
                        </div>
                        <div class="panel panel-default" style="width: 10%;">
                            <div class="panel-heading">Efigie</div>
                            <div class="panel-body" style="float: right;">
                                <?php
                                $count = current($con->query("SELECT COUNT(id_monumento) FROM monumento WHERE tipo = 'Efigie'")->fetch());
                                echo $count;
                                ?>
                            </div>
                        </div>
                    <!-- </center> -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>