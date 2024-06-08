<?php
// Importar la Base de Datos
require '../../includes/config/database.php';
$db = conectarDB();

// Escribir el query 
$query = "SELECT * FROM vendedores";

// Consultar la base de datos
$resultadoConsulta = mysqli_query($db, $query);

// Muestra mensaje condiconal
$resultado = $_GET['resultado'] ?? null;

// Importa el header
$resultado = $_GET['resultado'] ?? null;
require '../../includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Administrar Vendedores</h1>

    <?php if (intval($resultado) === 1) : ?>
        <p class="alerta exito">Registro Exitoso</p>
    <?php endif ?>

    <div class="acciones">
        <a href="../" class="boton boton-amarillo">← Volver Atrás</a>
        <a href="crearVendedor.php" class="boton boton-verde">Nueva Vendedor →</a>
    </div>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($vendedor = mysqli_fetch_assoc($resultadoConsulta)) : ?>
                <tr>
                    <td><?php echo $vendedor['id']; ?></td>
                    <td><?php echo $vendedor['nombre']; ?></td>
                    <td><?php echo $vendedor['apellido']; ?></td>
                    <td class="botones-accion">
                        <a href="#" class="boton-rojo-block">Eliminar</a>
                        <a href="actualizarVendedor.php?id=<?php echo $vendedor['id']; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>

<?php
incluirTemplate('footer'); ?>