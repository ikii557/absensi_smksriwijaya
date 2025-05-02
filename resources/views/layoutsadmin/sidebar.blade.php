<div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
              <img src="{{ asset('') }}assetss/img/smkkarangpucunglogo.jpeg" alt="navbar brand" class="navbar-brand" height="50" />
              <span class="text-white p-1">SRIKARPU</span>
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item {{ request()->is('dashboardadmin') ? 'active' : '' }}">
                <a href="{{ url('dashboardadmin') }}" class="{{ request()->is('index') ? '' : 'collapsed' }}">
                    <i class="fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
              </li>
              {{-- <li class="nav-item active">
                <a
                  data-bs-toggle="collapse"
                  href="#dashboard"
                  class="collapsed"
                  aria-expanded="false"
                >
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="dashboard">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="../demo1/index.html">
                        <span class="sub-item">Dashboard 1</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li> --}}
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Components</h4>
              </li>
              <li class="nav-item 
    {{ request()->is('dataguru') || request()->is('editdataguru') || request()->is('tambahdataguru') || 
       request()->is('datasiswa') || request()->is('editdatasiswa') || request()->is('tambahdatasiswa') ? 'active' : '' }}">
    
    <a data-bs-toggle="collapse" href="#submenu" 
       aria-expanded="{{ request()->is('dataguru') || request()->is('editdataguru') || request()->is('tambahdataguru') || 
                        request()->is('datasiswa') || request()->is('editdatasiswa') || request()->is('tambahdatasiswa') ? 'true' : 'false' }}">
        <i class="fas fa-bars"></i>
        <p>DATA</p>
        <span class="caret"></span>
    </a>

    <div class="collapse 
        {{ request()->is('dataguru') || request()->is('editdataguru') || request()->is('tambahdataguru') || 
           request()->is('datasiswa') || request()->is('editdatasiswa') || request()->is('tambahdatasiswa') ? 'show' : '' }}" 
         id="submenu">

        <ul class="nav nav-collapse">

            {{-- Submenu Data Guru --}}
            <li class="{{ request()->is('dataguru') || request()->is('editdataguru') || request()->is('tambahdataguru') ? 'active' : '' }}">
                <a data-bs-toggle="collapse" href="#subnavGuru" 
                   aria-expanded="{{ request()->is('dataguru') || request()->is('editdataguru') || request()->is('tambahdataguru') ? 'true' : 'false' }}">
                    <span class="sub-item">DATA GURU</span>
                    <span class="caret"></span>
                </a>
                <div class="collapse {{ request()->is('dataguru') || request()->is('editdataguru') || request()->is('tambahdataguru') ? 'show' : '' }}" id="subnavGuru">
                    <ul class="nav nav-collapse subnav">
                        <li class="{{ request()->is('dataguru') || request()->is('editdataguru') ? 'active bg- text-white' : '' }}">
                            <a href="{{ url('dataguru') }}">
                                <span class="sub-item">Data Para Guru SMK</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            {{-- Submenu Data Siswa --}}
            <li class="{{ request()->is('datasiswa') || request()->is('editdatasiswa') || request()->is('tambahdatasiswa') ? 'active' : '' }}">
                <a data-bs-toggle="collapse" href="#subnavSiswa" 
                   aria-expanded="{{ request()->is('datasiswa') || request()->is('editdatasiswa') || request()->is('tambahdatasiswa') ? 'true' : 'false' }}">
                    <span class="sub-item">DATA SISWA</span>
                    <span class="caret"></span>
                </a>
                <div class="collapse {{ request()->is('datasiswa') || request()->is('editdatasiswa') || request()->is('tambahdatasiswa') ? 'show' : '' }}" id="subnavSiswa">
                    <ul class="nav nav-collapse subnav">
                        <li class="{{ request()->is('datasiswa') || request()->is('editdatasiswa') ? 'active' : '' }}">
                            <a href="{{ url('datasiswa') }}">
                                <span class="sub-item">Data Para Siswa/Siswi SMK</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>
