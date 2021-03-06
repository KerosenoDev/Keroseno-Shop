<!---------------------------- BARRA DE NAVEGACIÓN ---------------------------->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="index.php">Admin Keroseno Shop</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

            <!-------------------- Barra vertical --------------------->
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

                <!----------------------------------- Artículos ------------------------------------>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Artículos">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-th-list"></i>
                        <span class="nav-link-text">Artículos</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseComponents">
                        <li>
                            <a href="articulo.php?sec=0"><i class="fa fa-fw fa-list"></i>Listar</a>
                        </li>
                        <li>
                            <a href="listar_articulos_pdf.php"><i class="fa fa-fw fa-file-pdf-o" target="_blank"></i>Listar PDF</a>
                        </li>
                        <li>
                            <a href="articulo.php?sec=1"><i class="fa fa-fw fa-plus"></i>Añadir</a>
                        </li>
                        <li>
                            <a href="articulo.php?sec=3"><i class="fa fa-fw fa-edit"></i>Modificar</a>
                        </li>
                    </ul>
                </li>
                <!--------------------------------- Fin artículos ---------------------------------->

                <!------------------------------------ Familias --------------------------------------->
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Familias">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-tag"></i>
                        <span class="nav-link-text">Familias</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                        <li>
                            <a href="familia.php?sec=0"><i class="fa fa-fw fa-list"></i>Listar</a>
                        </li>
                        <li>
                            <a href="listar_familias_pdf.php"><i class="fa fa-fw fa-file-pdf-o"></i>Listar PDF</a>
                        </li>
                        <li>
                            <a href="familia.php?sec=1"><i class="fa fa-fw fa-plus"></i>Añadir</a>
                        </li>
                        <li>
                            <a href="familia.php?sec=3"><i class="fa fa-fw fa-edit"></i>Modificar</a>
                        </li>
                    </ul>
                </li>
                <!---------------------------------- Fin familias ------------------------------------->

                <!---------------------------------- Subfamilias ------------------------------------>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Subfamilias">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-tags"></i>
                        <span class="nav-link-text">Subfamilias</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseMulti">
                        <li>
                            <a href="subfamilia.php?sec=0"><i class="fa fa-fw fa-list"></i>Listar</a>
                        </li>
                        <li>
                            <a href="listar_subfamilias_pdf.php"><i class="fa fa-fw fa-file-pdf-o"></i>Listar PDF</a>
                        </li>
                        <li>
                            <a href="subfamilia.php?sec=1"><i class="fa fa-fw fa-plus"></i>Añadir</a>
                        </li>
                        <li>
                            <a href="subfamilia.php?sec=3"><i class="fa fa-fw fa-edit"></i>Modificar</a>
                        </li>
                    </ul>
                </li>
                <!-------------------------------- Fin subfamilias ---------------------------------->

                <!----------------------------- Visitar página ------------------------------->
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Visitar página">
                    <a class="nav-link" href="../index.php">
                        <i class="fa fa-fw fa-globe"></i>
                        <span class="nav-link-text">Visitar página</span>
                    </a>
                </li>
                <!--------------------------- Fin visitar página ----------------------------->
                
                <!----------------------------- Registrar admin ------------------------------->
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Registrar admin">
                    <a class="nav-link" href="registro_admin.php?sec=0">
                        <i class="fa fa-user-plus"></i>
                        <span class="nav-link-text">Registrar admin</span>
                    </a>
                </li>
                <!--------------------------- Fin registrar admin ----------------------------->

            </ul>
            <!------------------ Fin barra vertical ------------------->

            <!---- Botón cerrar/abrir menú vertical ---->
            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                    </a>
                </li>
            </ul>
            <!-- Fin botón cerrar/abrir menú vertical -->

            <ul class="navbar-nav ml-auto">

                <!---- Usuario ---->
                <li class="nav-item">
                    <span class="navbar-text">
                        <i class="fa fa-user-secret"></i> <?php echo $_SESSION['admin'] ?>
                    </span>
                </li>
                <!-- Fin usuario -->

                <!---- Botón desconectarse ---->
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-fw fa-sign-out"></i>Desconectarse
                    </a>
                </li>
                <!-- Fin botón desconectarse -->

            </ul>
        </div>
    </nav>
    <!-------------------------- FIN BARRA DE NAVEGACIÓN -------------------------->