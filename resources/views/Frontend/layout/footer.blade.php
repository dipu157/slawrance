        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-4 col-md-6">
                        <h3 class="text-white mb-4">Get In Touch</h3>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>{{$institute->address}}</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{$institute->phone}}</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{$institute->email}}</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href="{{$institute->social_link1}}"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href="{{$institute->social_link4}}"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3 class="text-white mb-4">Quick Links</h3>
                        <a class="btn btn-link text-white-50" href="">Home</a>
                        <a class="btn btn-link text-white-50" href="">Academic</a>
                        <a class="btn btn-link text-white-50" href="">About Us</a>
                        <a class="btn btn-link text-white-50" href="">Facility</a>
                        <a class="btn btn-link text-white-50" href="">Contact Us</a>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <h3 class="text-white mb-4">Google Map</h3>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.565282292608!2d90.38697447589969!3d23.869565784190044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c568d919b57f%3A0xd191ef1c4263f10f!2sSt.%20Lawrence%20School%20of%20Jewels!5e0!3m2!1sen!2sbd!4v1715592340692!5m2!1sen!2sbd"
                        width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="https://www.stlsoj.com/">St.Lawrence School</a>, All Right Reserved.

							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							Designed By <a class="border-bottom" href="#">The SCube</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset("/frontend/lib/wow/wow.min.js")}}"></script>
    <script src="{{asset("/frontend/lib/easing/easing.min.js")}}"></script>
    <script src="{{asset("/frontend/lib/waypoints/waypoints.min.js")}}"></script>
    <script src="{{asset("/frontend/lib/owlcarousel/owl.carousel.min.js")}}"></script>
    <script src="{{asset('/')}}plugins/toastr/toastr.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{asset("/frontend/js/main.js")}}"></script>
</body>

</html>
