<?php

$list = '';

if (isset($_GET['status'])) {

    switch ($_GET['status']) {
        case 'success':
            $icon  = 'success';
            $title = 'Parabéns';
            $text = 'Cadastro realizado com Sucesso !!!';
            break;

        case 'del':
            $icon  = 'error';
            $title = 'Parabéns';
            $text = 'Esse usuário foi excluido !!!';
            break;

        case 'edit':
            $icon  = 'warning';
            $title = 'Parabéns';
            $text = 'Cadastro atualizado com sucesso !!!';
            break;


        default:
            $icon  = 'error';
            $title = 'Opss !!!';
            $text = 'Algo deu errado entre em contato com admin !!!';
            break;
    }

    function alerta($icon, $title, $text)
    {
        echo "<script type='text/javascript'>
      Swal.fire({
        type:'type',  
        icon: '$icon',
        title: '$title',
        text: '$text'
       
      }) 
      </script>";
    }

    alerta($icon, $title, $text);
}

$resultados = '';

foreach ($listar as $item) {

    $resultados .= '<tr>
   <td>' . $item->id . '</td>
   <td>' . $item->nome . '</td>
   <td>' . $item->email . '</td>
   <td>' . $item->cargo . '</td>
   <td>' . $item->acesso . '</td>
   <td class="centro">

   <button class="btn btn-light btn-sm" onclick="Editar(' . $item->id . ')"> <i class="fas fa-pencil-alt"></i> &nbsp; Editar</button>

   &nbsp;
   <a href="cargo-delete.php?id=' . $item->id . '">
   <button type="button" class="btn btn-light btn-sm"> <i class="far fa-trash-alt"></i> &nbsp; Excluir</button>
   </a>


   </td>
</tr>';
}


?>

<div class="card card-custom">
    <div class="card-header flex-wrap py-5">
        <div class="card-title">
            <h3 class="card-label">
                Cadastro de acesso de usuários
                <div class="text-muted pt-2 font-size-sm">Acesso restrito ao admiminstrador</div>
            </h3>
        </div>
        <div class="card-toolbar">
            <!--begin::Dropdown-->
            <div class="dropdown dropdown-inline mr-2">
                <button class="btn btn-light-success font-weight-bolder dropdown-toggle" data-toggle="modal"
                    data-target="#modal-default">

                    <span class="fa fa-plus"></span> &nbsp; Novo</button>
                <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle">
                    Exportar
                </button>


            </div>





        </div>
    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        <table class="table table-separate table-hover " id="datatable">
            <thead>
                <tr>
                    <th class="car"> CÓDIGO </th>
                    <th> NOME </th>
                    <th> EMAIL </th>
                    <th> CARGO </th>
                    <th> ACESSO </th>
                    <th class="acao"> AÇÃO </th>
                </tr>
            </thead>

            <tbody>
                <?= $resultados ?>

            </tbody>

        </table>
        <!--end: Datatable-->
    </div>
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-light">
            <form action="./usuario-insert.php" method="post">

                <div class="modal-header">
                    <h4 class="modal-title">Novo usuario
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Cargos</label>
                                <select class="form-control select" style="width: 100%;" name="cargos_id">
                                    <option value=""> Selecione um usuario </option>
                                    <?php

                                    foreach ($cargos as $item) {
                                        echo '<option value="' . $item->id . '">' . $item->descricao . '</option>';
                                    }
                                    ?>

                                </select>
                            </div>


                        </div>

                        <div class="col-6">

                            <div class="form-group">
                                <label>Nível de acesso</label>
                                <select class="form-control select" style="width: 100%;" name="acessos_id">
                                    <option value=""> Selecione um nivel </option>
                                    <?php

                                    foreach ($acessos as $item) {
                                        echo '<option value="' . $item->id . '">' . $item->nivel . '</option>';
                                    }
                                    ?>

                                </select>
                            </div>

                        </div>

                    </div>

                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" placeholder="Senha" id="password" class="form-control" name="senha"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Confirma Senha</label>
                        <input type="password" placeholder="Confirme Senha" id="confirm_password" class="form-control"
                            required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>

            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<form action="./usuario-edit.php" method="get">
    <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-lg">

            <div class="modal-content bg-light">
                <div class="modal-header">
                    <h4 class="modal-title">Editar
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <span class="edit-modal"></span>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar
                    </button>
                </div>
            </div>

            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</form>