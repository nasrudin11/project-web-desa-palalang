<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="/dashboard-admin" class="app-brand-link">
        <img src="{{ asset('storage/' . $data->logo) }}" alt="logo" style="width: 50px">
        <span class="app-brand-text demo menu-text fw-bold fs-4 ms-3">
          <span class="fs-6 fw-normal">Desa</span><br>
          <span style="color: #28a745;">Palalang</span>
        </span>
      </a>      

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

      <li class="menu-header small text-uppercase"><span class="menu-header-text">Home</span></li>

      <!-- Dashboards -->
      <li class="menu-item {{ $title == 'Dashboard' ? 'active' : '' }}">
          <a href="/dashboard-admin" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-smile"></i>
            <div class="text-truncate" data-i18n="Dashboards">Dashboard</div>
          </a>
      </li>

      <li class="menu-header small text-uppercase"><span class="menu-header-text">Menu</span></li>

      <!-- Layouts Homepage -->
      <li class="menu-item {{ in_array($title, ['Homepage Layouts', 'Profile Layouts', 'Pemerintahan Layouts']) ? 'open active' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div class="text-truncate {{ in_array($title, ['Homepage', 'Profile', 'Pemerintahan']) ? 'active' : '' }}" data-i18n="Layouts">Layouts</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item {{ $title == 'Homepage Layouts' ? 'active' : '' }}">
            <a href="/dashboard-layouts-homepage" class="menu-link">
              <div class="text-truncate" data-i18n="Without menu">Homepage</div>
            </a>
          </li>
          <li class="menu-item {{ $title == 'Profile Layouts' ? 'active' : '' }}">
            <a href="/dashboard-layouts-profile" class="menu-link">
              <div class="text-truncate" data-i18n="Without menu">Profile</div>
            </a>
          </li>
          <li class="menu-item {{ $title == 'Pemerintahan Layouts' ? 'active' : '' }}">
            <a href="/dashboard-layouts-pemerintahan" class="menu-link">
              <div class="text-truncate" data-i18n="Without menu">Pemerintahan</div>
            </a>
          </li>
        </ul>
      </li>
      
      <!-- Publikasi -->
      <li class="menu-item {{ in_array($title, ['Foto', 'Video', 'Berita', 'Pengumuman']) ? 'open active' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-cube-alt"></i>
          <div class="text-truncate {{ in_array($title, ['Foto', 'Video', 'Berita', 'Pengumuman']) ? 'active' : '' }}" data-i18n="Misc">Publikasi</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ $title == 'Foto' ? 'active' : '' }}">
            <a href="/dashboard-foto" class="menu-link">
              <div class="text-truncate" data-i18n="Error">Foto</div>
            </a>
          </li>
          <li class="menu-item {{ $title == 'Video' ? 'active' : '' }}">
            <a href="/dashboard-video" class="menu-link">
              <div class="text-truncate" data-i18n="Under Maintenance">Video</div>
            </a>
          </li>
          <li class="menu-item {{ $title == 'Berita' ? 'active' : '' }}">
              <a href="/dashboard-berita" class="menu-link">
                <div class="text-truncate" data-i18n="Under Maintenance">Berita</div>
              </a>
          </li>
          <li class="menu-item {{ $title == 'Pengumuman' ? 'active' : '' }}">
              <a href="/dashboard-pengumuman" class="menu-link">
                <div class="text-truncate" data-i18n="Under Maintenance">Pengumuman</div>
              </a>
          </li>
        </ul>
      </li>

      <li class="menu-item {{ $title == 'Pengaduan' ? 'active' : '' }}">
          <a href="/dashboard-pengaduan" class="menu-link">
            <i class="menu-icon tf-icons bx bx-chat"></i>
            <div class="text-truncate" data-i18n="Chat">Pengaduan</div>
            <span class="badge rounded-pill bg-danger ms-auto">5</span>
          </a>
      </li>
    </ul>
  </aside>