<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="/admin/dashboard" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Home
                </p>
            </a>
        </li>
        {{-- <li class="nav-item">
        <a href="{{route("admin.sks")}}" class="nav-link">
          <i class="nav-icon fas fa-building"></i>
          <p>
            Sks Management
          </p>
        </a>
      </li> --}}
        {{-- <li class="nav-item">
        <a href="{{route("admin.hitung")}}" class="nav-link">
          <i class="nav-icon fas fa-building"></i>
          <p>
            Dosen Matkul
          </p>
        </a>
      </li> --}}
        {{-- <li class="nav-item">
        <a href="{{route("admin.total")}}" class="nav-link">
          <i class="nav-icon fas fa-building"></i>
          <p>
            Total Gaji
          </p>
        </a>
      </li> --}}
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-university nav-icon"></i>
                <p>
                    Master Data
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.jurusan') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Jurusan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.matkul') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Mata Kuliah</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ route('dosen.jadwal') }}" class="nav-link">
                <i class="nav-icon fas fa-calendar"></i>
                <p>
                    Jadwal
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.gaji') }}" class="nav-link">
                <i class="nav-icon fas fa-wallet"></i>
                <p>
                    Lihat Gaji
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.dosen') }}" class="nav-link">
                <i class="nav-icon fas fa-user-graduate"></i>
                <p>
                    Data Dosen
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.mahasiswa') }}" class="nav-link">
                <i class="nav-icon fas fa-user-tag"></i>
                <p>
                    Data Mahasiswa
                </p>
            </a>
        </li>


        <li class="nav-item">
            <a href="{{ route('admin.users') }}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    User Management
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="/setting" class="nav-link">
                <i class="nav-icon fas fa-wrench"></i>
                <p>
                    Setting
                </p>
            </a>
        </li>
    </ul>
</nav>
