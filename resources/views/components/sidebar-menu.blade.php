@php
    $menu = config('menu');
@endphp

<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    @foreach ($menu as $item)
        @if (!empty($item['submenu']))
            @php
                $open = is_open_menu($item['submenu']) ? 'menu-open' : '';
                $active = is_open_menu($item['submenu']) ? 'active' : '';
            @endphp
            <li class="nav-item has-treeview {{ $open }}">
                <a href="#" class="nav-link {{ $active }}">
                    <i class="nav-icon {{ $item['icon'] }}"></i>
                    <p>
                        {{ $item['title'] }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @foreach ($item['submenu'] as $sub)
                        @php
                            $routeName = $sub['route'] ?? null;
                            $params = $sub['params'] ?? [];
                            $url = $routeName ? route($routeName, $params) : '#';
                            $isActive = $routeName ? is_active_menu($routeName) : '';
                        @endphp
                        <li class="nav-item">
                            <a href="{{ $url }}" class="nav-link {{ $isActive }}">
                                <i class="{{ $sub['icon'] ?? 'far fa-circle' }} nav-icon"></i>
                                <p>{{ $sub['title'] }}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @else
            @php
                $routeName = $item['route'] ?? null;
                $params = $item['params'] ?? [];
                $url = $routeName ? route($routeName, $params) : ($item['url'] ?? '#');
                $isActive = $routeName ? is_active_menu($routeName) : '';
            @endphp
            <li class="nav-item">
                <a href="{{ $url }}" class="nav-link {{ $isActive }}">
                    <i class="nav-icon {{ $item['icon'] }}"></i>
                    <p>{{ $item['title'] }}</p>
                </a>
            </li>
        @endif
    @endforeach
</ul>
