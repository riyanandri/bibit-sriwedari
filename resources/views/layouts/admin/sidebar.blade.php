<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Bibit Sriwedari</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">BS</a>
        </div>
        <ul class="sidebar-menu">
            <li class="nav-item {{ set_active('admin/dashboard') }}">
                <a href="{{ url('admin/dashboard') }}" class="nav-link"><i class="fas fa-home"></i></i></i><span>Dashboard</span></a>
            </li>
            <li class="nav-item dropdown {{ set_active('admin/category') }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-box"></i> <span>Data Master</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ set_active('admin/category') }}"><a class="nav-link" href="{{ url('admin/category') }}">Kategori</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">Produk</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
