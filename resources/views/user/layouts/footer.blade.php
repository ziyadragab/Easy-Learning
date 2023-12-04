    <!-- Footer-area -->
    @php
        $setting=App\Models\Setting::first()
    @endphp
    <footer class="footer">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-4">
                    <div class="footer__widget">
                        <div class="fw-title">
                            <h5 class="sub-title">Contact us</h5>
                            <h4 class="title">{{ $setting->phone }}</h4>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer__widget">
                        <div class="fw-title">
                            <h5 class="sub-title">{{$setting->address}}</h5>
                        </div>
                        <div class="footer__widget__address">
                            <a href="mailto:{{$setting->email}}" class="mail">{{$setting->email}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer__widget">
                        <div class="fw-title">
                            <h5 class="sub-title">Follow me</h5>
                            <h4 class="title">socially connect</h4>
                        </div>
                        <div class="footer__widget__social">
                            <p>Lorem ipsum dolor sit amet enim. <br> Etiam ullamcorper.</p>
                            <ul class="footer__social__list">
                                <li><a href="{{$setting->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{$setting->x}}"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{{$setting->linkedin}}"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="{{$setting->instagram}}"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright__wrap">
                <div class="row">
                    <div class="col-12">
                        <div class="copyright__text text-center">
                            <p>Easy Learning</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer-area-end -->

<!-- Add these lines to include Bootstrap CSS and JS -->


    <!-- JS here -->
    <script src="{{ asset("userAssets/js/vendor/jquery-3.6.0.min.js") }}"></script>
    <script src="{{ asset("userAssets/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("userAssets/js/isotope.pkgd.min.js") }}"></script>
    <script src="{{asset("userAssets/js/imagesloaded.pkgd.min.js")}}"></script>
    <script src="{{asset("userAssets/js/jquery.magnific-popup.min.js")}}"></script>
    <script src="{{ asset("userAssets/js/element-in-view.js") }}"></script>
    <script src="{{ asset("userAssets/js/slick.min.js") }}"></script>
    <script src="{{ asset("userAssets/js/ajax-form.js") }}"></script>
    <script src="{{asset("userAssets/js/wow.min.js")}}"></script>
    <script src="{{asset("userAssets/js/plugins.js")}}"></script>
    <script src="{{ asset("userAssets/js/main.js") }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
<!-- Bootstrap CSS -->


    @include('sweetalert::alert')

@stack('js')
