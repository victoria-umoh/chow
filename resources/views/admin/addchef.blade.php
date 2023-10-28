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

        <div style="position: relative; top:60px; right:-100px;">

            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Add New Chef') }}
                </h2>
            </x-slot>
            <div class="card-header py-3">
                <h1 class="mb-0">Add Chef</h1>
                <div>
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{Session::get('success')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
                <form action="{{ route('uploadchef') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <fieldset>
                                <label for="name" class="form-label">Chef Name</label>
                                <input name="name" type="text" id="name" class="form-control text-light" placeholder="Chef Name*" value="{{old('name')}}" required />
                            </fieldset>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <fieldset>
                                <label for="specialty" class="form-label">Chef Specialty</label>
                                <input name="specialty" type="text" id="specialty" class="form-control text-light" placeholder="Chef Specialty" value="{{old('specialty')}}" required />
                            </fieldset>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <fieldset>
                                <label for="image" class="form-label">Chef Image</label>
                                <input name="image" type="file" id="image" class="form-control text-light" required />
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <button type="submit" id="form-submit" class="main-button-icon btn btn-primary">submit</button>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>

       
        </div>




    <!-- plugins:js -->
    @include("admin/adminscript")
    <!-- End custom js for this page -->
  </body>
</html>
</x-app-layout>