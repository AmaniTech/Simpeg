<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="/dosen/dashboard" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Home
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/dosen/profile" class="nav-link">
                {{-- <a href="/dosen/datadiri/{{ auth()->user()->dosen->id }}" class="nav-link"> --}}
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Data Diri
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('dosen.schedule') }}" class="nav-link">
                <i class="nav-icon fas fa-building"></i>
                <p>
                    Management Jadwal
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('dosen.gaji') }}" class="nav-link">
                <i class="nav-icon fas fa-building"></i>
                <p>
                    Perhitungan Gaji
                </p>
            </a>
        </li>



    </ul>
</nav>
