<?php include(__DIR__ . '/../partials/header.php'); ?>
<a href="index.php?action=mostrarGestion" class="btn btn-secondary mb-2">
    <i class="fas fa-arrow-left"></i> Ir a Gestión
</a>
<h1>Pedidos en Progreso</h1>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($pedidos->num_rows > 0) : ?>
            <?php while ($pedido = $pedidos->fetch_assoc()) : ?>
                <tr>
                    <td><?= $pedido['producto']; ?></td>
                    <td><?= $pedido['precio']; ?></td>
                    <td>
                        <a href="index.php?action=actualizar_estado_pedido&id=<?= $pedido['id']; ?>&estado=completado" class="btn btn-primary">Completar</a>
                        <a href="index.php?action=eliminar_pedido&id=<?= $pedido['id']; ?>&redirect=pedidos_en_proceso" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else : ?>
            <tr>
                <td colspan="3">No hay pedidos pendientes.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php include(__DIR__ . '/../partials/footer.php'); ?>