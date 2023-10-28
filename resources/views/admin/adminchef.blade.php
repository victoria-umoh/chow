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

      <div style="position:relative; top:60px; right:-50px;">
      <div>
        <a href="{{route('admin.addchef')}}" class="btn btn-primary">Add New Chef</a>
        </div>
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{Session::get('success')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <table class="table bg-light table-border">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Chef Name</th>
              <th scope="col">Chef Specialty</th>
              <th scope="col">Chef Image</th>
              <th scope="col">Date Created</th>
              <th scope="col">Action</th>
            </tr>
          </thead>

          <tbody>
            <?php $sn = 1; ?>
            @foreach($data2 as $data2)
              <tr>
                <td scope="row">{{ $sn++ }}</td>
                <td>{{$data2->name}}</td>
                <td>{{$data2->specialty}}</td>
                <td><img src="/uploads/{{$data2->image}}" width="50"/></td>
                <td>{{$data2->created_at}}</td>

                  <td style="display:flex !important;">
                  <!-- DELETE FUNCTION USING A FORM -->
                    <form method="POST" action="{{ route('admin.deletechef', $data2->id) }}">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this chef?')">Delete</button>
                    </form>

                    <!-- <a href="#" class='btn btn-sm btn-danger' onclick="return confirm('Are you sure you want to delete this chef?')"><i class='fa fa-trash'></i>Delete</a> -->
                    &nbsp;&nbsp;

                    <a href='#' class='btn btn-sm btn-info'><i class='fa fa-list'></i>Details</a>
                    &nbsp;&nbsp;
                    
                    <a href="{{ route('admin.editchef', $data2->id) }}" class='btn btn-sm btn-success'><i class='fa fa-pencil'></i> Edit</a>
                  </td>
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
