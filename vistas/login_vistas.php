
    <div id="main-wrapper" class="row">
        <!-- Elementos decorativos ampliados -->
        <div class="decoration decoration-1"></div>
        <div class="decoration decoration-2"></div>
        <div class="decoration decoration-3"></div>
        <div class="decoration decoration-4"></div>
        
        <div class="container">
            <div class="login-container">
                <!-- Logo -->
                <div class="logo-container">
                    <img src="vistas/plantillas/images/Logo2.png" alt="Logo IMMUFA">
                </div>
                
                <!-- Encabezado -->
                <div class="login-header">
                    <h2>Bienvenido</h2>
                    <p>Instituto Municipal de la Mujer y la Familia</p>
                    <div class="wave-pattern"></div>
                </div>
                
                <!-- Cuerpo del formulario -->
                <div class="login-body">
                    <div class="row">
                        <form class="col s12" id="login">
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="fas fa-user prefix blue-text"></i>
                                    <input type="text" class="validate" id="usuario" required>
                                    <label for="usuario">Usuario</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="fas fa-lock prefix blue-text"></i>
                                    <input id="clave" type="password" class="validate" required>
                                    <label for="clave">Contraseña</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <button class="btn waves-effect waves-light btn-artistic" type="submit">
                                        <i class="fas fa-sign-in-alt left"></i> Acceder
                                    </button>
                                </div>
                            </div>
                            <div class="forgot-password">
                                <a href="#!">¿Olvidaste tu contraseña?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function(){
            // Efecto de partículas al cargar
            setTimeout(function() {
                for(let i = 0; i < 20; i++) {
                    createParticle();
                }
                
                // Crear partículas continuamente
                setInterval(() => {
                    createParticle();
                }, 800);
            }, 500);
            
            function createParticle() {
                const colors = ['#42A5F5', '#1E88E5', '#0D47A1', '#64B5F6'];
                const particle = document.createElement('div');
                particle.className = 'particle';
                const size = Math.random() * 20 + 8;
                particle.style.width = size + 'px';
                particle.style.height = size + 'px';
                particle.style.background = colors[Math.floor(Math.random() * colors.length)];
                particle.style.position = 'absolute';
                particle.style.borderRadius = '50%';
                particle.style.top = Math.random() * 100 + '%';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.opacity = Math.random() * 0.5 + 0.3;
                particle.style.transform = 'scale(0)';
                particle.style.transition = `all ${Math.random() * 2 + 1}s ease-out`;
                particle.style.zIndex = '2';
                particle.style.boxShadow = `0 0 ${size/2}px ${size/4}px rgba(66, 165, 245, 0.3)`;
                
                document.querySelector('#main-wrapper').appendChild(particle);
                
                setTimeout(() => {
                    particle.style.transform = `scale(1) translate(${Math.random() * 300 - 150}px, ${Math.random() * 300 - 150}px)`;
                    particle.style.opacity = '0';
                }, 10);
                
                setTimeout(() => {
                    particle.remove();
                }, 2000);
            }
            
            // Inicializar selects de Materialize
            M.AutoInit();
        });
    </script>
