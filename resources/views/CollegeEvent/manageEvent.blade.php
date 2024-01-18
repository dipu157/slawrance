@extends('layouts.master')

@section('content')

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Events</div>
            <div class="ms-auto"><button class="btn btn-primary radius-30 mt-2 mt-lg-0" data-bs-toggle="modal" data-bs-target="#addEventModal">
                <i class="bx bxs-plus-square"></i>Add Event</button></div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body" id="show_events">
            </div>
        </div>

        @include('CollegeEvent/modal/add_event')
        @include('CollegeEvent/modal/edit_event')

    </div>
</div>
<!--end page wrapper -->

@endsection

@push('scripts')

<script>

$(document).ready(function() {
    // Get All Teacher function call
    fetchAllEvent();

    // Get All Teacher function
    function fetchAllEvent(){
        $.ajax({
        url: '{{ route('eventsData') }}',
        method: 'get',
        success: function(res){
            $("#show_events").html(res);
        }
        });
    }

    // Add Teacher Code
	$("#eventForm").submit(function(e){
        e.preventDefault();
        const fd = new FormData(this);
        $("#btnsave").text('Adding...');
        $.ajax({
            url: '{{ route('saveEvents') }}',
            method: 'post',
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            success: function(res){
                console.log(res);
                if(res.status == 200){
                    toastr.success('Data Save Successfully');
                    fetchAllEvent();
                }
                $("#btnsave").text('SAVE');
                $("#eventForm")[0].reset();
                $("#addEventModal").modal('hide');
            },
            error: function (request, status, error) {
                toastr.error(request.responseText);
                fetchAllEvent();
                $("#btnsave").text('SAVE');
            $("#eventForm")[0].reset();
            $("#addEventModal").modal('hide');
            }

        });
	});

    // delete Teacher ajax request
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
			url: '{{ route('deleteEvents') }}',
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
			fetchAllEvent();
		}
		});
		}
		})
	});

    //Edit Icon click for Teacher Edit
		$(document).on('click', '.editIcon', function(e){
		e.preventDefault();
		let id = $(this).attr('id');
        console.log(id + "Clicked");
		$.ajax({
		url: '{{ route('editEvents') }}',
		method: 'get',
		data: {
		id: id,
		_token: '{{ csrf_token() }}'
		},
		success: function(res){
			console.log(res);

            $("#bmem_id").val(res.id);
			$("#title").val(res.title);
			$("#event_date").val(res.event_date);
			$("#details").val(res.details);
			$("#logo_img").html(`<img src="storage/images/events/${res.image}" width="100" class="img-fluid img-thumbnail">`);
			$("#bmem_photo").val(res.image);
		}
		});
		});

        // update Teacher ajax request
	$("#eventEditForm").submit(function(e) {
	e.preventDefault();
	const fd = new FormData(this);
	$("#btnupdate").text('Updating...');
		$.ajax({
			url: '{{ route('updateEvents') }}',
			method: 'post',
			data: fd,
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'json',
		success: function(response) {
			if (response.status == 200) {
                toastr.success('Update Successfully');
				fetchAllEvent();
			}
			$("#btnupdate").text('Update');
			$("#eventEditForm")[0].reset();
			$("#editEventModal").modal('hide');
			}
		});
	});
});



</script>

@endpush
