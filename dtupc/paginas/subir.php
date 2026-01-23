<?php
// subir.php - Panel básico de administración

$mensaje = "";
$carpetaDestino = "";

$categorias = [
    'hogar'     => 'Hogar',
    'fiesta'    => 'Fiesta y Eventos',
    'tecnologia'=> 'Tecnología',
    'papeleria' => 'Papelería',
    'regalos'   => 'Regalos',
    'varios'    => 'Varios'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['imagen'])) {
    $titulo   = trim($_POST['titulo'] ?? 'Sin título');
    $categoria = $_POST['categoria'] ?? '';

    if (!array_key_exists($categoria, $categorias)) {
        $mensaje = "Categoría no válida.";
    } else {
        $carpetaDestino = "../imagenes/$categoria/";
        if (!is_dir($carpetaDestino)) {
            mkdir($carpetaDestino, 0755, true);
        }

        $extension = strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
        $permitidos = ['jpg', 'jpeg', 'png'];

        if (!in_array($extension, $permitidos)) {
            $mensaje = "Solo se permiten JPG, JPEG y PNG.";
        } elseif ($_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {
            $mensaje = "Error al subir el archivo.";
        } else {
            // Nombre limpio y único
            $nombreSeguro = preg_replace('/[^a-zA-Z0-9-_]/', '_', $titulo);
            $nombreArchivo = time() . '_' . $nombreSeguro . '.' . $extension;
            $rutaFinal = $carpetaDestino . $nombreArchivo;

            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaFinal)) {
                $mensaje = "¡Imagen subida con éxito a $categorias[$categoria]!<br>";
                $mensaje .= "<strong>$titulo</strong><br>";
                $mensaje .= "<img src='$rutaFinal' style='max-width:300px; margin:15px 0;'>";
            } else {
                $mensaje = "No se pudo guardar la imagen (permisos?).";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Subir producto - De Todo Un Poco</title>
  <link rel="stylesheet" href="../estilos/estilos.css">
  <style>
    .form-container { max-width: 500px; margin: 40px auto; padding: 25px; border: 2px solid var(--amarillo); border-radius: 12px; }
    label { display: block; margin: 12px 0 6px; font-weight: bold; }
    input, select, button { width: 100%; padding: 10px; margin-bottom: 12px; }
    button { background: var(--amarillo); color: black; font-weight: bold; border: none; cursor: pointer; }
    .mensaje { padding: 15px; margin: 20px 0; border-radius: 8px; }
    .exito  { background: #d4edda; color: #155724; }
    .error  { background: #f8d7da; color: #721c24; }
  </style>
</head>
<body>

<header>
  <h1>Panel de Subida</h1>
  <a href="../index.php">← Volver a la tienda</a>
</header>

<div class="form-container">
  <?php if ($mensaje): ?>
    <div class="mensaje <?= strpos($mensaje, 'éxito') !== false ? 'exito' : 'error' ?>">
      <?= $mensaje ?>
    </div>
  <?php endif; ?>

  <form action="" method="post" enctype="multipart/form-data">
    <label for="titulo">Nombre / Título del producto:</label>
    <input type="text" name="titulo" id="titulo" required placeholder="Ej: Lampara LED colorida">

    <label for="categoria">Categoría:</label>
    <select name="categoria" id="categoria" required>
      <option value="">Selecciona una categoría</option>
      <?php foreach ($categorias as $key => $nombre): ?>
        <option value="<?= $key ?>"><?= $nombre ?></option>
      <?php endforeach; ?>
    </select>

    <label for="imagen">Imagen (jpg, jpeg, png):</label>
    <input type="file" name="imagen" id="imagen" accept="image/jpeg,image/png" required>

    <button type="submit">Subir Producto</button>
  </form>
</div>

</body>
</html>