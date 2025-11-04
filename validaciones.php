<?php
function ValidarInt($valor, $campo, &$errores) {
    $valor = trim($valor);
    if ($valor === "") {
        $errores[$campo] = "El campo $campo no puede estar vacío.";
    } elseif (!filter_var($valor, FILTER_VALIDATE_INT)) {
        $errores[$campo] = "El campo $campo solo permite números enteros.";
    }
}

function ValidarString($valor, $campo, &$errores) {
    $valor = trim($valor);
    if ($valor === "") {
        $errores[$campo] = "El campo $campo no puede estar vacío.";
    } elseif (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $valor)) {
        $errores[$campo] = "El campo $campo solo puede contener letras.";
    }
}
?>
