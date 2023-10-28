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
        <div class="container-fluid mt-3">
         
          <div style="position:relative; top:60px; right:-50px;">
              <form action="{{ route('search') }}" method="get" class="mb-3">
                <input type="text" name="search" class="text-dark" />
                <input type="submit" value="Search" class="btn btn-primary" />
              </form>
            <div>
              <a href="#" class="btn btn-primary">Add New</a>
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
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Foodname</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>

                <tbody>
                  <?php $sn = 1; ?>
                  @foreach($data as $data)
                    <tr>
                      <td scope="row">{{ $sn++ }}</td>
                      <td>{{$data->name}}</td>
                      <td>{{$data->phone}}</td>
                      <td>{{$data->address}}</td>
                      <td>{{$data->foodname}}</td>
                      <td>{{$data->price}}$</td>
                      <td>{{$data->quantity}}</td>
                      <td>{{$data->price * $data->quantity}}$</td>

                        <!-- <td style="display:flex !important;">
                        DELETE FUNCTION USING A FORM 
                          <form method="POST" action="">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                          </form>

                          <a href="#" class='btn btn-sm btn-danger' onclick="return confirm('Are you sure you want to delete order data?')"><i class='fa fa-trash'></i>Delete</a>
                          &nbsp;&nbsp;

                          <a href='#' class='btn btn-sm btn-info'><i class='fa fa-list'></i>Details</a>
                          &nbsp;&nbsp;
                          
                          <a href="#" class='btn btn-sm btn-success'><i class='fa fa-pencil'></i> Edit</a>
                        </td> -->
                    </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
        </div>
    </div>

    
    
    <!-- PLUGINS:JS -->
      @include("admin/adminscript");
    <!-- PLUGINS:JS -->
  </body>
</html>

</x-app-layout>