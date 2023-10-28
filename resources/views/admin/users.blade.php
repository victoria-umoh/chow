<x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>    
    <!-- REQUIRED META TAGS -->
      @include("admin/admincss")
    <!-- REQUIRED META TAGS -->
  </head>
  <body>
    <div class="container-scroller">

      <!-- REQUIRED SIDEBAR -->
        @include("admin/sidebar")
      <!-- REQUIRED SIDEBAR -->

      <div style="position:relative; top:60px; right:-150px;">
      <div>
        <a href="" class="btn btn-primary">Add New</a>
        </div>
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
          {{Session::get('success')}}
          
        </div>
        @endif
        <table class="table bg-light table-border">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Action</th>
            </tr>
          </thead>

          <tbody>
            <?php $sn = 1; ?>
            @foreach($data as $data)
              <tr>
                <td scope="row">{{ $sn++ }}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>

                @if($data->user_type == "0")
                  <td style="display:flex !important;">
                  <!-- DELETE FUNCTION USING A FORM -->
                    <!-- <form method="POST" action="{{ route('deleteuser', $data->id) }}">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                    </form> -->

                    <a href="{{ route('deleteuser', ['id' => $data->id]) }}" class='btn btn-sm btn-danger' onclick="return confirm('Are you sure you want to delete this user?')"><i class='fa fa-trash'></i>Delete</a>
                    &nbsp;&nbsp;

                    <a href='#' class='btn btn-sm btn-info'><i class='fa fa-list'></i>Details</a>
                    &nbsp;&nbsp;
                    
                    <a href="#" class='btn btn-sm btn-success'><i class='fa fa-pencil'></i> Edit</a>
                  </td>
                @else
                <td><a>Not allowed</a></td>
                @endif
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>

    
    
    <!-- PLUGINS:JS -->
      @include("admin/adminscript");
    <!-- PLUGINS:JS -->
  </body>
</html>

</x-app-layout>