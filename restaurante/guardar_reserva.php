<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Reservas</title>
    <style>
        /* Estilos de la tabla */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Lista de Reservas</h2>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Mesa</th>
            <th>Número de Personas</th>
            <th>Teléfono</th>
        </tr>
        <?php
        // Datos de conexión a la base de datos
        $servername = "localhost"; // Cambia esto por tu servidor de base de datos
        $username = "tu_usuario"; // Cambia esto por tu nombre de usuario de la base de datos
        $password = "tu_contraseña"; // Cambia esto por tu contraseña de la base de datos
        $dbname = "nombre_de_tu_base_de_datos"; // Cambia esto por el nombre de tu base de datos

        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("La conexión falló: " . $conn->connect_error);
        }

        // Obtener y mostrar las reservas
        $sql = "SELECT nombre, fecha, hora, mesa, personas, telefono FROM reservas";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["nombre"]."</td><td>".$row["fecha"]."</td><td>".$row["hora"]."</td><td>".$row["mesa"]."</td><td>".$row["personas"]."</td><td>".$row["telefono"]."</td></tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No hay reservas</td></tr>";
        }

        // Cerrar la conexión
        $conn->close();
        ?>
    </table>
</body>
</html>
