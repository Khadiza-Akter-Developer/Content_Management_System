@extends('layout.auth')
@section('content')
    {{-- Modal --}}
    <div class="modal" id="BlogModal" aria-labelledby="BlogModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="BlogModalLabel">Add Blog Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-body">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" required class="form-control" placeholder="enter title"
                            name="title">
                    </div>

                    <div class="form-body">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" id="image" class="form-control" placeholder="Image" name="image">
                    </div>

                    <div class="form-body">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" id="description" required class="form-control" placeholder="enter description"
                            name="description">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gradient-dark btn-sm" id="save_blog">Save</button>
                    <button type="button" class="btn btn-gradient-dark btn-sm" id="edit_blog">Update</button>
                    <button type="button" class="btn btn-gradient-dark btn-sm" id="delete_blog">Delete</button>
                    <button type="button" class="btn btn-gradient-dark btn-sm" id="cancel_blog">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal --}}


    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">List of Blog </h3>
                <div class="d-flex justify-content-end mb-3">
                    <button type="button" class="btn btn-gradient-dark btn-sm" id="add_blog">Add Blog</button>
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
                                    @foreach ($blog as $it)
                                        <tr>
                                            <td>{{ $it->id }}</td>
                                            <td>{{ $it->title }}</td>
                                            <td><img src="{{ asset('uploads/blogs/' . $it->image) }}" width="70px"
                                                    height="70px" alt="Image"></td>
                                            <td>{{ $it->description }}</td>
                                            <td><a href="{{ url('blog-edit/' . $it->id) }}"
                                                    class="btn btn-sm btn-secondary">Edit</a></td>
                                            <td><a href="{{ url('blog-delete/' . $it->id) }}"
                                                    class="btn btn-sm bg-danger">Delete</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                {{ $blog->links() }}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).on('click', '.add_blog', function(e) {
            e.preventDefault();
            $('#AddBlogModalLabel').text('Add Blog Data');
            
        });
    </script>
@endsection
