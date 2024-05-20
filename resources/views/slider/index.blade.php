@extends('layout.auth')
@section('content')
    {{-- Modal --}}
    <div class="modal" id="SliderModal" aria-labelledby="SliderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="SliderModalLabel">Add Slider Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="csrf_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="slider_id">
                    <div class="form-body">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" required class="form-control" placeholder="Enter title"
                            name="title">
                    </div>

                    <div class="form-body">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" id="image" class="form-control" placeholder="Image" name="image">
                    </div>

                    <div class="form-body">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" id="description" required class="form-control" placeholder="Enter description"
                            name="description">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gradient-dark btn-sm" id="action_button"></button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal --}}

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">List of Slider</h3>
                <div class="d-flex justify-content-end mb-3">
                    <button type="button" class="btn btn-gradient-dark btn-sm" id="add_slider">Add Slider</button>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-14 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th> ID </th>
                                        <th> Title </th>
                                        <th> Image </th>
                                        <th> Description </th>
                                        <th> Edit </th>
                                        <th> Delete </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($slider as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td><img src="{{ asset('uploads/sliders/' . $item->image) }}" width="70px"
                                                    height="70px" alt="Image"></td>
                                            <td>{{ $item->description }}</td>
                                            <td><button class="btn btn-sm btn-secondary edit_slider"
                                                    data-id="{{ $item->id }}">Edit</button></td>
                                            <td><button class="btn btn-sm bg-danger delete_slider"
                                                    data-id="{{ $item->id }}">Delete</button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        {{ $slider->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script>
            var Recent_Action = '';

            function OnSubmitModal() {
                const formData = new FormData();
                formData.append('title', $('#title').val());
                if ($('#image')[0].files[0]) {
                    formData.append('image', $('#image')[0].files[0]);
                }
                formData.append('description', $('#description').val());
                formData.append('_token', $('#csrf_token').val());

                var Submit_url = '';
                var method = '';

                if (Recent_Action === 'save') {
                    Submit_url = "{{ route('slider.store') }}";
                    method = 'POST';
                } else if (Recent_Action === 'update') {
                    Submit_url = "{{ route('slider.update') }}";
                    method = 'POST';
                    formData.append('_method', 'PUT');
                    formData.append('id', $('#slider_id').val());
                }

                $.ajax({
                    url: Submit_url,
                    type: method,
                    data: formData,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            if (Recent_Action === 'save') {
                                Swal.fire({
                                    title: "Good job!",
                                    text: "Blog data has been saved successfully.",
                                    icon: "success"
                                }).then(() => {
                                    location.reload();
                                }, 1000);
                            } else if (Recent_Action === 'update') {
                                Swal.fire({
                                    title: "Saved!",
                                    text: "Blog data has been updated successfully.",
                                    icon: "success"
                                }).then(() => {
                                    location.reload();
                                });
                            }
                        } else {
                            Swal.fire({
                                title: "Error!",
                                text: response.message || "An error occurred while saving data.",
                                icon: "error"
                            });
                        }
                    },
                    error: function(response) {
                        Swal.fire({
                            title: "Error!",
                            text: "An error occurred while processing the request.",
                            icon: "error"
                        });
                    }
                });
            }


            $(document).ready(function() {
                $('#add_slider').click(function(e) {
                    e.preventDefault();
                    Recent_Action = 'save';
                    $('#SliderModalLabel').text('Add Slider Data');
                    $('#action_button').text('Save');
                    $('#slider_id').val('');
                    $('#title').val('');
                    $('#image').val('');
                    $('#description').val('');
                    $('#SliderModal').modal('show');
                });

                $('.edit_slider').click(function(e) {
                    e.preventDefault();
                    Recent_Action = 'update';
                    $('#SliderModalLabel').text('Update Slider Data');
                    $('#action_button').text('Update');
                    const slider_id = $(this).data('id');

                    $.ajax({
                        url: "{{ route('slider.edit') }}",
                        type: 'GET',
                        data: {
                            id: slider_id
                        },
                        success: function(response) {
                            $('#slider_id').val(response.id);
                            $('#title').val(response.title);
                            $('#description').val(response.description);
                            $('#SliderModal').modal('show');
                        }
                    });
                });

                $('#action_button').click(function() {
                    if (Recent_Action === 'update') {
                        Swal.fire({
                            title: "Do you want to save the changes?",
                            showDenyButton: true,
                            showCancelButton: true,
                            confirmButtonText: "Save",
                            denyButtonText: `Don't save`
                        }).then((result) => {
                            if (result.isConfirmed) {
                                OnSubmitModal();
                            } else if (result.isDenied) {
                                Swal.fire("Changes are not saved", "", "info");
                            }
                        });
                    } else {
                        OnSubmitModal();
                    }
                });

                $('.delete_slider').click(function(e) {
                    e.preventDefault();
                    const slider_id = $(this).data('id');

                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('slider.delete') }}",
                                type: 'DELETE',
                                data: {
                                    id: slider_id,
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(response) {
                                    if (response.status === 'success') {
                                        Swal.fire("Deleted!", response.message, "success");
                                        setTimeout(function() {
                                            location.reload();
                                        }, 1000);
                                    } else {
                                        Swal.fire("Error!", response.message, "error");
                                    }
                                },
                                error: function(response) {
                                    Swal.fire("Error!",
                                        "An error occurred. Please try again.", "error");
                                }
                            });
                        }
                    });
                });
            });
        </script>
    @endsection
