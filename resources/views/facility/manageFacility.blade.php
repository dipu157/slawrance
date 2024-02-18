@extends('layouts.master')

@section('content')

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Facilities</div>
            <div class="ms-auto"><button class="btn btn-primary radius-30 mt-2 mt-lg-0" data-bs-toggle="modal" data-bs-target="#addFacilityModal">
                <i class="bx bxs-plus-square"></i>Add Facility</button></div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body" id="show_facilities">
            </div>
        </div>

        @include('facility/modal/add_facility')
        @include('facility/modal/edit_facility')

    </div>
</div>
<!--end page wrapper -->

@endsection

@push('scripts')

<script>

$(document).ready(function() {
    // Get All Member function call
    fetchAllIFacility();

    // Get All Member function
    function fetchAllIFacility(){
    $.ajax({
    url: '{{ route('inoticeData') }}',
    method: 'get',
    success: function(res){
        $("#show_inotices").html(res);
    }
    });
    }

    // Add Memeber Code
	$("#inoticeForm").submit(function(e){
        e.preventDefault();
        const fd = new FormData(this);
        $("#btnsave").text('Adding...');
        $.ajax({
            url: '{{ route('saveInotice') }}',
            method: 'post',
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            success: function(res){
                console.log(res);
                if(res.status == 200){
                    toastr.success('Data Save Successfully');
                    fetchAllIFacility();
                }
                $("#btnsave").text('SAVE');
                $("#inoticeForm")[0].reset();
                $("#addINoticeModal").modal('hide');
            },
            error: function (request, status, error) {
                toastr.error(request.responseText);
                fetchAllIFacility();
                $("#btnsave").text('SAVE');
                $("#inoticeForm")[0].reset();
                $("#addINoticeModal").modal('hide');
            }

        });
	});

    // delete employee ajax request
    $(document).on('click', '.deleteIcon', function(e) {
		e.preventDefault();
        console.log("Delete Button Clicked");
		let id = $(this).attr('id');
		let csrf = '{{ csrf_token() }}';
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		if (result.isConfirmed) {
		$.ajax({
			url: '{{ route('deleteInotice') }}',
			method: 'delete',
			data: {
			id: id,
			_token: csrf
		},
		success: function(response) {
			console.log(response);
			Swal.fire(
			'Deleted!',
			'Your file has been deleted.',
			'success'
			)
			fetchAllIFacility();
		}
		});
		}
		})
	});

    //Edit Icon click for Employee Edit
		$(document).on('click', '.editIcon', function(e){
		e.preventDefault();
		let id = $(this).attr('id');
        console.log(id + "Clicked");
		$.ajax({
		url: '{{ route('editInotice') }}',
		method: 'get',
		data: {
		id: id,
		_token: '{{ csrf_token() }}'
		},
		success: function(res){
			console.log(res);

            $("#bmem_id").val(res.id);
			$("#title").val(res.title);
			$("#description").val(res.description);
		}
		});
		});

        // update employee ajax request
	$("#inoticeEditForm").submit(function(e) {
	e.preventDefault();
	const fd = new FormData(this);
	$("#btnupdate").text('Updating...');
		$.ajax({
			url: '{{ route('updateInotice') }}',
			method: 'post',
			data: fd,
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'json',
		success: function(response) {
			if (response.status == 200) {
                toastr.success('Update Successfully');
				fetchAllIFacility();
			}
			$("#btnupdate").text('Update');
			$("#inoticeEditForm")[0].reset();
			$("#editINoticeModal").modal('hide');
			}
		});
	});
});



</script>

@endpush
