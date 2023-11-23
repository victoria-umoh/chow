<!DOCTYPE html>
<html lang="en">

    <head>
        <base href="/public" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

        <title>Chow - Restaurant and Cafe</title>
        <!--
            
        TemplateMo 558 Klassy Cafe

        https://templatemo.com/tm-558-klassy-cafe

        -->
        <!-- Additional CSS Files -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

        <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

        <link rel="stylesheet" href="assets/css/owl-carousel.css">

        <link rel="stylesheet" href="assets/css/lightbox.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li> 
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li>
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li>

                            <li class="scroll-to-section">
                                <!-- if user is logged in, show them cart -->
                                @auth 
                                    <a href="#cart"> Cart[{{$count}}]</a>
                                @endauth 

                                <!-- else if user is not logged in show them Cart[0] -->
                                @guest
                                  <a href="#cart"> Cart[0] </a> 
                                @endguest
                            </li> 

                            <li>
                                @if (Route::has('login'))
                                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                    @auth
                                        <li>
                                            <x-app-layout>
        
                                            </x-app-layout>
                                        </li>
                                    @else
                                    <li><a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a></li>

                                        @if (Route::has('register'))
                                        <li><a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a></li>
                                        @endif
                                    @endauth
                                </div>
                                @endif
                            </li>
                            <li>
                                @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{Session::get('success')}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif
                            </li>
                        </ul>        
                        <!-- <a class='menu-trigger'>
                            <span>Menu</span>
                        </a> -->
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="" style="margin: auto;">
                    <table class="table bg-light table-border">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Food Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                            <!-- <th scope="col"></th> -->
                            </tr>
                        </thead>

                        <form action="{{ route('orderconfirm') }}" method="post">
                            @csrf
                                <tbody>
                                    <?php $sn = 1; ?>
                                    @foreach($data as $data)
                                    <tr>
                                        <td>{{ $sn++ }}</td>
                                        <td>
                                            <input type="hidden" name="foodname[]" value="{{$data->title}}">
                                            {{$data->title}}
                                        </td>
                                        <td>
                                            <input type="hidden" name="price[]" value="{{$data->price}}">
                                            {{$data->price}}
                                        </td>
                                        <td>
                                            <input type="hidden" name="quantity[]" value="{{$data->quantity}}">
                                            {{$data->quantity}}
                                        </td>
                                        <td>
                                        <input type="hidden" name="image[]" value="{{$data->image}}">
                                            <img src="/uploads/{{$data->image}}" width="50" class="img-fluid" />
                                        </td>
                                        
                                    </tr>
                                    @endforeach

                                    @foreach($data2 as $data2)
                                        <td style="position: relative; top:-450px; right:-440px;" class="d-flex important!"> 
                                            <a href="{{ route('remove', $data2->id) }}" class='btn btn-sm btn-success m-1' onclick="return confirm('Are you sure you want to remove from cart?')"><i class='fa fa-remove'></i>Remove</a>
                                            <!-- <a href="#"></a> -->
                                        </td>
                                    @endforeach
                                </tbody>
                            </table>

                            <div id="" >
                                <button type="button" class="btn btn-primary text-black" id="order">Order Now</button>
                            </div>

                            <div id="appear" style="display: none;" class="mt-3">                           
                                <div>
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" value="" class="form-control" placeholder="Enter your name" required />
                                </div>

                                <div >
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" name="phone" value="" class="form-control" placeholder="Enter your phone number" required />
                                </div>

                                <div >
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" name="address" value="" class="form-control" placeholder="Enter your address" required />
                                </div>

                                <div class="mt-3">
                                    <button class="btn btn-success me-5" id="">Confirm Order</button>
                                    <button type="button" class="btn btn-danger text-black" id="cancel">Cancel</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>


    <!-- ***** Footer Start ***** -->
        @include("footer")
    <!-- ***** Footer ends here ***** -->

    <!-- ***** Script start ***** -->
        @include("script")
        <script type="text/javascript">
            $(document).ready(function(){
                $("#order").click(function(){
                    $("#appear").show();
                });

                $("#cancel").click(function(){
                    $("#appear").hide();
                });
            });
        </script>
        
    <!-- ***** Script ends here ***** -->