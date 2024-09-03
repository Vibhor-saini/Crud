<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Crud</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar  navbar-expand-sm bg-dark">

        <div class="container-fluid">
            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light" href="/">Products</a>
                </li>
            </ul>
        </div>
    </nav>

    @if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{$message}}</strong>
    </div>

    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                <form method="post" action="/products/store" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="name" value= "{{old('name')}}" name="name">
                        @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Description</label>                       
                        <textarea class="form-control" name="description"  id="description"  rows="4">{{old('description')}}</textarea>
                        @if($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Image</label>                       
                        <input type="file" class="form-control" value= "{{old('image')}}" id="image" name="image">
                        @if($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image')}}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>