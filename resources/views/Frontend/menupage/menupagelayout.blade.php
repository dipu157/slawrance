@include('Frontend.layout.header')


<!-- Menu Page area start -->
@if($menupage)
    <section id="menupage" class="card shadow mt-10">
        <div class="card-header">
            <p class="menupage-title">{{ $menupage->title }}</p>
        </div>

        <div class="row mt-4 mb-10 card-body">
            <div class="col-md-6 col-lg-4 col-xl-4">
                @if($menupage->image)
                    <img src="{{ asset('storage/images/menudetails/' . $menupage->image) }}" alt="page_image" class="w-100 img-fluid menupage-img shadow">
                @else
                    <!-- If no image is available, show the default image -->
                    <img src="{{ asset('storage/images/no_img.jpg') }}" alt="default_image" class="w-100 img-fluid menupage-img shadow">
                @endif
            </div>
            <div class="col-md-6 col-lg-8 col-xl-8 card-text">
                <p class="menupage-description">{{ $menupage->description }}</p>
            </div>
        </div>
    </section>
@else
        <!-- If $menupage is not found, display a 404 error section -->
        <!-- 404 Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                        <h1 class="display-1">404</h1>
                        <h1 class="mb-4">Page Not Found</h1>
                        <p class="mb-4">We’re sorry, the page you have looked for does not exist on our website! Maybe go to our home page or try to use a search?</p>
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ route('frontHomeIndex') }}">Go Back To Home</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- 404 End -->
@endif



<!-- Menu Page area end -->


@include('Frontend.layout.footer')
