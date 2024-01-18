@extends('layouts.master')

@section('content')


<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">

            <div class="row row-cols-1 row-cols-md-2 row-col-lg-12 row-cols-xl-12">
                <div class="col">
                    <div class="card radius-10 bg-gradient-deepblue">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h3 class="mb-0 text-white">Welcome To The Admin Panel</h3>
                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!--end row-->


    </div>
</div>
<!--end page wrapper -->

<!--start overlay-->
<div class="overlay toggle-icon"></div>
<!--end overlay-->
@endsection
