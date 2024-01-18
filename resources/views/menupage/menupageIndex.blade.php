@extends('layouts.master')

@section('content')

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Menu Page</div>
            <div class="ms-auto"><button class="btn btn-primary radius-30 mt-2 mt-lg-0" data-bs-toggle="modal" data-bs-target="#addMenuPageModal">
                <i class="bx bxs-plus-square"></i>Add Menu Page</button></div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body" id="show_menupages">
            </div>
        </div>

        @include('menupage/modal/add_menuPage')
        @include('menupage/modal/edit_menuPage')

    </div>
</div>
<!--end page wrapper -->

@endsection

@push('scripts')

<script>

$(document).ready(function() {
    // Get All Member function call
    fetchAllMenuPage();

    // Get All Member function
    function fetchAllMenuPage(){
        $.ajax({
        url: '{{ route('menuPageData') }}',
        method: 'get',
        success: function(res){
            $("#show_menupages").html(res);
        }
        });
    }

    // Add Memeber Code
	$("#menuPageForm").submit(function(e){
        e.preventDefault();
        const fd = new FormData(this);
        $("#btnsave").text('Adding...');
        $.ajax({
            url: '{{ route('savemenupage') }}',
            method: 'post',
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            success: function(res){
                console.log(res);
                if(res.status == 200){
                    toastr.success('Data Save Successfully');
                    fetchAllMenuPage();
                }
                $("#btnsave").text('SAVE');
                $("#menuPageForm")[0].reset();
                $("#addMenuPageModal").modal('hide');
            },
            error: function (request, status, error) {
                toastr.error(request.responseText);
                fetchAllMenuPage();
                $("#btnsave").text('SAVE');
            $("#menuPageForm")[0].reset();
            $("#addMenuPageModal").modal('hide');
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
			url: '{{ route('deletemenupage') }}',
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
			fetchAllMenuPage();
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
		url: '{{ route('editmenupage') }}',
		method: 'get',
		data: {
		id: id,
		_token: '{{ csrf_token() }}'
		},
		success: function(res){
			console.log(res);

            $("#bmem_id").val(res.id);
            $("#menu_id").val(res.menu_id);
			$("#title").val(res.title);
			$("#description").val(res.description);
			$("#logo_img").html(`<img src="storage/images/menudetails/${res.image}" width="100" class="img-fluid img-thumbnail">`);
			$("#bmem_photo").val(res.image);
		}
		});
		});

// update employee ajax request
	$("#menuPageEditForm").submit(function(e) {
	e.preventDefault();
	const fd = new FormData(this);
	$("#btnupdate").text('Updating...');
		$.ajax({
			url: '{{ route('updatemenupage') }}',
			method: 'post',
			data: fd,
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'json',
		success: function(response) {
			if (response.status == 200) {
                toastr.success('Update Successfully');
				fetchAllMenuPage();
			}
			$("#btnupdate").text('Update');
			$("#menuPageForm")[0].reset();
			$("#editMenuPageModal").modal('hide');
			}
		});
	});
});



</script>

@endpush
