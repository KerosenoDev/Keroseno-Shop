<?php
session_start();
extract($_REQUEST);
?>
<!DOCTYPE html>
<html lang="es">
    
<head>
    <?php include("includes/cabecera.php"); ?>
</head>

<body>
    <?php include("includes/navegacion.php"); ?>

    <!-- Contenido -->
    <div class="container">
        <div class="row">
            
            <?php include("includes/listas.php"); ?>
            
            <!-- Contenido principal -->
            <div class="col-lg-9">
                
                <!-- Carousel -->
                <div id="carousel_inicio" class="carousel slide my-4" data-ride="carousel">
                    
                    <h2>Destacados</h2><hr>
                    
                    <!-- Diapositivas -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel_inicio" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel_inicio" data-slide-to="1"></li>
                        <li data-target="#carousel_inicio" data-slide-to="2"></li>
                    </ol>
                    
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="res/img/black_mirror.png" alt="Black Mirror">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="res/img/wind_river.png" alt="Wind River">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="res/img/godless.png" alt="Godless">
                        </div>
                    </div>
                    <!-- Fin diapositivas -->
                    
                    <!-- Botones -->
                    <a class="carousel-control-prev" href="#carousel_inicio" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel_inicio" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                    </a>
                    <!-- Fin botones -->
                    
                </div>
                <!-- Fin carousel -->
                
                <h2>Últimas novedades</h2><hr>
                
                <!-- Productos -->
                <div class="row">
                    <?php
                    // Se deshabilitan los mensajes de error.
                    include 'deshabilitar_mensajes_error.php';

                    // Se establece la conexión con la base de datos.
                    include 'datos_bd.php';
                    $enlace = mysqli_connect(SERVIDOR, USUARIO, CLAVE, BASE_DE_DATOS);
                    
                    if (!mysqli_connect_errno()) {
                        // Se obtienen todos los artículos.
                        $consulta1 = "SELECT * FROM ARTICULO ORDER BY ID DESC";
                        $resultado1 = mysqli_query($enlace, $consulta1);
                        $total_registros = mysqli_num_rows($resultado1);

                        // Si hay resultado.
                        if ($total_registros > 0) {
                            
                            // Se define el límite de los resultados por página.
                            $tamanho_pagina = 9;

                            // Si la variable página no existe, se inicializa.
                            if (!$pagina) {
                                $inicio = 0;
                                $pagina = 1;

                            } else {
                                $inicio = ($pagina - 1) * $tamanho_pagina;
                            }

                            // Se calcula el total de páginas.
                            $total_paginas = ceil($total_registros / $tamanho_pagina);

                            // Se construye la consulta.
                            $consulta2 = $consulta1." LIMIT ".$inicio.",".$tamanho_pagina;
                            $resultado2 = mysqli_query($enlace, $consulta2);
                            
                            // Mientras haya filas.
                            while ($fila = mysqli_fetch_row($resultado2)) {
                                $id = $fila[0];
                                $nombre = $fila[1];
                                $poster = $fila[2];
                                $stock = $fila[3];
                                $precio = $fila[4];
                                $descripcion = $fila[5];
                                $id_subfamilia = $fila[6];
                                
                                if (isset($_SESSION['usuario'])) {
                                    $enlace_carrito = "carro_agregar.php?art=".$id."&precio=".$precio;
                                    
                                } else {
                                    $enlace_carrito = "formulario_identificacion.php";
                                }
                                ?>
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="card h-100">
                                        
                                        <img class="card-img-top" src="admin/imagenes_articulos/<?php echo $poster ?>" alt="<?php echo $nombre ?>">
                                        
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $nombre ?></h5>
                                            <h6><?php echo $precio ?> €</h6>
                                        </div>
                                        
                                        <div class="card-footer">
                                            <div class="btn-ground text-center">
                                                <a href="<?php echo $enlace_carrito ?>" role="button" class="btn btn-danger"><i class="fa fa-cart-plus"></i></a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#vista_<?php echo $id ?>"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <!-- Ventana modal -->
                                <div class="modal fade product_view" id="vista_<?php echo $id ?>">
                                    <div class="modal-dialog modal-content">
                                        <div class="modal-body">
                                            
                                            <!-- Cabecera -->
                                            <div class="modal-header bg-danger text-white">
                                                <h4 class="modal-title">DETALLES DEL PRODUCTO</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            
                                            <!-- Contenidos -->
                                            <div class="row">
                                                <div class="col-md-6 product_img">
                                                    <div class="space-ten"></div>
                                                    <img src="admin/imagenes_articulos/<?php echo $poster ?>" width="300" height="auto" class="img-responsive img-centro">
                                                </div>

                                                <div class="col-md-6 product_content">
                                                    <div class="space-ten"></div>
                                                    
                                                    <strong>Nombre:</strong>
                                                    <h4><?php echo $nombre ?></h4><br>
                                                    
                                                    <strong>Sinopsis:</strong>
                                                    <p><?php echo $descripcion ?></p><br>

                                                    <strong>Precio:</strong>
                                                    <h3><?php echo $precio ?> €</h3><br>
                                                    
                                                    <strong>Stock:</strong>
                                                    <h5><?php echo $stock ?> unidades</h5><br>

                                                    <div class="btn-ground">
                                                        <a href="<?php echo $enlace_carrito ?>" role="button" class="btn btn-danger"><i class="fa fa-cart-plus"></i>  Añadir al carrito</a>
                                                    </div>
                                                    
                                                    <div class="space-ten"></div>
                                                </div>
                                            </div>
                                            
                                            <!-- Pie -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            
                            mysqli_free_result($resultado1);
                            mysqli_free_result($resultado2);
                            mysqli_close($enlace);
                            
                            ?>
                            <div class="col-lg-12 col-md-12 mt-4 clearfix">
                                <ul class="pagination pagination-lg justify-content-center">
                                    <?php
                                    if ($pagina > 1) {
                                        ?>
                                        <li class="page-item">
                                            <a class="page-link" href="<?php echo('index.php?pagina='.($pagina - 1)) ?>" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        <?php
                                    } else {
                                        ?>
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        <?php
                                    }

                                    $contador = 1;

                                    while ($contador <= $total_paginas) {
                                        if ($contador == $pagina) {
                                            echo('<li class="page-item active">');
                                                echo('<a class="page-link" href="index.php?pagina='.$contador.'">'.$contador.' <span class="sr-only">(current)</span></a>');
                                            echo('</li>');
                                        $contador++;

                                        } else {
                                            echo('<li class="page-item"><a class="page-link" href="index.php?pagina='.$contador.'">'.$contador.'</a></li>');
                                        $contador++;
                                        }
                                    }

                                    if ($pagina < $total_paginas) {
                                        ?>
                                        <li class="page-item">
                                            <a class="page-link" href="<?php echo('index.php?pagina='.($pagina + 1)) ?>" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                        <?php
                                    } else {
                                        ?>
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                            <?php
                            
                        } else {
                            ?>
                            <p>No hay resultados.</p>
                            <?php
                        }
                    }
                    ?>
                </div>
                <!-- Fin productos -->
            
            </div>
            <!-- Fin contenido principal -->

      </div>
    </div>
    <!-- Fin contenido -->

    <?php include("includes/pie.php"); ?>

    <?php include("includes/javascript.php"); ?>

</body>

</html>