@extends('layouts.master')

@section('content')

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Institute</div>
            {{-- <div class="ms-auto"><button class="btn btn-primary radius-30 mt-2 mt-lg-0" data-bs-toggle="modal" data-bs-target="#addInstituteModal">
                <i class="bx bxs-plus-square"></i>Add Institute</button></div> --}}
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body" id="show_institutes">
            </div>
        </div>

        @include('Institute/modal/edit_institute')

    </div>
</div>
<!--end page wrapper -->

@endsection

@push('scripts')

<script>

$(document).ready(function() {
    // Get All institute function call
    fetchAllInstitute();

    // Get All Institute function
    function fetchAllInstitute(){
    $.ajax({
    url: '{{ route('institutedata') }}',
    method: 'get',
    success: function(res){
        $("#show_institutes").html(res);
    }
    });
    }


    //Edit Icon click for Employee Edit
		$(document).on('click', '.editIcon', function(e){
		e.preventDefault();
		let id = $(this).attr('id');
        console.log(id + "Clicked");
		$.ajax({
		url: '{{ route('editInstitute') }}',
		method: 'get',
		data: {
		id: id,
		_token: '{{ csrf_token() }}'
		},
		success: function(res){
			console.log(res);

            $("#ins_id").val(res.id);
			$("#name").val(res.name);
			$("#email").val(res.email);
			$("#address").val(res.address);
            $("#facebook").val(res.social_link1);
            $("#linkedin").val(res.social_link2);
            $("#twitter").val(res.social_link3);
            $("#youtube").val(res.social_link4);
            $("#map_link").val(res.map_link);
			$("#phone").val(res.phone);
			$("#website").val(res.website);
			$("#logo_img").html(`<img src="storage/images/${res.logo}" width="100" class="img-fluid img-thumbnail">`);
			$("#ins_logo").val(res.logo);
		}
		});
		});

		// update employee ajax request
	$("#edit_instituteForm").submit(function(e) {
	e.preventDefault();
	const fd = new FormData(this);
	$("#btnupdate").text('Updating...');
		$.ajax({
			url: '{{ route('InstituteUpdate') }}',
			method: 'post',
			data: fd,
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'json',
		success: function(response) {
			if (response.status == 200) {
                toastr.success('Update Successfully');
				fetchAllInstitute();
			}
			$("#btnupdate").text('Update');
			$("#edit_instituteForm")[0].reset();
			$("#editInstituteModal").modal('hide');
			}
		});
	});


});

</script>

@endpush
