<?php 
include("../conexion.php");
include("../Shared/funciones.php");
include("../validaciones.php");

$id = intval($_GET['id']);

$consulta = "SELECT * FROM paciente WHERE id_pac = $id;";
$resultado = mysqli_query($conexion, $consulta);

//
$errores = [];
if ($_POST['editar']) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $id_diagno = $_POST['id_diagno'];
    $foto = $_POST['foto'];
    $obra_social = $_POST['obra_social'];

    ValidarString($nombre, 'nombre', $errores);
    ValidarString($apellido, 'apellido', $errores);
    ValidarInt($id_diagno, 'id_diagno', $errores);
    //ValidarString($foto, 'foto', $errores);
    ValidarString($obra_social, 'obra_social', $errores);

    if (empty($errores)) {
        $editar = "UPDATE paciente 
        SET nombre = '$nombre', 
            apellido = '$apellido', 
            id_diagno = '$id_diagno', 
            foto = '$foto', 
            obra_social = '$obra_social'
        WHERE id_pac = $id;";
        $resultado = mysqli_query($conexion, $editar);
    }

    if ($resultado && empty($errores)) {
        header('Location: pacientes_index.php');
        exit;
    } else {
        echo "Error al editar: " . mysqli_error($conexion);
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
    <form class="mt-[150px] p-5 flex flex-col" method="post">
        <span class="text-[#98a3f3] text-5xl pacifico-regular">Pacientes</span>
        <?php CreateEditForm($resultado, $id, $errores); ?>

        <input type="submit" name="editar" value="Editar" class="fixed bottom-0 left-1/2 -translate-x-1/2 text-white mx-10 bg-indigo-600 p-10 py-3 rounded-t-md cursor-pointer hover:bg-blue-800 transition">
    </form>
</body>
</html>