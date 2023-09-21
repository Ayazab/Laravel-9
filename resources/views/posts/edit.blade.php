<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assests/parsley.css')}}">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  </head>
  <body>

    <div class="col-md-6 offset-3 mt-5">
        <h3 class="text-center">Edit Post</h3>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>

        @endif

        @if (Session::has('alert-success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success</strong>  {{session::get('alert-success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        @endif



        <form method="POST" action="{{ route('posts.update', $post->id)}}" id="form">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label>Title</label>
              <input  type="title" name="title" placeholder="Enter title here" class="form-control" value="{{old('title', $post->title)}}">
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea required type="desc" name="description" placeholder="Write Desc here..." class="form-control">{{old('description', $post->description)}}</textarea>
            </div>
            <div class="mb-3">
                <label>Published</label>
                <select required name="is_published" class="form-control">
                    <option disabled selected value="">Choose Option</option>
                    <option value="1" @selected(old('is_active', $post->is_published) == 1)>Yes</option>
                    <option value="0" @selected(old('is_active', $post->is_published) == 0)>No</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Active</label>
                {{-- @dd(old('is_active')) --}}
                <select required name="is_active" class="form-control">
                    <option  disabled selected value="">Choose Option</option>
                    <option @selected(old('is_active', $post->is_active) == 1) value="1">Yes</option>
                    <option @selected(old('is_active', $post->is_active) == 0) value="0">No</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>


    {{-- Both Same --}}
    <a href="{{ url('/test1')}}">Go</a>
    <a href="{{ route('test.1')}}">Go</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $('#form').parsley();
    </script>
    </body>
</html>
