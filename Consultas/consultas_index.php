<?php
//error_reporting(0);
include("../conexion.php");
include("../Shared/funciones.php");

$consulta = "
    SELECT 
        c.id_consulta,
        d.descri_internacion AS diagnostico,
        p.apellido,
        c.monto_total,
        c.nivel_urgencia
    FROM consulta c
    LEFT JOIN paciente p ON c.id_pac = p.id_pac
    LEFT JOIN diagnostico d ON c.id_diagno = d.id_diagno
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
        <span class="mx-10 text-[#98a3f3] text-3xl pacifico-regular">Consultas</span>
        <a href="/clinica/Consultas/consultas_agregar.php" class="mx-10 bg-indigo-600 p-5 py-2 rounded">Agregar</a>
    </div>

    <table class="w-full">
        <thead class="bg-[#374151] text-white">
            <tr>
                <td class="py-5 p-2 border-r border-gray-800">Id consulta</td>
                <td class="py-5 p-2 border-r border-gray-800">Id diagnostico</td>
                <td class="py-5 p-2 border-r border-gray-800">Id paciente</td>
                <td class="py-5 p-2 border-r border-gray-800">Monto total</td>
                <td class="py-5 p-2 border-r border-gray-800">Nivel de urgencia</td>
                <td class="py-5 p-2 border-r border-gray-800">Acciones</td>
            </tr>
        </thead>
        <tbody>
            <?php
            LoadResults($resultado, "consultas");
            ?>
        </tbody>
    </table>
</body>

</html>