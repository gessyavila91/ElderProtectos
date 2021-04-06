<!DOCTYPE html>

<html lang="en">

<style>

    @font-face {
        font-family: Narziss;
        src: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/42764/Narziss_Bold_Drops.woff2);
    }

    @font-face {
        font-family: Narziss-medium;
        src: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/42764/Narziss_Bold_Drops.woff2);
    }

    .banner3 {
        background: #000000;
        background: -webkit-linear-gradient(90deg, #370063, #06132c, #252e63);
        background: linear-gradient(90deg, #370063, #06132c, #252e63);
    }


    .footer {
        position: relative;
        bottom: -50px;

    }

    .link-ftr {
        color: white;
        position: relative;
        text-decoration: none;
        transition: color .4s ease-out;


    }

    .link-ftr:hover {
        text-decoration: none;
        color: #b8d6ff;
        right: 0;

    }

    .link-ftr:hover:after {
        border-color: #5a09b7;
        right: 0;
    }

    .link-ftr:after {
        border-radius: 10px;
        border-top: .2em solid #5a09b7;
        content: "";
        position: absolute;
        right: 100%;
        bottom: -.1em;
        left: 0;
        transition: right .4s cubic-bezier(0, .5, 0, 1),
        border-color .4s ease-out;
    }

</style>

<!--footer-->
<div class="footer container-fluid pb-0 mb-0 justify-content-center text-light banner3 shadow-lg">
    <footer>
        <div class="row my-5 justify-content-center py-5">
            <div class="col-11">
                <div class="row ">
                    <div class="col-xl-8 col-md-4 col-sm-4 col-12 my-auto mx-auto a">
                        <h3 class="mb-md-0 mb-5 font-weight-bold"><img src="{{asset('assets/img/logo-white.svg')}}"
                                                                       alt="logoSVG" class="img-fluid"
                                                                       style="height: 40px"></h3>
                        <p class="p-0 m-0">Hand-Made Game Supplies</p>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-4 col-12">
                        <h6 class="mb-3 mb-lg-4 bold-text "><b>Links</b></h6>
                        <ul class="nav flex-column">
                            <li class="nav-item"><a href="#" class="link-ftr">Home</a></li>
                            <li class="nav-item"><a href="#" class="link-ftr">Custom Shop</a></li>
                            <li class="nav-item"><a href="#" class="link-ftr">Pics</a></li>
                            <li class="nav-item"><a href="#" class="link-ftr">Track Order</a></li>
                            <li class="nav-item"><a href="#" class="link-ftr">Account</a></li>
                            <li class="nav-item"><a href="#" class="link-ftr">Legal</a></li>
                        </ul>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-4 col-12">
                        <h6 class="mb-3 mb-lg-4 bold-text mt-sm-0 mt-5"><b>Shops</b></h6>
                        <ul class="nav flex-column">
                            <li class="nav-item"><a href="#" class="link-ftr">Custom Shop <small>(International)</small></a>
                            </li>
                            <li class="nav-item"><a href="#" class="link-ftr">Etsy <small>(International)</small></a>
                            </li>
                            <li class="nav-item"><a href="#" class="link-ftr">Ebay <small>(International)</small></a>
                            </li>
                            <li class="nav-item"><a href="#" class="link-ftr">Mercado Libre <small>(México)</small></a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8 col-md-4 col-sm-4 col-auto my-md-0 mt-5 order-sm-1 order-3 align-self-end">

                        <p class="social mb-0 pb-0 bold-text">
                            <span class="mx-2"><a href="#" class="link-ftr"><i class="fab fa-facebook-f fa-lg"
                                                                               aria-hidden="true"></i></a></span>
                            <span class="mx-2"><a href="#" class="link-ftr"><i class="fab fa-instagram fa-lg"
                                                                               aria-hidden="true"></i></a></span>
                            <span class="mx-2"><a href="#" class="link-ftr"><i class="fab fa-etsy fa-lg"
                                                                               aria-hidden="true"></i></a></span>
                            <span class="mx-2"><a href="#" class="link-ftr"><i class="fab fa-ebay fa-lg"
                                                                               aria-hidden="true"></i></a></span>
                            <span class="mx-2"><a href="#" class="link-ftr"><i class="fas fa-store fa-lg"
                                                                               aria-hidden="true"></i></a></span>
                        </p>

                        <small class="rights">Elder Protectors <span>&#174;</span> All Rights Reserved.</small>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-4 col-auto order-1 align-self-end ">
                        <h6 class="mt-55 mt-2 bold-text"><b>Elder Protectors</b></h6><small>
                            <a href="#" class="link-ftr">About Us</a>
                        </small>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-4 col-auto order-2 align-self-end mt-3 ">
                        <h6 class="mt-55 mt-2 bold-text"><b>Contact</b></h6><small>
                            <a href="#" class="link-ftr">hi@elderprotectors.com</a></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-header"></div>
    </footer>

</div>
<!--footer end-->

