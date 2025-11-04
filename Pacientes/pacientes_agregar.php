<?php 
include("../conexion.php");
include("../Shared/funciones.php");
include("../validaciones.php");

$resultado = [
    'id_pac' => '',
    'nombre' => '',
    'apellido' => '',
    'id_diagno' => '',
    'foto' => '',
    'obra_social' => ''
];

//
$errores = [];
if ($_POST['crear']) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $id_diagno = $_POST['id_diagno'];
    //$foto = $_POST['foto'];
    $obra_social = $_POST['obra_social'];

    ValidarString($nombre, 'nombre', $errores);
    ValidarString($apellido, 'apellido', $errores);
    //ValidarInt($id_diagno, 'id_diagno', $errores);
    //ValidarString($foto, 'foto', $errores);
    ValidarString($obra_social, 'obra_social', $errores);

    $nombreArchivoFinal = null;
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $tmp = $_FILES['foto']['tmp_name'];
        $nombreOriginal = basename($_FILES['foto']['name']);
        $ext = strtolower(pathinfo($nombreOriginal, PATHINFO_EXTENSION));

        $ext_permitidas = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($ext, $ext_permitidas)) {
            $errores['foto'] = "Solo se permiten imágenes JPG, PNG o GIF.";
        } else {
            // crear un nombre único
            $nombreArchivoFinal = uniqid('pac_') . '.' . $ext;
            $rutaDestino = "../uploads/pacientes/" . $nombreArchivoFinal;

            // guardar archivo físicamente
            move_uploaded_file($tmp, $rutaDestino);
        }
    }

    if (empty($errores)) {
        $insertar = "INSERT INTO paciente (nombre, apellido, id_diagno, foto, obra_social) VALUES ('$nombre', '$apellido', '$id_diagno', '$nombreArchivoFinal', '$obra_social');";
        $resultado = mysqli_query($conexion, $insertar);
    }

    if ($resultado && empty($errores)) {
        header('Location: pacientes_agregar.php?msg=agregado');
        exit;
    } else {
        echo "Error al insertar: " . mysqli_error($conexion);
    }
}
//

include('../header.php');
mysqli_close($conexion);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form class="mt-[150px] p-5 flex flex-col" enctype="multipart/form-data" method="post" action="pacientes_agregar.php">
        <span class="text-[#98a3f3] text-5xl pacifico-regular">Pacientes</span>
        <?php CreateForm($resultado, $errores); ?>

        <input type="submit" name="crear" value="Crear" class="fixed bottom-0 left-1/2 -translate-x-1/2 text-white mx-10 bg-indigo-600 p-10 py-3 rounded-t-md cursor-pointer hover:bg-blue-800 transition">
    </form>

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'agregado'): ?>
        <script>alert('Agregado correctamente');</script>
    <?php endif; ?>
</body>
</html>