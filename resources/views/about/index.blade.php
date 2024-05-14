@extends('layout.auth')

@section('content')
    {{-- Add Modal --}}
    <div class="modal" id="AddAboutModal" aria-labelledby="AddAboutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddAboutModalLabel">Add About Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="saveform_errList"></ul>
                    @csrf
                    <div class="form-group">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" class="form-control" placeholder="Title" name="title"
                            value="{{ old('title') }}">
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" id="image" class="form-control" placeholder="Image" name="image"
                            value="{{ old('image') }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" id="description" class="form-control" placeholder="Description"
                            name="description" value="{{ old('description') }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gradient-dark btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn  btn-gradient-dark btn-sm add_about">Save</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Add Modal --}}

    {{-- Edit Modal --}}
    <div class="modal" id="EditAboutModal" aria-labelledby="EditAboutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditAboutModalLabel">Edit and Update About Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <ul id="updateform_errList"></ul>

                    <input type="hidden" id="edit_about_id">
                    @csrf
                    <div class="form-group">
                        <label for="" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="edit_title">
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" id="edit_image" class="form-control" name="edit_image">
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" class="form-control" name="description" id="edit_description">
                    </div>

                    <button type="submit" class="btn btn-dark btn-md btn-block btn-sm update_about">Update</button>
                    <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Edit Modal --}}

    <div class="main-panel">
        <div class="content-wrapper">
            <div id="success_message"></div>
            <div class="page-header">
                <h3 class="page-title">List of About</h3>
                <div class="d-flex justify-content-end mb-3">
                    <button type="button" class="btn  btn-gradient-dark btn-sm display_about">Add About</button>
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                {{ $about->links() }}
            </div>
        </div>
    @endsection

    @section('scripts')
        <script>
            $(document).ready(function() {

                fetchabout();

                function fetchabout() {
                    $.ajax({
                        type: "GET",
                        url: "fetch_about",
                        dataType: "json",
                        success: function(response) {
                            $('tbody').html("");
                            $.each(response.abouts, function(key, list) {
                                $('tbody').append('<tr>\
                            <td>' + list.id + '</td>\
                            <td>' + list.title + '</td>\
                            <td><img src="{{ asset('uploads/abouts/') }}/' + list.image + '" width="70px" height="70px" alt="Image"></td>\
                            <td>' + list.description + '</td>\
                            <td><button type="button" value="' + list.id + '" class="btn btn-secondary btn-sm edit_about">Edit</button></td>\
                            <td><button type="button" value="' + list.id + '" class="btn btn-sm btn-danger">Delete</button></td>\
                        </tr>');
                            });
                        }
                    });
                }

                //edit on click

                $(document).on('click', '.edit_about', function(e) {
                    e.preventDefault();
                    var about_id = $(this).val();
                    $('#EditAboutModal').modal('show');
                    $.ajax({
                        type: "GET",
                        url: "about-edit/" + about_id,
                        success: function(response) {
                            if (response.status == 404) {
                                $('#success_message').html("");
                                $('#success_message').addClass('alert alert-danger');
                                $('#success_message').text(response.message);
                            } else {
                                $('#edit_about_id').val(response.about.id);
                                $('#edit_title').val(response.about.title);
                                $('#edit_description').val(response.about.description);
                            }
                        }
                    });
                });

                $(document).on('click', '.update_about', function(e) {
                    e.preventDefault();
                    var id = $('#edit_about_id').val();
                    let form_data = new FormData();
                    form_data.append('title', $('#edit_title').val());
                    form_data.append('description', $('#edit_description').val());
                    form_data.append('edit_image', $('#edit_image')[0].files[0]);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "POST",
                        url: "about-update/" + id,
                        data: form_data,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success: function(response) {
                            if (response.status == 400) {
                                $('#updateform_errList').html("");
                                $('#updateform_errList').addClass('alert alert-danger');
                                $.each(response.errors, function(key, err_values) {
                                    $('#updateform_errList').append('<li>' + err_values +
                                        '</li>');
                                });
                            } else if (response.status == 404) {
                                $('#updateform_errList').html("");
                                $('#success_message').addClass('alert alert-danger');
                                $('#success_message').text(response.message);
                            } else {
                                $('#updateform_errList').html("");
                                $('#success_message').addClass('alert alert-success');
                                $('#success_message').text(response.message);
                                $('#EditAboutModal').modal('hide');
                                $('#edit_about_id').val('');
                                $('#edit_title').val('');
                                $('#edit_description').val('');
                                fetchabout();
                            }
                        }
                    });
                });


                $(document).on('click', ' .display_about', function(e) {
                    e.preventDefault();
                    $('#AddAboutModal').modal('show');
                });


                $(document).on('click', '.add_about', function(e) {
                    e.preventDefault();


                    let form_data = new FormData();
                    form_data.append('title', $('#title').val());
                    form_data.append('image', $('#image')[0].files[0]);
                    form_data.append('description', $('#description').val());

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'post',
                        url: '{{ route('about.store') }}',
                        data: form_data,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(response) {
                            if (response.status == 400) {
                                $('#saveform_errList').html("");
                                $('#saveform_errList').addClass('alert alert-danger');
                                $.each(response.errors, function(key, err_values) {
                                    $('#saveform_errList').append('<li>' + err_values +
                                        '</li>');
                                });
                            } else {
                                $('#saveform_errList').html("");
                                $('#success_message').addClass('alert alert-success')
                                $('#success_message').text(response.message)
                                $('#AddAboutModal').modal('hide');
                                $('#AddAboutModal').find('input').val("");
                            }
                        }
                    });
                });
            });
        </script>
    @endsection
