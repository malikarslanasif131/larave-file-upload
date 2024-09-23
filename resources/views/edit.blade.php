<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Gallery</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-10">
                <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card p-4">
                        <h1>Edit Gallery</h1>

                        <div class="col-6">
                            <label for="author_name" class="form-label">Author Name</label>
                            <input type="text" name="author_name" class="form-control m-1" value="{{ old('author_name', $gallery->author_name) }}">

                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control m-1" value="{{ old('title', $gallery->title) }}">

                            <label for="category" class="form-label">Category</label>
                            <input type="text" name="category" class="form-control m-1" value="{{ old('category', $gallery->category) }}">

                            <label for="file" class="form-label">Upload New Image (Optional)</label>
                            <input onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])" type="file" name="file" class="form-control m-1" accept=".jpg,.png,.jpeg">

                            @if($gallery->image)
                                <img id="preview" src="{{ asset('storage/' . $gallery->image) }}" alt="Current Image" class="img-fluid img-thumbnail m-3" style="max-width: 250px;">
                            @endif

                            <button type="submit" class="btn btn-primary m-3">Update</button>
                            <a href="{{ route('gallery.index') }}" class="btn btn-secondary m-3">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
