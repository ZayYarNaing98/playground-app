<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Create</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                Edit Product
            </div>
            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @csrf
                <div class="card-body">
                    <input type="text" name="name" class="form-control card-body" value="{{ $product->name }}" />
                </div>
                <div class="card-body">
                    <input type="text" name="description" class="form-control card-body"
                        value="{{ $product->description }}" />
                </div>
                <div class="card-body">
                    <input type="text" name="price" class="form-control card-body" value="{{ $product->price }}" />
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Update</button>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>
