<!-- Navigation -->
<header>
    <nav class="nav-wrapper blue darken-3">
        <div class="container">
            <a href="#" class="brand-logo">
                <img src="vistas/plantillas/images/Logo2.png" alt="Logo IMMUFA" style="height: 60px; padding: 5px 0;">
            </a>
            
            <!-- Mobile menu trigger -->
            <a href="#" data-target="mobile-nav" class="sidenav-trigger">
                <i class="fas fa-bars"></i>
            </a>
            
            <!-- Desktop menu -->
            <ul class="right hide-on-med-and-down">
                <li><a href="#inicio" class="waves-effect waves-light">Inicio</a></li>
                <li><a href="#mision-vision" class="waves-effect waves-light">Misión y Visión</a></li>
                <li><a href="#servicios" class="waves-effect waves-light">Servicios</a></li>
                <li>
                    <a href="<?php echo SERVERURL?>login" class="waves-effect waves-light btn blue darken-1">
                        Iniciar Sesión
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<!-- Mobile Navigation -->
<ul class="sidenav" id="mobile-nav">
    <li><a href="#inicio" class="waves-effect waves-blue">Inicio</a></li>
    <li><a href="#mision-vision" class="waves-effect waves-blue">Misión y Visión</a></li>
    <li><a href="#servicios" class="waves-effect waves-blue">Servicios</a></li>
    <li><div class="divider"></div></li>
    <li>
        <a href="<?php echo SERVERURL?>login" class="waves-effect waves-light btn blue darken-1">
            Iniciar Sesión
        </a>
    </li>
</ul>

<main>
    <!-- Hero Section -->
    <section id="inicio" class="section white-text" style="background: linear-gradient(180deg, rgba(0, 0, 0, 0.5) 0%, rgba(33, 149, 243, 0.26) 100%), url('vistas/plantillas/images/IMMUFA.jpg');
        background-size: cover;
        background-position: center;
        min-height: 80vh;
        display: flex;
        align-items: center;
        width: 100%;">
        <div class="container">
            <div class="row">
                <div class="col s12 m8 l6">
                    <h1 class="white-text text-shadow">Instituto Municipal de la Mujer y la Familia</h1>
                    <p class="flow-text white-text text-shadow">IMMUFA</p>
                    <a href="#servicios" class="btn-large waves-effect waves-light blue darken-2">
                        <i class="fas fa-info-circle left"></i> Conoce Nuestros Servicios
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision Section - Linear Version -->
    <section id="mision-vision" class="section white">
        <div class="container">
            <h2 class="center-align blue-text text-darken-2">
                <i class="fas fa-bullseye"></i> Misión y Visión
            </h2>
            
            <div class="card hoverable">
                <div class="card-content">
                    <!-- Mission -->
                    <div class="section">
                        <h4 class="blue-text text-darken-2">
                            <i class="fas fa-flag"></i> Misión
                        </h4>
                        <div class="divider"></div>
                        <p class="flow-text">Ser garante de la igualdad jurídica y real de las mujeres como instancia rectora de las políticas públicas con perspectiva de género. Convertirnos en una institución que brinde protección y sea fiadora de los derechos de las mujeres, contenidos en la Constitución de la República Bolivariana de Venezuela.</p>
                        <p class="flow-text">Incorporar a la mujer al acceso real a la justicia y al fortalecimiento del proceso revolucionario socialista en el municipio Independencia.</p>
                    </div>
                    
                    <!-- Vision -->
                    <div class="section">
                        <h4 class="blue-text text-darken-2">
                            <i class="fas fa-eye"></i> Visión
                        </h4>
                        <div class="divider"></div>
                        <p class="flow-text">Ser una institución concebida para proteger, orientar y mejorar la condición de vida, incorporando a la mujer al desarrollo social, político y económico.</p>
                        <p class="flow-text">Ejercer las funciones de formulación, ejecución, dirección, coordinación, supervisión y evaluación de políticas públicas con perspectiva de género, garantizando igualdad de oportunidades.</p>
                    </div>
                    
                    <!-- Creation Date -->
                    <div class="section center-align blue-text text-darken-2">
                        <p class="flow-text">
                            <i class="fas fa-calendar-alt"></i> 
                            <strong>Fecha de creación:</strong> 15 de enero de 2010
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="servicios" class="section blue lighten-5">
        <div class="container">
            <h2 class="center-align blue-text text-darken-2">
                <i class="fas fa-hand-holding-heart"></i> Nuestros Servicios
            </h2>
            
            <div class="row">
                <!-- Service 1 -->
                <div class="col s12 m4">
                    <div class="card hoverable">
                        <div class="card-content">
                            <span class="card-title activator blue-text text-darken-2">
                                <i class="fas fa-stethoscope left"></i>Consulta General
                                <i class="fas fa-ellipsis-v right"></i>
                            </span>
                            <p>Atención médica general para toda la familia.</p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title blue-text text-darken-2">
                                Consulta General
                                <i class="fas fa-times right"></i>
                            </span>
                            <p>Servicio de atención primaria con profesionales calificados para el cuidado de toda la familia.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Service 2 -->
                <div class="col s12 m4">
                    <div class="card hoverable">
                        <div class="card-content">
                            <span class="card-title activator blue-text text-darken-2">
                                <i class="fas fa-baby left"></i>Pediatría
                                <i class="fas fa-ellipsis-v right"></i>
                            </span>
                            <p>Cuidado especializado para los más pequeños.</p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title blue-text text-darken-2">
                                Pediatría
                                <i class="fas fa-times right"></i>
                            </span>
                            <p>Atención especializada en el crecimiento, desarrollo y salud infantil desde el nacimiento hasta la adolescencia.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Service 3 -->
                <div class="col s12 m4">
                    <div class="card hoverable">
                        <div class="card-content">
                            <span class="card-title activator blue-text text-darken-2">
                                <i class="fas fa-female left"></i>Ginecología
                                <i class="fas fa-ellipsis-v right"></i>
                            </span>
                            <p>Atención integral para la salud de la mujer.</p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title blue-text text-darken-2">
                                Ginecología
                                <i class="fas fa-times right"></i>
                            </span>
                            <p>Servicio especializado en la salud reproductiva de la mujer, con enfoque preventivo y de tratamiento.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Footer -->
