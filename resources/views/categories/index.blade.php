<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div>
        <h1 class="mb-4">Categories List</h1>
        {{-- @foreach ($categories as $data)
            <p>{{ $data['id'] }} : {{ $data['name'] }}</p>
        @endforeach --}}
        <a href="{{ route('categories.create') }}" class="btn btn-outline-success mb-4">
           + Create
        </a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="bg-primary text-white" scope="col">ID</th>
                    <th class="bg-primary text-white" scope="col">NAME</th>
                    <th class="bg-primary text-white" scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $data)
                    <tr>
                        <th>{{ $data['id'] }}</th>
                        <th>{{ $data['name'] }}</th>
                        <th>
                            <a href="{{route('categories.edit')}}" class="btn btn-outline-secondary">Edit</a>
                        </th>
                    </tr> @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>
