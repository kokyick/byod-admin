@extends('layouts.master')

@section('content')

<!--==============================content=================================-->
<div id="content">
    <!--==============================row8=================================-->
    <div class="row_8">
        <div class="container">
                    <div class="col-lg-8 col-md-8 col-sm-8 address">
                        <h2 class="pad_bot1">Login</h2>						
						<form action="{{ route('dologin')}}" id="loginform" name="loginform" class="reservation-form" method="POST">
							{{ csrf_field() }}
                          <div class="success">Reservation form submitted! <strong>We will be in touch soon.</strong> </div>
                          <fieldset>
                            <div class="coll-1">
							  <div class="txt-form">Username<span>:</span></div>
                              <label class="email">
                                <input type="text" id="username" name="username" placeholder="Username:"><br>
                                <span class="error">*This is not a valid username.</span> <span class="empty">*This field is required.</span> </label>
                            </div>
                            <div class="coll-2">
                              <div class="txt-form">Password:</div>
                              <label class="password">
                                <input type="password" id="pw" name="pw" placeholder="Password:"><br>
                                <span class="error">*This is not a valid password.</span> <span class="empty">*This field is required.</span> </label>
                            </div>
                            <div class="clear"></div>
                          </fieldset>
                          <div class="buttons-wrapper clearfix">
							<a href="#" onclick="loginform.submit();" class="btn-link btn-link2" data-type="submit">login<span></span></a>
							<a href="#" class="btn-link btn-link2" data-type="reset">clear<span></span></a>
						  </div>
                        </form>
                    </div>
                 </div> 
        </div>
    </div>
</div>
@endsection