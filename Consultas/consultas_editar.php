<?php 
include("../conexion.php");
include("../Shared/funciones.php");
include("../validaciones.php");

$id = intval($_GET['id']);

$consulta = "SELECT * FROM consulta WHERE id_consulta = $id;";
$resultado = mysqli_query($conexion, $consulta);

//
$errores = [];
if ($_POST['editar']) {
    $id_diagno = $_POST['id_diagno'];
    $id_pac = $_POST['id_pac'];
    $monto_total = $_POST['monto_total'];
    $nivel_urgencia = $_POST['nivel_urgencia'];

    ValidarInt($id_diagno, 'id_diagno', $errores);
    ValidarInt($id_pac, 'id_pac', $errores);
    ValidarInt($monto_total, 'monto_total', $errores);
    ValidarString($nivel_urgencia, 'nivel_urgencia', $errores);

    if (empty($errores)) {
        $editar = "UPDATE consulta  
        SET id_diagno = '$id_diagno', 
            id_pac = '$id_pac', 
            monto_total = '$monto_total', 
            nivel_urgencia = '$nivel_urgencia'
        WHERE id_consulta = $id;";    
        $resultado = mysqli_query($conexion, $editar);
    }

    if ($resultado && empty($errores)) {
        header('Location: consultas_index.php');
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
        <span class="text-[#98a3f3] text-5xl pacifico-regular">Consultas</span>
        <?php CreateEditForm($resultado, $id, $errores); ?>

        <input type="submit" name="editar" value="Editar" class="fixed bottom-0 left-1/2 -translate-x-1/2 text-white mx-10 bg-indigo-600 px-10 py-3 rounded-t-md cursor-pointer hover:bg-blue-800 transition">
    </form>
</body>
</html>