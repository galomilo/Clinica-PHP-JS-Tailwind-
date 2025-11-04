<?php 
function LoadResults ($resultado, $ventana) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo '<tr class="bg-[#edeef0] border-b border-gray-300 hover:bg-blue-200">';

        $id = -1;

        foreach ($fila as $columna => $valor) {

            if ($id == -1) {
                $id = $valor;
            }

            // si es la columna de la foto, mostrarla como <img>
            if ($columna === 'foto') {
                echo '<td class="py-2 p-2 border-r border-gray-300"><img width="100px" src="../uploads/pacientes/' . htmlspecialchars($fila['foto']) . '" alt="' . $valor . '"></td>';
            } else {
                echo '<td class="py-2 p-2 border-r border-gray-300">' . $valor . '</td>';
            }
        }

        echo '
        <td class="py-2 p-2 border-r border-gray-300 flex gap-3 justify-center">
            <a href="'. $ventana .'_editar.php?id='. $id .'"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#374151" fill-rule="evenodd" d="M5 20h14a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2m-1-5L14 5l3 3L7 18H4zM15 4l2-2l3 3l-2.001 2.001z"/></svg></a>
            <a href="../eliminar.php?id='. $id .'&ventana='. $ventana .'">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path fill="#E33E20" d="M42.7 469.3c0 23.5 19.1 42.7 42.7 42.7h341.3c23.5 0 42.7-19.1 42.7-42.7V192H42.7zm320-213.3h42.7v192h-42.7zm-128 0h42.7v192h-42.7zm-128 0h42.7v192h-42.7zm384-170.7h-128V42.7C362.7 19.1 343.5 0 320 0H192c-23.5 0-42.7 19.1-42.7 42.7v42.7h-128C9.5 85.3 0 94.9 0 106.7V128c0 11.8 9.5 21.3 21.3 21.3h469.3c11.8 0 21.3-9.5 21.3-21.3v-21.3c.1-11.8-9.4-21.4-21.2-21.4m-170.7 0H192V42.7h128z"/></svg></a>
            </a>
        </td>';
        echo '</tr>';
    }
}

function CreateForm ($resultado, $errores = []) {
    include("../conexion.php");
    $filas = isset($resultado[0]) ? $resultado : [$resultado];

    foreach ($filas as $fila) {
        echo '<tr class="bg-[#edeef0] border-b border-gray-300 hover:bg-blue-200">';

        $id_id = true; // evito mostrar un input para el id

        foreach ($fila as $columna => $valor) {

            if ($id_id) {
                $id_id = false;
                continue;
            }

            //almacenar los valores colocados
            $input_valor = $_POST[$columna] ?? "";

            echo '<label for="'.$columna.'">'.$columna.'</label>';

            if ($columna === "foto") {
                 echo '<input type="file" name="foto" id="foto"
                        class="bg-[#98a3f3] text-white h-[38px] p-2 rounded w-[50vw] ml-2 file:hidden">';
            } else if ($columna === "id_diagno") {
                $sql = "SELECT id_diagno, diagnostico_principal FROM diagnostico";
                $rs  = mysqli_query($conexion, $sql);

                echo '<select class="placeholder:text-white bg-[#98a3f3] text-white h-[38px] ml-2 w-[50vw] rounded" name="'.$columna.'" id="'.$columna.'" style="width:150px;">';
                
                while ($fila = mysqli_fetch_assoc($rs)) {
                    $selected = ($input_valor == $fila["id_diagno"]) ? "selected" : "";
                    echo '<option value="'.$fila["id_diagno"].'" '.$selected.'>'
                        . $fila["diagnostico_principal"] .
                        '</option>';
                }
                echo '</select>';
            } else if ($columna === "id_pac") {
                $sql = "SELECT id_pac, nombre FROM paciente";
                $rs  = mysqli_query($conexion, $sql);

                echo '<select class="placeholder:text-white bg-[#98a3f3] text-white h-[38px] ml-2 w-[50vw] rounded" name="'.$columna.'" id="'.$columna.'" style="width:150px;">';
                
                while ($fila = mysqli_fetch_assoc($rs)) {
                    $selected = ($input_valor == $fila["id_pac"]) ? "selected" : "";
                    echo '<option value="'.$fila["id_pac"].'" '.$selected.'>'
                        . $fila["nombre"] .
                        '</option>';
                }
                echo '</select>';
            } else {
                echo '<input value="'. $input_valor .'" name="'.$columna.'" type="text" id="'.$columna.'" class="placeholder:text-white bg-[#98a3f3] text-white h-[38px] p-3 ml-2 w-[50vw] rounded" placeholder="'.$columna.'">';
            }

            if (isset($errores[$columna])) {
                echo '<div style="color:red; margin-top:5px;">'.$errores[$columna].'</div>';
            }
        }

        echo '</tr>';
    }
    mysqli_close($conexion);
}

function CreateEditForm ($resultado, $id, $errores = []) {
    include("../conexion.php");
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo '<tr class="bg-[#edeef0] border-b border-gray-300 hover:bg-blue-200">';

        $id_id = true; // evito mostrar un input para el id

        foreach ($fila as $columna => $valor) {

            if ($id_id) {
                $id_id = false;
                continue;
            }

            //almacenar los valores colocados
            $input_valor = $_POST[$columna] ?? $valor;

            echo '<label for="'.$columna.'">'.$columna.'</label>';

            if ($columna === "id_diagno") {
                $sql = "SELECT id_diagno, diagnostico_principal FROM diagnostico";
                $rs  = mysqli_query($conexion, $sql);

                echo '<select class="placeholder:text-white bg-[#98a3f3] text-white h-[38px] ml-2 w-[50vw] rounded" name="'.$columna.'" id="'.$columna.'" style="width:150px;">';
                
                while ($fila = mysqli_fetch_assoc($rs)) {
                    $selected = ($input_valor == $fila["id_diagno"]) ? "selected" : "";
                    echo '<option value="'.$fila["id_diagno"].'" '.$selected.'>'
                        . $fila["diagnostico_principal"] .
                        '</option>';
                }
                echo '</select>';
            } else if ($columna === "id_pac") {
                $sql = "SELECT id_pac, nombre FROM paciente";
                $rs  = mysqli_query($conexion, $sql);

                echo '<select class="placeholder:text-white bg-[#98a3f3] text-white h-[38px] ml-2 w-[50vw] rounded" name="'.$columna.'" id="'.$columna.'" style="width:150px;">';
                
                while ($fila = mysqli_fetch_assoc($rs)) {
                    $selected = ($input_valor == $fila["id_pac"]) ? "selected" : "";
                    echo '<option value="'.$fila["id_pac"].'" '.$selected.'>'
                        . $fila["nombre"] .
                        '</option>';
                }
                echo '</select>';
            } else {
                echo '<input name="'.$columna.'" value="'. $valor .'" type="text" id="'.$columna.'" class="placeholder:text-white bg-[#98a3f3] text-white h-[38px] p-3 ml-2 w-[50vw] rounded" placeholder="'.$columna.'">';
            }

            if (isset($errores[$columna])) {
                echo '<div style="color:red; margin-top:5px;">'.$errores[$columna].'</div>';
            }
        }

        echo '</tr>';
    }
    mysqli_close($conexion);
}
?>