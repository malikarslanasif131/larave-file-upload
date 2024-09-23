<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Upload</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <!-- Success message after upload -->
        <div class="row mt-5">
            <div class="col-6">
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>

        <!-- Form -->
        <div class="row mt-3">
            <div class="col-10 m-auto">
                <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="card p-4">
                            <h1>File Upload</h1>
                            <div class="col-6">
                                <!-- Author Name -->
                                <label for="author_name" class="form-label">Author Name</label>
                                <input 
                                    type="text" 
                                    name="author_name" 
                                    class="form-control m-1 @error('author_name') is-invalid @else {{ old('author_name') ? 'is-valid' : '' }} @enderror" 
                                    placeholder="Author Name"
                                    value="{{ old('author_name') }}"
                                >
                                @error('author_name')
                                    <div class="invalid-feedback m-3">{{ $message }}</div>
                                @enderror

                                <!-- Title -->
                                <label for="title" class="form-label">Title</label>
                                <input 
                                    type="text" 
                                    name="title" 
                                    class="form-control m-1 @error('title') is-invalid @else {{ old('title') ? 'is-valid' : '' }} @enderror" 
                                    placeholder="Title"
                                    value="{{ old('title') }}"
                                >
                                @error('title')
                                    <div class="invalid-feedback m-3">{{ $message }}</div>
                                @enderror

                                <!-- Category -->
                                <label for="category" class="form-label">Category</label>
                                <input 
                                    type="text" 
                                    name="category" 
                                    class="form-control m-1 @error('category') is-invalid @else {{ old('category') ? 'is-valid' : '' }} @enderror" 
                                    placeholder="Category"
                                    value="{{ old('category') }}"
                                >
                                @error('category')
                                    <div class="invalid-feedback m-3">{{ $message }}</div>
                                @enderror

                                <!-- File -->
                                <label for="file" class="form-label">Upload File</label>
                                <input 
                                    type="file" 
                                    name="file" 
                                    class="form-control m-1 @error('file') is-invalid @else {{ old('file') ? 'is-valid' : '' }} @enderror" 
                                    accept=".jpg,.png,.jpeg"
                                >
                                @error('file')
                                    <div class="invalid-feedback m-3">{{ $message }}</div>
                                @enderror

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary m-3">Upload</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Gallery Section -->
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <h1>Gallery</h1>
                <div class="row">
                    @foreach ( $galleries as  $gallery )
                        <div class="col-3">
                            <img src="{{ asset('storage/'.$gallery->image) }}" alt="{{ $gallery->title }}" class="img-fluid img-thumbnail h-50">
                            <h2 class="mt-2">{{ $gallery->title }}</h2>
                            <span class="badge text-bg-secondary">{{ $gallery->category }}</span>
                            <span class="blockquote-footer">{{ $gallery->author_name }}</span>
                            <div class="row">
                                <div class="d-flex">
                                    <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mt-2">Delete</button>
                                    </form>
                                    <a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-warning btn-sm mt-2 ms-3">Edit</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
