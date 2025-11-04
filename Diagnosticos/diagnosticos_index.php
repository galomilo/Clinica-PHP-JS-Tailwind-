<?php
//error_reporting(0);
include("../conexion.php");
include("../Shared/funciones.php");

$consulta = "SELECT * FROM diagnostico";
$resultado = mysqli_query($conexion, $consulta);

mysqli_close($conexion);

include('../header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="bg-[#1d2666] mt-[200px] flex items-center text-white px-2 py-2 w-full h-[100px]">
        <!--<input type="text" class="text-black h-[38px] p-3 ml-2 w-full rounded" placeholder="Buscar...">-->
        <a href="/clinica/Diagnosticos/diagnosticos_agregar.php" class="mx-10 bg-indigo-600 p-5 py-2 rounded">Agregar</a>
    </div>

    <table class="w-full">
        <thead class="bg-[#374151] text-white">
            <tr>
                <td class="py-5 p-2 border-r border-gray-800">Id diagnostico</td>
                <td class="py-5 p-2 border-r border-gray-800">Descripcion internacion</td>
                <td class="py-5 p-2 border-r border-gray-800">Diagnostico principal</td>
                <td class="py-5 p-2 border-r border-gray-800">Costo adicional</td>
                <td class="py-5 p-2 border-r border-gray-800">Acciones</td>
            </tr>
        </thead>
        <tbody>
            <?php
            LoadResults($resultado, "diagnosticos");
            ?>
        </tbody>
    </table>
</body>

</html>