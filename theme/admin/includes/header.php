  <div class="dashboard-header">
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <a class="navbar-brand" href="index.html">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
                <li class="nav-item dropdown notification">
                    <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span
                            class="indicator"></span></a>
                    <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                        <li>
                            <div class="notification-title"> Notification</div>
                            <div class="notification-list">
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="notification-info">
                                            <div class="notification-list-user-img"><img
                                                    src="../assets/images/avatar-5.jpg" alt=""
                                                    class="user-avatar-md rounded-circle"></div>
                                            <div class="notification-list-user-block"><span
                                                    class="notification-list-user-name">Jessica
                                                    Caruso</span>accepted your invitation to join the team.
                                                <div class="notification-date">2 min ago</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="list-footer"> <a href="#">View all notifications</a></div>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown nav-user">
                    <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                            src="../assets/images/avatar-1.jpg" alt=""
                            class="user-avatar-md rounded-circle"></a>
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                        aria-labelledby="navbarDropdownMenuLink2">
                        <div class="nav-user-info" style="background: #fa5c91">
                            <h5
                              class="mb-0 text-white nav-user-name"
                              style="font-family: Arial !important;
                              font-weight: bold !important">
                              Eduardo Haliby </h5>
                           <span>
                              Administrador
                            </span>
                        </div>
                        <a class="dropdown-item" href="#"><i class="fas fa-power-off mr-2"></i>
                          Terminar sessão
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
  </div>

  <div class="nav-left-sidebar sidebar-dark" style="background-color: #fa5c91;">
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
                        <i class="fa fa-fw fa-user-circle"></i>Dashboard
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
                      <a class="nav-link <?= $_GET['id'] == 'foreigners' ? 'active' : '' ?>" href="foreigners-abroad.php?id=foreigners">
                        <i class="fas fa-fw fa-chart-pie"></i>Estagiários
                    </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link <?= $_GET['id'] == 'teste' ? 'active' : '' ?>" href="#">
                        <i class="fas fa-f fa-chart-pie"></i>Estátisticas
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

