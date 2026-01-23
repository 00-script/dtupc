<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Todos los Productos | De Todo Un Poco</title>
  <link rel="stylesheet" href="../estilos/estilos.css">
</head>
<body>
  <header>
    <h1>Catálogo Completo</h1>
    <a href="index.php">⬅ Volver</a>
  </header>

  <br>
  <div id="contenedor-productos"></div>

  <script>
    async function cargarSecciones() {
      const archivos = ['varios.html', 'fiesta.html', 'hogar.html', 'papeleria.html', 'regalos.html', 'tecnologia.html'];
      const contenedor = document.getElementById('contenedor-productos');

      for (const archivo of archivos) {
        try {
          const respuesta = await fetch(archivo);
          const texto = await respuesta.text();
          
          const parser = new DOMParser();
          const doc = parser.parseFromString(texto, 'text/html');
          

          const seccion = doc.querySelector('.productos');
          
          if (seccion) {
            const titulo = document.createElement('h2');
            titulo.textContent = archivo.replace('.html', '').toUpperCase();
            contenedor.appendChild(titulo);
            
            contenedor.appendChild(seccion.cloneNode(true));
          }
        } catch (error) {
          console.error("Error cargando " + archivo, error);
        }
      }
    }

    cargarSecciones();
  </script>
  <?php
// Activar todos los errores para ver qué pasa (solo para pruebas)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Todos los Productos | De Todo Un Poco</title>
  <link rel="stylesheet" href="../estilos/estilos.css">
</head>
<body>

<header>
  <h1>Catálogo Completo</h1>
  <a href="index.php">⬅ Volver</a>
</header>

<?php

$categorias = [
    'hogar'      => 'Hogar',
    'fiesta'     => 'Fiesta y Eventos',
    'tecnologia' => 'Tecnología',
    'papeleria'  => 'Papelería',
    'regalos'    => 'Regalos',
    'varios'     => 'Varios'
];

echo "<pre style='background:#f8f8f8; padding:15px; border:1px solid #ccc;'>";
echo "Ruta base del script: " . realpath(__DIR__) . "\n";
echo "Directorio esperado de imagenes: " . realpath(__DIR__ . '/../imagenes/') . "\n\n";

$hayAlgo = false;

foreach ($categorias as $cat => $titulo) {
    $dir = __DIR__ . '/../imagenes/' . $cat . '/';
    $rutaRelativa = '../imagenes/' . $cat . '/';

    echo "Comprobando categoría: $titulo\n";
    echo "   Ruta absoluta: $dir\n";

    if (!is_dir($dir)) {
        echo "   → La carpeta NO existe\n\n";
        continue;
    }

    $archivos = glob($dir . "*.{jpg,jpeg,png,JPG,JPEG,PNG}", GLOB_BRACE);

    echo "   Archivos encontrados: " . count($archivos) . "\n";
    if (!empty($archivos)) {
        foreach ($archivos as $img) {
            echo "      - " . basename($img) . "\n";
        }
    } else {
        echo "   → No hay imágenes (jpg/jpeg/png)\n";
    }
    echo "\n";

    if (!empty($archivos)) {
        $hayAlgo = true;
        echo "<h2>$titulo</h2>";
        echo '<section class="productos">';

        foreach ($archivos as $img) {
            $nombre = pathinfo($img, PATHINFO_FILENAME);
            $nombreLimpio = preg_replace('/^\d+_/', '', $nombre);
            $nombreLimpio = str_replace('_', ' ', $nombreLimpio);

            echo '<div class="producto">';
            echo '<img src="' . $rutaRelativa . basename($img) . '" alt="' . htmlspecialchars($nombreLimpio) . '">';
            echo '<p>' . htmlspecialchars(ucwords($nombreLimpio)) . '</p>';
            echo '</div>';
        }
        echo '</section>';
    }
}

if (!$hayAlgo) {
    echo '<p style="text-align:center; font-size:1.2rem; margin:40px 0; color:#555;">
          No se encontraron productos en ninguna categoría.<br>
          <small>Sube imágenes desde el panel admin/subir.php y asegúrate de que queden en las carpetas correctas.</small>
          </p>';
}

echo "</pre>";
?>

</body>
</html>
</body>
</html>
