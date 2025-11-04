<?php 
include("conexion.php");
include("Shared/funciones.php");

$buscar_id = "";
$tabla = "";
$redireccion = "";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $ventana = $_GET['ventana'];

    if ($ventana == "pacientes") {
        $buscar_id = "id_pac";
        $tabla = "paciente";
        $redireccion = "Pacientes/pacientes_index.php";
    } else if ($ventana == "diagnosticos") {
        $buscar_id = "id_diagno";
        $tabla = "diagnostico";
        $redireccion = "Diagnosticos/diagnosticos_index.php";
    } else if ($ventana == "consultas") {
        $buscar_id = "id_consulta";
        $tabla = "consulta";
        $redireccion = "Consultas/consultas_index.php";
    }

    $eliminar = "DELETE FROM $tabla WHERE $buscar_id = $id";
    $resultado = mysqli_query($conexion, $eliminar);

    if ($resultado) {
        header("Location: $redireccion?msg=eliminado");
        exit;
    } else {
        echo "Error al eliminar el paciente: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
?>
