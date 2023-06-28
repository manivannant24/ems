 @extends('layouts.app')
 @section('content')
     <link rel="stylesheet" type="text/css"
         href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">

     <style>
         .edit {
             text-decoration: none;
             color: black;
         }
     </style>

     <div class="card">
         <h3 class="mt-3 px-3">Employees Table</h3>
         <hr>
         <div class="card-body">
             <div class="table-responsive">
                 <table id="table_id">
                     <thead>
                         <tr>
                             <th>Id</th>
                             <th>Name</th>
                             <th>Email</th>
                             <th>Phone</th>
                             <th>Edit</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($dbd as $dd)
                             <tr>
                                 <td>{{ $dd->id }}</td>
                                 <td>{{ $dd->name }}</td>
                                 <td>{{ $dd->email }}</td>
                                 <td>{{ $dd->phone }}</td>
                                 <td>
                                     @if ($dd->id == Auth::user()->id)
                                 </td>
                             @else<a href="userprofile/{{ $dd->id }}">Edit</a></td>
                         @endif
                         </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
     <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
     <script type="text/javascript" charset="utf8"
         src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
     <script>
         $(function() {
             $("#table_id").dataTable();
         });
     </script>
 @endsection