</li>

              <li class="nav-item {{ request()->is('pengajuankk','pengajuanktp','pengajuandomisili','pengajuannikah') ? 'active' : '' }}">
                <a data-bs-toggle="collapse" href="#base" aria-expanded="{{ request()->is('pengajuankk','pengajuanktp','pengajuandomisili','pengajuannikah') ? 'true' : 'false' }}">
                  <i class="fas fa-layer-group"></i>
                  <p>DATA ABSEN</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse {{ request()->is('pengajuankk','pengajuanktp','pengajuandomisili','pengajuannikah') ? 'show' : '' }}" id="base">
                  <ul class="nav nav-collapse">
                    <li class="{{ request()->is('pengajuanktp') ? 'active' : '' }}">
                      <a href="{{ url('pengajuanktp') }}">
                        <span class="sub-item">ABSEN TERKINI</span>
                      </a>
                    </li>
                    <li class="{{ request()->is('pengajuankk') ? 'active' : '' }}">
                      <a href="{{ url('pengajuankk') }}">
                        <span class="sub-item">1 MINGGU LALU</span>
                      </a>
                    </li>
                    <li class="{{ request()->is('pengajuandomisili') ? 'active' : '' }}">
                      <a href="{{ url('pengajuandomisili') }}">
                        <span class="sub-item">1 BULAN LALU</span>
                      </a>
                    </li>
                    <li class="{{ request()->is('pengajuannikah') ? 'active' : '' }}">
                      <a href="{{ url('pengajuannikah') }}">
                        <span class="sub-item">1 SEMESTER</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item {{ request()->is('pengaduan') ? 'active' : '' }}">
                <a data-bs-toggle="collapse" href="#sidebarLayouts" 
                  aria-expanded="{{ request()->is('pengaduan') ? 'true' : 'false' }}">
                  <i class="fas fa-th-list"></i>
                  <p>DATA PENGADUAN</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse {{ request()->is('pengaduan') ? 'show' : '' }}" id="sidebarLayouts">
                  <ul class="nav nav-collapse">
                    <li class="{{ request()->is('pengaduan') ? 'active' : '' }}">
                      <a href="{{ url('pengaduan') }}">
                        <span class="sub-item">PENGADUAN SISWA</span>
                      </a>
                    </li>
                    {{-- <li>
                      <a href="icon-menu.html">
                        <span class="sub-item">Icon Menu</span>
                      </a>
                    </li> --}}
                  </ul>
                </div>
              </li>
              {{-- <li class="nav-item {{ request()->is('berita') ? 'active' : '' }}">
                <a data-bs-toggle="collapse" href="#forms" 
                  aria-expanded="{{ request()->is('berita') ? 'true' : 'false' }}">
                  <i class="fas fa-pen-square"></i>
                  <p>BERITA</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse {{ request()->is('berita') ? 'show' : '' }}" id="forms">
                  <ul class="nav nav-collapse">
                    <li class="{{ request()->is('berita') ? 'active' : '' }}">
                      <a href="{{ url('berita') }}">
                        <span class="sub-item">SEKITAR DESA</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item {{ request()->is('pelayanan') || request()->is('senin_jumat') || request()->is('sabtu_minggu') ? 'active' : '' }}">
                <a data-bs-toggle="collapse" href="#tables"
                  aria-expanded="{{ request()->is('pelayanan') || request()->is('senin_jumat') || request()->is('sabtu_minggu') ? 'true' : 'false' }}">
                  <i class="fas fa-table"></i>
                  <p>DATA PELAYANAN</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse {{ request()->is('pelayanan') || request()->is('senin_jumat') || request()->is('sabtu_minggu') ? 'show' : '' }}" id="tables">
                  <ul class="nav nav-collapse">
                    <li class="{{ request()->is('senin_jumat') ? 'active' : '' }}">
                      <a href="{{ url('senin_jumat') }}">
                        <span class="sub-item">PELAYANAN SENIN-JUMAT</span>
                      </a>
                    </li>
                    <li class="{{ request()->is('sabtu_minggu') ? 'active' : '' }}">
                      <a href="{{ url('sabtu_minggu') }}">
                        <span class="sub-item">PELAYANAN SABTU-MINGGU</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item {{ request()->is('chat_forum') || request()->is('data_chat') ? 'active' : '' }}">
                <a data-bs-toggle="collapse" href="#maps"
                  aria-expanded="{{ request()->is('chat_forum') || request()->is('data_chat') ? 'true' : 'false' }}">
                  <i class="fas fa-map-marker-alt"></i>
                  <p>CHAT FORUM</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse {{ request()->is('chat_forum') || request()->is('data_chat') ? 'show' : '' }}" id="maps">
                  <ul class="nav nav-collapse">
                    <li class="{{ request()->is('data_chat') ? 'active' : '' }}">
                      <a href="{{ url('data_chat') }}">
                        <span class="sub-item">data chat</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item {{ request()->is('statistikdesa') || request()->is('data_statistik') ? 'active' : '' }}">
                <a data-bs-toggle="collapse" href="#charts"
                  aria-expanded="{{ request()->is('statistikdesa') || request()->is('data_statistik') ? 'true' : 'false' }}">
                  <i class="far fa-chart-bar"></i>
                  <p>STATISTIK DESA</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse {{ request()->is('statistikdesa') || request()->is('data_statistik') ? 'show' : '' }}" id="charts">
                  <ul class="nav nav-collapse">
                    <li class="{{ request()->is('data_statistik') ? 'active' : '' }}">
                      <a href="{{ url('data_statistik') }}">
                        <span class="sub-item">data statistik desa</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a href="datasiswa">
                  <i class="fas fa-file"></i>
                  <p>DATA SISWA</p>
                  <span class="badge badge-secondary">1</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="dataguru">
                  <i class="fas fa-file"></i>
                  <p>DATA GURU</p>
                  <span class="badge badge-secondary">1</span>
                </a>
              </li> --}}
              <li class="nav-item">
                <a href="dokumentasiabsen">
                  <i class="fas fa-file"></i>
                  <p>Documentation</p>
                  <span class="badge badge-secondary">1</span>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a data-bs-toggle="collapse" href="#submenu">
                  <i class="fas fa-bars"></i>
                  <p>Menu Levels</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="submenu">
                  <ul class="nav nav-collapse">
                    <li>
                      <a data-bs-toggle="collapse" href="#subnav1">
                        <span class="sub-item">Level 1</span>
                        <span class="caret"></span>
                      </a>
                      <div class="collapse" id="subnav1">
                        <ul class="nav nav-collapse subnav">
                          <li>
                            <a href="#">
                              <span class="sub-item">Level 2</span>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <span class="sub-item">Level 2</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <a data-bs-toggle="collapse" href="#subnav2">
                        <span class="sub-item">Level 1</span>
                        <span class="caret"></span>
                      </a>
                      <div class="collapse" id="subnav2">
                        <ul class="nav nav-collapse subnav">
                          <li>
                            <a href="#">
                              <span class="sub-item">Level 2</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <a href="#">
                        <span class="sub-item">Level 1</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li> --}}
            </ul>
          </div>
        </div>
      </div>