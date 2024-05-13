@extends('layouts.master')

@section('content')

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Gurdian Appointments</div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body" id="show_appointments">
            </div>
        </div>

    </div>
</div>
<!--end page wrapper -->

@endsection

@push('scripts')

<script>

$(document).ready(function() {
    // Get All Member function call
    fetchAllMessage();

    // Get All Member function
    function fetchAllMessage(){
    $.ajax({
    url: '{{ route('appointmentData') }}',
    method: 'get',
    success: function(res){
        $("#show_appointments").html(res);
    }
    });
    }
});



</script>

@endpush
