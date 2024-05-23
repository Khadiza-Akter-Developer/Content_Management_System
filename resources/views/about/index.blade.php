@extends('layout.auth')
@section('content')
    {{-- Modal --}}
    <div class="modal" id="AboutModal" aria-labelledby="AboutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AboutModalLabel">Add About Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="csrf_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="about_id">
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
                <h3 class="page-title">List of About </h3>
                <div class="d-flex justify-content-end mb-3">
                    <button type="button" class="btn btn-gradient-dark btn-sm" id="add_about">Add About</button>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-14 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <table id="myTable" class="table table-striped">
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
                                    @foreach ($about as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td><img src="{{ asset('uploads/abouts/' . $item->image) }}" width="70px"
                                                    height="70px" alt="Image"></td>
                                            <td>{{ $item->description }}</td>
                                            <td><button class="btn btn-sm btn-secondary edit_about"
                                                    data-id="{{ $item->id }}">Edit</button></td>
                                            <td><button class="btn btn-sm bg-danger delete_about"
                                                    data-id="{{ $item->id }}">Delete</button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    {{ $about->links() }}
                </div> --}}
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
                    Submit_url = "{{ route('about.store') }}";
                    method = 'POST';
                } else if (Recent_Action === 'update') {
                    Submit_url = "{{ route('about.update') }}";
                    method = 'POST';
                    formData.append('_method', 'PUT');
                    formData.append('id', $('#about_id').val());
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
                                    text: "About data has been saved successfully.",
                                    icon: "success"
                                }).then(() => {
                                    location.reload();
                                },1000);
                            } else if (Recent_Action === 'update') {
                                Swal.fire({
                                    title: "Saved!",
                                    text: "About data has been updated successfully.",
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
                $('#add_about').click(function(e) {
                    e.preventDefault();
                    Recent_Action = 'save';
                    $('#AboutModalLabel').text('Add About Data');
                    $('#action_button').text('Save');
                    $('#About_id').val('');
                    $('#title').val('');
                    $('#image').val('');
                    $('#description').val('');
                    $('#AboutModal').modal('show');
                });

                $('.edit_about').click(function(e) {
                    e.preventDefault();
                    Recent_Action = 'update';
                    $('#AboutModalLabel').text('Update About Data');
                    $('#action_button').text('Update');
                    const about_id = $(this).data('id');

                    $.ajax({
                        url: "{{ route('about.edit') }}",
                        type: 'GET',
                        data: {
                            id: about_id
                        },
                        success: function(response) {
                            $('#about_id').val(response.id);
                            $('#title').val(response.title);
                            $('#description').val(response.description);
                            $('#AboutModal').modal('show');
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

                $('.delete_about').click(function(e) {
                    e.preventDefault();
                    const about_id = $(this).data('id');

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
                                url: "{{ route('about.delete') }}",
                                type: 'DELETE',
                                data: {
                                    id: about_id,
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
