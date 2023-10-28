<x-app-layout>
  
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include("admin/admincss")
  </head>
  <body>
    <div class="container-scroller">
        <!-- required sidebar -->
        @include("admin/sidebar")

        <!-- display and delete -->
        <div style="position:relative; top:60px; right:-150px;">
          <div>
            <a href="{{ route('admin.addfood') }}" class="btn btn-primary">Add Menu</a>
            </div>
            @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
              {{Session::get('success')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <table class="table bg-light table-border">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Food Name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Description</th>
                  <th scope="col">Image</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>

              <tbody>
                <?php $sn = 1; ?>
                @foreach($data as $food)
                  <tr>
                    <td scope="row">{{ $sn++ }}</td>
                    <td>{{$food->title}}</td>
                    <td>{{$food->price}}</td>
                    <td>{{$food->description}}</td>
                    <td><img src="/uploads/{{$food->image}}" width="50"/> </td>

                      <td style="display:flex !important;">
                      <!-- DELETE FUNCTION USING A FORM -->
                        <form method="POST" action="{{ route('admin.deletemenu', $food->id) }}">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this menu?')">Delete</button>
                        </form>

                        <!-- DELETE FUNCTION USING A A LINK -->
                        <!-- <a href="{{ route('admin.deletemenu', ['id' => $food->id]) }}" class='btn btn-sm btn-danger' onclick="return confirm('Are you sure you want to delete this user?')"><i class='fa fa-trash'></i>Delete</a> -->
                        &nbsp;&nbsp;

                        <a href='#' class='btn btn-sm btn-info'><i class='fa fa-list'></i>Details</a>
                        &nbsp;&nbsp;
                        
                        <!-- EDIT FUNCTION USING A FORM -->
                        <form method="POST" action="{{ route('admin.editmenu', $food->id) }}">
                          @csrf
                          @method('PUT')
                          <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to edit this menu?')">
                            <i class='fa fa-pencil'></i>Edit
                          </button>
                        </form>
                        <!-- <a href="{{ route('admin.editmenu', ['id' => $food->id]) }}" class='btn btn-sm btn-success'><i class='fa fa-pencil'></i> Edit</a> -->
                      </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>




    <!-- plugins:js -->
    @include("admin/adminscript")
    <!-- End custom js for this page -->
  </body>
</html>

</x-app-layout>