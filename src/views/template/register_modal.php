<!-- Modal -->
<form action="save_user_controller.php" id="register" method="POST">
    <div class="modal fade" id="registerUser" tabindex="-1" role="dialog" aria-labelledby="registerUser" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Cadastrar Novo Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="#name">
                            Nome Completo
                        </label>
                        <input type="text" name = "name" id="name" class="form-control" placeholder="Nome Completo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="#email">Email</label>
                        <input name = "email" id="email" type="email" class="form-control" placeholder="seu_nome@email.com" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="#password">Senha</label>
                            <input name = "password" id="password" type="password" class="form-control col-12" placeholder="Senha" class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="#confirm_password">Confirme sua senha</label>
                            <input name = "confirm_password" id="confirm_password" type="password" class="form-control col-12" placeholder="Confirme a Senha" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="#start_date">Data de Admissão</label>
                            <input name = "start_date" id="password" type="date" class="form-control col-12" placeholder="Senha" class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="#end_date">Data de Desligamento</label>
                            <input name = "end_date" id="end_date" type="date" class="form-control col-12" placeholder="Confirme a Senha" class="form-control">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-outline-success">Salvar</button>
                </div>
            </div>
        </div>
    </div>

</form>