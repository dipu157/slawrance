@extends('layouts.master')

@section('content')

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Teacher</div>
            <div class="ms-auto"><button class="btn btn-primary radius-30 mt-2 mt-lg-0" data-bs-toggle="modal" data-bs-target="#addTeacherModal">
                <i class="bx bxs-plus-square"></i>Add Teacher</button></div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body" id="show_teachers">
            </div>
        </div>

        @include('Members/Teacher/modal/add_teacher')
        @include('Members/Teacher/modal/edit_teacher')

    </div>
</div>
<!--end page wrapper -->

@endsection

@push('scripts')

<script>

$(document).ready(function() {
    // Get All Teacher function call
    fetchAllTeacher();

    // Get All Teacher function
    function fetchAllTeacher(){
    $.ajax({
    url: '{{ route('teacherData') }}',
    method: 'get',
    success: function(res){
        $("#show_teachers").html(res);
    }
    });
    }

    // Add Teacher Code
	$("#teacherForm").submit(function(e){
        e.preventDefault();
        const fd = new FormData(this);
        $("#btnsave").text('Adding...');
        $.ajax({
            url: '{{ route('saveTeacher') }}',
            method: 'post',
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            success: function(res){
                console.log(res);
                if(res.status == 200){
                    toastr.success('Data Save Successfully');
                    fetchAllTeacher();
                }
                $("#btnsave").text('SAVE');
                $("#teacherForm")[0].reset();
                $("#addTeacherModal").modal('hide');
            },
            error: function (request, status, error) {
                toastr.error(request.responseText);
                fetchAllTeacher();
                $("#btnsave").text('SAVE');
            $("#teacherForm")[0].reset();
            $("#addTeacherModal").modal('hide');
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
			url: '{{ route('deleteTeacher') }}',
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
			fetchAllTeacher();
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
		url: '{{ route('editTeacher') }}',
		method: 'get',
		data: {
		id: id,
		_token: '{{ csrf_token() }}'
		},
		success: function(res){
			console.log(res);

            $("#bmem_id").val(res.id);
			$("#name").val(res.name);
			$("#email").val(res.email);
			$("#position").val(res.position);
			$("#class_department").val(res.class_department);
			$("#mobile").val(res.mobile);
			$("#dob").val(res.dob);
			$("#joining_date").val(res.joining_date);
			$('#blood_group option[value="'+res.blood_group+'"]').prop('selected', true);
			$('#gender option[value="'+res.gender+'"]').prop('selected', true);
			$("#logo_img").html(`<img src="storage/images/teacher/${res.photo}" width="100" class="img-fluid img-thumbnail">`);
			$("#bmem_photo").val(res.photo);
		}
		});
		});

        // update Teacher ajax request
	$("#teacherEditForm").submit(function(e) {
	e.preventDefault();
	const fd = new FormData(this);
	$("#btnupdate").text('Updating...');
		$.ajax({
			url: '{{ route('updateTeacher') }}',
			method: 'post',
			data: fd,
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'json',
		success: function(response) {
			if (response.status == 200) {
                toastr.success('Update Successfully');
				fetchAllTeacher();
			}
			$("#btnupdate").text('Update');
			$("#teacherEditForm")[0].reset();
			$("#editTeacherModal").modal('hide');
			}
		});
	});
});



</script>

@endpush
