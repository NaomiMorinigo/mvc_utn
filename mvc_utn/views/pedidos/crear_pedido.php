<?php include(__DIR__ . '/../partials/header.php'); ?>
<a href="index.php?action=menu" class="btn btn-secondary mb-2">
    <i class="fas fa-arrow-left"></i> Ir atrás
</a>
<h1>Verificación de compra / Crear Pedido</h1>
<form action="index.php?action=crear_pedido&pizza_id=<?= htmlspecialchars($pizza['id']); ?>" method="post">
    <div class="form-group">
        <label for="producto">Producto:</label>
        <input type="text" class="form-control" id="producto" name="producto" value="<?= htmlspecialchars($pizza['tipo']); ?>" readonly>
    </div>
    <div class="form-group">
        <label for="precio">Precio:</label>
        <input type="text" class="form-control" id="precio" name="precio" value="<?= htmlspecialchars($pizza['precio']); ?> " readonly>
    </div>
    <div class="form-group">
        <img src="public/images/<?= htmlspecialchars($pizza['imagen']); ?>" alt="<?= htmlspecialchars($pizza['tipo']); ?>" style="width: 200px;">
    </div>
    <button type="submit" class="btn btn-primary">Crear Pedido</button>
</form>

<?php include(__DIR__ . '/../partials/footer.php'); ?>
