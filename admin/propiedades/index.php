<?php

/* -- Base de Datos -- */

// Importar la Base de Datos
require '../../includes/config/database.php';
$db = conectarDB();

// Escribir el query 
$query = "SELECT * FROM propiedades";

// Consultar la base de datos
$resultadoConsulta = mysqli_query($db, $query);

/* -- Muestra mensaje condiconal -- */
$resultado = $_GET['resultado'] ?? null;

/* -- Importa el header -- */
require '../../includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Administrar Propiedades</h1>

    <?php if (intval($resultado) === 1) : ?>
        <p class="alerta exito">Propiedad Registrada</p>
    <?php elseif (intval($resultado) === 2) : ?>
        <p class="alerta exito">Propiedad Actualizada</p>
    <?php endif ?>

    <div class="acciones">
        <a href="../" class="boton boton-amarillo">← Volver Atrás</a>
        <a href="crear.php" class="boton boton-verde">Nueva Propiedad →</a>
    </div>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead> <!-- Mostrar los resultados de la consulta -->
        <tbody>
            <?php while ($propiedad = mysqli_fetch_assoc($resultadoConsulta)) : ?>
                <tr>
                    <td><?php echo $propiedad['id']; ?></td>
                    <td><?php echo $propiedad['titulo']; ?></td>
                    <td><img src="../../imagenes/<?php echo $propiedad['imagen']; ?>" alt="" class="imagen-tabla"></td>
                    <td><?php echo "$" . $propiedad['precio']; ?></td>
                    <td class="botones-accion">
                        <a href="#" class="boton-rojo-block">Eliminar</a>
                        <a href="actualizar.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>

<?php

/* -- cerra la conexión -- */
mysqli_close($db);

/* -- Importar el footer -- */
incluirTemplate('footer'); ?>