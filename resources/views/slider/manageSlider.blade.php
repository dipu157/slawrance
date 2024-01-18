@extends('layouts.master')

@section('content')

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Slider</div>
            <div class="ms-auto"><button class="btn btn-primary radius-30 mt-2 mt-lg-0" data-bs-toggle="modal" data-bs-target="#addSliderModal">
                <i class="bx bxs-plus-square"></i>Add Slider</button></div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body" id="show_slider">
            </div>
        </div>

        @include('slider/modal/add_slider')
        @include('slider/modal/edit_slider')

    </div>
</div>
<!--end page wrapper -->

@endsection

@push('scripts')

<script>

$(document).ready(function() {
    // Get All Member function call
    fetchAllSlider();

    // Get All Member function
    function fetchAllSlider(){
    $.ajax({
    url: '{{ route('sliderdata') }}',
    method: 'get',
    success: function(res){
        $("#show_slider").html(res);
    }
    });
    }

    // Add Memeber Code
	$("#sliderForm").submit(function(e){
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
                    fetchAllSlider();
                }
                $("#btnsave").text('SAVE');
                $("#sliderForm")[0].reset();
                $("#addSliderModal").modal('hide');
            },
            error: function (request, status, error) {
                toastr.error(request.responseText);
                fetchAllSlider();
                $("#btnsave").text('SAVE');
                $("#sliderForm")[0].reset();
                $("#addSliderModal").modal('hide');
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
                fetchAllSlider();
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
                $("#title").val(res.title);
                $("#description").val(res.description);
                $("#logo_img").html(`<img src="storage/images/Slider/${res.image}" width="100" class="img-fluid img-thumbnail">`);
                $("#bmem_photo").val(res.image);
            }
            });
            });

            // update employee ajax request
        $("#sliderEditForm").submit(function(e) {
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
                    fetchAllSlider();
                }
                $("#btnupdate").text('Update');
                $("#sliderEditForm")[0].reset();
                $("#editSliderModal").modal('hide');
                }
            });
        });
    });



</script>

@endpush
