<!DOCTYPE html>
<html>
<head>
    <title>Editar Instrumento</title>
</head>
<body>
    <h1>Editar Instrumento</h1>

    <form method="POST">
        Marca:<br>
        <input type="text" name="marca" value="<?= $instrumento->getMarca() ?>" required><br><br>

        Modelo:<br>
        <input type="text" name="modelo" value="<?= $instrumento->getModelo() ?>" required><br><br>

        Precio base:<br>
        <input type="number" name="precioBase" value="<?= $instrumento->getPrecioBase() ?>" required><br><br>

        <?php if ($instrumento instanceof Piano): ?>
            Número de teclas:<br>
            <input type="number" name="numeroTeclas" value="<?= $instrumento->getNumeroTeclas() ?>" required><br><br>

            Tipo de piano:<br>
            <select name="tipoPiano" required>
                <option value="Cola" <?= $instrumento->getTipoPiano() == "Cola" ? "selected" : "" ?>>Cola</option>
                <option value="Pared" <?= $instrumento->getTipoPiano() == "Pared" ? "selected" : "" ?>>Pared</option>
                <option value="Digital" <?= $instrumento->getTipoPiano() == "Digital" ? "selected" : "" ?>>Digital</option>
            </select><br><br>
        <?php endif; ?>

        <?php if ($instrumento instanceof Guitarra): ?>
            Número de cuerdas:<br>
            <input type="number" name="numeroCuerdas" value="<?= $instrumento->getNumeroCuerdas() ?>" required><br><br>

            Es eléctrica:<br>
            <select name="esElectrica" required>
                <option value="0" <?= ($instrumento->getEsElectrica() == 0) ? 'selected' : '' ?>>No</option>
                <option value="1" <?= ($instrumento->getEsElectrica() == 1) ? 'selected' : '' ?>>Sí</option>
            </select><br><br>
        <?php endif; ?>

        <button type="submit">Actualizar instrumento</button>
    </form>

    <br>
    <a href="index.php">Volver a la lista</a>
</body>
</html>