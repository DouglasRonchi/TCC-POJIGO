<?php
$conn = new Site;
?>

<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Pesquisar..."
                   aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>


    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                 aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Pesquisar..."
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <?php
                $query = $conn->executeQuery("SELECT * FROM notificacoes WHERE fk_usuario = {$_SESSION['usuario_id']}");
                $result = mysqli_num_rows($query);

                $queryQtd = $conn->executeQuery("SELECT * FROM notificacoes WHERE fk_usuario = {$_SESSION['usuario_id']} AND lida = 0");
                $qtdNotificacoes = mysqli_num_rows($queryQtd);
                ?>
                <span class="badge badge-danger badge-counter"><?= ($qtdNotificacoes > 0) ? $qtdNotificacoes . '+' : ''; ?></span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Notificações
                </h6>
                <?php
                while ($result = mysqli_fetch_assoc($query)):
                    if ($result['lida'] == 0):
                        ?>
                        <div class="d-flex align-items-center border-left-<?= ($result['lida']==1)?'success':'danger';?>">
                            <form action="../../controllers/notificacoesController.php" method="post">
                                <button type="submit" class="dropdown-item d-flex align-items-center btn"
                                        name="clicknotificacao">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-<?= $result['tipo'] ?>">
                                            <?= $result['icone'] ?>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500"><?= $result['data_notificacao'] ?></div>
                                        <span class="font-weight-bold"><?= utf8_encode($result['msg']) ?></span>
                                    </div>
                                    <input name="id" value="<?= $result['id'] ?>" hidden>
                                    <!-- Pega o ID da notificação -->
                                </button>
                            </form>
                        </div>
                    <?php
                    endif;
                endwhile;
                ?>
                <?php
                if ($qtdNotificacoes == 0):
                ?>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-dark">
                                <i class="fas fa-smile-beam text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">Olá, Tudo bem?</div>
                            <span class="font-weight-bold">Você não tem nenhuma nova notificação!</span>
                        </div>
                    </a>
                <?php
                endif;
                ?>
                <hr>
                <!-- Button trigger modal -->
                <a class="dropdown-item text-center small text-gray-500" href="#" data-toggle="modal"
                   data-target="#modalAllAlerts">
                    Mostrar todos os alertas
                </a>


            </div>
        </li>

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">7</span>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Mensagens
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div class="font-weight-bold">
                        <div class="text-truncate">Olá! Gostaria de saber se você pode me ajudar com um problema que tenho tido.</div>
                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                        <div class="status-indicator"></div>
                    </div>
                    <div>
                        <div class="text-truncate">Tenho as fotos que você pediu no mês passado, como gostaria que elas fossem enviadas para você?</div>
                        <div class="small text-gray-500">Jae Chun · 1d</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                        <div class="status-indicator bg-warning"></div>
                    </div>
                    <div>
                        <div class="text-truncate">O relatório do mês passado está ótimo, estou muito feliz com o progresso até agora, continue com o bom trabalho!</div>
                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div>
                        <div class="text-truncate">De os parabéns a equipe em meu nome, estou muito feliz com os resultados apresentados.
                        </div>
                        <div class="small text-gray-500">Steve Jobs · 2sem</div>
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Leia mais mensagens</a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= (isset($_SESSION['nome'])) ? $_SESSION['nome'] : ''; ?></span>
                <img class="img-profile rounded-circle" src="../../../uploads/<?= (isset($_SESSION['foto'])&&$_SESSION['foto']!='') ? $_SESSION['foto'] : 'default.png'; ?>">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Perfil
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Configurações
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Atividades
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Sair
                </a>
            </div>
        </li>

    </ul>

</nav>

<!-- Modal -->
<div class="modal fade" id="modalAllAlerts" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalTitle">Notificações</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $query = $conn->executeQuery("SELECT * FROM notificacoes WHERE fk_usuario = {$_SESSION['usuario_id']}");
                $result = mysqli_num_rows($query);
                while ($result = mysqli_fetch_assoc($query)):
                    ?>
                    <div class="d-block align-items-center border-left-<?= ($result['lida']==1)?'success':'danger';?>">
                        <form action="../../controllers/notificacoesController.php" method="post">
                            <button type="submit" class="dropdown-item d-flex align-items-center"
                                    name="clicknotificacao">
                                <div class="mr-3">
                                    <div class="icon-circle bg-<?= $result['tipo'] ?>">
                                        <?= $result['icone'] ?>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500"><?= $result['data_notificacao'] ?></div>
                                    <span class="font-weight-bold"><?= utf8_encode($result['msg']) ?></span>
                                </div>
                                <input name="id" value="<?= $result['id'] ?>" hidden>
                                <!-- Pega o ID da notificação -->
                            </button>
                        </form>
                    </div>
                <?php
                endwhile;
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="../../controllers/notificacoesController.php" method="post">
                    <button type="submit" name="dismissAll" class="btn btn-primary">Limpar tudo</button>
                    <button type="submit" name="deleteAll" class="btn btn-danger">Deletar todas</button>
                </form>
            </div>
        </div>
    </div>
</div>
