<div class="topbar js-topbar">
    <div id="banners" class="js-banners"></div>
    <div class="ProfilePage-editingOverlay"></div>

    <div class="global-nav" data-section-term="top_nav">
        <div class="global-nav-inner">
            <div class="container">

                <h1 class="Icon bird-topbar-etched"
                    style="display: inline-block; width: 24px; height: 21px; backgound: url('http://www.ealingair.org.uk/AirQuality/Images/icons/accessibility.gif') no-repeat center center fixed">
                    <span class="visuallyhidden">Twitter</span>
                        <img src="" alt=""/>
                </h1>
                {{-- pássaro do twitter --}}


                <div role="navigation" style="display: inline-block;">
                    <ul class="nav js-global-actions" id="global-actions">
                        <li id="global-nav-home" class="home" data-global-action="home">
                            <a class="js-nav js-tooltip js-dynamic-tooltip" data-placement="bottom"
                               href="{{ URL::route('home') }}" data-component-term="home_nav" data-nav="home">
                                <span class="Icon Icon--home Icon--large"></span>
                                <span class="text">{{ Str::title(Lang::get('início')) }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
                {{-- Menu a esquerda --}}


                <div class="pull-right" style="display: inline-block;">

                    <div role="search">
                        <form class="t1-form form-search js-search-form" action="/search" id="global-nav-search">
{{--                            <label class="visuallyhidden" for="search-query">Consulta de busca</label> --}}
                            <input class="search-input" type="text" id="search-query" placeholder="Buscar no Listonly" name="q" autocomplete="off" spellcheck="false">
                                <span class="search-icon js-search-action">
                                    <button type="submit" class="Icon Icon--search nav-search">
                                        <span class="visuallyhidden">Buscar no Listonly</span>
                                    </button>
                                </span>

                            <div role="listbox" class="dropdown-menu typeahead">
                                <div aria-hidden="true" class="dropdown-caret">
                                    <div class="caret-outer"></div>
                                    <div class="caret-inner"></div>
                                </div>
                                <div role="presentation" class="dropdown-inner js-typeahead-results">
                                    <div role="presentation" class="typeahead-recent-searches">
                                        <h3 id="recent-searches-heading"
                                            class="typeahead-category-title recent-searches-title">Buscas recentes</h3>
                                        <button type="button" tabindex="-1" class="btn-link clear-recent-searches">
                                            Limpar Tudo
                                        </button>
                                        <ul role="presentation" class="typeahead-items recent-searches-list">

                                            <li role="presentation" class="typeahead-item typeahead-recent-search-item">
                                                    <span class="icon close" aria-hidden="true">
                                                        <span class="visuallyhidden">Remover</span>
                                                    </span>
                                                <a role="option" aria-describedby="recent-searches-heading"
                                                   class="js-nav" href="" data-search-query="" data-query-source=""
                                                   data-ds="recent_search" tabindex="-1"></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div role="presentation" class="typeahead-saved-searches">
                                        <h3 id="saved-searches-heading"
                                            class="typeahead-category-title saved-searches-title">Buscas salvas</h3>
                                        <ul role="presentation" class="typeahead-items saved-searches-list">

                                            <li role="presentation" class="typeahead-item typeahead-saved-search-item">
                                                    <span class="icon close" aria-hidden="true">
                                                        <span class="visuallyhidden">Remover</span>
                                                    </span>
                                                <a role="option" aria-describedby="saved-searches-heading"
                                                   class="js-nav" href="" data-search-query="" data-query-source=""
                                                   data-ds="saved_search" tabindex="-1"></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <ul role="presentation" class="typeahead-items typeahead-topics">
                                        <li role="presentation" class="typeahead-item typeahead-topic-item">
                                            <a role="option" class="js-nav" href="" data-search-query=""
                                               data-query-source="typeahead_click" data-ds="topics" tabindex="-1">
                                            </a>
                                        </li>
                                    </ul>


                                    <ul role="presentation"
                                        class="typeahead-items typeahead-accounts social-context js-typeahead-accounts">
                                        <li role="presentation" data-user-id="" data-user-screenname=""
                                            data-remote="true" data-score=""
                                            class="typeahead-item typeahead-account-item js-selectable">
                                            <a role="option" class="js-nav" data-query-source="typeahead_click"
                                               data-search-query="" data-ds="account">
                                                <img class="avatar size32" alt="">
                                                <span class="typeahead-user-item-info">
                                                    <span class="fullname"></span>
                                                    <span class="js-verified hidden">
                                                        <span class="Icon Icon--verified Icon--small">
                                                            <span class="u-hiddenVisually">Conta verificada</span>
                                                        </span>
                                                    </span>
                                                    <span class="username"><s>@</s><b></b></span>
                                                </span>
                                                <span class="typeahead-social-context"></span>
                                            </a>
                                        </li>
                                        <li role="presentation"
                                            class="js-selectable typeahead-accounts-shortcut js-shortcut">
                                            <a role="option" class="js-nav" href="" data-search-query=""
                                               data-query-source="typeahead_click" data-shortcut="true"
                                               data-ds="account_search"></a>
                                        </li>
                                    </ul>

                                    <ul role="presentation" class="typeahead-items typeahead-trend-locations-list">

                                        <li role="presentation" class="typeahead-item typeahead-trend-locations-item"><a
                                                role="option" class="js-nav" href="" data-ds="trend_location"
                                                data-search-query="" tabindex="-1"></a></li>
                                    </ul>
                                </div>
                            </div>

                        </form>
                    </div>

                    <ul class="nav right-actions">
                        <li class="dm-nav">
                            <a href="javascript:alert('nao faz nada ainda');void(0);" class="js-tooltip settings dropdown-toggle js-dropdown-toggle in"
                               id="user-dropdown-toggle" data-placement="bottom" role="button" aria-haspopup="true" data-original-title="Configurações e ajuda"
                               title="Mensagens diretas">
                                <span class="Icon Icon--cog Icon--large"></span>
                                <span class="visuallyhidden">Mensagens diretas2</span>
                            </a>
                        </li> {{-- js-tooltip settings dropdown-toggle js-dropdown-toggle --}}
                    </ul>
                </div>


            </div>
        </div>
    </div>

</div>


{{--
<div class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Listonly</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!--/.nav-collapse-->
    </div>
</div>
--}}