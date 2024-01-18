@extends('layouts.master')

@section('content')

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">News</div>
            <div class="ms-auto"><button class="btn btn-primary radius-30 mt-2 mt-lg-0" data-bs-toggle="modal" data-bs-target="#addNewsModal">
                <i class="bx bxs-plus-square"></i>Add News</button></div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body" id="show_news">
            </div>
        </div>

        @include('news/modal/add_news')
        @include('news/modal/edit_news')

    </div>
</div>
<!--end page wrapper -->

@endsection

@push('scripts')

<script>

$(document).ready(function() {
    // Get All Member function call
    fetchAllNews();

    // Get All Member function
    function fetchAllNews(){
    $.ajax({
    url: '{{ route('newsData') }}',
    method: 'get',
    success: function(res){
        $("#show_news").html(res);
    }
    });
    }

    // Add Memeber Code
	$("#newsForm").submit(function(e){
        e.preventDefault();
        const fd = new FormData(this);
        $("#btnsave").text('Adding...');
        $.ajax({
            url: '{{ route('savenews') }}',
            method: 'post',
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            success: function(res){
                console.log(res);
                if(res.status == 200){
                    toastr.success('Data Save Successfully');
                    fetchAllNews();
                }
                $("#btnsave").text('SAVE');
                $("#newsForm")[0].reset();
                $("#addNewsModal").modal('hide');
            },
            error: function (request, status, error) {
                toastr.error(request.responseText);
                fetchAllNews();
                $("#btnsave").text('SAVE');
                $("#newsForm")[0].reset();
                $("#addNewsModal").modal('hide');
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
			url: '{{ route('deletenews') }}',
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
			fetchAllNews();
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
		url: '{{ route('editnews') }}',
		method: 'get',
		data: {
		id: id,
		_token: '{{ csrf_token() }}'
		},
		success: function(res){
			console.log(res);

            $("#bmem_id").val(res.id);
			$("#headline").val(res.headline);
			$("#short_description").val(res.short_description);
			$("#description").val(res.description);
		}
		});
		});

        // update employee ajax request
	$("#newsEditForm").submit(function(e) {
	e.preventDefault();
	const fd = new FormData(this);
	$("#btnupdate").text('Updating...');
		$.ajax({
			url: '{{ route('updatenews') }}',
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
			$("#newsEditForm")[0].reset();
			$("#editNewsModal").modal('hide');
			}
		});
	});
});



</script>

@endpush
