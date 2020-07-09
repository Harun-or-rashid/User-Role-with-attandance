@extends('backend.master')
@section('main_section_row')

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">

        @include('backend.partial.session_message')

        <table id="user-list-table" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Designation</th>
                <th>Address</th>
                <th>Role</th>
{{--                <th>image</th>--}}
                <th>Action</th>

            </tr>
            </thead>

            <tbody>
            <!-- reseller lists -->
            @php($serial=1)
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $serial++ }}</td>
                    <td>{{ $employee->name }}</td>
                    {{--                        <td>{{ $category->name }}</td>--}}
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->designation }}</td>
                    <td>{{ $employee->address }}</td>
                    @if($employee->role==2)
                        <td style="color: #1b7e5a">HR</td>
                    @elseif($employee->role==3)
                        <td style="color: #00a65a">Employee</td>
                    @endif
                    {{--                    <td>{{ $employee->image }}</td>--}}
                    <td>
                        <div class="action-buttons">
                            <a class=" badge badge-info"  title="view" href="{{url('employees/show',$employee->id)}}">
                                <i class="ace-icon  fa fa-edit bigger-130 " >View</i>
                            </a>
                            <a class=" badge badge-warning"  title="Edit" href="{{url('employees/edit',$employee->id)}}">
                                <i class="ace-icon  fa fa-edit bigger-130 " >Edit</i>
                            </a>
{{--                            <a class=" badge badge-danger" href="{{url('employees/delete',$employee->id)}}" onclick="return confirm('Are you sure to delete this?')"--}}
{{--                               title="Delete">--}}
{{--                                <i class="ace-icon fa fa-trash bigger-130 ">Delete</i>--}}
{{--                            </a>--}}
                            <a class="red badge badge-danger"  onclick="return confirm('Are you sure to delete this?') "href="{{url('employees/delete',$employee->id)}}"
                               title="Delete">
                                <i class="ace-icon fa fa-trash bigger-130 ">Delete</i>
                            </a>


                        </div>
                    </td>
                </tr>
            @endforeach


            </tbody>
        </table>


    </div><!-- /.col -->


    @endsection
