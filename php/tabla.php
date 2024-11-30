<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="icon" type="image/x-icon" href="../img/custummers.png">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/styleclientes.css">   
</head>
<body>
    <div class="main-page">
        <a href="index.html"><h1 class="a-main-page">Luis Antonio Hernández Limón <span>Computer Engineer</span></h1></a>   
    </div>
    <div class="encabezado-java">
        <img src="./img/custummers.png" alt="CSS">
        <h2 style="margin-left: 1.5rem;" class="head-2">Página de clientes</h2>     
    </div> 

    <main class="contenedor sombra">
        <h3 class="headclientes-3">Lista de clientes</h3>
        <?php
        include("conexion.php"); //Archivo de conexión a la base de datos

        // Consulta para obtener los registros de la tabla pre_equipo
        $consulta = "SELECT * FROM cliente";
        $resultado = mysqli_query($conexion, $consulta);

        if (mysqli_num_rows($resultado) > 0) {
            echo "<table border='1'>
                    <tr>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Mensaje</th>
                    </tr>";

            // Iterar sobre los resultados y mostrar cada registro en una fila de la tabla
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>
                        <td>" . $fila['cliente_nombre'] . "</td>
                        <td>" . $fila['cliente_telefono'] . "</td>
                        <td>" . $fila['cliente_correo'] . "</td>
                        <td>" . $fila['cliente_mensaje'] . "</td>  
                      </tr>";
            }

            echo "</table>";
        } else {
            echo "No hay clientes registrados.";
        }
        ?>

    </main>
</body>
</html>