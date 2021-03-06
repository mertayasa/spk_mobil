{{-- @dump(userRole()) --}}
<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
    <div class="sidebar-inner px-2 pt-3">
        {{-- <div
            class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
            <div class="d-flex align-items-center">
                <div class="avatar-lg me-4">
                    <img src="/assets/img/team/profile-picture-3.jpg" class="card-img-top rounded-circle border-white"
                        alt="Bonnie Green">
                </div>
                <div class="d-block">
                    <h2 class="h5 mb-3">Hi, Jane</h2>
                    <a href="/login" class="btn btn-secondary btn-sm d-inline-flex align-items-center">
                        <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg>
                        Sign Out
                    </a>
                </div>
            </div>
            <div class="collapse-close d-md-none">
                <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
                    <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div> --}}
        <ul class="nav flex-column pt-3 pt-md-0">

            <li class="nav-item"><a href="{{route('homepage')}}"
                    class="btn btn-secondary d-flex align-items-center justify-content-between">Lihat Website<i class="ml-2 fas fa-chevron-right"></i> </a></li>

            <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>

            <li class="nav-item {{ isActive('dashboard') }}">
                <a href="{{ route('dashboard.index') }}"
                    class="nav-link">
                    <span class="sidebar-icon"> <i class="fas fa-fire"></i> </span>
                    <span class="sidebar-text">Dashboard</span>
                </a>
            </li>

            <li class="nav-item {{ isActive('sopir') }}">
                <a href="{{ route('sopir.index') }}" class="nav-link">
                    <span class="sidebar-icon"> <i class="fas fa-id-badge"></i> </span>
                    <span class="sidebar-text">Sopir</span>
                </a>
            </li>

            <li class="nav-item {{ isActive('user') }}">
                <a href="{{ route('user.index') }}" class="nav-link">
                    <span class="sidebar-icon"> <i class="fas fa-users"></i> </span>
                    <span class="sidebar-text">Pengguna</span>
                </a>
            </li>

            <li class="nav-item {{ isActive('booking') }}">
                <a href="{{ route('booking.index') }}" class="nav-link">
                    <span class="sidebar-icon"> <i class="fas fa-calendar-check"></i> </span>
                    <span class="sidebar-text">Booking</span>
                </a>
            </li>

            <li class="nav-item {{ isActive('mobil') }}">
                <a href="{{ route('mobil.index') }}" class="nav-link">
                    <span class="sidebar-icon"> <i class="fas fa-car"></i> </span>
                    <span class="sidebar-text">Mobil</span>
                </a>
            </li>

            <li class="nav-item {{ isActive('jenis-mobil') }}">
                <a href="{{ route('jenis_mobil.index') }}" class="nav-link">
                    <span class="sidebar-icon"> <i class="fas fa-dot-circle"></i> </span>
                    <span class="sidebar-text">Jenis Mobil</span>
                </a>
            </li>

            <li class="nav-item {{ isActive('kriteria') }}">
                <a href="{{ route('kriteria.index') }}" class="nav-link">
                    <span class="sidebar-icon"> <i class="fas fa-dot-circle"></i> </span>
                    <span class="sidebar-text">Kriteria SAW</span>
                </a>
            </li>

            <li class="nav-item {{ isActive('sub-kriteria') }}">
                <a href="{{ route('sub_kriteria.index') }}" class="nav-link">
                    <span class="sidebar-icon"> <i class="fas fa-dot-circle"></i> </span>
                    <span class="sidebar-text">Sub Kriteria SAW</span>
                </a>
            </li>

            <li class="nav-item {{ isActive('saw') }}">
                <a href="{{ route('saw.index') }}" class="nav-link">
                    <span class="sidebar-icon"> <i class="fas fa-dot-circle"></i> </span>
                    <span class="sidebar-text">Kriteria SAW Mobil</span>
                </a>
            </li>


            {{-- Dropdown --}}
            {{-- <li class="nav-item">
                  <span
                      class="nav-link {{ Request::segment(1) !== 'bootstrap-tables' ? 'collapsed' : '' }} d-flex justify-content-between align-items-center"
                      data-bs-toggle="collapse" data-bs-target="#submenu-app">
                      <span>
                          <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor"
                                  viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd"
                                      d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                                      clip-rule="evenodd"></path>
                              </svg></span>
                          <span class="sidebar-text">Tables</span>
                      </span>
                      <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                              xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd"
                                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                  clip-rule="evenodd"></path>
                          </svg></span>
                  </span>
                  <div class="multi-level collapse {{ Request::segment(1) == 'bootstrap-tables' ? 'show' : '' }}"
                      role="list" id="submenu-app" aria-expanded="false">
                      <ul class="flex-column nav">
                          <li class="nav-item {{ Request::segment(1) == 'bootstrap-tables' ? 'active' : '' }}">
                              <a class="nav-link" href="/bootstrap-tables">
                                  <span class="sidebar-text">Bootstrap Tables</span>
                              </a>
                          </li>
                      </ul>
                  </div>
              </li> --}}
            {{-- End Dropdown --}}

        </ul>
    </div>
</nav>
