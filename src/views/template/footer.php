    <footer class="footer">
        <span>Desenvolvido com</span>
        <span><i class="icofont-heart text-danger mx-1"></i></span>
        <span>por Eddie</span>
    </footer>
    <script src="assets/js/clock.js">
    </script>
    <script>
        $('.escondedor-btn').on('click', () => {
            if ($('body').hasClass('hidesidebar')) {
                $('body').removeClass('hidesidebar');
                $('.sidebar').show();
            } else {
                $('body').addClass('hidesidebar');
                $('.sidebar').hide();
            }
        });

        $(document).ready(function() {
            $('#monthly_report').DataTable();
        });

        /**
         * @translateToPortuguese 
         *
         * * Este json é responsável por traduzir toda a dataTable para o português
         * ! Não alterar, pois este está copiada de um plugin da própria dataTable 
         */
        $('#monthly_report').dataTable({
            "language": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "Dias por página: _MENU_ ",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                },
                "select": {
                    "rows": {
                        "_": "Selecionado %d linhas",
                        "0": "Nenhuma linha selecionada",
                        "1": "Selecionado 1 linha"
                    }
                }
            }
        });

        var balance = <?= $iTotal_worked_time - $iExpected_time ?>;
        if (balance < 0) {
            $("#monthly_work_result").css("background-color", "rgb(156, 21, 21)");
        } else {
            $("#monthly_work_result").css("background-color", "rgb(46, 146, 0)");
        }
    </script>
    <script>
        $("#register").validate({
            rules: {
                name: {
                    required: true,

                },
                start_date: {
                    required: true,

                },
                email: {
                    required: true,
                    email: true,

                },
                password: {
                    required: true,
                    equalTo: "#confirm_password"
                },
                confirm_password: {
                    required: true,
                }
            },
            messages: {
                name: {
                    required: "Este é um campo obrigatório",
                },
                start_date: {
                    required: "Este é um campo obrigatório",
                },
                email: {
                    required: "Este é um campo obrigatório",
                    email: "Insira um email válido",
                },
                password: {
                    required: "Este é um campo obrigatório",
                    equalTo: "Senhas devem ser iguais",
                },
                confirm_password: {
                    required: "Campo obrigatório",
                },

            }
        });
    </script>

    </html>