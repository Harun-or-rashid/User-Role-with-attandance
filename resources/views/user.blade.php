<!DOCTYPE html>
<html>
<head>
    <title>Datatables AJAX pagination with Search and Sort - Laravel</title>

    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}">

    <!-- Script -->
{{--    <script src="{{asset('jquery-3.4.1.min.js')}}" type="text/javascript"></script>--}}
{{--    <script src="{{asset('DataTables/datatables.min.js')}}" type="text/javascript"></script>--}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/af-2.3.5/b-1.6.3/b-colvis-1.6.3/sc-2.0.2/sp-1.1.1/sl-1.3.1/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/af-2.3.5/b-1.6.3/b-colvis-1.6.3/sc-2.0.2/sp-1.1.1/sl-1.3.1/datatables.min.js"></script>



    <!-- Datatables CSS CDN -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"> -->

    <!-- jQuery CDN -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

    <!-- Datatables JS CDN -->
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> -->

</head>
<body>

<table id='empTable' width='100%' border="1" style='border-collapse: collapse;'>
    <thead>
    <tr>
        <td>S.no</td>
        <td>Name</td>
        <td>Email</td>
    </tr>
    </thead>
</table>

<!-- Script -->
<script type="text/javascript">
    $(document).ready(function(){

        // DataTable
        $('#empTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('user.getUser')}}",
            columns: [
                { data: 'id' },
                { data: 'name' },
                { data: 'email' },
            ],
            "pageLength": 2
        });

    });
</script>
</body>
</html>
