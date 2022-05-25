  <div class="dashboard-header">
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <a class="navbar-brand" href="home.php?id=home">Meu estágio</a>
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
                      $buscandoEsperando = new Model();
                      $buscandoImagem = $buscandoEsperando->EXE_QUERY("SELECT * FROM tb_admin WHERE id_admin=:id", $parametros);
                      foreach($buscandoImagem as $mostrar):
                        $fotoImagem = $mostrar['foto_admin'];
                      endforeach;
                    ?>
                    <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                            src="../assets/images/profile/<?= $fotoImagem ?>" alt=""
                            class="user-avatar-md rounded-circle"></a>
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                        aria-labelledby="navbarDropdownMenuLink2">
                        <div class="nav-user-info" style="background: #1f6feb">
                            <h5
                              class="mb-0 text-white nav-user-name"
                              style="font-family: Arial !important;
                              font-weight: bold !important">
                                <?= $_SESSION['nome'] ?>
                            </h5>
                           <span>
                              Administrador
                            </span>
                        </div>
                        <a class="dropdown-item" href="?logout=true"><i class="fas fa-power-off mr-2"></i>
                          Terminar sessão
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
  </div>

  <div class="nav-left-sidebar sidebar-dark" style="background-color: #1f6feb;">
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
                      <a class="nav-link <?= $_GET['id'] == 'home' ? 'active' : '' ?>" href="home.php?id=home">
                        <i class="fa fa-fw fa-user-circle"></i>Página Inicial
                          <span class="badge badge-success">6</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link <?= $_GET['id'] == 'company' ? 'active' : '' ?>" href="company.php?id=company">
                        <i class="fa fa-fw fa-rocket"></i>Empresas
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link <?= $_GET['id'] == 'student' ? 'active' : '' ?>" href="students.php?id=student">
                        <i class="fas fa-fw fa-users"></i>Estudantes
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link <?= $_GET['id'] == 'declaracao' ? 'active' : '' ?>" href="declaracao.php?id=declaracao">
                        <i class="fas fa-fw fa-file"></i>Declarações
                    </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link <?= $_GET['id'] == 'estatistica' ? 'active' : '' ?>" href="estatistica.php?id=estatistica">
                        <i class="fas fa-f fa-chart-pie"></i>Estátisticas
                     </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link <?= $_GET['id'] == 'perfil' ? 'active' : '' ?>" href="perfil.php?id=perfil">
                        <i class="fas fa-user-circle"></i>Perfil
                     </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="?logout=true"><i class="fas fa-f fa-power-off"></i>Terminar sessão</a>
                  </li>
              </ul>
          </div>
      </nav>
    </div>
  </div>

