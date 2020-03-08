<main class="content">
    <?php
    render_title(
        "Relatório Gerencial",
        "Resumo das horas trabalhadas",
        "icofont-chart-histogram"
    )
    ?>
    <div class="summary-boxes">
        <div class="summary-box bg-primary">
            <i class="icofont-users">Quantidade de Funcionários</i>
            <h3 class="value"><?= $iActiveUsersCount ?></h3>
        </div>
        <div class="summary-box bg-danger">
            <i class="icofont-patient-bed">Faltas</i>
            <h3 class="value"><?= count($aAbsentUsers) ?></h3>
        </div>
        <div class="summary-box bg-success">
            <i class="icofont-sand-clock">Horas trabalhadas</i>
            <h3 class="value"><?= $iTotalWorkedTime ?></h3>
        </div>
    </div>
    <?php if (count($aAbsentUsers)) : ?>
        <div class="card mt-4">
            <div class="card-header">
                <p class="card-title">Funcionários Faltosos do Dia</p>
                <p class="card-category">Funcionários que não bateram o ponto ainda</p>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover ">
                    <thead>
                        <th>Nome</th>
                    </thead>
                    <tbody>
                        <?php foreach ($aAbsentUsers as $user) : ?>
                            <tr>
                                <td><?= $user ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div>
        </div>
    <?php endif ?>
</main>