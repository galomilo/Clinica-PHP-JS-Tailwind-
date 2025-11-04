<?php
//error_reporting(0);
include("../conexion.php");
include("../Shared/funciones.php");

$consulta = "
    SELECT 
        p.id_pac,
        p.nombre,
        p.apellido,
        d.descri_internacion AS diagnostico,
        p.foto,
        p.obra_social
    FROM paciente p
    LEFT JOIN diagnostico d ON p.id_diagno = d.id_diagno
";
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
        <span class="mx-10 text-[#98a3f3] text-3xl pacifico-regular">Pacientes</span>
        <a href="/clinica/Pacientes/pacientes_agregar.php" class="mx-10 bg-indigo-600 p-5 py-2 rounded">Agregar</a>
    </div>

    <table class="w-full">
        <thead class="bg-[#374151] text-white">
            <tr>
                <td class="py-5 p-2 border-r border-gray-800">Id</td>
                <td class="py-5 p-2 border-r border-gray-800">Nombre</td>
                <td class="py-5 p-2 border-r border-gray-800">Apellido</td>
                <td class="py-5 p-2 border-r border-gray-800">Descripcion Internacion</td>
                <td class="py-5 p-2 border-r border-gray-800">Foto</td>
                <td class="py-5 p-2 border-r border-gray-800">Obra social</td>
                <td class="py-5 p-2 border-r border-gray-800">Acciones</td>
            </tr>
        </thead>
        <tbody>
            <?php
            LoadResults($resultado, "pacientes");
            ?>
        </tbody>
    </table>
</body>

</html>