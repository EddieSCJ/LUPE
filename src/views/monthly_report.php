<main class="content">
    <?php
    prepareDataToVisu($loMonthly_reports, $iTotal_worked_time);
    $userVisibleAll = (new User([]))->getOne("name, id", ["id" => $iSelectedUser]);

    ?>

    <div class="filter-title mb-4">
        <div class="title-pack">
            <div class="icon-title">
                <i class="icon icofont-ui-calendar mr-2"></i>
                <h1> Relatório Mensal </h1>
            </div>
            <div class="subtitle">
                <h2>Acompanhe seu saldo de horas</h2>
            </div>
        </div>

        <div class="form-filter">
            <div class="container">
                <form class="mb-1" action="#" method="POST">
                    <div class="row">
                        <?php if ($bSelectedUserAdmin) : ?>

                            <select name="periods" class="custom-select col-5 mx-1" id="periods">
                                <option value="<?= $sSelectedPeriod ?>"> <?= ucfirst(strftime("%B de %Y", (new DateTime($sSelectedPeriod))->getTimestamp())) ?> </option>
                                <?php foreach ($aPeriods as $key => $value) : ?>
                                    <?php if ($key != $sSelectedPeriod) : ?>
                                        <option value="<?= $key ?>"> <?= $value ?> </option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>

                            <select name="selectedUser" class="custom-select col-4 mx-1" id="users">
                                <option value="<?= $userVisibleAll->id ?>"> <?= $userVisibleAll->name ?> </option>
                                <?php foreach ($aPeriods as $user) : ?>
                                    <?php if ($userVisibleAll->id != $user->id) : ?>
                                        <option value="<?= $user->id ?>"> <?= $user->name ?> </option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                            <button class="col-2 mx-1 send-filter btn btn-outline-success" type="submit">Filtrar</button>

                        <?php endif ?>
                        <?php if (!$bSelectedUserAdmin) : ?>
                            <select name="periods" class="custom-select col-7 mx-1" id="periods">
                                <option value="<?= $sSelectedPeriod ?>"> <?= ucfirst(strftime("%B de %Y", (new DateTime($sSelectedPeriod))->getTimestamp())) ?> </option>
                                <?php foreach ($aPeriods as $key => $value) : ?>
                                    <?php if ($key != $sSelectedPeriod) : ?>
                                        <option value="<?= $key ?>"> <?= $value ?> </option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>

                            <button class="col-4 mx-1 send-filter btn btn-outline-success" type="submit">Filtrar</button>
                        <?php endif ?>

                    </div>
                </form>
            </div>
        </div>
    </div>

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
                <?php foreach ($loMonthly_reports as $registry) : ?>
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
                    <td> <?= getTimeStringFromSeconds($iTotal_worked_time); ?></td>
                    <td></td>
                    <td></td>
                    <td>Saldo total de horas: </td>
                    <td> <?= $sBalance ?></td>

                </tr>
            </tfoot>
        </table>
    </div>
</main>