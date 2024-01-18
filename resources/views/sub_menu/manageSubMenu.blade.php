@extends('layouts.master')

@section('content')

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Sub Menu</div>
            <div class="ms-auto"><button class="btn btn-primary radius-30 mt-2 mt-lg-0" data-bs-toggle="modal" data-bs-target="#addSubMenuModal">
                <i class="bx bxs-plus-square"></i>Add Sub Menu</button></div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body" id="show_submenus">
            </div>
        </div>

        @include('sub_menu/modal/add_subMenu')
        @include('sub_menu/modal/edit_subMenu')

    </div>
</div>
<!--end page wrapper -->

@endsection

@push('scripts')

<script>

$(document).ready(function() {
    // Get All Member function call
    fetchAllSubMenu();

    // Get All Member function
    function fetchAllSubMenu(){
        $.ajax({
        url: '{{ route('submenuData') }}',
        method: 'get',
        success: function(res){
            $("#show_submenus").html(res);
        }
        });
    }

    // Add Memeber Code
	$("#submenuForm").submit(function(e){
        e.preventDefault();
        const fd = new FormData(this);
        $("#btnsave").text('Adding...');
        $.ajax({
            url: '{{ route('savesub') }}',
            method: 'post',
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            success: function(res){
                console.log(res);
                if(res.status == 200){
                    toastr.success('Data Save Successfully');
                    fetchAllSubMenu();
                }
                $("#btnsave").text('SAVE');
                $("#submenuForm")[0].reset();
                $("#addSubMenuModal").modal('hide');
            },
            error: function (request, status, error) {
                toastr.error(request.responseText);
                fetchAllSubMenu();
                $("#btnsave").text('SAVE');
            $("#submenuForm")[0].reset();
            $("#addSubMenuModal").modal('hide');
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
			url: '{{ route('deletesub') }}',
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
			fetchAllSubMenu();
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
		url: '{{ route('editsub') }}',
		method: 'get',
		data: {
		id: id,
		_token: '{{ csrf_token() }}'
		},
		success: function(res){
			console.log(res);

            $("#bmem_id").val(res.id);
            $("#menu_id").val(res.menu_id);
			$("#name").val(res.name);
			$("#slug").val(res.slug);
		}
		});
		});

        // update employee ajax request
	$("#submenuEditForm").submit(function(e) {
	e.preventDefault();
	const fd = new FormData(this);
	$("#btnupdate").text('Updating...');
		$.ajax({
			url: '{{ route('updatesub') }}',
			method: 'post',
			data: fd,
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'json',
		success: function(response) {
			if (response.status == 200) {
                toastr.success('Update Successfully');
				fetchAllSubMenu();
			}
			$("#btnupdate").text('Update');
			$("#submenuEditForm")[0].reset();
			$("#editSubMenuModal").modal('hide');
			}
		});
	});
});



</script>

@endpush
