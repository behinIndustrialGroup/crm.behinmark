<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ url('public/behin/behin-dist/dist/img/avatar5.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ trans('Control Panel') }}</span>
    </a>

    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ url('public/behin/behin-dist/dist/img/avatar5.png') }}" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ $name ?? '' }}</a>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" style="padding: 0" data-widget="treeview" role="menu"
                    data-accordion="false">
                    @foreach (config('sidebar.menu') as $menu)
                        @if (access('Menu >>' . $menu['fa_name']))
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link active">
                                    <i
                                        class="nav-icon @isset($menu['icon']) {{ $menu['icon'] }} @endisset"></i>
                                    <p>
                                        {{ $menu['fa_name'] }}
                                        <i class="right fa fa-angle-right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @foreach ($menu['submenu'] as $submenu)
                                        @if (access('Menu >>' . $menu['fa_name'] . '>>' . $submenu['fa_name']))
                                            <li class="nav-item">
                                                <a @isset($submenu['target']) target="{{ $submenu['target'] }}" @endisset
                                                    href="@if (Route::has($submenu['route-name'])) {{ route($submenu['route-name']) }}
                                                @elseif(isset($submenu['static-url']))
                                                    {{ $submenu['static-url'] }}
                                                @else
                                                    {{ url($submenu['route-url']) }} @endif"
                                                    class="nav-link active">
                                                    <p>{{ $submenu['fa_name'] }}</p>
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
</aside>
