@extends('layouts.master')

@section('content')

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Board Members</div>
            <div class="ms-auto"><button class="btn btn-primary radius-30 mt-2 mt-lg-0" data-bs-toggle="modal" data-bs-target="#addMemberModal">
                <i class="bx bxs-plus-square"></i>Add Members</button></div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body" id="show_members">
            </div>
        </div>

        @include('Members/Board/modal/add_member')
        @include('Members/Board/modal/edit_member')

    </div>
</div>
<!--end page wrapper -->

@endsection

@push('scripts')

<script>

$(document).ready(function() {
    // Get All Member function call
    fetchAllMember();

    // Get All Member function
    function fetchAllMember(){
    $.ajax({
    url: '{{ route('boardMemberdata') }}',
    method: 'get',
    success: function(res){
        $("#show_members").html(res);
    }
    });
    }

    // Add Memeber Code
	$("#bmemberForm").submit(function(e){
        e.preventDefault();
        const fd = new FormData(this);
        $("#btnsave").text('Adding...');
        $.ajax({
            url: '{{ route('save') }}',
            method: 'post',
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            success: function(res){
                console.log(res);
                if(res.status == 200){
                    toastr.success('Data Save Successfully');
                    fetchAllMember();
                }
                $("#btnsave").text('SAVE');
                $("#bmemberForm")[0].reset();
                $("#addMemberModal").modal('hide');
            },
            error: function (request, status, error) {
                toastr.error(request.responseText);
                fetchAllMember();
                $("#btnsave").text('SAVE');
            $("#bmemberForm")[0].reset();
            $("#addMemberModal").modal('hide');
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
			url: '{{ route('delete') }}',
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
			fetchAllMember();
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
		url: '{{ route('edit') }}',
		method: 'get',
		data: {
		id: id,
		_token: '{{ csrf_token() }}'
		},
		success: function(res){
			console.log(res);

            $("#bmem_id").val(res.id);
			$("#full_name").val(res.full_name);
			$("#email").val(res.email);
			$("#position").val(res.position);
			$("#mobile").val(res.mobile);
			$("#dob").val(res.dob);
			$('#blood_group option[value="'+res.blood_group+'"]').prop('selected', true);
			$('#gender option[value="'+res.gender+'"]').prop('selected', true);
			$("#national_id").val(res.national_id);
			$("#logo_img").html(`<img src="storage/images/BMember/${res.photo}" width="100" class="img-fluid img-thumbnail">`);
			$("#bmem_photo").val(res.photo);
		}
		});
		});

        // update employee ajax request
	$("#memberEditForm").submit(function(e) {
	e.preventDefault();
	const fd = new FormData(this);
	$("#btnupdate").text('Updating...');
		$.ajax({
			url: '{{ route('update') }}',
			method: 'post',
			data: fd,
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'json',
		success: function(response) {
			if (response.status == 200) {
                toastr.success('Update Successfully');
				fetchAllMember();
			}
			$("#btnupdate").text('Update');
			$("#memberEditForm")[0].reset();
			$("#editMemberModal").modal('hide');
			}
		});
	});
});



</script>

@endpush
