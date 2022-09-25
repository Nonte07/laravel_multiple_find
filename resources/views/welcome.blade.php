<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg " style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <h4> _CrudOporation </h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Link
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Link</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>


    <!-- Button trigger modal -->
    <div class="text-center my-3">
        <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Add Info_
        </button>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="formsubmit" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="email">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Image</label>
                            <input type="file" class="form-control" id="exampleInputPassword1" name="img">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>




    <div class="container text-center my-4">
        <table class="table table-dark table-sm">

            <div class="container" style="max-width: 40%;">
                <div class="input-group mb-3">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon1">
                        <a href="{{ url('/') }}">Reset</a>
                    </button>
                    <form action="filter" method="get">
                        <input type="text" class="form-control" placeholder=""
                            aria-label="Example text with button addon" aria-describedby="button-addon1"
                            name="filterr">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon1">find</button>
                    </form>


                </div>
            </div>

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userdata as $list)
                    <tr>
                        <th scope="row">{{ $list->id }}</th>
                        <td>
                            <img src="{{ asset('storage/app/' . $list->image) }}" alt="" srcset=""
                                class="rounded-5" style="height: 60px;width:69px;">
                        </td>
                        <td>{{ $list->email }}</td>
                        <td>{{ $list->password }}</td>
                        <td>
                            <button type="button" class="btn btn-danger"><a
                                    href="deletedata/{{ $list->id }}">Delete</a></button>
                            <button type="button" class="btn btn-warning"><a
                                    href="editdata/{{ $list->id }}">Edit</a></button>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>

<div class="position-absolute bottom-0 end-0">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-outline-dark">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif
</div>
