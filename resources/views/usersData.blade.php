@extends('layouts.app')

@section('content')
    <h1>Users Data</h1>
<form method="post" action="{{url('disableUser')}}" >
    {{csrf_field()}}
    <table id="myTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Sr No</th>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>is_active</th>
                
            </tr>
        </thead>
       <tbody>
           @foreach ($users as $user)
               <tr>
               <td><input type="checkbox" name="inactive[]" id="{{$user->id}}" value="{{$user->id}}"/></td>
               <td>{{$loop->index+1}}</td>
               <td>{{$user->id}}</td>
               <td>{{$user->name}}</td>
               <td>{{$user->email}}</td>
               <td>{{$user->is_active ? 'True':'False'}}</td>
               
               </tr>
           @endforeach
       </tbody>
        <tfoot>
            <tr>
                    <th>#</th>
                    <th>Sr No</th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>is_active</th>
                    
            </tr>
        </tfoot>
    </table>
    <div class="formgroup">
            <input type="submit" value="Disable" class="btn btn-danger"/>
    </div>

</form>

    <script>
        $(document).ready( function () {
            
             $('#myTable').DataTable({
                "columns":[
                     {"searchable": false },
                     {"searchable": false },
                     {"searchable": false },
                     {"searchable": false },
                     null,
                     null
                 ],
             });

        } );
    
    </script>
@endsection