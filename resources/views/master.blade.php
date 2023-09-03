<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <title> {{$title}} </title>
    </head>
    <body class="bg-dark">
        <nav class="navbar navbar-expand-lg bg-black">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="#">NotesApp</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="text-light nav-link {{ request()->routeIs('/') ? 'active' : '' }}" aria-current="page" href="/">ToDo</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-light nav-link {{ request()->routeIs('/addNote') ? 'active' : '' }}" href="/addnote">Add Note</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-light nav-link {{ request()->routeIs('/addNote') ? 'active' : '' }}" href="/showDoneNotes">Done Notes</a>
                        </li>
                    </ul>
                </div>
            </div>
            </nav>
            <div class="container">
              <h1 class=" text-light mt-3">{{$title}}</h1>

              @yield('content')

            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
</html>