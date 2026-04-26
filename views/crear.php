<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir instrumento</title>
</head>
<body>
    <h1>Agregar instrumento</h1>

    <form action="" method="post">
        Tipo: <br>
        <select type="text" name="tipo" required>
            <option value="" selected disabled hidden>Selecciona una opción</option>
            <option value="Piano">Piano</option>
            <option value="Guitarra">Guitarra</option>
        </select><br><br>
        Marca:<br>
        <input type="text" name="marca" required><br><br>
        Modelo:<br>
        <input type="text" name="modelo" required><br><br>
        Precio base:<br>
        <input type="number" name="precioBase" required><br><br>
        Número de teclas:<br>
        <input type="number" name="numeroTeclas"><br><br>
        Tipo de piano:<br>
        <select type="text" name="tipoPiano">
            <option value="" selected disabled hidden>Selecciona una opción</option>
            <option value="Cola">Cola</option>
            <option value="Pared">Pared</option>
            <option value="Digital">Digital</option>
        </select><br><br>
        Número de cuerdas:<br>
        <input type="number" name="numeroCuerdas"><br><br>
        Es eléctrica:<br>
        <select type="number" name="esElectrica" required>
            <option value="" selected disabled hidden>Selecciona una opción</option>
            <option value=1>Sí</option>
            <option value=0>No</option>
        </select><br><br>

        <button type="submit">Guardar</button>
    </form>
    <br>
    <a href="index.php">Volver</a>
</body>
</html>