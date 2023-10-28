<x-app-layout>
    
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- USED TO FORCE CSS TO DISPLAY PROPERLY -->
    <base href="/public">

    <!-- Required meta tags -->
    @include("admin/admincss")
  </head>
  <body>
    <div class="container-scroller">
        <!-- required sidebar -->
        @include("admin/sidebar")

        <div style="position: relative; top:60px; right:-200px;">
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{Session::get('success')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="card-header py-3">
                <h1 class="mb-0">Edit Chef</h1>
            </div>
            <form action="{{ route('admin.updatechef', $data2->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Specify the PUT method -->
                <div>
                    <label for="title" class="form-label">Chef Name</label>
                    <input class="form-control bg-light text-black" type="text" name="name" value="{{$data2->name}}" />
                </div>

                <div>
                    <label for="price" class="form-label">Price</label>
                    <input class="form-control bg-light text-black" type="text" name="specialty" value="{{$data2->specialty}}" />
                </div>

                <div>
                    <label for="old_image" class="form-label">Old Image</label>
                    <img src="/uploads/{{$data2->image}}" width="100" />
                </div>

                <div>
                    <label for="new_image" class="form-label">New Image</label>
                    <input class="form-control bg-light text-black" type="file" name="image" />
                </div>

                <div>
                    <input class="btn btn-primary" type="submit" name="submit" value="Save" />
                </div>
            </form>
        </div>

       
        </div>




    <!-- plugins:js -->
    @include("admin/adminscript")
    <!-- End custom js for this page -->
  </body>
</html>

</x-app-layout>