<main class="content">
    <?php
    render_title(
        "Cadastro de Usuários",
        "Gerencie seus funcionários",
        "icofont-users"
    );

    include_once(sTEMPLATE_PATH . "/messages.php");
    ?>

    <button class="btn btn-lg btn-outline-success mb-4 " data-toggle="modal" data-target="#registerUser">
        Novo Usuário
    </button>

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
                        <a href="save_user_controller.php?update=<?= $oUser->id ?>" class="btn btn-warning rounded-circle">
                            <i class="icofont-edit"></i>
                        </a>
                        <a href="?delete=<?= $oUser->id ?>" class="btn btn-danger rounded-circle">
                            <i class="icofont-trash"></i>
                        </a>

                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>

    </table>
</main>

<?php
    include_once(sTEMPLATE_PATH . "/register_modal.php");

?>