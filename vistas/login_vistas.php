
    <div id="main-wrapper" class="row" style="background:#e5e5f7; height:100%;">

     <div class="container">
        <div class="art-login-container">
            <!-- Elementos decorativos -->
            <div class="art-decoration decoration-1"></div>
            <div class="art-decoration decoration-2"></div>
            
            <!-- Encabezado -->
            <div class="login-header">
                <h2>Bienvenido</h2>
                <p>Isntituto Municipal de la Mujer Y la Familia</p>
                <div class="wave-pattern"></div>
            </div>
            
            <!-- Cuerpo del formulario -->
            <div class="login-body">
                <div class="row">
                    <form class="col s12" id="login">
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" class="validate" id="usuario">
                                <label for="usuario" class="teal-text  text-lighten-1 ">Usuario</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="clave" type="password" class="validate">
                                <label for="clave" class="teal-text  text-lighten-1 ">Contraseña</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <button class="btn waves-effect waves-light btn-artistic" type="submit">
                                    Acceder
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
            
        </div>
    </div>
    <script>
        $(document).ready(function(){
            // Efecto de partículas al cargar
            setTimeout(function() {
                for(let i = 0; i < 10; i++) {
                    createParticle();
                }
            }, 500);
            
            function createParticle() {
                const colors = ['#5e35b1', '#9575cd', '#ffab40'];
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.width = Math.random() * 15 + 5 + 'px';
                particle.style.height = particle.style.width;
                particle.style.background = colors[Math.floor(Math.random() * colors.length)];
                particle.style.position = 'absolute';
                particle.style.borderRadius = '50%';
                particle.style.top = Math.random() * 100 + '%';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.opacity = '0.7';
                particle.style.transform = 'scale(0)';
                particle.style.transition = 'all 1.5s ease-out';
                particle.style.zIndex = '1';
                
                document.querySelector('.login-header').appendChild(particle);
                
                setTimeout(() => {
                    particle.style.transform = 'scale(1) translate(' + (Math.random() * 200 - 100) + 'px, ' + (Math.random() * 200 - 100) + 'px)';
                    particle.style.opacity = '0';
                }, 10);
                
                setTimeout(() => {
                    particle.remove();
                }, 1500);
            }
        });
    </script>
        

    </div>

