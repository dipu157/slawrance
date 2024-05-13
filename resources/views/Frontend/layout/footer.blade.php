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
                    <div class="col-lg-4 col-md-6">
                        <h3 class="text-white mb-4">Quick Links</h3>
                        <a class="btn btn-link text-white-50" href="">Home</a>
                        <a class="btn btn-link text-white-50" href="">Academic</a>
                        <a class="btn btn-link text-white-50" href="">About Us</a>
                        <a class="btn btn-link text-white-50" href="">Facility</a>
                        <a class="btn btn-link text-white-50" href="">Contact Us</a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <h3 class="text-white mb-4">Photo Gallery</h3>
                        <div class="row g-2 pt-2">
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="{{asset("/frontend/img/classes-1.jpg")}}" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="{{asset("/frontend/img/classes-2.jpg")}}" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="{{asset("/frontend/img/classes-3.jpg")}}" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="{{asset("/frontend/img/classes-4.jpg")}}" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="{{asset("/frontend/img/classes-5.jpg")}}" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="{{asset("/frontend/img/classes-6.jpg")}}" alt="">
                            </div>
                        </div>
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
