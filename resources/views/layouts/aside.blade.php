<aside class="main-sidebar sidebar-dark-primary elevation-2">
    <!-- Brand Logo -->
    {{-- <a href="/" class="brand-link text-center d-block bg-white">
      <img src="/img/logolong.png" alt="" width="100%" class="mr-2 d-block">
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if (Auth::user()->role === 'admin')
          <img src="{{ Auth::user()->image }}" class="img-circle elevation-2" alt="User Image">
          @else
          @if (Auth::user()->role === 'dosen')
          <img src="{{ Auth::user()->image }}" class="img-circle elevation-2" alt="User Image">
          @else
          <img src="{{ Auth::user()->image }}" class="img-circle elevation-2" style="width: 35px; height:35px;" alt="User Image">
          @endif
          @endif

        </div>
        <div class="info" style="white-space: normal;">
            @if (Auth::user()->role == 'admin')
            <a href="{{route('admin.profile')}}" class="d-block">
            @else
            @if (Auth::user()->role == 'dosen')
            <a href="{{ route('dosen.profile') }}" class="d-block">
            @else
            @if (Auth::user()->role == 'mahasiswa')
            <a href="#" class="d-block">
            @endif
            @endif
            @endif

            <p>{{ Auth::user()->name }}</p>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      @if (Auth::user()->role === 'admin')
      @include("layouts.menu-admin")
      @elseif (Auth::user()->role === 'dosen')
      @include("layouts.menu-dosen")
      @elseif (Auth::user()->role == 'mahasiswa')
      @include("layouts.menu-mahasiswa")
      @endif
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
