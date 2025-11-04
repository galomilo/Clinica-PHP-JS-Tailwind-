<?php 
include("../conexion.php");
include("../Shared/funciones.php");
include("../validaciones.php");

$resultado = [
    'id_consulta' => '',
    'id_diagno' => '',
    'id_pac' => '',
    'monto_total' => '',
    'nivel_urgencia' => ''
];

//
$errores = [];
if ($_POST['crear']) {
    $id_diagno = $_POST['id_diagno'];
    $id_pac = $_POST['id_pac'];
    $monto_total = $_POST['monto_total'];
    $nivel_urgencia = $_POST['nivel_urgencia'];
    
    //ValidarInt($id_diagno, 'id_diagno', $errores);
    //ValidarInt($id_pac, 'id_pac', $errores);
    ValidarInt($monto_total, 'monto_total', $errores);
    ValidarString($nivel_urgencia, 'nivel_urgencia', $errores);

    if (empty($errores)) {
        $insertar = "INSERT INTO consulta (id_diagno, id_pac, monto_total, nivel_urgencia) VALUES ('$id_diagno', '$id_pac', '$monto_total', '$nivel_urgencia');";
        $resultado = mysqli_query($conexion, $insertar);
    }

    if ($resultado && empty($errores)) {
        header('Location: consultas_agregar.php?msg=agregado');
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
    <form class="mt-[150px] p-5 flex flex-col" method="post" action="consultas_agregar.php">
        <span class="text-[#98a3f3] text-5xl pacifico-regular">Consultas</span>
        <?php CreateForm($resultado, $errores); ?>

        <input type="submit" name="crear" value="Crear" class="fixed bottom-0 left-1/2 -translate-x-1/2 text-white mx-10 bg-indigo-600 px-10 py-3 rounded-t-md cursor-pointer hover:bg-blue-800 transition">
    </form>

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'agregado'): ?>
        <script>alert('Agregado correctamente');</script>
    <?php endif; ?>
</body>
</html>