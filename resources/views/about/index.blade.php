@extends('layout.auth')

@section('content')
    {{-- Add/Edit Modal --}}
    <div class="modal" id="AboutModal" aria-labelledby="AboutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AboutModalLabel">Add About Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="form_errList"></ul>
                    @csrf
                    <div class="form-group">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" required class="form-control" placeholder="Title"
                            name="title" value="">
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" id="image" class="form-control" placeholder="Image" name="image">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" id="description" class="form-control" placeholder="Description"
                            name="description" value="">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-gradient-dark btn-sm" id="save_button">Save</button>
                    <button type="button" class="btn btn-gradient-dark btn-sm" id="update_button"
                        style="display: none;">Update</button>
                    <button type="button" class="btn btn-gradient-dark btn-sm" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Add/Edit Modal --}}

    <div class="main-panel">
        <div class="content-wrapper">
            <div id="success_message"></div>
            <div class="page-header">
                <h3 class="page-title">List of About</h3>
                <div class="d-flex justify-content-end mb-3">
                    <button type="button" class="btn btn-gradient-dark btn-sm add_about">Add About</button>
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
                                <tbody></tbody>
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
            var submit_url

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
                                                    <td><button type="button" value="' + list.id + '" class="btn btn-sm btn-danger delete_about">Delete</button></td>\
                                                </tr>');
                            });
                        }
                    });
                }

                //var submit_url = 

                $(document).on('click', '.add_about', function(e) {
                    e.preventDefault();
                    var submit_url =
                        $('#AboutModalLabel').text("Add About Data");
                    $('AboutModal') = {{ route('about.store') }}
                    $('#form_errList').html("");
                });



















                $(document).on('click', '.edit_about', function(e) {
                    e.preventDefault();
                    var about_id = $(this).val();
                    $('#AboutModalLabel').text("Edit About Data");
                    $('#AboutModal').modal('show');
                    $('#save_button').hide();
                    $('#update_button').show();
                    $('#form_errList').html("");
                    $.ajax({
                        type: "GET",
                        url: "about-edit/" + about_id,
                        success: function(response) {
                            if (response.status == 404) {
                                $('#success_message').html("");
                                $('#success_message').addClass('alert alert-danger');
                                $('#success_message').text(response.message);
                            } else {
                                $('#title').val(response.about.title);
                                $('#description').val(response.about.description);
                                $('#update_button').data('id',
                                    about_id);
                            }
                        }
                    });
                });

                $(document).on('click', '#save_button', function(e) {
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
                        type: 'POST',
                        url: '{{ route('about.store') }}',
                        data: form_data,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(response) {
                            if (response.status == 400) {
                                $('#form_errList').html("");
                                $('#form_errList').addClass('alert alert-danger');
                                $.each(response.errors, function(key, err_values) {
                                    $('#form_errList').append('<li>' + err_values +
                                        '</li>');
                                });
                            } else {
                                $('#form_errList').html("");
                                $('#success_message').addClass('alert alert-success');
                                $('#success_message').text(response.message);
                                $('#AboutModal').modal('hide');
                                fetchabout();
                            }
                        }
                    });
                });

                $(document).on('click', '#update_button', function(e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                    let form_data = new FormData();
                    form_data.append('title', $('#title').val());
                    form_data.append('description', $('#description').val());
                    if ($('#image')[0].files[0]) {
                        form_data.append('image', $('#image')[0].files[0]);
                    }

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
                                $('#form_errList').html("");
                                $('#form_errList').addClass('alert alert-danger');
                                $.each(response.errors, function(key, err_values) {
                                    $('#form_errList').append('<li>' + err_values +
                                        '</li>');
                                });
                            } else if (response.status == 404) {
                                $('#form_errList').html("");
                                $('#success_message').addClass('alert alert-danger');
                                $('#success_message').text(response.message);
                            } else {
                                $('#form_errList').html("");
                                $('#success_message').addClass('alert alert-success');
                                $('#success_message').text(response.message);
                                $('#AboutModal').modal('hide');
                                fetchabout();
                            }
                        }
                    });
                });
            });
        </script>
    @endsection
