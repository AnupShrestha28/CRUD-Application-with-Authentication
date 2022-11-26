<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Department</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Department</h2>
            </div>

            <form action="{{url('update-dept')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$data->id}}">
                <div class="mb-3">
                    <label class="form-label">Coordinator Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Coordinator name" value="{{$data->name}}">
                    @error('name')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Department Name</label>
                    <input type="text" name="deptname" class="form-control" placeholder="Enter Department name" value="{{$data->deptname}}">
                    @error('deptname')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Number of Students</label>
                    <input type="number" name="number" class="form-control" placeholder="Enter a number of students" value="{{$data->number}}">
                    @error('number')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="number" name="phone" class="form-control" placeholder="Enter Phone number" value="{{$data->phone}}">
                    @error('phone')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                @enderror
                </div>

                <br>
                <button type="submit" class="btn btn-primary">Submit</button>

                <a href="{{url('dashboard')}}" class="btn btn-danger">Go Back</a>
            </form>
        </div>
    </div>
</body>
</html>