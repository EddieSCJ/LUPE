<main class="content">
    <?php
    render_title(
        "Cadastro de Usuários",
        "Gerencie seus funcionários",
        "icofont-users"
    );

    include_once(sTEMPLATE_PATH . "/messages.php");
    ?>

    <a class="btn btn-lg btn-outline-success mb-3" href="save_user_controller.php">Novo Usuário</a>


    <table class="table table-striped table-bordered table-hover">
        <thead>
            <th>Nome</th>
            <th>Email</th>
            <th>Data de Admissão</th>
            <th>Data de Desligamento</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php foreach ($loUsers as $oUser) : ?>
                <tr>
                    <td>
                        <?= $oUser->name ?>
                    </td>
                    <td>
                        <?= $oUser->email ?>
                    </td>
                    <td>
                        <?= $oUser->start_date ?>
                    </td>
                    <td>
                        <?= $oUser->end_date ?>
                    </td>
                    <td>
                        <a href="save_user_controller.php?update=<?= $user->id ?>" class="btn btn-warning rounded-circle mr-2">
                            <i class="icofont-edit"></i>
                        </a>
                        <a href="?delete=<?= $user->id ?>" class="btn btn-danger rounded-circle">
                            <i class="icofont-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>

    </table>
</main>