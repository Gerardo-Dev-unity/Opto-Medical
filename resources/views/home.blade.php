<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | Opto-Medical</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Nunito:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Hero Principal Pantalla Completa -->
    <section class="hero-full">
        <header class="hero-header">
            <img src="/img/logo-opto.png" alt="Opto-Medical Logo" class="hero-logo">
            <nav class="hero-nav">
                <a href="/agendar">Agendar</a>
                <a href="#servicios">Servicios</a>
                <a href="#nosotros">Nosotros</a>
                <a href="#contacto">Contacto</a>
            </nav>
        </header>
        <div class="hero-overlay">
            <div class="hero-left">
                <h1 class="hero-headline">Bienestar que se siente y se ve.</h1>
                <p class="hero-description">Tu clínica y óptica de confianza con los mejores profesionales en la salud. Sentirte y verte bien es nuestra prioridad.</p>
            </div>
            <div class="hero-right">
                <p class="cta-message">Agenda tu cita fácil y rápido para evitar esperas prolongadas.</p>
                <a href="/agendar" class="cta-button">Agendar cita</a>
            </div>
        </div>
    </section>

    <!-- Por qué elegirnos -->
    <section class="why-us">
        <div class="why-us-content">
            <div class="text">
                <h2>¿Por qué elegirnos?</h2>
                <p>
                    Brindamos atención integral, con tecnología moderna y trato humano. Nuestro equipo está capacitado para atender desde
                    consultas generales hasta procedimientos estéticos y exámenes visuales.
                </p>
                <a href="#">Conócenos & Galería</a>
            </div>
            <div class="image-placeholder">[Aquí va imagen del equipo médico]</div>
        </div>
    </section>

    <!-- Nuestros valores -->
    <section class="features">
        <h3>Nos destacamos por:</h3>
        <div class="features-grid">
            <div class="feature"><div class="icon-placeholder"></div><h4>Confianza</h4><p>Pacientes satisfechos nos recomiendan.</p></div>
            <div class="feature"><div class="icon-placeholder"></div><h4>Rapidez</h4><p>Agenda fácil, sin filas ni esperas.</p></div>
            <div class="feature"><div class="icon-placeholder"></div><h4>Innovación</h4><p>Equipos de última generación.</p></div>
            <div class="feature"><div class="icon-placeholder"></div><h4>Especialistas</h4><p>Atención profesional en cada servicio.</p></div>
        </div>
    </section>

    <!-- Servicios con tarjetas -->
    <section id="servicios" class="services">
        <h3>Nuestros Servicios</h3>
        <div class="services-grid">
            <div class="service-card">
                <h4>Consulta General</h4>
                <p>Diagnóstico y tratamiento médico básico.</p>
            </div>
            <div class="service-card">
                <h4>Estética Médica</h4>
                <p>Aplicación de botox, rejuvenecimiento facial, eliminación de várices.</p>
            </div>
            <div class="service-card">
                <h4>Óptica</h4>
                <p>Lentes, exámenes visuales, salud ocular preventiva.</p>
            </div>
        </div>
    </section>

    <footer>
        <p>© 2025 Opto-Medical. Todos los derechos reservados.</p>
    </footer>
</body>
</html>