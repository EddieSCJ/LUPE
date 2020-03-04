<main class="content">
    <?php
    render_title("Registrar Ponto", "Mantenha o seu ponto consistente", "icofont-check-alt");
    include_once(sTEMPLATE_PATH . "/messages.php");
    ?>
    <div class="card">
        <div class="card-header">
            <h3><?= $rToday ?></h3>
            <p>Os batimentos efetutuados hoje</p>
        </div>
        <div class="card-body ">
            <div class="d-flex m-3 justify-content-around">
                <span class="entrada">Entrada 1: <?= $oRecord->time1 ?? '----' ?></span>
                <span class="saida">Saída 1: <?= $oRecord->time2 ?? '----' ?></span>
            </div>
            <div class="d-flex m-3 justify-content-around">
                <span class="entrada">Entrada 2: <?= $oRecord->time3 ?? '----' ?></span>
                <span class="saida">Saída 2: <?= $oRecord->time4 ?? '----' ?></span>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-center align-items-center">
            <a href="point_controller.php" class="btn btn-success btn-md">
                <i class="icofont-check mr-1">Bater o ponto</i>
            </a>
        </div>
    </div>
    <div>
        <form action="point_controller.php" method="POST">
            <div class="input-group no-border mt-4">
                <input type="text" class="form-control" name="batimento_forcado" placeholder="Informe a hora para forçar o batimento">
                <button class="btn btn-danger ml-2">Enviar</button>
            </div>
        </form>
    </div>
</main>