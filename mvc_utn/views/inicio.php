<?php include(__DIR__ . '/partials/header.php'); ?>

<div class="container mt-5">
    <div class="text-center">
        <h1 class="display-4">Bienvenido a la Pizzería</h1>
        <p class="lead">Disfruta de nuestras deliciosas pizzas hechas con ingredientes frescos y de la mejor calidad.</p>
    </div>
    <div class="row mt-5">
        <div class="col-md-4 text-center">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Explora nuestro Menú</h5>
                    <p class="card-text">Descubre todas nuestras opciones de pizzas y elige tu favorita.</p>
                    <a href="index.php?action=menu" class="btn btn-primary">Ver Menú</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Gestión de Pedidos</h5>
                    <p class="card-text">Administra y revisa el estado de tus pedidos.</p>
                    <a href="index.php?action=mostrarGestion" class="btn btn-secondary">Gestionar Pedidos</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Contáctanos</h5>
                    <p class="card-text">¿Tienes alguna pregunta? Estamos aquí para ayudarte.</p>
                    <a href="index.php?action=contacto" class="btn btn-info">Contactar</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include(__DIR__ . '/partials/footer.php'); ?>
