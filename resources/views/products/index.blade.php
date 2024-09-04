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
    <div class="container">
        <div class="text-right">
            <a href="{{ route('products.create') }}" class="btn btn-dark mt-3 mb-3">New Product</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sno.</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td><img src="products/{{ $product->image }}" class="rounded-circle" style="width: 50px; height: 50px"></td>
                    <td>
                        <a href="products/{{ $product->id }}/edit" class="btn btn-dark btn-sm">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</body>

</html>