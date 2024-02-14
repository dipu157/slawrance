@extends('layouts.master')

@section('content')

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Class</div>
            <div class="ms-auto"><button class="btn btn-primary radius-30 mt-2 mt-lg-0" data-bs-toggle="modal" data-bs-target="#addClassModal">
                <i class="bx bxs-plus-square"></i>Add Class</button></div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body" id="show_class">
            </div>
        </div>

        @include('Classes/modal/add_class')
        @include('Classes/modal/edit_class')

    </div>
</div>
<!--end page wrapper -->

@endsection

@push('scripts')

<script>

$(document).ready(function() {
    // Get All Member function call
    fetchAllClass();

    // Get All Member function
    function fetchAllClass(){
    $.ajax({
    url: '{{ route('classData') }}',
    method: 'get',
    success: function(res){
        $("#show_class").html(res);
    }
    });
    }

    // Add Class Code
	$("#classForm").submit(function(e){
        e.preventDefault();
        const fd = new FormData(this);
        $("#btnsave").text('Adding...');
        $.ajax({
            url: '{{ route('saveclass') }}',
            method: 'post',
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            success: function(res){
                console.log(res);
                if(res.status == 200){
                    toastr.success('Data Save Successfully');
                    fetchAllClass();
                }
                $("#btnsave").text('SAVE');
                $("#classForm")[0].reset();
                $("#addClassModal").modal('hide');
            },
            error: function (request, status, error) {
                toastr.error(request.responseText);
                fetchAllClass();
                $("#btnsave").text('SAVE');
                $("#classForm")[0].reset();
                $("#addClassModal").modal('hide');
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
	 		url: '{{ route('deleteclass') }}',
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
	 		fetchAllClass();
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
		 url: '{{ route('editclass') }}',
		 method: 'get',
		 data: {
		    id: id,
		    _token: '{{ csrf_token() }}'
		 },
		 success: function(res){
		 	console.log(res);

            $("#cls_id").val(res.id);
		 	$("#class_name").val(res.class_name);
		 	$("#position").val(res.position);
		 	$("#student_age").val(res.student_age);
		 	$("#class_teacher_name").val(res.class_teacher_name);
		 	$("#class_time").val(res.class_time);
		 	$("#capacity").val(res.capacity);
		 	$("#cls_photo").val(res.photo);
		 	$("#teacher_photo").val(res.image);
		 }
		 });
		 });

        // update employee ajax request
	 $("#classEditForm").submit(function(e) {
	 e.preventDefault();
	 const fd = new FormData(this);
	 $("#btnupdate").text('Updating...');
	 	$.ajax({
	 		url: '{{ route('updateclass') }}',
	 		method: 'post',
	 		data: fd,
	 		cache: false,
	 		contentType: false,
	 		processData: false,
	 		dataType: 'json',
	 	success: function(response) {
	 		if (response.status == 200) {
                 toastr.success('Update Successfully');
	 			fetchAllNews();
	 		}
	 		$("#btnupdate").text('Update');
	 		$("#classEditForm")[0].reset();
	 		$("#editClassModal").modal('hide');
	 		}
	 	});
	 });


});



</script>

@endpush
