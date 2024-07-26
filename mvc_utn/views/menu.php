<?php include(__DIR__ . '/../views/partials/header.php'); ?>
<a href="index.php?action=inicio" class="btn btn-secondary mb-2">
    <i class="fas fa-arrow-left"></i> Volver a inicio
</a>
<h1 class="mb-3 text-center">Menú de Pizzas</h1>
<div class="container mt-2">
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Imagen</th>
                <th>Tipo</th>
                <th>Precio</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($pizzas->num_rows > 0) : ?>
                <?php while ($pizza = $pizzas->fetch_assoc()) : ?>
                    <tr>
                        <td><img src="public/images/<?= htmlspecialchars($pizza['imagen']); ?>" alt="<?= htmlspecialchars($pizza['tipo']); ?>" class="img-thumbnail" style="width: 100px; height: 100px;"></td>
                        <td><?= htmlspecialchars($pizza['tipo']); ?></td>
                        <td><?= htmlspecialchars($pizza['precio']); ?></td>
                        <td>
                            <a href="index.php?action=crear_pedido&pizza_id=<?= $pizza['id']; ?>" class="btn btn-primary mt-4">Ordenar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else : ?>
                <tr>
                    <td colspan="4">No hay pizzas disponibles en el menú.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="index.php?action=inicio" class="btn btn-secondary">Volver al Inicio</a>
</div>

<?php include(__DIR__ . '/../views/partials/footer.php'); ?>
