<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar" style="background:#fff;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Auth::user()->avatar ? url(Auth::user()->avatar) : asset('img/account.png') }}"
                    class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN MENU</li>
            @foreach(config('sidebar') as $menu)
                @if(Auth::user()->{"is{$menu->allowed}"}() || $menu->allowed === 'all')
                    @if(!$menu->tree)
                        {{-- Menu tanpa dropdown --}}
                        <li class="{{ Route::currentRouteName() === $menu->identifier->route ? 'active' : '' }}">
                            <a href="{{ $menu->route ? route($menu->route) : '#' }}{{ $menu->query }}">
                                <i class="{{ $menu->icon }}"></i>&nbsp;
                                <span>{{ $menu->title }}</span>
                            </a>
                        </li>
                    @else
                        {{-- Menu dengan dropdown (tree) --}}
                        @php
                            $isActive = collect($menu->tree)->contains(function ($tree) {
                                return Route::currentRouteName() === $tree->identifier->route;
                            });
                        @endphp
                        <li class="treeview {{ $isActive ? 'active menu-open' : '' }}">
                            <a href="#">
                                <i class="{{ $menu->icon }}"></i>&nbsp;
                                <span>{{ $menu->title }}</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                @foreach($menu->tree as $tree)
                                    <li class="{{ Route::currentRouteName() === $tree->identifier->route ? 'active' : '' }}">
                                        <a href="{{ $tree->route ? route($tree->route) : '#' }}{{ $tree->query }}">
                                            <i class="{{ $tree->icon }}"></i>&nbsp;
                                            {{ $tree->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endif
            @endforeach
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>


<style>
    .main-sidebar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        overflow-y: auto;
        background: #fff !important;
        z-index: 1000;
    }

    .main-sidebar .user-panel .info p {
        color: #0284c7;
        font-weight: bold;
        font-size: 14px;
    }

    .main-sidebar .user-panel .info a {
        color: #666;
        font-size: 12px;
    }

    .main-sidebar .sidebar-menu .header {
        background-color: #0284c7 !important;
        color: #fff !important;
        font-weight: bold;
    }

    .main-sidebar .sidebar-menu>li>a,
    .main-sidebar .treeview-menu>li>a {
        color: #333 !important;
        background-color: #fff !important;
        transition: color 0.2s ease, background-color 0.2s ease;
    }

    /* Hover: teks & ikon biru, background putih */
    .main-sidebar .sidebar-menu>li>a:hover,
    .main-sidebar .treeview-menu>li>a:hover {
        color: #0284c7 !important;
        background-color: #fff !important;
    }

    /* Aktif: teks & ikon biru, background putih */
    .main-sidebar .sidebar-menu>li.active>a,
    .main-sidebar .treeview-menu>li.active>a {
        color: #0284c7 !important;
        background-color: #fff !important;
        font-weight: bold;
    }
</style>