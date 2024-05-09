<nav class="navbar o_main_navbar is-navbar-bg is-link is-fixed-top" role="navigation" aria-label="dropdown navigation">
    <div class="navbar-brand">
        <a href="{{ url('dashboard') }}" class="navbar-item">
            <span class="navbar-item" class="o_menu_brand" href="javascript:void(0)">
                <img src="{{ asset('public/images/bizboss.png') }}"/>
            </span>
            {{-- <i class="fas fa-home"></i> --}}
        </a>


        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false"
           data-target="navbarExampleTransparentExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>
    <div id="navbarExampleTransparentExample" class="navbar-menu">

        <div class="navbar-start">
            @yield('header_title_set')
            <?php $routelist = \App\Models\Routelist::where('show_menu', '=', 1)->where('is_active', '=', 1)->get(); ?>
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link" href="javascript:void(0)">
                    <i class="fas fa-bars"></i>&nbsp; Quick links
                </a>

                <div class="navbar-dropdown">
                    @foreach($routelist as $menu)
                        @php
                            $selected = explode(",", $menu->to_role);
                        @endphp
                        @if(!empty(Auth::user()->role))
                            @if(in_array(Auth::user()->role, $selected))
                                @if($menu->route_url == '#' || $menu->route_url == NULL)
                                    <?php $link = '#'; ?>
                                @else
                                    <?php $link = route($menu->route_url) . '?route_id=' . $menu->id; ?>
                                @endif
                                <a href="{{ $link ?? NULL }}"
                                   class="navbar-item">
                                    <i class="{{ $menu->font_awesome ?? NULL }}"></i>&nbsp; {{ $menu->route_name }}
                                </a>
                            @endif
                        @endif
                    @endforeach
                    
                    

                    
                </div>
            </div>
        </div>


        @yield('header_button_set')


        <div class="navbar-end">
          
            <div class="navbar-item has-dropdown is-hoverable">
                <?php $current_user = auth()->user(); //dump($current_user)?>
                <a class="navbar-link">
                    <figure class="image is-16x16" style="margin-right: 5px;">
                        <img class="is-rounded" src="{{ asset('/resources/views/image/avatar.jpg') }}">
                    </figure>
                    Welcome, <strong style="color: yellow"> &nbsp;{{ @$current_user->name }} &nbsp;</strong>
                    as {{ \App\Models\Role::where('id', $current_user->role)->first()->name }}
                </a>
                <div class="navbar-dropdown is-right">
                    @if(auth()->user()->isAdmin(auth()->user()->id) || auth()->user()->isHR(auth()->user()->id))
                        <a class="navbar-item" href="{{ route('settings.global', 1) }}">
                            <i class="fas fa-wrench"></i>&nbsp;Global Settings
                        </a>
                        <a class="navbar-item" href="{{ route('settings.payment', 2) }}">
                            <i class="fas fa-dollar-sign"></i>&nbsp;Payment Settings
                        </a>
                        <a class="navbar-item" href="{{ route('settings.time', 3) }}">
                            <i class="fas fa-clock"></i>&nbsp;Time Settings
                        </a>
                        <a href="{{ url('routelists') }}" class="navbar-item">
                            <i class="fas fa-link"></i>&nbsp;Route Lists
                        </a>
                        <hr class="navbar-divider">
                    @endif
                    <div class="navbar-item">
                        <i class="fas fa-key"></i>&nbsp;
                        <a href="{{ route('users.change_password', auth()->user()->id) }}">
                            Change Password
                        </a>
                    </div>
                    <div class="navbar-item">
                        <i class="fas fa-sign-out-alt"></i>&nbsp;<a href="{{ url('logout') }}">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

@include('layouts.notification')

<style type="text/css">
    .transaction_summary {
        padding: 0 10px;
    }
</style>



