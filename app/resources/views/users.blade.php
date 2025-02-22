<!DOCTYPE html>
<html>
<head>
    <title>Laravel 11 Yajra Datatables Tutorial - ItSolutionStuff.com</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
       
<div class="container">
<input type="text" id="searchBox" placeholder="Search by name of the candidate" class="form-control" style="width: 200px; margin-bottom: 10px;">

    <div class="card mt-5">
        <h3 class="card-header p-3">Laravel 11 Yajra Datatables Tutorial - ItSolutionStuff.com</h3>
        <div class="card-body">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th width="100px">View</th>
                        <th width="100px">Edit</th>
                        <th width="100px">Delete</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
       
</body>
       
<script type="text/javascript">
  $(function () {
        
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('users.index') }}",
            data: function (d) {
                d.search_name = $('#searchBox').val(); // Send custom search input value
            }
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email',orderable:flase},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'edit', name: 'edit', orderable: false, searchable: false},
            {data: 'delete', name: 'delete', orderable: false, searchable: false},
            
        ]
    });
    $('#searchBox').on('keyup', function () {

        table.draw();

    });
        
  });
 
</script>
</html>