<footer class="page-footer blue darken-3">
    <div class="container">
        <div class="row">
            <!-- Contact Information -->
            <div class="col s12 m6">
                <h5 class="white-text">
                    <i class="fas fa-address-card"></i> Contacto
                </h5>
                <p class="grey-text text-lighten-4">
                    <i class="fas fa-map-marker-alt left"></i> Dirección: [Dirección completa]
                </p>
                <p class="grey-text text-lighten-4">
                    <i class="fas fa-phone left"></i> Teléfono: [Número de teléfono]
                </p>
                <p class="grey-text text-lighten-4">
                    <i class="fas fa-envelope left"></i> Correo: [Correo electrónico]
                </p>
            </div>
            
            <!-- Business Hours -->
            <div class="col s12 m6">
                <h5 class="white-text">
                    <i class="fas fa-business-time"></i> Horario de atención
                </h5>
                <p class="grey-text text-lighten-4">
                    <i class="fas fa-clock left"></i> Lunes a Viernes: 8:00 AM - 4:00 PM
                </p>
                <p class="grey-text text-lighten-4">
                    <i class="fas fa-clock left"></i> Sábados: 8:00 AM - 12:00 PM
                </p>
            </div>
        </div>
    </div>
    
    <!-- Copyright -->
    <div class="footer-copyright blue darken-4">
        <div class="container center-align">
            <i class="fas fa-copyright"></i> 2024 Instituto Municipal de la Mujer y la Familia - Todos los derechos reservados
        </div>
    </div>
</footer>

<!-- Floating Action Button -->
<div class="fixed-action-btn">
    <a class="btn-floating btn-large blue darken-2" id="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>
</div>

<!-- JavaScript -->
<script>
    // Initialize Materialize components when DOM is loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile sidenav
        M.Sidenav.init(document.querySelectorAll('.sidenav'), {});
        
        // Floating action button
        M.FloatingActionButton.init(document.querySelectorAll('.fixed-action-btn'), {});
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    const sidenav = M.Sidenav.getInstance(document.getElementById('mobile-nav'));
                    if (sidenav.isOpen) {
                        sidenav.close();
                    }
                }
            });
        });
        
        // Back to top button
        document.getElementById('back-to-top').addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        
        // Show/hide back to top button based on scroll position
        window.addEventListener('scroll', function() {
            const backToTopBtn = document.getElementById('back-to-top');
            if (window.pageYOffset > 300) {
                backToTopBtn.style.display = 'block';
            } else {
                backToTopBtn.style.display = 'none';
            }
        });
    });
</script>