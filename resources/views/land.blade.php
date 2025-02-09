<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">ITI website</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route("students.index")}}">Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">landing</a>
                </li>

            </ul>

        </div>
    </div>
</nav>




<div class="container">
    <h1 style="color: purple"> All students </h1>
    <table class="table table-striped table-hover">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Show</th>
        </tr>
        @foreach($students as $student)
            <tr>
                <td> {{$student['id'] }}</td>
                <td> {{$student["name"]}}</td>
                <td>{{$student["email"]}}</td>
                <td><a href="{{route("students.show", $student['id'])}}" class="btn btn-info"> Show</a></td>
            </tr>

        @endforeach

    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
