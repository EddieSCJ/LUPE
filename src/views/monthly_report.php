<main class="content">
    <?php
    render_title(
        "Relatório Mensal",
        "Acompanhe seu saldo de horas",
        "icofont-ui-calendar"
    );
    prepareDataToVisu($monthly_reports, $total_worked_time);

    ?>
    <div class="table-content">
        <table id="monthly_report" class="table table-striped table-bordered table-light">
            <thead>
                <th>Dia</th>
                <th>Entrada 1</th>
                <th>Saída 1</th>
                <th>Entrada 2</th>
                <th>Saída 2</th>
                <th>Saldo</th>
            </thead>
            <tbody>
                <?php foreach ($monthly_reports as $registry) : ?>
                    <tr>
                        <td><?= $registry->work_date ?></td>
                        <td><?= $registry->time1 ?></td>
                        <td><?= $registry->time2 ?></td>
                        <td><?= $registry->time3 ?></td>
                        <td><?= $registry->time4 ?></td>
                        <td><?= $registry->worked_time ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr id="monthly_work_result">
                    <td>Horas trabalhadas: </td>
                    <td> <?= getTimeStringFromSeconds($total_worked_time); ?></td>
                    <td></td>
                    <td></td>
                    <td>Saldo total de horas: </td>
                    <td> <?= $balance ?></td>

                </tr>
            </tfoot>
        </table>
    </div>
</main>