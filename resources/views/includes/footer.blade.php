<div class="footer8-section section section-padding bg-light">
        <div class="container">
            <div class="row learts-mb-n40">
                <div class="col-lg-4 col-sm-6 col-12 learts-mb-40">
                    <h4 class="widget-title">Contactez-moi</h4>
                    <div class="widget-contact2">
                        <p>Gont-Pontouvre <br> 16160 <br> <span class="text-heading">06.00.00.00.00</span> <br> <span class="rose-red"><a class="link rose-red" href="{{ route('contact') }}">contactez-moi</a></span></p>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-6 col-12 learts-mb-40">
                    <h4 class="widget-title">Liens utiles</h4>
                    <ul class="widget-list">
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Store location</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Support Policy</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-sm-6 col-12 learts-mb-40">
                    <h4 class="widget-title">Navigation sur le site</h4>
                    <ul class="widget-list">
                        <li><a href="{{ route('home') }}" >Home</a></li>
                        <li><a href="{{ route('about') }}" >About me</a></li>
                        <li><a href="{{ route('portfolio') }}" >My portfolio</a></li>
                        <li><a href="{{ route('shop') }}" >Shop</a></li>
                        <li><a href="{{ route('contact') }}" >Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-sm-6 col-12 learts-mb-40">
                    <h5 class="widget-title">Suivez-moi</h5>
                    <div class="instagram-feed share">
                    <ul class="list-unstyled d-flex">
                        <li><a href="https://www.instagram.com/mayart.craft/" class="px-2"><i class="fab fa-instagram mr-2 fa-2x"></i></a></li>
                        <li><a href="https://www.instagram.com/mayart.craft/" class="px-2"><i class="fab fa-facebook-f mr-2 fa-2x"></i></a></li>
                        <li><a href="https://www.linkedin.com/in/ludmilla-quesnot-7406991b8/" class="px-2"><i class="fab fa-linkedin mr-2 fa-2x"></i></a></li>
                        <li><a href="https://www.pinterest.fr/ludmillaquesnot/" class="px-2"><i class="fab fa-pinterest mr-2 fa-2x"></i></a></li>
                    </ul>
                    </div>
                </div>

            </div>

            <div class="row align-items-end learts-mb-n40 learts-mt-40">

                <div class="col-md-4 col-12 learts-mb-40 order-md-2">
                    <div class="widget-about text-center">
                        <img src="{{ asset('images/MayArt logo.png') }}" alt="" width="600px">
                    </div>
                </div>

                <div class="col-md-4 col-12 learts-mb-40 order-md-3">
                    <div class="widget-payment text-center text-md-right">
                        <img src="{{ asset('images/others/pay.png') }}" alt="">
                    </div>
                </div>

                <div class="col-md-4 col-12 learts-mb-40 order-md-1">
                    <div class="widget-copyright">
                          <p class="copyright">&copy; {{ \Carbon\Carbon::now()->parse()->year }} MayaArt. All Rights Reserved  | site web développer par <a href="https://david-friquet.com">david friquet developpeur web laravel</a></p>
                    </div>
                </div>

            </div>
        </div>
    </div>

