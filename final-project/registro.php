<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Validar que los campos no vengan vacíos
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $servicio = $_POST['servicio'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora']; // Coincide con el 'name' en index.php

    // El nombre de la columna en TU base de datos actual es 'hora_servicio'
    $sql = "INSERT INTO usuario (nombre, telefono, servicio, fecha, hora_servicio)
            VALUES (?, ?, ?, ?, ?)";

    // Usamos $conexion que es como se define en conexion.php
    $stmt = $conexion->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssss", $nombre, $telefono, $servicio, $fecha, $hora);

        if ($stmt->execute()) {
            echo "<script>
                    alert('¡Reserva confirmada con éxito!');
                    window.location.href = 'index.php';
                  </script>";
        } else {
            echo " Error al ejecutar la consulta: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo " Error en la preparación de la consulta: " . $conexion->error;
    }

    $conexion->close();
}
?>