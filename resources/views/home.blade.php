<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | Opto-Medical</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>
    <!-- Hero Principal -->
    <section class="hero-full">
        <header class="hero-header">
            <img src="/img/logo-opto.png" alt="Opto-Medical Logo" class="hero-logo">
            <nav class="hero-nav">
                <a href="/agendar">Agendar</a>
                <a href="/servicios">Servicios</a>
                <a href="#nosotros">Nosotros</a>
                <a href="#contacto">Contacto</a>
            </nav>
        </header>
        <div class="hero-overlay">
            <div class="hero-left">
                <p class="hero-subtitle">CUIDA TU SALUD VISUAL Y ESTÉTICA</p>
                <h1 class="hero-title">Transformamos tu mirada y bienestar</h1>
                <div class="hero-buttons">
                    <a href="/agendar" class="btn-primary">Agendar cita</a>
                    <a href="#nosotros" class="btn-secondary">Conócenos</a>
                </div>
            </div>
            <div class="hero-right">
                <img src="/img/Hero.png" alt="Hero Visual" class="hero-image">
            </div>
        </div>
    </section>

    <!-- Servicios destacados -->
    <section id="servicios" class="services-section">
        <h2 class="section-title">Nuestros Servicios</h2>
        <div class="services-grid">
            <div class="service-box">
                <img src="/img/servicio1.png" alt="Consulta médica">
                <div class="service-info">
                    <h3>Consulta médica</h3>
                </div>
            </div>
            <div class="service-box">
                <img src="/img/servicio2.png" alt="Examen de la vista">
                <div class="service-info">
                    <h3>Examen de la vista</h3>
                </div>
            </div>
            <div class="service-box">
                <img src="/img/servicio3.png" alt="Adaptación de lentes">
                <div class="service-info">
                    <h3>Adaptación de lentes</h3>
                </div>
            </div>
            <div class="service-box">
                <img src="/img/servicio4.png" alt="Aplicación de botox">
                <div class="service-info">
                    <h3>Aplicación de botox</h3>
                </div>
            </div>
            <div class="service-box">
                <img src="/img/servicio5.png" alt="Podología">
                <div class="service-info">
                    <h3>Podología</h3>
                </div>
            </div>
            <div class="service-box">
                <img src="/img/servicio6.png" alt="Escleroterapia">
                <div class="service-info">
                    <h3>Escleroterapia</h3>
                </div>
            </div>
        </div>
    </section>

    <section id="nosotros" class="nosotros-section">
    <div class="nosotros-container">
        <div class="nosotros-texto">
            <h2>Nosotros</h2>
            <p>
                En Opto-Medical nos especializamos en ofrecer atención médica integral y personalizada en un solo lugar. Nuestro equipo de profesionales está comprometido con tu salud visual, estética y general, utilizando tecnología moderna y trato humano.
            </p>
            <ul>
                <li><strong>Compromiso:</strong> Atención de calidad y profesionalismo.</li>
                <li><strong>Experiencia:</strong> Años de trayectoria en salud y bienestar.</li>
            </ul>
        </div>
        <div class="nosotros-imagen">
            <img src="/img/nosotros.png" alt="Equipo médico Opto-Medical">
        </div>
    </div>
</section>

<section id="contacto" class="contacto-section">
    <div class="contacto-header">
        <h2>Contáctanos</h2>
        <p>¿Tienes dudas o necesitas más información? Escríbenos o agenda tu cita fácilmente.</p>
    </div>

    <div class="contacto-contenido">
        <div class="contacto-info">
            <h3>Ponte en contacto</h3>
            <p>Estamos aquí para ayudarte con cualquier duda sobre nuestros servicios médicos, ópticos o estéticos.</p>
            <ul>
                <li><strong>Dirección:</strong> Calle Salud y Vida 123, GDL, México</li>
                <li><strong>Teléfono:</strong> +52 33 1234 5678</li>
                <li><strong>Email:</strong> contacto@optomedical.mx</li>
            </ul>
            <div class="social-links">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
            </div>
            <a href="/agendar" class="btn-agendar">Agendar Cita</a>
        </div>

        <div class="contacto-formulario">
            <form>
                <input type="text" placeholder="Nombre completo" required>
                <input type="email" placeholder="Correo electrónico" required>
                <textarea placeholder="Escribe tu mensaje..." rows="5" required></textarea>
                <button type="submit">Enviar mensaje</button>
            </form>
        </div>
    </div>

    <div class="contacto-mapa">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3734.552997568154!2d-103.29786362316442!3d20.60630450215126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b313feb9a519%3A0xb4f5ee466866f64e!2sEl%20Refugio%20residencial!5e0!3m2!1ses!2smx!4v1744589250197!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

</body>
</html>