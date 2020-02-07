<main class="content">
    <?php
    render_title("Registrar Ponto", "Mantenha o seu ponto consistente", "icofont-check-alt");
    include_once(TEMPLATE_PATH . "/messages.php");
    ?>
    <div class="card">
        <div class="card-header">
            <h3><?= $today ?></h3>
            <p>Os batimentos efetutuados hoje</p>
        </div>
        <div class="card-body ">
            <div class="d-flex m-3 justify-content-around">
                <span>Entrada 1: ----</span>
                <span>Saída 1: ----</span>
            </div>
            <div class="d-flex m-3 justify-content-around">
                <span>Entrada 2: ----</span>
                <span>Saída 2: ----</span>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-center align-items-center">
            <a href="???" class="btn btn-success btn-md">
                <i class="icofont-check mr-1">Bater o ponto</i>
            </a>
        </div>
    </div>
</main>