
<style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
        }
        
        main {
            flex: 1 0 auto;
        }
        
        .hero-section {
            background: linear-gradient(135deg, rgba(13, 72, 161, 0.07) 0%, rgba(21,101,192,0.9) 100%), url('vistas/plantillas/images/IMMUFA.jpg') ;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 90vh;
            width: 100%;
        }
        
        .card-panel.transparent {
            background-color: rgba(0, 0, 0, 0.2) !important;
        }
        
        .divider.blue {
            background-color: #2196f3;
        }
        
        .card.hoverable {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card.hoverable:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 15px rgba(0, 0, 0, 0.2);
        }
        
        .service-card .card-image {
            height: 180px;
            overflow: hidden;
        }
        
        .service-card .card-image img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .service-card:hover .card-image img {
            transform: scale(1.05);
        }
        
        .collapsible-header i {
            margin-right: 10px;
        }
        
        .fixed-action-btn {
            bottom: 45px;
            right: 24px;
        }
        
        .footer-contact-card {
            border-radius: 8px;
            padding: 20px;
        }
        
        .social-btn {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.3s ease;
        }
        
        .social-btn:hover {
            transform: translateY(-5px);
        }
        
        .btn-flat.white-text:hover {
            background-color: rgba(255, 255, 255, 0.1) !important;
        }
        
        @media (max-width: 600px) {
            .hero-section {
                min-height: 80vh;
            }
            
            .hero-content {
                text-align: center;
            }
            
            .hero-buttons {
                flex-direction: column;
            }
            
            .hero-buttons a {
                margin: 10px 0 !important;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation - Elegant Version -->
    <header>
        <nav class="nav-wrapper blue darken-3">
            <div class="container">
                <a href="#" class="brand-logo">
                    <img src="vistas/plantillas/images/Logo2.png" alt="IMMUFA Logo" style="height: 50px; width: auto;">
                </a>
                
                <!-- Mobile menu trigger -->
                <a href="#" data-target="mobile-nav" class="sidenav-trigger">
                <i class="fas fa-bars"></i>
                </a>

                
                <!-- Desktop menu - Elegant version -->
                <ul class="right hide-on-med-and-down">
                    <li><a href="#inicio" class="waves-effect waves-light btn-flat white-text">Inicio</a></li>
                    <li><a href="#mision-vision" class="waves-effect waves-light btn-flat white-text">Misión y Visión</a></li>
                    <li><a href="#servicios" class="waves-effect waves-light btn-flat white-text">Servicios</a></li>
                    <li>
                        <a href="login" class="waves-effect waves-light btn blue lighten-2 z-depth-2 hoverable">
                            <i class="fa fa-user-circle"></i> Iniciar Sesión

                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Mobile Navigation - Elegant Version -->
    <ul class="sidenav" id="mobile-nav">
        <li><a href="#inicio" class="waves-effect blue-text"><i class="fas fa-home"></i> Inicio</a></li>
    <li><a href="#mision-vision" class="waves-effect blue-text"><i class="fas fa-eye"></i> Misión y Visión</a></li>
    <li><a href="#servicios" class="waves-effect blue-text"><i class="fas fa-heart"></i> Servicios</a></li>

        <li><div class="divider"></div></li>
        <li>
        <a href="login" class="waves-effect waves-light btn blue lighten-2 z-depth-2 hoverable">
                         <i class="fa fa-user-circle"></i> Iniciar Sesión

        </a>
        </li>
    </ul>

    <main>
        <!-- Hero Section - Elegant Version -->
        <section id="inicio" class="section valign-wrapper hero-section">
            <div class="container">
                <div class="row">
                    <div class="col s12 m8 l6 hero-content">
                        <div class="card-panel transparent white-text z-depth-0" style="border-left: 4px solid #bbdefb;">
                            <h1 class="white-text" style="font-weight: 300; text-shadow: 0 2px 4px rgba(0,0,0,0.3);">Instituto Municipal de la Mujer y la Familia</h1>
                            <h4 class="blue-text text-lighten-4" style="font-weight: 300;">IMMUFA</h4>
                            <div class="divider" style="margin: 20px 0; background-color: #bbdefb;"></div>
                            <p class="flow-text white-text" style="font-weight: 300;">Protegiendo y empoderando a mujeres y familias de Maturín</p>
                            <div style="margin-top: 40px;" class="hero-buttons">
                                <a href="#servicios" class="btn-large waves-effect waves-light blue lighten-2 z-depth-3 hoverable">
                                <i class="fas fa-info-circle"></i> Conoce Nuestros Servicios
                                </a>
                                <a href="#mision-vision" class="btn-large waves-effect waves-light white blue-text text-darken-2 z-depth-3 hoverable" style="margin-left: 10px;">
                                <i class="fas fa-eye"></i> Nuestra Misión
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mission & Vision Section - Elegant Version -->
        <section id="mision-vision" class="section white">
            <div class="container">
                <div class="row">
                    <div class="col s12 center-align">
                        <h2 class="blue-text text-darken-2" style="font-weight: 300;">
                        <i class="fas fa-star"></i> MISIÓN, VISIÓN Y VALORES
                        </h2>
                        <p class="flow-text grey-text text-darken-1" style="font-weight: 300;">Los pilares fundamentales de nuestra institución</p>
                        <div class="divider blue" style="width: 100px; margin: 20px auto; height: 2px;"></div>
                    </div>
                </div>
                
                <div class="card hoverable z-depth-3">
                    <div class="card-content">
                        <!-- Mission -->
                        <div class="section">
                            <div class="row valign-wrapper">
                                <div class="col s2 m1 center-align">
                                <i class="fas fa-flag fa-4x blue-text text-darken-2"></i>
                                </div>
                                <div class="col s10 m11">
                                    <h4 class="blue-text text-darken-2" style="font-weight: 300;">Misión</h4>
                                    <div class="divider" style="margin: 10px 0 20px 0;"></div>
                                    <blockquote class="flow-text grey-text text-darken-3" style="font-size:1.2em; border-left: 4px solid #2196f3; padding-left: 20px; font-weight: 300;">
                                        Proteger, orientar y asistir a la mujer y a la familia del Municipio Maturín para que tengan una mejor calidad de vida y reciban atención médica específica, asesoría legal y formación en aquellas áreas que se necesiten fortalecer para que exista una parentalidad responsable y un sano clima de desarrollo familiar.
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Vision -->
                        <div class="section">
                            <div class="row valign-wrapper">
                            <div class="col s10 m11">
                                    <h4 class="blue-text text-darken-2" style="font-weight: 300;">Visión</h4>
                                    <div class="divider" style="margin: 10px 0 20px 0;"></div>
                                    <blockquote class="flow-text grey-text text-darken-3" style="font-size:1.2em; border-left: 4px solid #2196f3; padding-left: 20px; font-weight: 300;">
                                        Garantizar el cumplimiento de las políticas, planes, proyectos y programas concebidos dentro de los fines propuestos por el gobierno municipal y
                                         así consolidarse como una institución que brinde protección a la mujer y a la familia en materia de salud y educación.
                                    </blockquote>
                                </div>
                                <div class="col s2 m1 center-align">
                                <i class="fas fa-eye fa-4x  blue-text text-darken-2"></i>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Values -->
                        <div class="section">
                            <div class="row valign-wrapper">
                                <div class="col s2 m1 center-align">
                                <i class="fas fa-heart fa-4x  blue-text text-darken-2"></i>
                                </div>
                                <div class="col s10 m11">
                                    <h4 class="blue-text text-darken-2" style="font-weight: 300;">Valores</h4>
                                    <div class="divider" style="margin: 10px 0 20px 0;"></div>
                                    <p class="flow-text grey-text text-darken-3" style="font-weight: 300;font-size:1.2em;border-left: 4px solid #2196f3;padding-left: 20px;">
                                        IMMUFA se rige por los siguientes valores que regulan los deberes y conductas del personal en el ejercicio de las funciones que desempeñan.
                                    </p>
                                    
                                    <ul class="collapsible popout" style="margin-top: 30px;">
                                        <li>
                                            <div class="collapsible-header"><i class="fas fa-check-circle blue-text"></i>Honestidad</div>
                                            <div class="collapsible-body"><span>Que obliga a toda servidora o servidor público a actuar con probidad y honradez, lo cual excluye cualquier comportamiento en desmedro del interés colectivo.</span></div>
                                        </li>
                                        <li>
                                            <div class="collapsible-header"><i class="fas fa-check-circle blue-text"></i> Equidad</div>
                                            <div class="collapsible-body"><span>La cual obliga a toda servidora o servidor público a actuar, respecto de las personas que demanden o soliciten su servicio, sin ningún tipo de preferencias y sólo en razón del mérito, legalidad, motivaciones objetivas con base al principio constitucional de la no discriminación y sin consideraciones ajenas al fondo del asunto y a la justicia.</span></div>
                                        </li>
                                        <li>
                                            <div class="collapsible-header"><i class="fas fa-check-circle blue-text"></i>Decoro</div>
                                            <div class="collapsible-body"><span>Que impone a toda servidora o servidor público la obligación de exteriorizarse con un lenguaje adecuado y con respeto en la manera de conducirse durante el ejercicio de las funciones y tareas asignadas.</span></div>
                                        </li>
                                        <li>
                                            <div class="collapsible-header"><i class="fas fa-check-circle blue-text"></i>Lealtad</div>
                                            <div class="collapsible-body"><span>Que impone a toda servidora o servidor público la obligación de respetar el ejercicio legítimo de las funciones encomendadas a otras instituciones; de ponderar, en el ejercicio de las funciones propias, la totalidad de los intereses públicos implicados, y la fidelidad, constancia y solidaridad para con el ente u organismo en el cual presta sus servicios.</span></div>
                                        </li>
                                        <li>
                                            <div class="collapsible-header"><i class="fas fa-check-circle blue-text"></i>Vocación de servicio</div>
                                            <div class="collapsible-body"><span>La cual implica que las servidoras o servidores públicos están al servicio de las personas, y en su actuación darán preferencia a los requerimientos de la población y a la satisfacción de sus necesidades, con exclusión de conductas, motivaciones e intereses distintos de los del ente u organismo para el cual presta sus servicios.</span></div>
                                        </li>
                                        <li>
                                            <div class="collapsible-header"><i class="fas fa-check-circle blue-text"></i>Disciplina</div>
                                            <div class="collapsible-body"><span>Que comporta la observancia y estricto cumplimiento del orden legal establecido, por parte de las servidoras o servidores públicos.</span></div>
                                        </li>
                                        <li>
                                            <div class="collapsible-header"><i class="fas fa-check-circle blue-text"></i>Eficacia</div>
                                            <div class="collapsible-body"><span>La cual entraña el deber de toda servidora o servidor público de dar cumplimiento óptimo y en el menor tiempo posible a los objetivos y metas fijados en las normas, planes y compromisos de gestión, bajo la orientación de políticas y estrategias establecidas por los órganos del Poder Público Nacional.</span></div>
                                        </li>
                                        <li>
                                            <div class="collapsible-header"><i class="fas fa-check-circle blue-text"></i>Responsabilidad</div>
                                            <div class="collapsible-body"><span>Que significa disposición y diligencia en el ejercicio de las competencias, funciones y tareas encomendadas, tomar la iniciativa de ofrecerse a realizarlas, así como la permanente disposición a rendir cuentas y a asumir las consecuencias de la conducta, sin excusas de ninguna naturaleza, cuando se requiera o juzgue obligante.</span></div>
                                        </li>
                                        <li>
                                            <div class="collapsible-header"><i class="fas fa-check-circle blue-text"></i>Puntualidad</div>
                                            <div class="collapsible-body"><span>La cual exige de toda servidora o servidor público que los compromisos contraídos y las tareas, encargos y trabajos asignados sean cumplidos eficazmente, dentro de los lapsos establecidos en las normas o los que se haya convenido al efecto.</span></div>
                                        </li>
                                        <li>
                                            <div class="collapsible-header"><i class="fas fa-check-circle blue-text"></i>Transparencia</div>
                                            <div class="collapsible-body"><span>Que exige de toda servidora o servidor público la ejecución diáfana de los actos de servicio y el respeto del derecho de toda persona a conocer la verdad, sin omitirla ni falsearla, en observancia de las garantías establecidas en la Constitución de la República Bolivariana de Venezuela.</span></div>
                                        </li>
                                        <li>
                                            <div class="collapsible-header"><i class="fas fa-check-circle blue-text"></i>Compromiso con el desarrollo</div>
                                            <div class="collapsible-body"><span>Actuar en consonancia y lealtad a la responsabilidad delegada en la implementación del Plan de la Patria 2022-2025, Plan Estratégico Institucional, Plan Operativo Anual Institucional (POAI) y la programación gubernamental.</span></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section - Elegant Version -->
        <section id="servicios" class="section blue-grey lighten-5">
            <div class="container">
                <div class="row">
                    <div class="col s12 center-align">
                        <h2 class="blue-text text-darken-2" style="font-weight: 300;">
                        <i class="fas fa-notes-medical" style="vertical-align: middle;"></i> NUESTROS SERVICIOS
                        </h2>
                        <p class="flow-text grey-text text-darken-1" style="font-weight: 300;">Conoce los servicios que ofrecemos para ti y tu familia</p>
                        <div class="divider blue" style="width: 100px; margin: 20px auto; height: 2px;"></div>
                    </div>
                </div>
                
                <div class="row">
                    <!-- Service 1 -->
                       <?php include_once 'controlador/listarControlador.php';
                       $obj=new listarControlador;
                       echo $obj->listar_especialidades_card2() 
                        ?>
            </div>
        </section>
    </main>

    <!-- Footer - Elegant Version -->
    <footer class="page-footer blue darken-3">
        <div class="container">
            <div class="row">
                <!-- Contact Information -->
                <div class="col s12 m6 l4">
                    <div class="footer-contact-card blue darken-4 z-depth-3">
                        <h5 class="white-text" style="font-weight: 300;">
                        <i class="fas fa-envelope"></i> Contacto
                        </h5>
                        <div class="divider" style="margin: 10px 0; background-color: #bbdefb;"></div>
                        <p class="white-text">
                        <i class="fas fa-map-marker-alt"></i> Dirección: Av. Bolívar, Edificio Municipal, Maturín
                        </p>
                        <p class="white-text">
                        <i class="fas fa-phone"></i> Teléfono: (0291) 642-1122
                        </p>
                        <p class="white-text">
                        <i class="fas fa-envelope"></i> Correo: info@immufa.gob.ve
                        </p>
                    </div>
                </div>
                
                <!-- Business Hours -->
                <div class="col s12 m6 l4">
                    <div class="footer-contact-card blue darken-4 z-depth-3">
                        <h5 class="white-text" style="font-weight: 300;">
                        <i class="fas fa-clock"></i>Horario de atención
                        </h5>
                        <div class="divider" style="margin: 10px 0; background-color: #bbdefb;"></div>
                        <p class="white-text">
                        <i class="fas fa-calendar-day"></i> Lunes a Jueves: 8:00 AM - 4:00 PM
                        </p>
                        <p class="white-text">
                        <i class="fas fa-calendar-day"></i> Viernes : 8:00 AM - 3:00 PM
                        </p>
                        <p class="white-text">
                        <i class="fas fa-ban"></i> Sabado y Domingos: Cerrado
                        </p>
                    </div>
                </div>
                
            </div>
        </div>
        
        <!-- Copyright -->
        <div class="footer-copyright blue darken-4">
            <div class="container center-align">
                <span style="font-weight: 300;">
                    <i class="material-icons tiny">copyright</i> 2022 Universidad Bolivariana de Venezuela - Todos los derechos reservados
                </span>
            </div>
        </div>
    </footer>

    <!-- Floating Action Button - Elegant Version -->
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large blue lighten-2 z-depth-4 hoverable" id="back-to-top">
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
            
            // Collapsible for values
            M.Collapsible.init(document.querySelectorAll('.collapsible'), {});
            
            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;
                    
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        targetElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                        
                        // Close mobile menu if open
                        const sidenav = M.Sidenav.getInstance(document.getElementById('mobile-nav'));
                        if (sidenav && sidenav.isOpen) {
                            sidenav.close();
                        }
                    }
                });
            });
            
            // Back to top button with animation
            const backToTopBtn = document.getElementById('back-to-top');
            backToTopBtn.style.display = 'none';
            
            backToTopBtn.addEventListener('click', function(e) {
                e.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
            
            // Show/hide back to top button based on scroll position
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    backToTopBtn.style.display = 'block';
                    backToTopBtn.classList.add('pulse');
                } else {
                    backToTopBtn.style.display = 'none';
                    backToTopBtn.classList.remove('pulse');
                }
            });
            
            // Parallax effect for hero section
            const heroSection = document.querySelector('#inicio');
            window.addEventListener('scroll', function() {
                const scrollPosition = window.pageYOffset;
                heroSection.style.backgroundPositionY = scrollPosition * 0.5 + 'px';
            });
        });
    </script>
</body>