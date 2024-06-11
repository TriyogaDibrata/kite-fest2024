<nav class="main-sidebar ps-menu">
    {{-- <div class="sidebar-toggle action-toggle">
        <a href="#">
            <i class="fas fa-bars"></i>
        </a>
    </div>
    <div class="sidebar-opener action-toggle">
        <a href="#">
            <i class="ti-angle-right"></i>
        </a>
    </div>  --}}
    <div class="sidebar-header">
        <div class="text">KF</div>
        <div class="close-sidebar action-toggle">
            <i class="ti-close"></i>
        </div>
    </div>
    <div class="sidebar-content">
        <ul>
            @foreach ($menus = MenuHelper::getMenus() as $menu)
            @if (count($menu->subMenus) > 0)
            @can($menu->permission)
            <li class="{{ activeDropdownMenu($menu->segment) }}">
                <a href="#" class="main-menu has-dropdown">
                    <i class="{{ $menu->icon }}"></i>
                    <span>{{ $menu->title }}</span>
                </a>
                <ul class="sub-menu {{ activeSubMenu($menu->segment) }}">
                    @foreach ($menu->subMenus as $subMenu)
                    @can($subMenu->permission)
                    <li class="{{ activeMenu(explode('/', $subMenu->uri)[2])}}"><a href="{{ url($subMenu->uri) }}" class="link"><span>{{ $subMenu->title }}</span></a></li> 
                    @endcan
                    @endforeach
                </ul>
            </li>
            @endcan
            @else
            @can($menu->permission)
            <li class="{{ activeMenu( explode('/', $menu->uri)[1])}}">
                <a href="{{ url($menu->uri) }}" class="link">
                    <i class="{{ $menu->icon }}"></i>
                    <span>{{ $menu->title }}</span>
                </a>
            </li>
            @endcan
            @endif
            @endforeach
        </ul>
    </div>
</nav>        