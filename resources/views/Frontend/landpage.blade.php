@include('Frontend.layout.header')

        <!-- Carousel Start -->
        <div class="container-fluid p-0 mb-5">
            <div class="owl-carousel header-carousel position-relative">
                @foreach ($sliders as $slide)
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="{{asset('storage/images/Slider/'.$slide->image)}}" height="768px" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-2 text-white animated slideInDown mb-4">{{ $slide->title }}</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">{{ $slide->description }}</p>
                                    <a href="" class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft">Learn More</a>
                                    <a href="" class="btn btn-dark rounded-pill py-sm-3 px-sm-5 animated slideInRight">Our Classes</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
        <!-- Carousel End -->


        <!-- Facilities Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">School Facilities</h1>
                </div>
                <div class="row g-4">

                    @foreach ($combinedFacilities as $index => $facility)
                        @php
                            // Calculate delay
                            $delay = 0.1 * $index;
                        @endphp

                        <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="{{ $delay }}s">
                            <div class="facility-item">
                                <div class="facility-icon {{ $facility["color"] }}">
                                    <span class="{{ $facility["color"] }}"></span>
                                    <img class="img-fluid flex-shrink-0 rounded-circle" src="{{asset('storage/images/Facility/'.$facility["icon"])}}" style="width: 90px; height: 90px;">
                                    <span class="{{ $facility["color"] }}"></span>
                                </div>
                                <div class="facility-text {{ $facility["color"] }}">
                                    <h3 class="text-primary mb-3">{{ $facility["title"] }}</h3>
                                    <p class="mb-0">{{ $facility["description"] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Facilities End -->

        <!-- Facilities Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Principal's Message</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-8 wow fadeInUp bg-light p-5" data-wow-delay="0.1s">
                    <p>At St. Lawrence School of Jewels , we prioritize student success and holistic development. With dedicated faculty,
                        innovative programs, and a supportive community, we empower each student to thrive academically, socially, and emotionally.
                        Let's work together to unlock the potential within every student and foster a culture of excellence and compassion.</p>
                    <h5>Hasina Afroz khan <br>Principal </h5>
                    </div>

                    <div class="col-lg-4 wow fadeInUp bg-light" data-wow-delay="0.1s">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img class="img-fluid w-75 h-75 bg-light p-3" src="{{asset("/frontend/img/principle.jpg")}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Facilities End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeInUp bg-light" data-wow-delay="0.1s">
                        <h1 class="mb-4">Learn More About Our Schools Facility</h1>
                        <p><b> 1.	EDEXCEL Accredited institution.<br/>
                            2.	Our institution has well qualified, experienced, professional, young & energetic dedicated teaching staffs.<br/>
                            3.	Independent Campus with modern facilities.<br/>
                            4.	Individual attention is given towards each student.<br/>
                            5.	It’s our pride that ethical values and multicultural environment keep our learners enriched.<br/>
                            6.	Modern computer lab & library.<br/>
                            7.	Transport facility.<br/>
                            8.	Play zone, in-door and outdoor games facilities.<br/>
                            9.	Participation in ECA in house and outdoor.<br/>
                            10.	 Our Campus Activity Zone opens doors to SIX diverse. Each student must be included as a member of any one of the following clubs: <br/>
                                • Language Club <br/>
                                • Maths & Science Club <br/>
                                • Music Club <br/>
                                • Dance Club <br/>
                                • Karate Club <br/>
                                • Art & Craft Club. </b>
                            </p>
                    </div>
                    <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img class="img-fluid w-75 rounded-circle bg-light p-3" src="{{asset("/frontend/img/learn_more1.jpg")}}" alt="">
                            </div>
                            <div class="col-6 text-start" style="margin-top: -150px;">
                                <img class="img-fluid w-100 rounded-circle bg-light p-3" src="{{asset("/frontend/img/learn_more2.jpg")}}" alt="">
                            </div>
                            <div class="col-6 text-end" style="margin-top: -150px;">
                                <img class="img-fluid w-100 rounded-circle bg-light p-3" src="{{asset("/frontend/img/learn_more3.jpg")}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Classes Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 700px;">
                    <h1 class="mb-3">School Classes</h1>
                    <p>Our school classes are organizing with 15 grades,which are from Play Group to A-Level.</p>
                </div>


                <div class="row g-4">
                    @foreach ($classes as $class)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="classes-item">
                            <div class="bg-light rounded-circle w-75 mx-auto p-3">
                                <img class="img-fluid rounded-circle" src="{{asset('storage/images/classRoom/'.$class->image)}}" alt="">
                            </div>
                            <div class="bg-light rounded p-4 pt-5 mt-n5">
                                <a class="d-block text-center h3 mt-3 mb-4">{{ $class->class_name }}</a>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Classes End -->


        <!-- Appointment Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="bg-light rounded">
                    <div class="row g-0">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                            <div class="h-100 d-flex flex-column justify-content-center p-5">
                                <h1 class="mb-4">Make Appointment</h1>
                                <form method="post" id="appointmentForm">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control border-0" name="gurdian_name" id="gname" placeholder="Gurdian Name">
                                                <label for="gname">Guardian Name</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control border-0" name="mobile" id="mobile" placeholder="Gurdian Email">
                                                <label for="mobile">Guardian Mobile No.</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control border-0" name="child_name" id="cname" placeholder="Child Name">
                                                <label for="cname">Child Name</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control border-0" id="class" name="class" placeholder="Child Age">
                                                <label for="class">Interested Admission Class</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <textarea class="form-control border-0" placeholder="Leave a message here" name="mesage" id="message" style="height: 100px"></textarea>
                                                <label for="message">Message</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100 py-3" id="btnsave" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute w-100 h-100 rounded" src="{{asset("/frontend/img/makeappoint.jpg")}}" style="object-fit: cover;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Appointment End -->


        <!-- Team Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Board Members</h1>
                </div>
                <div class="row g-4">
                    @foreach ($bmembers as $bmem)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item position-relative">
                            <img class="img-fluid rounded-circle w-55" src="{{asset('storage/images/BMember/'.$bmem->photo)}}" alt="">
                            <div class="team-text">
                                <p>{{ $bmem->name }}</p>
                                <h5>{{ $bmem->position }}</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Team End -->


        <!-- Testimonial Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">What Our Parents Say!</h1>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                @foreach ($testimonial as $testimonial)
                    <div class="testimonial-item bg-light rounded p-5">
                        <p class="fs-5">{{ $testimonial->message }}</p>
                        <div class="d-flex align-items-center bg-white me-n5" style="border-radius: 50px 0 0 50px;">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="{{asset('storage/message/'.$testimonial->photo)}}" style="width: 90px; height: 90px;">
                            <div class="ps-3">
                                <h3 class="mb-1">{{ $testimonial->name }}</h3>
                                <span>{{ $testimonial->position }}</span>
                            </div>
                            <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i>
                        </div>
                    </div>
                @endforeach

                </div>
            </div>
        </div>
        <!-- Testimonial End -->


@include('Frontend.layout.footer')

<script type="text/javascript">

// Add Appointment Code
$("#appointmentForm").submit(function(e){
        e.preventDefault();
        const fd = new FormData(this);
        $("#btnsave").text('Submitting...');
        $.ajax({
            url: '{{ route('saveAppointment') }}',
            method: 'post',
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            success: function(res){
                console.log(res);
                if(res.status == 200){
                    toastr.success('Submit Successfully');
                }
                $("#btnsave").text('Submit');
                $("#appointmentForm")[0].reset();
            },
            error: function (request, status, error) {
                toastr.error(request.responseText);
                $("#btnsave").text('Submit');
            }

        });
	});

</script>
