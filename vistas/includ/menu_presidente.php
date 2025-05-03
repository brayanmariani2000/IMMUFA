<?php include_once 'link.php'; ?>
<div class="left-sidebar" style="overflow: visible;">
    <!-- Sidebar scroll-->
    <div class="slimScrollDiv" style="position: relative; overflow: visible; width: auto; height: 100%;">
        <div class="scroll-sidebar" style="overflow: visible hidden; width: auto; height: 100%;">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav active">
                <ul id="sidebarnav" class="in">
                    <li class="nav-devider"></li>
                    <li class="nav-label">Menú Principal</li>
                    
                    <!-- Inicio -->
                    <li> 
                        <a class="" href="<?php echo SERVERURL?>inicio2">
                            <i class="fas fa-home fa-fw"></i>
                            <span class="hide-menu">Inicio</span>
                        </a>
                    </li>

                    <!-- Agendar Cita -->
                    <li> 
                        <a class="" href="<?php echo SERVERURL?>formularioPaciente">
                            <i class="fas fa-calendar-plus fa-fw"></i>
                            <span class="hide-menu">Agendar Cita</span>
                        </a>
                    </li>

                    <!-- Médico -->
                    <li>
                        <a class="" href="<?php echo SERVERURL?>formulario">
                            <i class="fas fa-user-md fa-fw"></i>
                            <span class="hide-menu">Médicos</span>
                        </a>
                    </li>

                    <!-- Area de Consulta -->
                    <li> 
                        <a class="" href="<?php echo SERVERURL?>nuevaArea">
                            <i class="fas fa-procedures fa-fw"></i>
                            <span class="hide-menu">Áreas de Consulta</span>
                        </a>
                    </li>

                    <!-- Usuarios -->
                    <li> 
                        <a class="" href="<?php echo SERVERURL?>nuevoUsuario">
                            <i class="fas fa-users-cog fa-fw"></i>
                            <span class="hide-menu">Administrar Usuarios</span>
                        </a>
                    </li>

                    <!-- Dependencias -->
                    <li> 
                        <a class="" href="<?php echo SERVERURL?>nuevaDependencia">
                            <i class="fas fa-building fa-fw"></i>
                            <span class="hide-menu">Dependencias</span>
                        </a>
                    </li>

                    <!-- Historial de Citas -->
                    <li> 
                        <a class="" href="<?php echo SERVERURL?>HistoriaCita">
                            <i class="fas fa-history fa-fw"></i>
                            <span class="hide-menu">Historial de Citas</span>
                        </a>
                    </li>

                    <!-- Reportes -->
                    <li> 
                        <a class="" href="<?php echo SERVERURL?>reportes">
                            <i class="fas fa-chart-bar fa-fw"></i>
                            <span class="hide-menu">Reportes y Estadísticas</span>
                        </a>
                    </li>

                    <!-- Configuración (opcional) -->
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <div class="slimScrollBar" style="background: rgb(33, 26, 26); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; left: 1px; height: 533.916px;"></div>
        <div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; left: 1px;"></div>
    </div>
    <!-- End Sidebar scroll-->
</div>