<?php 
include("../conexion.php");
include("../Shared/funciones.php");
include("../validaciones.php");
    
$id = intval($_GET['id']);

$consulta = "SELECT * FROM diagnostico WHERE id_diagno = $id;";
$resultado = mysqli_query($conexion, $consulta);

//
$errores = [];
if ($_POST['editar']) {
    $descri_internacion = $_POST['descri_internacion'];
    $diagnostico_principal = $_POST['diagnostico_principal'];
    $costo_adicional = $_POST['costo_adicional'];

    ValidarString($descri_internacion, 'descri_internacion', $errores);
    ValidarString($diagnostico_principal, 'diagnostico_principal', $errores);
    ValidarInt($costo_adicional, 'costo_adicional', $errores);

    if (empty($errores)) {
        $editar = "UPDATE diagnostico 
        SET descri_internacion = '$descri_internacion', 
            diagnostico_principal = '$diagnostico_principal', 
            costo_adicional = '$costo_adicional'
        WHERE id_diagno = $id;";
        $resultado = mysqli_query($conexion, $editar);
    }

    if ($resultado && empty($errores)) {
        header('Location: diagnosticos_index.php');
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
        <span class="text-[#98a3f3] text-5xl pacifico-regular">Diagnosticos</span>
        <?php CreateEditForm($resultado, $id, $errores); ?>

        <input type="submit" name="editar" value="Editar" class="fixed bottom-0 left-1/2 -translate-x-1/2 text-white mx-10 bg-indigo-600 p-10 py-3 rounded-t-md cursor-pointer hover:bg-blue-800 transition">
    </form>
</body>
</html>