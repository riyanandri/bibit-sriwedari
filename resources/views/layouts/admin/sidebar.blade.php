<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="{{ url('admin/dashboard') }}">
          <img src="{{ asset('admin/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ set_active('admin/dashboard') }}" href="{{ url('admin/dashboard') }}">
                <i class="ni ni-shop text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ set_active('admin/banners') }}" href="{{ url('admin/banners') }}">
                <i class="ni ni-image text-primary"></i>
                <span class="nav-link-text">Banner</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ set_active('admin/sentra-bibit') }}" href="{{ url('admin/sentra-bibit') }}">
                <i class="ni ni-building text-primary"></i>
                <span class="nav-link-text">Sentra Bibit</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ set_active('admin/category') }}" href="{{ url('admin/category') }}">
                <i class="ni ni-box-2 text-primary"></i>
                <span class="nav-link-text">Kategori</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ set_active('admin/products') }}" href="{{ url('admin/products') }}">
                <i class="ni ni-bag-17 text-primary"></i>
                <span class="nav-link-text">Produk</span>
              </a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                <i class="ni ni-ungroup text-orange"></i>
                <span class="nav-link-text">Examples</span>
              </a>
              <div class="collapse" id="navbar-examples">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="../../pages/examples/pricing.html" class="nav-link">Pricing</a>
                  </li>
                  <li class="nav-item">
                    <a href="../../pages/examples/login.html" class="nav-link">Login</a>
                  </li>
                  <li class="nav-item">
                    <a href="../../pages/examples/register.html" class="nav-link">Register</a>
                  </li>
                  <li class="nav-item">
                    <a href="../../pages/examples/lock.html" class="nav-link">Lock</a>
                  </li>
                  <li class="nav-item">
                    <a href="../../pages/examples/timeline.html" class="nav-link">Timeline</a>
                  </li>
                  <li class="nav-item">
                    <a href="../../pages/examples/profile.html" class="nav-link">Profile</a>
                  </li>
                </ul>
              </div>
            </li> --}}
          </ul>
        </div>
      </div>
    </div>
  </nav>