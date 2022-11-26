<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Page</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-12">
                <h2 style="margin-left: 37%">This is dashboard Page.</h2>
                <h3 style="margin-left: 38%">Welcome</h3>
            </div>


            @auth
                <a href="{{url('login')}}" class="p-2 nav-link" style="margin-left: 46.5%; font-size: 24px; margin-top:-50px;">{{auth()->user()->name}}</a>
            @endauth

            @guest
            <div style="margin-left:90%; float:right;">
                <a href="{{url('login')}}" class="btn btn-primary">Login</a>
                <a href="{{url('register')}}" class="btn btn-secondary">Register</a>
            </div>
            @endguest

            <form action="{{url('logout')}}" method="get">
                <button type="submit" class="btn btn-danger" style="margin-top: 20px; margin-left:44%">Logout</button>
            </form>

            <div style="margin-top: 60px;">
                <div class="row">
                    <div class="col-md-12">
                        <h2 style="margin-left:40%;">KIST College</h2>
                    </div>

                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                    @endif

                    <div style="margin-left: 80%; margin-top: 40px;">
                        <a href="{{url('add-dept')}}" class="btn btn-primary">Add Department</a>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Coordintor Name</th>
                                <th>Department Name</th>
                                <th>Number of Students</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($data as $kist)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$kist->name}}</td>
                                <td>{{$kist->deptname}}</td>
                                <td>{{$kist->number}}</td>
                                <td>{{$kist->phone}}</td>
                                <td><a href="{{url('edit-dept/'.$kist->id)}}" class="btn btn-primary">Edit</a> <a href="{{url('delete-dept/'.$kist->id)}}" class="btn btn-danger">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>