@extends('layouts.master')

@section('content')

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Message</div>
            <div class="ms-auto"><button class="btn btn-primary radius-30 mt-2 mt-lg-0" data-bs-toggle="modal" data-bs-target="#addMessageModal">
                <i class="bx bxs-plus-square"></i>Add Message</button></div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body" id="show_messages">
            </div>
        </div>

        @include('Members/Message/modal/add_message')
        @include('Members/Message/modal/edit_message')

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
    url: '{{ route('messageData') }}',
    method: 'get',
    success: function(res){
        $("#show_messages").html(res);
    }
    });
    }

    // Add Memeber Code
	$("#messageForm").submit(function(e){
        e.preventDefault();
        const fd = new FormData(this);
        $("#btnsave").text('Adding...');
        $.ajax({
            url: '{{ route('saveMessage') }}',
            method: 'post',
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            success: function(res){
                console.log(res);
                if(res.status == 200){
                    toastr.success('Data Save Successfully');
                    fetchAllMessage();
                }
                $("#btnsave").text('SAVE');
                $("#messageForm")[0].reset();
                $("#addMessageModal").modal('hide');
            },
            error: function (request, status, error) {
                toastr.error(request.responseText);
                fetchAllMessage();
                $("#btnsave").text('SAVE');
                $("#messageForm")[0].reset();
                $("#addMessageModal").modal('hide');
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
			url: '{{ route('deleteMessage') }}',
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
			fetchAllMessage();
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
		url: '{{ route('editMessage') }}',
		method: 'get',
		data: {
		id: id,
		_token: '{{ csrf_token() }}'
		},
		success: function(res){
			console.log(res);

            $("#bmem_id").val(res.id);
			$("#name").val(res.name);
			$("#position").val(res.position);
			$("#message").val(res.message);
			$("#logo_img").html(`<img src="storage/message/${res.photo}" width="100" class="img-fluid img-thumbnail">`);
			$("#bmem_photo").val(res.photo);
		}
		});
		});

        // update employee ajax request
	$("#messageEditForm").submit(function(e) {
	e.preventDefault();
	const fd = new FormData(this);
	$("#btnupdate").text('Updating...');
		$.ajax({
			url: '{{ route('updateMessage') }}',
			method: 'post',
			data: fd,
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'json',
		success: function(response) {
			if (response.status == 200) {
                toastr.success('Update Successfully');
				fetchAllMessage();
			}
			$("#btnupdate").text('Update');
			$("#messageEditForm")[0].reset();
			$("#editMessageModal").modal('hide');
			}
		});
	});
});



</script>

@endpush
