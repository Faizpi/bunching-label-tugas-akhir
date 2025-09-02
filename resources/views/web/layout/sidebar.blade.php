<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar" style="background:#fff;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{Auth::user()->avatar ? url(Auth::user()->avatar) : asset('img/account.png')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN MENU</li>
            @foreach(config('sidebar') as $menu)
            @if(Auth::user()->{"is{$menu->allowed}"}())
            @if(!$menu->tree)
            <li class="{{ strtolower(Request::segment($menu->identifier->segment)) === $menu->identifier->path ? 'active':'' }}">
                <a href="{{$menu->route ? route($menu->route) : '#'}}{{ $menu->query }}">
                    <i class="{{$menu->icon}}"></i>&nbsp;
                    <span>{{$menu->title}}</span>
                </a>
            </li>
            @else
            <li class="{{ strtolower(Request::segment($menu->identifier->segment)) === $menu->identifier->path ? 'active menu-open ':'' }}treeview">
                <a href="{{$menu->route ? route($menu->route) : '#'}}{{ $menu->query }}">
                    <i class="{{$menu->icon}}"></i>&nbsp;
                    <span>{{$menu->title}}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @foreach($menu->tree as $tree)
                    <?php
                    $active = false;
                    $parse_url = parse_url(request()->fullUrl());
                    if (request()->has('p')) {
                        if (strtolower($tree->query) == '?' . $parse_url['query']) {
                            $active = true;
                        }
                    } else {
                        if (strtolower(request()->segment($tree->identifier->segment)) === $tree->identifier->path) {
                            $active = true;
                        }
                    }
                    ?>
                    <li class="{{ $active ? 'active':'' }}">
                        <a href="{{$tree->route ? route($tree->route) : '#'}}{{ $tree->query }}">
                            <i class="{{$tree->icon}}"></i>&nbsp;
                            {{$tree->title}}
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

<!-- Inline CSS -->
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

    .main-sidebar {
        background: #fff !important;
    }

    .main-sidebar .sidebar-menu>li>a {
        color: #333 !important;
    }

    .main-sidebar .sidebar-menu>li>a:hover {
        background-color: #0284c7 !important;
        color: #fff !important;
    }

    .main-sidebar .treeview-menu>li>a {
        color: #444 !important;
    }

    .main-sidebar .treeview-menu>li>a:hover {
        background-color: #0284c7 !important;
        color: #fff !important;
    }

    .main-sidebar .sidebar-menu>li.active>a,
    .main-sidebar .treeview-menu>li.active>a {
        background-color: #0284c7 !important;
        color: #fff !important;
    }
</style>