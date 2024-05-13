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
                    <!-- If no image is available, show default image -->
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
    <section id="menupage" class="container card shadow">
        <div class="card-header">
            <h2>Error 404: Page Not Found</h2>
        </div>
        <div class="card-body">
            <p>Sorry, the page you are looking for does not exist.</p>
        </div>
    </section>
@endif


<!-- Menu Page area end -->


@include('Frontend.layout.footer')
