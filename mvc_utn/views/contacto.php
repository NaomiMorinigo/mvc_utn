<?php include(__DIR__ . '/../views/partials/header.php'); ?>
<a href="index.php?action=inicio" class="btn btn-secondary mb-2">
    <i class="fas fa-arrow-left"></i> Volver a inicio
</a>
<h1>Contáctanos</h1>
<p>Si tienes alguna pregunta o necesitas asistencia, no dudes en ponerte en contacto con nosotros. Estamos aquí para ayudarte.</p>

<script>
    window.onload = function() {
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status');

        if (status === 'success') {
            alert("¡Tu mensaje ha sido enviado con éxito!");
        } else if (status === 'error') {
            alert("Hubo un error al enviar tu mensaje. Por favor, inténtalo de nuevo.");
        }
    }
</script>

<div class="row">
    <div class="col-md-6">
        <form action="index.php?action=enviar_contacto" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="mensaje">Mensaje:</label>
                <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    <div class="col-md-6">
        <h2>Información de Contacto</h2>
        <p><strong>Dirección:</strong> Calle Cordoba, Misiones Posadas, Argentina</p>
        <p><strong>Teléfono:</strong> +9 54 3757 548648</p>
        <p><strong>Correo Electrónico:</strong> ilovepizza@gmail.com</p>
        <p><strong>Horario:</strong> Lunes a Viernes, 10:00 - 22:00</p>
    </div>
</div>

<?php include(__DIR__ . '/partials/footer.php'); ?>
