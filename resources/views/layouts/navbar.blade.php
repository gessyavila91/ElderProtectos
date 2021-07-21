

<style>

    @font-face {
        font-family: Narziss;
        src: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/42764/Narziss_Bold_Drops.woff2);
    }

    @font-face {
        font-family: Narziss-medium;
        src: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/42764/Narziss_Bold_Drops.woff2);
    }

    .navbar-toggler {
        height: 32px;
        width: 40px;
        padding: 0;
        background: none;
        position: relative;
        border: 0;
        cursor: pointer;

    }
    .navbar-toggler:focus {
        outline: none;
    }
    .navbar-toggler.collapsed .bar:nth-of-type(1) {
        top: 6px;
        transform: rotate(0deg);
        transition: top 0.25s ease 0.25s, transform 0.25s ease-out 0.1s;
    }
    .navbar-toggler.collapsed .bar:nth-of-type(2) {
        top: 14px;
        transform: rotate(0deg);
        transition: 0.25s ease 0.25s;
        opacity: 1;
    }
    .navbar-toggler.collapsed .bar:nth-of-type(3) {
        top: 22px;
        transform: rotate(0deg);
        transition: top 0.25s ease 0.25s, transform 0.25s ease-out 0.1s;
    }
    .navbar-toggler .bar {
        position: absolute;
        height: 4px;
        width: 30px;
        left: 4px;
        display: block;
        background: #7b7b7b;
        border-radius: .1px;
    }
    .navbar-toggler .bar:nth-of-type(1) {
        top: 14px;
        transform: rotate(45deg);
        transition: top 0.25s ease 0.1s, transform 0.25s ease-out 0.4s;
    }
    .navbar-toggler .bar:nth-of-type(2) {
        opacity: 0;
        transition: 0.25s ease 0.25s;
    }
    .navbar-toggler .bar:nth-of-type(3) {
        top: 14px;
        transform: rotate(-45deg);
        transition: top 0.25s ease 0.1s, transform 0.25s ease-out 0.4s;
    }

</style>

<div class="sticky-top">
    <nav class="navbar navbar-expand-sm navbar-light bg-white rounded-bottom shadow" style="position: absolute; right: 0;">
        <div class="container">
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#collapse-1"
                    aria-controls="navbarNav"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>

            <div class="collapse navbar-collapse animate__animated animate__fadeInDown" id="collapse-1">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="#" title="Home" class="nav-link">Home</a></li>
                    <li class="nav-item dropdown"><a title="Shops" class="nav-link "
                                                     data-toggle="dropdown" role="button"
                                                     aria-expanded="false">Shops <i class="fas fa-caret-down"></i></a>
                        <ul class="dropdown-menu animate__animated animate__fadeInRight border-0">
                            <li class="nav-item"><a href="/custom" title="Custom" class="nav-link">Custom Shop</a></li>
                            <li class="nav-item"><a href="https://www.etsy.com/shop/ElderProtectors" title="Etsy"
                                                    target="_blank" class="nav-link">Etsy</a></li>
                            <li class="nav-item"><a href="https://www.ebay.com/sch/kevkabr/m.html" title="Ebay"
                                                    target="_blank" class="nav-link">Ebay</a></li>
                            <li class="nav-item"><a href="https://articulo.mercadolibre.com.mx/MLM-820037873-playmat-de-cuero-_JM"
                                                    title="Mercado Libre" target="_blank" class="nav-link">Mercado Libre</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="#" title="Pics" class="nav-link">Pics</a></li>
                    <li class="nav-item"><a href="#" title="Legal" class="nav-link">Legal</a></li>
                    <li class="nav-item"><a href="#" title="Account" class="nav-link">
                            <i class="fas fa-user"></i> Account</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>