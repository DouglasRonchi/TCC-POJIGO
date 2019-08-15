<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
      <div class="sidebar-brand-icon">
        <!-- <i class="fas fa-laugh-wink"></i> -->
        <img src="../../../img/fav.png" alt="logotigo POJIGO">
      </div>
      <div class="sidebar-brand-text mx-3">POJIGO</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="dashboard.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Gestor
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-folder-plus "></i>
        <span>Cadastros</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Cadastrar:</h6>
          <a class="collapse-item" href="cadastro_usuarios.php">Usuário</a>
          <a class="collapse-item" href="cadastro_veiculos.php">Veículo</a>
          <a class="collapse-item" href="cadastro_rotas.php">Rotas</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-file"></i>
        <span>Relatórios</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Relatórios diversos:</h6>
          <a class="collapse-item" href="relatorio_usuarios.php">Usuário</a>
          <a class="collapse-item" href="relatorio_veiculos.php">Veículo</a>
          <a class="collapse-item" href="relatorio_rotas.php">Rotas</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Páginas</span>
      </a>
      <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Telas Diversas:</h6>
          <a class="collapse-item" href="cnhemopp.php">CNH & MOPP</a>
          <a class="collapse-item" href="diarias.php">Diárias</a>
          <a class="collapse-item" href="#">Mobile</a>
          <div class="collapse-divider"></div>
          <h6 class="collapse-header">Outras Páginas:</h6>
          <a class="collapse-item" href="404.php">404 Page</a>
        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">


    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="rastreamento.php">
          <i class="fas fa-map-marked-alt"></i>
        <span>Rastrear</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
      <a class="nav-link" href="registros.php">
          <i class="fas fa-clock"></i>
        <span>Registros</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->