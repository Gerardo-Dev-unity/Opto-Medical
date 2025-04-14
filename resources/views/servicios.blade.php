<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Servicios | Opto-Medical</title>
  <link rel="stylesheet" href="{{ asset('css/servicios.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Playfair+Display:wght@500;700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Header con menú -->
  <header class="main-header">
    <div class="container">
      <div class="logo">
        <a href="/">OPTO-MEDICAL</a>
      </div>
      <nav class="main-nav">
        <ul>
          <li><a href="/">Inicio</a></li>
          <li><a href="/servicios">Servicios</a></li>
          <li><a href="/nosotros">Nosotros</a></li>
          <li><a href="/contacto">Contacto</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <!-- Hero -->
  <section class="servicios-hero">
    <div class="overlay">
      <h1 class="title">Nuestros Servicios</h1>
      <p class="subtitle">Combinamos salud, estética y bienestar en un solo lugar.</p>
    </div>
  </section>

  <!-- Slider de Servicios -->
  <section class="servicios-slider">
    <h2 class="slider-heading">Explora nuestros servicios</h2>
    <div class="slider-container">
      <div class="slider-item">
        <img src="/img/slider-consulta.png" alt="Consulta médica">
        <p>Consulta médica</p>
      </div>
      <div class="slider-item">
        <img src="/img/slider-vista.png" alt="Examen de la vista">
        <p>Examen de la vista</p>
      </div>
      <div class="slider-item">
        <img src="/img/slider-lentes.png" alt="Adaptación de lentes">
        <p>Adaptación de lentes</p>
      </div>
      <div class="slider-item">
        <img src="/img/slider-botox.png" alt="Aplicación de bótox">
        <p>Aplicación de bótox</p>
      </div>
      <div class="slider-item">
        <img src="/img/slider-podologia.png" alt="Podología">
        <p>Podología</p>
      </div>
      <div class="slider-item">
        <img src="/img/slider-escleroterapia.png" alt="Escleroterapia">
        <p>Escleroterapia</p>
      </div>
    </div>
  </section>

  <!-- Detalles de Servicios -->
  <section class="servicio-detalle">
    <div class="servicio fila">
      <img src="/img/detalle-consulta.png" alt="Consulta médica">
      <div class="info">
        <h2>Consulta médica</h2>
        <p>Evaluaciones generales para tu salud con enfoque humano y profesional. Ideal para chequeos regulares o atenciones específicas.</p>
      </div>
    </div>

    <div class="servicio fila invertida">
      <img src="/img/detalle-vista.png" alt="Examen de la vista">
      <div class="info">
        <h2>Examen de la vista</h2>
        <p>Pruebas precisas realizadas por optometristas certificados para detectar y corregir cualquier problema visual.</p>
      </div>
    </div>

    <div class="servicio fila">
      <img src="/img/detalle-lentes.png" alt="Adaptación de lentes">
      <div class="info">
        <h2>Adaptación de lentes</h2>
        <p>Seleccionamos y adaptamos el tipo de lente que más se ajusta a tu necesidad visual y estilo de vida.</p>
      </div>
    </div>

    <div class="servicio fila invertida">
      <img src="/img/detalle-botox.png" alt="Aplicación de bótox">
      <div class="info">
        <h2>Aplicación de bótox</h2>
        <p>Tratamiento estético seguro para suavizar líneas de expresión y realzar tu belleza de forma natural.</p>
      </div>
    </div>

    <div class="servicio fila">
      <img src="/img/detalle-podologia.png" alt="Podología">
      <div class="info">
        <h2>Podología</h2>
        <p>Cuidado integral de tus pies con tratamientos preventivos y correctivos, realizados por profesionales certificados.</p>
      </div>
    </div>

    <div class="servicio fila invertida">
      <img src="/img/detalle-escleroterapia.png" alt="Escleroterapia">
      <div class="info">
        <h2>Escleroterapia</h2>
        <p>Tratamiento eficaz para eliminar várices pequeñas con técnicas mínimamente invasivas y resultados visibles.</p>
      </div>
    </div>
  </section>
</body>
</html>
