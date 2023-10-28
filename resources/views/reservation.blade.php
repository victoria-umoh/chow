    <!-- ***** Reservation Us Area Starts ***** -->
<section class="section" id="reservation">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>Contact Us</h6>
                            <h2>Here You Can Make A Reservation Or Just walkin to our cafe</h2>
                        </div>
                        <p>Donec pretium est orci, non vulputate arcu hendrerit a. Fusce a eleifend riqsie, namei sollicitudin urna diam, sed commodo purus porta ut.</p>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="phone">
                                    <i class="fa fa-phone"></i>
                                    <h4>Phone Numbers</h4>
                                    <span><a href="#">080-090-0990</a><br><a href="#">080-090-0880</a></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="message">
                                    <i class="fa fa-envelope"></i>
                                    <h4>Emails</h4>
                                    <span><a href="#">hello@company.com</a><br><a href="#">info@company.com</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                    
                    </div>
                    @endif
                    <div class="contact-form">
                        <form id="contact" action="{{ route('reservation') }}" method="post">
                            @csrf
                          <div class="row">
                            <div class="col-lg-12">
                                <h4>Table Reservation</h4>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                              <fieldset>
                                <input name="name" type="text" id="name" placeholder="Your Name*" value="{{old('name')}}" required />
                              </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                              <fieldset>
                              <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address" value="{{old('email')}}" required />
                            </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                              <fieldset>
                                <input name="phone" type="text" id="phone" placeholder="Phone Number*" value="{{old('phone')}}" required />
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <input type="number" name="guest" placeholder="Number Of Guests" value="{{old('guest')}}" required />
                            </div>
                            <div class="col-lg-6">
                                <div id="filterDate2">    
                                  <div class="input-group date" data-date-format="dd/mm/yyyy">
                                    <input  name="date" id="date" type="text" class="form-control" placeholder="dd/mm/yyyy" value="{{old('date')}}" required />
                                    <div class="input-group-addon" >
                                      <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                  </div>
                                </div>   
                            </div>
                            
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input type="text" name="time" id="time" list="timeOptions" placeholder="--:--" value="{{old('time')}}" required />
                                <datalist id="timeOptions">
                                    <option value="08:00 AM">
                                    <option value="09:00 AM">
                                    <option value="10:00 AM">
                                    <option value="11:00 AM">
                                    <option value="12:00 PM">
                                    <option value="01:00 PM">
                                    <option value="02:00 PM">
                                    <option value="03:00 PM">
                                    <option value="04:00 PM">
                                    <option value="05:00 PM">
                                </datalist>


                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="message" rows="6" id="message" placeholder="Message" value="{{ old('message') }}" required></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" class="main-button-icon">Make A Reservation</button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Reservation Area Ends ***** -->