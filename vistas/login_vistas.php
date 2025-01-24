    <!-- Main wrapper  -->
    <div id="main-wrapper" class="row" style="background:#e5e5f7; height:100%;">
                        <section class="form-g" >
                        <section class="colum">
                            <section class="logo-g" style="background-image:<?php echo SERVERURL;?>vistas/plantillas/images/1.jpg;">
                                <span class="logo-c"><img src="<?php echo SERVERURL;?>vistas/plantillas/images/2.png"></span>
                                <h2>SISTEMA UNICO PARA EL REGISTRO DE CITAS DE INMUFA</h2>
                            </section>
                        </section>
                        <form class="form" method="POST" id="login">
                        <h2>INICIAR SESION</h2>
                        <div class="input-g">
                            <label for="usuario">USUARIO</label>
                            <input type="text" id="usuario" placeholder="USUARIO" id="usuario" name="usuario">
                            <label for="contraseña">CONTRASEÑA</label>
                            <input type="password" id="clave" placeholder="CONTRASEÑA" name="clave">
                            <div class="flex">
                            <input type="submit" value="INICIAR SESION" id="btn">
                            </div>
                        </div>
                        </form>
                    </section>
    </div>
 <?php
 /* action="<?php echo SERVERURL;?>ajax/loginAjax.php" */