<?php
include 'conexion.php';

$stmt = $conexion->prepare("INSERT INTO cliente(cliente_nombre, cliente_telefono, cliente_correo, cliente_mensaje) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nombre, $tel, $correo, $mensaje);

$nombre = $_POST['nombre'];
$tel = $_POST['tel'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];

// Verificar si el correo ya existe
$verificar_stmt = $conexion->prepare("SELECT * FROM cliente WHERE cliente_correo = ?");
$verificar_stmt->bind_param("s", $correo);
$verificar_stmt->execute();
$resultado_verificacion = $verificar_stmt->get_result();

if ($resultado_verificacion->num_rows > 0) {
    echo "El correo ya está registrado.";
    exit;
}

if ($stmt->execute()) {
    echo "Registro exitoso.";
} else {
    echo "Error al registrar el cliente.";
}
?>
