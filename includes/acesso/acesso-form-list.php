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
                      <td class="caixa-alta">' . $item->nivel . '</td>
                    
                      <td class="center">
                      
                      <button class="btn btn-light btn-sm" onclick="Editar(' . $item->id . ')"> <i class="fas fa-pencil-alt"></i> &nbsp; Editar</button>
                     
                      &nbsp;
                       <a href="pages/acessos/acesso-delete.php?id=' . $item->id . '">
                       <button type="button" class="btn btn-light btn-sm"> <i class="far fa-trash-alt"></i> &nbsp; Excluir</button>
                       </a>


                      </td>
                      </tr>

                      ';
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
                    <th>ID</th>
                    <th>ACESSO</th>
                    <th class="acao">AÇÔES</th>
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
    <div class="modal-dialog">
        <div class="modal-content bg-light">
            <form action="./acesso-insert.php" method="post">

                <div class="modal-header">
                    <h4 class="modal-title">Novo acesso
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nível</label>
                        <input type="text" class="form-control" name="nome" required>
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

<form action="./acesso-edit.php" method="get">
    <div class="modal fade" id="editModal">
        <div class="modal-dialog">

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