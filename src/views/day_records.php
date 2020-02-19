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
                <span class = "entrada">Entrada 1: <?= $records->time1 ?? '----' ?></span>
                <span class = "saida">Saída 1: <?= $records->time2 ?? '----' ?></span>
            </div>
            <div class="d-flex m-3 justify-content-around">
                <span class = "entrada" >Entrada 2: <?= $records->time3 ?? '----' ?></span>
                <span class = "saida">Saída 2: <?= $records->time4 ?? '----' ?></span>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-center align-items-center">
            <a href="point_controller.php" class="btn btn-success btn-md">
                <i class="icofont-check mr-1">Bater o ponto</i>
            </a>
        </div>
    </div>
</main>