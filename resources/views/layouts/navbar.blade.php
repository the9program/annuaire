<header id="$header" class="header">
    <div class="header-nav">
        <div class="header-nav-wrapper navbar-scrolltofixed bg-lightest">
            <div class="container">
                <nav id="menuzord-right" class="menuzord blue bg-lightest">
                    <a class="menuzord-brand pull-left flip" href="javascript:void(0)">
                        <img src="{{ asset('images/logo-wide.png') }}" alt="LY" title="LY">
                    </a>
                    <div id="side-panel-trigger" class="side-panel-trigger"><a href="#"><i
                                    class="fa fa-bars font-24 text-gray"></i></a></div>
                    <ul class="menuzord-menu">
                        <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="/"><i class="fa fa-home"></i>Accueil</a>
                        </li>
                        <li>
                            @if(session('locale') == 'fr')
                            <a href="#">Français <img
                                        src="{{ asset('images/flags/fr.png') }}"
                                        width="20"
                                        alt=""></a>
                                @else
                                <a href="#">عربي <img
                                            src="{{ asset('images/flags/ar.png') }}"
                                            width="20"
                                            alt=""></a>
                            @endif
                            <ul class="dropdown" id="lang-switcher">
                                @if(session('locale') == 'fr')
                                    <li>
                                        <a href="#" data-lang="ar" class="text-right"> عربي <img
                                                               src="{{ asset('images/flags/ar.png') }}"
                                                               width="20" class="pull-left"
                                                               alt=""></a>
                                    </li>
                                    @else
                                    <li>
                                        <a href="#" data-lang="fr" class="text-left">Français <img
                                                                  src="{{ asset('images/flags/fr.png') }}"
                                                                  width="20" class="pull-right"
                                                                  alt=""></a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        @guest
                            <li class="{{ request()->is('login') ? 'active' : '' }}">
                                <a href="{{ route('login') }}">
                                    <i class="fa fa-user"></i>
                                    {{ __('personal/login.logged') }}
                                </a>
                            </li>
                            @else
                                <li>
                                    <a href="#" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off text-danger"></i> Déconnecter
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                                @endguest
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
