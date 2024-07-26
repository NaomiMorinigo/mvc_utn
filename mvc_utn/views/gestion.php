<?php include(__DIR__ . '/../views/partials/header.php'); ?>
<a href="index.php?action=inicio" class="btn btn-secondary mb-2">
    <i class="fas fa-arrow-left"></i> Volver a inicio
</a>
<h1 class="text-center">Gestión de pedidos</h1>
<div class="row">
    <div class="col-md-4">
        <h2>Pedidos Pendientes</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($pendientes->num_rows > 0) : ?>
                    <?php while ($pedido = $pendientes->fetch_assoc()) : ?>
                        <tr>
                            <td><?= htmlspecialchars($pedido['id']); ?></td>
                            <td><?= htmlspecialchars($pedido['producto']); ?></td>
                            <td>
                                <a href="index.php?action=actualizar_estado_pedido&id=<?= $pedido['id']; ?>&estado=en_proceso&redirect=mostrarGestion" class="btn btn-primary btn-sm mb-1">En Progreso</a>
                                <a href="index.php?action=eliminar_pedido&id=<?= $pedido['id']; ?>&redirect=mostrarGestion" class="btn btn-danger btn-sm mb-1">Eliminar</a>
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
        <a href="index.php?action=pedidos_pendientes" class="btn btn-secondary btn-sm">Ver más</a>
    </div>
    <div class="col-md-4">
        <h2>Pedidos en Progreso</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($enProgreso->num_rows > 0) : ?>
                    <?php while ($pedido = $enProgreso->fetch_assoc()) : ?>
                        <tr>
                            <td><?= htmlspecialchars($pedido['id']); ?></td>
                            <td><?= htmlspecialchars($pedido['producto']); ?></td>
                            <td>
                                <a href="index.php?action=actualizar_estado_pedido&id=<?= $pedido['id']; ?>&estado=completado&redirect=mostrarGestion" class="btn btn-primary btn-sm mb-1">Completar</a>
                                <a href="index.php?action=eliminar_pedido&id=<?= $pedido['id']; ?>&redirect=mostrarGestion" class="btn btn-danger btn-sm mb-1">Eliminar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3">No hay pedidos en progreso.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="index.php?action=pedidos_en_proceso" class="btn btn-secondary btn-sm">Ver más</a>
    </div>
    <div class="col-md-4">
        <h2>Pedidos Completados</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($completados->num_rows > 0) : ?>
                    <?php while ($pedido = $completados->fetch_assoc()) : ?>
                        <tr>
                            <td><?= htmlspecialchars($pedido['id']); ?></td>
                            <td><?= htmlspecialchars($pedido['producto']); ?></td>
                            <td>
                                <a href="index.php?action=eliminar_pedido&id=<?= $pedido['id']; ?>&redirect=mostrarGestion" class="btn btn-danger btn-sm mb-1">Eliminar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3">No hay pedidos completados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="index.php?action=pedidos_completados" class="btn btn-secondary btn-sm">Ver más</a>
    </div>
</div>

<?php include(__DIR__ . '/../views/partials/footer.php'); ?>
