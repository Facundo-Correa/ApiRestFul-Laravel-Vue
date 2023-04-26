<header>
    <div>
        <div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="logo">
                            <a to="/" class="nav-link"><img src="assets/img/logo/ml-repuestos-logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="main_menu menu_two menu_position text-left">
                            <nav id="mainnav">
                                <ul v-if="!isLoggedIn">
                                    <li class="mega_items">
                                        <a href="/" class="nav-link">Home</a>
                                    </li>
                                    <li class="mega_items">
                                        <a href="/admin/adminclientes" class="nav-link">Clientes</a>
                                    </li>
                                    <li class="mega_items">
                                        <a href="/admin/promociones" class="nav-link">Promociones</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>