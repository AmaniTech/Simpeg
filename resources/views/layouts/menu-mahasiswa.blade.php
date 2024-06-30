<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="/mahasiswa/dashboard" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Home
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('mahasiswa.schedule') }}" class="nav-link">
          <i class="nav-icon fas fa-building"></i>
          <p>
            Management Jadwal
          </p>
        </a>
      </li>
    </ul>
  </nav>
