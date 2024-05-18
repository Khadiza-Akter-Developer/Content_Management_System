@extends('layout.auth')
@section('content')

 <!-- partial -->
 {{-- <div class="container mt-4 mb-8">
  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <a href="{{ route('slider.create') }}" class="btn btn-primary me-md-2 $btn-padding-y:50">Add Slider</a> 
    </div> --}}

 <div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">List of Slider </h3>
      <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('slider.create') }}" class="btn btn-dark btn-lg btn-block me-2 btn-sm">Add Slider</a>
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
                    <td><img src="{{ asset('uploads/sliders/'.$item->image) }}" width="70px" height="70px" alt="Image"></td>
                    <td>{{ $item->description }}</td> 
                    <td><a href="{{ url('slider-edit/'.$item->id) }}" class="btn btn-secondary btn-sm">Edit</a></td>
                    <td><a href="{{ url('slider-delete/'.$item->id) }}" class="btn bg-danger btn-sm">Delete</a></td>

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
      {{ $slider->links() }}
    </div>
  </div> 
@endsection





{{-- New --}}

{{-- @extends('layout.auth')
@section('content')
    {{-- Modal --}}
    {{-- <div class="modal" id="BlogModal" aria-labelledby="BlogModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-gradient-dark btn-sm" id="action_button"></button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal --}}

    {{-- <div class="main-panel">
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
                                            <td><a href="{{ url('blog-edit/' . $it->id) }}" class="btn btn-sm btn-secondary"
                                                    id="update_blog">Edit</a></td>
                                            <td><a href="{{ url('blog-delete/' . $it->id) }}"
                                                    class="btn btn-sm bg-danger">Delete</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
        var Recent_Action = '';

        function OnSubmitModal() {
            const formData = new FormData();
            formData.append('title', $('#title').val());
            formData.append('image', $('#image')[0].files[0]);
            formData.append('description', $('#description').val());
            let Submit_url = '';

            if (Recent_Action === 'save') {
                Submit_url = "{{ route('blog.store') }}";
            } else if (Recent_Action === 'update') {
                Submit_url = "{{ route('blog.update') }}";
            } else if (Recent_Action === 'delete') {
                Submit_url = "{{ route('blog.delete') }}";
            }

            $.ajax({
                url: Submit_url,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {}
            });
        }

        $(document).ready(function() {
            $(document).on('click', '#add_blog', function(e) {
                e.preventDefault();
                $('#BlogModalLabel').text('Add Blog Data');
                $('#BlogModal').modal('show');
            });



            $(document).on('click', '#update_blog', function(e) {
                e.preventDefault();
                $('#BlogModalLabel').text('Edit Blog Data');
                $('#BlogModal').modal('show');
            })
        });
    </script>
@endsection --}} 






