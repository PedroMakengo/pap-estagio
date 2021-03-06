    <div class="dashboard-header">
        <nav class="navbar navbar-expand-lg bg-white fixed-top">
            <a class="navbar-brand" href="home.php">Meu estágio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-right-top">
                    <li class="nav-item dropdown nav-user">
                         <?php
                            $parametros = [":id" => $_SESSION['id']];
                            $buscandoFotoEmpresa = new Model();
                            $buscando = $buscandoFotoEmpresa->EXE_QUERY("SELECT * FROM tb_empresa WHERE id_empresa=:id", $parametros);
                            foreach($buscando as $mostrar):
                                $fotoUsuario = $mostrar['foto'];
                            endforeach;
                        ?>
                        <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                src="../assets/images/profile/<?= $fotoUsuario ?>" alt=""
                                class="user-avatar-md rounded-circle"></a>
                        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                            aria-labelledby="navbarDropdownMenuLink2">
                            <div class="nav-user-info">
                                <h5 class="mb-0 text-white nav-user-name"><?= $_SESSION['nome'] ?></h5>
                            </div>
                            <a class="dropdown-item" href="?logout=true"><i class="fas fa-power-off mr-2"></i>Terminar Sessão</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="nav-left-sidebar sidebar-dark" style="background-color: #1f6febe6;">
        <div class="menu-list">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="d-xl-none d-lg-none" href="home.php">Dashboard</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-divider">
                            Menu
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?= $_GET['id'] == 'home' ? 'active' : '' ?>" href="home.php?id=home"><i class="fa fa-fw fa-user-circle"></i>Página Inicial
                                <span class="badge badge-success">6</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $_GET['id'] == 'vaga' ? 'active' : '' ?>" href="vacancy.php?id=vaga"><i class="fas fa-f fa-folder"></i>Vaga</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $_GET['id'] == 'aceite' ? 'active' : '' ?>" href="accepted.php?id=aceite"><i class="fas fa-users"></i>Candidatos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $_GET['id'] == 'relatorio' ? 'active' : '' ?>" href="monthly-report.php?id=relatorio"><i class="fas fa-fw fa-chart-pie"></i>Relatório & Gráficos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $_GET['id'] == 'perfil' ? 'active' : '' ?>" href="profile.php?id=perfil"><i class="fas fa-user"></i>Meu Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?logout=true"><i class="fas fa-f fa-power-off"></i>Terminar sessão</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

