@extends('backend.master')
@section('main_section_row')

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">

        @include('backend.partial.session_message')

        <table id=" table_id " class="table table-striped display table-bordered table-hover">
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
<script !src="">
    $(document).ready( function () {
        var dataTable = $('#table_id').DataTable(
            {
                "paging": true, // Allow data to be paged
                "lengthChange": false,
                "searching": true, // Search box and search function will be actived
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "processing": true,  // Show processing
                "serverSide": true,  // Server side processing
                "deferLoading": 0, // In this case we want the table load on request so initial automatical load is not desired
                "pageLength": 5,    // 5 rows per page
                "ajax":{
                    url :  '',
                    type : "POST",
                    dataType: 'json',
                    error: function(data){
                        console.log(data);
                    }
                },
                // aoColumnDefs allow us to specify which column we want to make
                // sortable or column's alignment
                "aoColumnDefs": [
                    { 'bSortable': false, 'aTargets': [0,1] }    ,
                    { className: "dt-center", "aTargets": [0,1,2,3] },
                ],
                "columns": [
                    null,
                    null,
                    null,
                    { "visible": false }, //The last column will be invisible
                ],

            });
        {{--$('#button').on('click',  function () {--}}
        {{--    var resourceURL = "{{route('user.datatables',['group_id'=>':group_id'])}}";--}}
        {{--    var group_id = 1;--}}
        {{--    group_id = $('#group_id').val(); //Get the value of input text--}}
        {{--    resourceURL = resourceURL.replace(":group_id", group_id); // Build the route--}}

        {{--    /*--}}
        {{--    * Change the URL of dataTable and call ajax to load new data--}}
        {{--    */--}}
        {{--    dataTable.ajax.url(targetUrl).load();--}}
        {{--    dataTable.draw();--}}
        {{--} );--}}
    } );
</script>
