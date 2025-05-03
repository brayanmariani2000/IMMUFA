<?php include_once 'link.php'; ?>
<div class="left-sidebar" style="overflow: visible;">
    <!-- Sidebar scroll-->
    <div class="slimScrollDiv" style="position: relative; overflow: visible; width: auto; height: 100%;">
        <div class="scroll-sidebar" style="overflow: visible hidden; width: auto; height: 100%;">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav active">
                <ul id="sidebarnav" class="in">
                    <li class="nav-devider"></li>
                    <li class="nav-label">Home</li>
                    <li> 
                        <a class="" href="<?php echo SERVERURL?>inicio">
                            <i class="fas fa-home"></i>
                            <span class="hide-menu">Inicio</span>
                        </a>
                    </li>

                    <li> 
                        <a class="" href="<?php echo SERVERURL?>formularioPaciente">
                            <i class="fas fa-user-injured"></i>
                            <span class="hide-menu">Gestión de Pacientes</span>
                        </a>
                    </li>

                    <li> 
                        <a class="" href="<?php echo SERVERURL?>tabla">
                            <i class="fas fa-calendar-check"></i>
                            <span class="hide-menu">Gestión de Citas</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <div class="slimScrollBar" style="background: rgb(33, 26, 26); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; left: 1px; height: 533.916px;"></div>
        <div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; left: 1px;"></div>
    </div>
    <!-- End Sidebar scroll-->
</div>