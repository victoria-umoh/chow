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

        <div style="position: relative; top:60px; right:-200px;">
            @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Add New Food Menu') }}
                </h2>
            </x-slot>
            <div class="card-header py-3">
                <h1 class="mb-0">Add Food Menu</h1>
            </div>
            <form action="{{ route('admin.uploadfood') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="title" class="form-label">Title</label>
                    <input class="form-control bg-light text-black" type="text" name="title" placeholder="write food type" required />
                </div>

                <div>
                    <label for="price" class="form-label">Price</label>
                    <input class="form-control bg-light text-black" type="number" name="price" placeholder="price" required/>
                </div>

                <div>
                    <label for="image" class="form-label">Image</label>
                    <input class="form-control bg-light text-black" type="file" name="image" required/>
                </div>

                <div>
                    <label for="desc" class="form-label">Description</label>
                    <textarea class="form-control bg-white text-black" name="desc" id="desc" cols="10" rows="30" required></textarea>
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