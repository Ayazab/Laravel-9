<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assests/parsley.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <style>
        #outer {
            text-align: center;
        }

        .inner {
            display: inline-block;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
</head>

<body>

    <div class="col-md-6 offset-3 mt-5">
        <h3 class="text-center">Post</h3>

        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create Post</a>

        @if (count($posts) > 0)

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Publish</th>
                        <th scope="col">Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ Str::limit($post->description, 15, '...') }}</td>
                            <td>{{ $post->is_published == 1 ? 'Yes' : 'No' }}</td>
                            <td>{{ $post->is_active == 1 ? 'Yes' : 'No' }}</td>
                            <td id="outer">
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-success iner"><i
                                        class="fa fa-eye"></i></a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info inner"><i
                                        class="fa fa-edit"></i></a>
                                <form method="POST" action="{{ route('posts.destroy', $post->id) }}" class="inner">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>

                                //74.
                                @if ($post->trashed())
                                    <a href="{{ route('posts.soft-delete', $post->id) }}"
                                        class="btn btn-warning inner"><i class="fa fa-undo"></i></a>
                                @endif

                                {{-- <a href="" class="btn btn-danger">Delete</a> --}}
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @else
            <h4 class="text-center text-danger mt-5">No Post Found</h4>

        @endif

        {{ $posts->links() }}
    </div>


    {{-- Both Same --}}
    <a href="{{ url('/test1') }}">Go</a>
    <a href="{{ route('test.1') }}">Go</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
        integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>





    <script>
        @if (Session::has('alert-success'))
            toastr.success('{{ Session::get('alert-success') }}', 'Success');
        @endif
    </script>

    <script>
        @if (Session::has('alert-success'))
            toastr.success('{{ Session::get('alert-success') }}', 'Success');
            toastr.success('{{ Session::get('alert-success') }}', 'Success');
            toastr.s
        @endif
    </script>


    <script>
        function showToast() {
            toastr.success('Hello, World!', 'Success'); // Change the message and title as needed
        }
    </script>

    <button onclick="showToast()">Show Toast</button>




    <script>
        $('#form').parsley();
    </script>
</body>

</html>
