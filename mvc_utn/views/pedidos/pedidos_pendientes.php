<?php include(__DIR__ . '/../partials/header.php'); ?>
<a href="index.php?action=mostrarGestion" class="btn btn-secondary mb-2">
    <i class="fas fa-arrow-left"></i> Ir a Gestión
</a>
<h1>Pedidos Pendientes</h1>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($pedido = $pendientes->fetch_assoc()) : ?>
            <tr>
                <td><?= $pedido['id']; ?></td>
                <td><?= $pedido['producto']; ?></td>
                <td>
                    <a href="index.php?action=actualizar_estado_pedido&id=<?= $pedido['id']; ?>&estado=en_proceso" class="btn btn-primary">En Progreso</a>
                    <a href="index.php?action=eliminar_pedido&id=<?= $pedido['id']; ?>" class="btn btn-danger">Eliminar</a>

                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php include(__DIR__ . '/../partials/footer.php'); ?>