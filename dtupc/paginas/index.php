<!DOCTYPE >
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>De Todo Un Poco | Tienda</title>
  <style>
    :root {
      --amarillo: #FFFF00;
      --negro: #000000;
      --blanco: #ffffff;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: Arial, Helvetica, sans-serif;
    }

    body {
      background-color: var(--blanco);
      color: var(--negro);
    }

    header {
      background-color: var(--amarillo);
      padding: 20px;
      display: flex;
      align-items: center;
      gap: 20px;
    }

    header img {
      width: 90px;
      height: auto;
    }

    header h1 {
      font-size: 2rem;
      font-weight: 800;
    }

    nav {
      background-color: var(--negro);
      padding: 10px 20px;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
    }

    nav a {
      color: var(--amarillo);
      text-decoration: none;
      font-weight: bold;
    }

    .hero {
      padding: 60px 20px;
      text-align: center;
      background: linear-gradient(135deg, var(--amarillo), #fff200);
    }

    .hero h2 {
      font-size: 2.4rem;
      margin-bottom: 15px;
    }

    .hero p {
      font-size: 1.1rem;
      max-width: 700px;
      margin: 0 auto;
    }

    .categorias {
      padding: 50px 20px;
      max-width: 1200px;
      margin: auto;
    }

    .categorias h3 {
      text-align: center;
      font-size: 2rem;
      margin-bottom: 40px;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 25px;
    }

    .card {
      border: 2px solid var(--amarillo);
      padding: 25px;
      border-radius: 12px;
      background-color: var(--blanco);
      text-align: center;
      transition: transform 0.2s, box-shadow 0.2s;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
    .card,
    .card:visited,
    .card:hover,
    .card:active {
      color: black;
      text-decoration: none;
    }

    .card h4 {
      margin-bottom: 10px;
      font-size: 1.3rem;
    }

    .card p {
      font-size: 0.95rem;
    }

    .cta {
      margin-top: 50px;
      text-align: center;
    }

    .cta button {
      background-color: var(--negro);
      color: var(--amarillo);
      border: none;
      padding: 15px 30px;
      font-size: 1rem;
      font-weight: bold;
      border-radius: 30px;
      cursor: pointer;
    }

    footer {
      margin-top: 60px;
      background-color: var(--negro);
      color: var(--amarillo);
      text-align: center;
      padding: 20px;
    }
  </style>
</head>
<body>
  
  <header >
    <img src="../imagenes/logo.png" alt="Logo De Todo Un Poco" />
    <h1>De Todo Un Poco</h1>
  </header>

  <nav>
    <ul>
      <li><a href="#">Inicio</a></li>
      <li><a href="https://maps.app.goo.gl/bzjs8RqMNP9nsyPX7">Tienda</a></li>
      <li><a href="#">Ofertas</a></li>
      <li><a href="#">Contacto</a></li>
    </ul>
  </nav>

  <section class="hero">
    <h2>La tienda donde encuentras de todo</h2>
    <p>
      Regalos, hogar, tecnología, papelería, artículos curiosos y mucho más.
      Si existe, probablemente lo tengamos.
    </p>
  </section>

  <section class="categorias">
    <h3>Categorías Destacadas</h3>
    <div class="grid">
      <a href="hogar.php" class="card">
        <h4>Hogar</h4>
        <p>Decoración, cocina, organización y utilidades.</p>
      </a>
      <a href="tecnologia.php" class="card">
        <h4>Tecnología</h4>
        <p>Accesorios, gadgets y cosas útiles para el día a día.</p>
      </a>
      <a href="regalos.php" class="card">
        <h4>Regalos</h4>
        <p>Ideas originales para sorprender a cualquiera.</p>
      </a>
      <a href="papeleria.php" class="card">
        <h4>Papelería</h4>
        <p>Material escolar, oficina y creatividad.</p>
      </a>
      <a href="fiesta.php" class="card">
        <h4>Fiesta y Eventos</h4>
        <p>Decoración, globos y artículos para celebraciones.</p>
      </a>
      <a href="varios.php" class="card">
        <h4>Varios</h4>
        <p>Porque aquí cabe absolutamente de todo</p>
      </a>
    </div>

    <div class="cta">
      <a href="todos.php">
      <button>Ver todos los productos</button>
      </a>
    </div>
  </section>

  <footer>
    <p>© 2026 De Todo Un Poco · Tu tienda de confianza</p>
  </footer>

</body>
</html>
