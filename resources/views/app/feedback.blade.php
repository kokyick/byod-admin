@extends('layouts.master')

@section('content')

<!--==============================content=================================-->
<div id="content">
    <!--==============================row8=================================-->
    <div class="row_8">
        <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 gmap">
                      <div class="map"><iframe src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Brooklyn,+New+York,+NY,+United+States&amp;aq=0&amp;sll=37.0625,-95.677068&amp;sspn=61.282355,146.513672&amp;ie=UTF8&amp;hq=&amp;hnear=Brooklyn,+Kings,+New+York&amp;ll=40.649974,-73.950005&amp;spn=0.01628,0.025663&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe></div>
                    </div>  
                 </div> 
                 <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 address">
                        <h2>Postal Address</h2>
                        <address>
                            <div class="info">
                                <strong>8901 Marmora Road, Glasgow, D04 89GR.</strong>
                            	<p><span>Telephone:</span> +1 959 603 6035</p>
                            	<p><span>FAX:</span> +1 504 889 9898</p>
                            	<p>E-mail: <a href="mailto:#">mail@demolink.org</a></p>
                            </div>
                        </address>
                        <address class="m_top1">
                            <div class="info">
                                <strong>9867 Mill Road, Cambridge, MG09 99HT </strong>
                            	<p><span>Telephone:</span> +1 959 603 6035</p>
                            	<p><span>FAX:</span> +1 504 889 9898</p>
                            	<p>E-mail: <a href="mailto:#">mail@demolink.org</a></p>
                            </div>
                        </address>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 address">
                        <h2>Contact Form</h2>
                        <form id="contact-form" class="contact-form">
                          <div class="success"> Contact form submitted! <strong>We will be in touch soon.</strong> </div>
                          <fieldset>
                            <div class="coll-1">
                              <div class="txt-form">Name<span>*</span></div>
                              <label class="name">
                                <input type="text" value="Name*:"><br>
                                <span class="error">*This is not a valid name.</span> <span class="empty">*This field is required.</span> </label>
                            </div>
                            <div class="coll-2">
                              <div class="txt-form">Email<span>:</span></div>
                              <label class="email">
                                <input type="email" value="E-mail*:"><br>
                                <span class="error">*This is not a valid email address.</span> <span class="empty">*This field is required.</span> </label>
                            </div>
                            <div class="coll-3">
                              <div class="txt-form">phone:</div>
                              <label class="phone notRequired">
                                <input type="tel" value="Phone:"><br>
                                <span class="error">*This is not a valid phone number.</span> <span class="empty">*This field is required.</span> </label>
                            </div>
                            <div class="clear"></div>
                            <div>
                              <div class="txt-form">Comment<span>*</span></div>
                              <label class="message">
                                <textarea>Message*:</textarea><br>
                                <span class="error">*The message is too short.</span> <span class="empty">*This field is required.</span> </label>
                            </div>
                            <div class="clear"></div>
                          </fieldset>
                          <div class="buttons-wrapper clearfix"><a href="#" class="btn-link btn-link2" data-type="submit">submit<span></span></a><strong>*REQUIRED FIELDS</strong></div>
                        </form>
                    </div>
                 </div> 
        </div>
    </div>
</div>
@endsection