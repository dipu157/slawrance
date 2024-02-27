@extends('layouts.master')

@section('content')

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Notice</div>
            <div class="ms-auto"><button class="btn btn-primary radius-30 mt-2 mt-lg-0" data-bs-toggle="modal" data-bs-target="#addNoticeModal">
                <i class="bx bxs-plus-square"></i>Add Notice</button></div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body" id="show_notices">
            </div>
        </div>

        @include('notice/modal/add_notice')
        @include('notice/modal/edit_notice')

    </div>
</div>
<!--end page wrapper -->

@endsection

@push('scripts')

<script>

$(document).ready(function() {
    // Get All Member function call
    fetchAllNotice();

    // Get All Member function
    function fetchAllNotice(){
    $.ajax({
    url: '{{ route('noticeData') }}',
    method: 'get',
    success: function(res){
        $("#show_notices").html(res);
    }
    });
    }

    // Add Notice Code
	$("#noticeForm").submit(function(e){
        e.preventDefault();
        const fd = new FormData(this);
        $("#btnsave").text('Adding...');
        $.ajax({
            url: '{{ route('saveNotice') }}',
            method: 'post',
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            success: function(res){
                console.log(res);
                if(res.status == 200){
                    toastr.success('Data Save Successfully');
                    fetchAllNotice();
                }
                $("#btnsave").text('SAVE');
                $("#noticeForm")[0].reset();
                $("#addNoticeModal").modal('hide');
            },
            error: function (request, status, error) {
                toastr.error(request.responseText);
                fetchAllNotice();
                $("#btnsave").text('SAVE');
                $("#noticeForm")[0].reset();
                $("#addNoticeModal").modal('hide');
            }

        });
	});

    //View Icon Click for View PDF
		$(document).on('click', '.viewIcon', function(e){
            e.preventDefault();
            window.location.href = $(this).data('remote');
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
			url: '{{ route('deleteNotice') }}',
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
			fetchAllNotice();
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
		url: '{{ route('editNotice') }}',
		method: 'get',
		data: {
		id: id,
		_token: '{{ csrf_token() }}'
		},
		success: function(res){
			console.log(res);

            $("#bmem_id").val(res.id);
			$("#title").val(res.title);
			$("#notice_date").val(res.notice_date);
			$("#description").val(res.description);
			$("#attach").val(res.attachment);
		}
		});
		});

        // update employee ajax request
	$("#noticeEditForm").submit(function(e) {
	e.preventDefault();
	const fd = new FormData(this);
	$("#btnupdate").text('Updating...');
		$.ajax({
			url: '{{ route('updateNotice') }}',
			method: 'post',
			data: fd,
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'json',
		success: function(response) {
			if (response.status == 200) {
                toastr.success('Update Successfully');
				fetchAllNotice();
			}
			$("#btnupdate").text('Update');
			$("#noticeEditForm")[0].reset();
			$("#editNoticeModal").modal('hide');
			}
		});
	});
});



</script>

@endpush
