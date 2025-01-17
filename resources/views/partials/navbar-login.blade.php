<nav
class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
id="layout-navbar">
<div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
  <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
    <i class="bx bx-menu bx-md"></i>
  </a>
</div>

<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

  <h4 class="m-0 fw-bold">{{ $title }}</h4 >

  <ul class="navbar-nav flex-row align-items-center ms-auto">

    <!-- User -->
    <li class="nav-item navbar-dropdown dropdown-user dropdown">
      <a
        class="nav-link dropdown-toggle hide-arrow p-0"
        href="javascript:void(0);"
        data-bs-toggle="dropdown">
        <div class="avatar avatar-online">
          <img src="{{ auth()->user()->gambar_profil ? asset('storage/' . auth()->user()->gambar_profil) : asset('img/default.png') }}"
           alt="Foto Profile" 
           class="w-px-40 h-auto rounded-circle border border-primary border-1" />
        </div>
      </a>
      <ul class="dropdown-menu dropdown-menu-end">
        <li>
          <a class="dropdown-item" href="/dashboard-profile">
            <div class="d-flex">
              <div class="flex-shrink-0 me-3">
                <div class="avatar avatar-online">
                  <img 
                    src="{{ auth()->user()->gambar_profil ? asset('storage/' . auth()->user()->gambar_profil) : asset('img/default.png') }}" 
                    alt="Foto Profil" 
                    class="w-px-40 h-auto rounded-circle border border-primary border-1" 
                  />
                </div>
              </div>
              <div class="flex-grow-1">
                <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                <small class="text-muted">Administrator</small>
              </div>
            </div>            
          </a>
        </li>
        <li>
          <div class="dropdown-divider my-1"></div>
        </li>
        <li>
          <a class="dropdown-item" href="/dashboard-profile">
            <i class="bx bx-user bx-md me-3"></i><span>My Profile</span>
          </a>
        </li>
        <li>
          <div class="dropdown-divider my-1"></div>
        </li>
        <li>
          <form action="/logout" method="post">
              @csrf
              <button type="submit" class="dropdown-item"><i class="bx bx-power-off bx-md me-3"></i>Logout</button>
          </form>
        </li>
      </ul>
    </li>
    <!--/ User -->
  </ul>
</div>
</nav>