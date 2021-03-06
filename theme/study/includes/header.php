    <div class="dashboard-header">
        <nav class="navbar navbar-expand-lg bg-white fixed-top">
            <a class="navbar-brand" href="home.php" style="font-family: Poppins !important">Meu estágio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-right-top">
                    <li class="nav-item dropdown notification"></li>
                    <li class="nav-item dropdown nav-user">
                        <?php
                            $parametros = [":id" => $_SESSION['id']];
                            $buscandoAlunoDados = new Model();
                            $buscando = $buscandoAlunoDados->EXE_QUERY("SELECT * FROM tb_aluno WHERE id_aluno=:id", $parametros);
                            foreach($buscando as $mostrar):
                                $fotoUsuario = $mostrar['foto'];
                            endforeach;
                        ?>

                        <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                src="../assets/storage/study/<?= $fotoUsuario ?>" alt=""
                                class="user-avatar-md rounded-circle"></a>
                        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                            aria-labelledby="navbarDropdownMenuLink2">
                            <div class="nav-user-info">
                                <h5 class="mb-0 text-white nav-user-name"><?= $_SESSION['nome'] ?></h5>
                            </div>
                            <a class="dropdown-item" href="?logout=true"><i class="fas fa-power-off mr-2"></i>Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="nav-left-sidebar sidebar-dark" style="background-color: #1f6febe6;">
        <div class="menu-list">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
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
                            <a class="nav-link <?php if($_GET['id'] == 'home') echo "active";?>"
                              href="home.php?id=home"><i class="fa fa-fw fa-user-circle"></i>Página Inicial
                                <span class="badge badge-success">6</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?php if($_GET['id'] == 'empresas') echo "active";?>" href="empresas.php?id=empresas"><i class="fab fa-fw fa-wpforms"></i>Empresas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  <?php if($_GET['id'] == 'meuestagio') echo "active";?>" href="meuestagio.php?id=meuestagio"><i class="fas fa-fw fa-chart-pie"></i>Meu estágio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  <?php if($_GET['id'] == 'perfil') echo "active";?>" href="perfil.php?id=perfil"><i class="fas fa-user"></i>Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?logout=true"><i class="fas fa-f fa-power-off"></i>Terminar sessão</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

