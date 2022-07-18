<?php

$alertaLogin     = strlen($alertaLogin) ? '<div class="alert alert-danger">' . $alertaLogin . '</div>' : '';
$alertaCadastro  = strlen($alertaCadastro) ? '<div class="alert alert-danger">' . $alertaCadastro . '</div>' : '';

?>

<div class="d-flex flex-column flex-row-fluid position-relative p-7 overflow-hidden">
    <!--begin::Content header-->
    <div
        class="position-absolute top-0 right-0 text-right mt-5 mb-15 mb-lg-0 flex-column-auto justify-content-center py-5 px-10">
        <span class="font-weight-bold text-dark-50">Não tem uma conta ainda</span>
        <a href="javascript:;" class="font-weight-bold ml-2" id="kt_login_signup">Inscrever-se !</a>
    </div>
    <!--end::Content header-->

    <!--begin::Content body-->

    <div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">
        <!--begin::Signin-->
        <div class="login-form login-signin">
            <div class="text-center mb-10 mb-lg-20">
                <?= $alertaLogin  ?>
                <h3 class="font-size-h1">SISTEMA PADRÃO</h3>
                <p class="text-muted font-weight-bold">Digite seu nome de usuário e senha</p>
            </div>

            <!--begin::Form-->

            <form action="" class="form" novalidate="novalidate" id="kt_login_signin_form" method="post">
                <div class="form-group">
                    <input class="form-control form-control-solid h-auto py-5 px-6" type="Email" placeholder="Email"
                        name="email" autocomplete="off" />
                </div>
                <div class="form-group">
                    <input class="form-control form-control-solid h-auto py-5 px-6" type="password"
                        placeholder="Password" name="senha" autocomplete="off" />
                </div>
                <!--begin::Action-->
                <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                    <a href="javascript:;" class="text-dark-50 text-hover-primary my-3 mr-2" id="kt_login_forgot">
                        Esqueceu sua senha ?
                    </a>
                    <button type="submit" id="kt_login_signin_submit"
                        class="btn btn-primary font-weight-bold px-9 py-4 my-3" name="acao"
                        value="logar">Acessar</button>
                </div>

            </form>

        </div>



    </div>