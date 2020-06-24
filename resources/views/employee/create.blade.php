@extends('backend.master')
@section('main_section_row')

    <div class="container">
        <form class=" form-box" action="{{url('employees/store')}}" method="post" enctype="multipart/form-data">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h3 class="form-box success">Add  Employee</h3><br>

    <div class="col-md-7">
        @include('backend.partial.session_message')
    </div>
            @csrf
            <div class="form-group col-md-5">
                <label for="exampleFormControlInput1">Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="your name like 'Ringku Islam'" name="name">
                {{$errors->first('name')}}
            </div>

            <div class="form-group col-md-5">
                <label for="exampleFormControlInput1">Email</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com">
                {{$errors->first('email')}}
            </div>

            <div class="form-group col-md-5">
                <label for="exampleFormControlInput1">Phone</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="phone" placeholder="01000000000">
                {{$errors->first('phone')}}
            </div>
            <div class="form-group col-md-5">
                <label for="exampleFormControlInput1">Designation</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="designation" placeholder="Software Engineer">
                {{$errors->first('designation')}}
            </div>
            <div class="form-group col-md-5">
                <label for="exampleFormControlInput1">Address</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="address" placeholder="Shyamoli/Dhaka">
                {{$errors->first('address')}}
            </div>

            <div class="form-group col-md-5">
                <label for="exampleFormControlInput1">Password</label>
                <input type="password" class="form-control" id="exampleFormControlInput1" name="password" placeholder="Password">
                {{$errors->first('password')}}
            </div>
            <div class="form-group col-md-5">
                <label for="exampleFormControlSelect1">Role</label>
                <select name="role" class="form-control" id="exampleFormControlSelect1">
                    <option value="" disabled>Select Employee Role</option>
                    <option value="2">HR</option>
                    <option value="3">Employee</option>
                </select>
                {{$errors->first('role')}}
            </div>

            <div class="form-group col-md-5">
                <label for="exampleFormControlInput1">Upload an Image</label>
                <input type="file" class="btn-file" id="exampleFormControlInput1" name="image">
                {{$errors->first('image')}}
            </div>
            <br>


            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
            </div>


        </form>

    </div>

    @endsection()
