<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ url('admin')}}">Presensi Sekolah</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ url('admin')}}">PS</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
          <a href="{{ url('admin')}}" class="nav-link"><i class="fas fa-school"></i><span>Dashboard</span></a>
        </li>
        <li class="nav-item {{ (request()->segment(2) == 'kelas') ? 'active' : '' }}">
          <a href="{{ route('kelas.index')}}" class="nav-link"><i class="fas fa-layer-group"></i><span>Data Kelas</span></a>
        </li>
        <li class="nav-item {{ (request()->segment(2) == 'siswa') ? 'active' : '' }}">
          <a href="{{ route('siswa.index')}}" class="nav-link"><i class="fas fa-users"></i><span>Data Siswa</span></a>
        </li>
        <li class="nav-item {{ (request()->segment(2) == 'posts') ? 'active' : '' }}">
          <a href="{{ route('posts.index')}}" class="nav-link"><i class="fas fa-bullhorn"></i><span>Pengumuman</span></a>
        </li>
        <li class="nav-item {{ (request()->segment(2) == 'laporan') ? 'active' : '' }}">
          <a href="{{ url('admin/laporan')}}" class="nav-link"><i class="fas fa-file-alt"></i><span>Laporan</span></a>
        </li>
        <li class="nav-item {{ (request()->segment(2) == 'pengaturan') ? 'active' : '' }}">
          <a href="{{ url('admin/pengaturan')}}" class="nav-link"><i class="fas fa-cogs"></i><span>Pengaturan</span></a>
        </li>
        
    </ul>

      {{-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-rocket"></i> Documentation
        </a>
      </div> --}}
  </aside>
</div>