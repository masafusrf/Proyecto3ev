<!DOCTYPE html>
<html>
<head>
    <title>Instrumentos</title>
</head>
<body>
    <h1>Tienda de instrumentos</h1>

    <!-- FALTA LO DEL USUARIO. MIRAR PROYECTO CONCESIONARIO -->

    <a href="index.php?accion=crear">Agregar instrumento</a><p>
    
    <table border="1" cellpadding="9">
        <tr>
            <th>ID</th>
            <th>Instrumento</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Precio base</th>
            <th>Precio final</th>
            <th>Número de cuerdas</th>
            <th>Es eléctrica</th>
            <th>Número de teclas</th>
            <th>Tipo de piano</th>
            <th>Acciones</th>
            <!-- FALTA LO DEL USUARIO. MIRAR PROYECTO CONCESIONARIO -->
        </tr>

        <?php foreach ($instrumentos as $p): ?>
        <tr>
            <td><?= $p->getId() ?></td>
            <td><?= ($p instanceof Piano) ? "Piano" : "Guitarra"; ?></td>
            <td><?= $p->getMarca() ?></td>
            <td><?= $p->getModelo() ?></td>
            <td><?= $p->getPrecioBase() ?></td>
            <td><?= $p->calcularPrecioFinal() ?></td>
            <td><?= ($p instanceof Guitarra) ? $p->getNumeroCuerdas() : "--"; ?></td>
            <td><?= ($p instanceof Guitarra) ? ($p->getEsElectrica() ? "Sí" : "No") : "--"; ?></td>
            <td><?= ($p instanceof Piano) ? $p->getNumeroTeclas() : "--"; ?></td>
            <td><?= ($p instanceof Piano) ? $p->getTipoPiano() : "--"; ?></td>
            <td>
                <a href="index.php?accion=editar&id=<?= $p->getId() ?>">Editar</a>
                
                <a href="index.php?accion=eliminar&id=<?= $p->getId() ?>">Eliminar</a>
            </td>
            
            <!-- FALTA LO DEL USUARIO. MIRAR PROYECTO CONCESIONARIO -->
            
        </tr>
        <?php endforeach; ?>

    </table>
</body>
</html>