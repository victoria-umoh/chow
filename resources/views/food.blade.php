<section class="section" id="menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6>Our Menu</h6>
                        <h2>Our selection of cakes with quality taste</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item-carousel">
            <div class="col-lg-12">
                <div class="owl-menu-item owl-carousel">

                    @foreach($data as $food)
                    <form action="{{ route('addcart', $food->id) }}" method="post">
                        @csrf
                        <div class="item">
                            <div class='card' style="background-image: url('/uploads/{{$food->image}}')">
                            <!-- <div class='card'>
                                <img src="/uploads/{{$food->image}}" /> -->
                                <div class="price"><h6>{{$food->price}}</h6></div>
                                <div class='info'>
                                <h1 class='title'>{{$food->title}}</h1>
                                <p class='description'>{{$food->description}}</p>
                                <div class="main-text-button">
                                    <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                                </div>
                                </div>
                            </div>

                            <!-- ADD TO CART -->
                            <input type="number" name="quantity" min="1" value="1" style="width: 80px;" />
                            <input type="submit" value="add cart" />
                            <!-- ADD TO CART -->

                        </div>
                    </form>
                    @endforeach

                </div>
            </div>
        </div>
    </section>