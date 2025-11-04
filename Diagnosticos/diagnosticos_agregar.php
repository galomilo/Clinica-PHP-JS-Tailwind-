<?php 
include("../conexion.php");
include("../Shared/funciones.php");
include("../validaciones.php");

$resultado = [
    'id_diagno' => '',
    'descri_internacion' => '',
    'diagnostico_principal' => '',
    'costo_adicional' => '',
];

//
$errores = [];
if ($_POST['crear']) {
    $descri_internacion = $_POST['descri_internacion'];
    $diagnostico_principal = $_POST['diagnostico_principal'];
    $costo_adicional = $_POST['costo_adicional'];

    ValidarString($descri_internacion, 'descri_internacion', $errores);
    ValidarString($diagnostico_principal, 'diagnostico_principal', $errores);
    ValidarInt($costo_adicional, 'costo_adicional', $errores);

    if (empty($errores)) {
        $insertar = "INSERT INTO diagnostico (descri_internacion, diagnostico_principal, costo_adicional) VALUES ('$descri_internacion', '$diagnostico_principal', '$costo_adicional');";
        $resultado = mysqli_query($conexion, $insertar);
    }

    if ($resultado && empty($errores)) {
        header('Location: diagnosticos_agregar.php?msg=agregado');
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
    <form class="mt-[150px] p-5 flex flex-col" method="post" action="diagnosticos_agregar.php">
        <span class="text-[#98a3f3] text-5xl pacifico-regular">Diagnosticos</span>
        <?php CreateForm($resultado, $errores); ?>

        <input type="submit" name="crear" value="Crear" class="fixed bottom-0 left-1/2 -translate-x-1/2 text-white mx-10 bg-indigo-600 p-10 py-3 rounded-t-md cursor-pointer hover:bg-blue-800 transition">
    </form>

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'agregado'): ?>
        <script>alert('Agregado correctamente');</script>
    <?php endif; ?>
</body>
</html>