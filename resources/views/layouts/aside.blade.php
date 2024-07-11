<aside class="main-sidebar sidebar-dark-primary elevation-2">
    <!-- Brand Logo -->
    {{-- <a href="/" class="brand-link text-center d-block bg-white">
      <img src="/img/logolong.png" alt="" width="100%" class="mr-2 d-block">
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info" style="white-space: normal;">
                <a href="/profile" class="d-block">
                    <p>{{ Auth::user()->name }}</p>
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        @if (Auth::user()->role === 'admin')
            @include('layouts.menu-admin')
        @elseif (Auth::user()->role === 'dosen')
            @include('layouts.menu-dosen')
        @elseif (Auth::user()->role == 'mahasiswa')
            @include('layouts.menu-mahasiswa')
        @endif
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
