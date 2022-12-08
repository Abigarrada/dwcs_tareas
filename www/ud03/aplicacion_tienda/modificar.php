<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Les fleurs du café</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container">
        <h1 class="display-1">Les fleurs du café</h1>
    </div>

    <div class="container form-group">
        <br>
        <h2 class="display-3">Modificación de usuario</h2>

        <div class="container">
            <?php
            include "funciones.php";

            $id = $_GET["id"];

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $conexion = conecta_bbdd();
                crea_o_actualiza_usuario($conexion, $id);
            }
            $conexion = conecta_bbdd();

            $usuario = busca_usuario($id, $conexion);
            ?>
            <br>
            <br>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=$id"); ?>">
                Nombre: <input type="text" class="form-control" name="nombre" value='<?php echo $usuario["nombre"] ?>'>
                <br><br>
                Apellidos: <input type="text" class="form-control" name="apellidos" value='<?php echo htmlspecialchars($usuario["apellidos"]) ?>'>
                <br><br>
                Edad: <input type="number" class="form-control" name="edad" value=<?php echo $usuario["edad"] ?>>
                <br><br>
                <label class="my-1 mr-2" for="provincia">Provincia:</label>
                <select class="custom-select my-1 mr-sm-2" id="provincia" name="provincia">
                    <option value="0">Elegir: </option>
                    <option value="1" <?php echo ($usuario["provincia"] == "A Coruña" ?  "selected" : "") ?>>A Coruña</option>
                    <option value="2" <?php echo ($usuario["provincia"] == "Lugo" ?  "selected" : "") ?>>Lugo</option>
                    <option value="3" <?php echo ($usuario["provincia"] == "Ourense" ?  "selected" : "") ?>>Ourense</option>
                    <option value="4" <?php echo ($usuario["provincia"] == "Pontevedra" ?  "selected" : "") ?>>Pontevedra</option>
                </select>
                <br><br>
                <input type="submit" class="btn btn-dark" name="submit" value="Modificar">
            </form>
        </div>
    </div>

    <footer class="container">
        <br><a class="text-info" href="./listar_usuarios.php">Volver al listado de usuarios</a>
    </footer>

</body>

</html>