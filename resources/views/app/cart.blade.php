@extends('layouts.master')

@section('content')

<!--==============================content=================================-->
<div id="content">
    <!--==============================row7=================================-->
    <div class="row_7">
        <div class="container">
                <div class="row">
            		<div class="col-lg-8 col-md-8 col-sm-8">
                        <h2 class="pad_bot2">Transaction History</h2>
                        <div class="row links">
                		  <div class="col-lg-6 col-md-6 col-sm-6" style="width:100%;">
							<h3>Under Maintenance</h3>
							@if(Session::get('cart'))
								@foreach (Session::get('cart') as $food)
									<div class="card myBtn">
										<div class="card-content">
											<img src="{{ $food['itemproduct_image'] }}" alt="{{ $food['itemname'] }}" class="img-thumb img-thumbnail">
											<h3>{{ $food['itemname'] }}</h3>
											<p style="margin-bottom: 0px; color: #ef5350;">${{ $food['itemprice'] }} x{{ $food['quantity'] }} </p>
										</div>
									</div>
								@endforeach
							@endif
							
                          </div>
                        </div>
    	           </div>
            		<div class="col-lg-4 col-md-4 col-sm-4">
						<div class="card" style="width: 100%;">
							<div class="card-content">
								<figure><img src="{{ asset('img/smalllogo1.png') }}" alt=""></figure>
								<hr/>
								<h2 style="padding:0;">Under Maintenance</h2>
								<hr/>
								@if(Session::get('cart'))
								<ul class="list2">
									@foreach (Session::get('cart') as $food)
										<li><a href="#filter" data-option-value=".{{ $food }}">{{ $food['itemname'] }} x{{ $food['quantity'] }}</a></li>
									@endforeach
									<hr/>
								</ul>
								@endif
								<h3>
									$
									@if(Session::has('subtotal'))
										{{Session::get('subtotal')}}
									@else
										0
									@endif
								</h3>
								<hr/>
							</div>
						</div>
    	           </div>
                </div>
        </div>
    </div>
</div>

<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
	border-radius: 10px;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
	border-radius: 10px 10px 0px 0px;
    background-color: #EF5350;
    color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
	border-radius: 10px;
    padding: 2px 16px;
    background-color: #EF5350;
    color: white;
}
.center{
	width: 150px;
	margin: 40px auto;
}
</style>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2 style="color: #FFFFFF;">Fish</h2>
    </div>
    <div class="modal-body">
        <div class="row privacy_page">
            <div class="col-lg-4 col-md-4 col-sm-4">
				<a href="#" class="thumb"><figure class="img-polaroid"><img src="img/food_img.jpg" alt=""></figure></a>
			</div>   
			<div class="col-lg-8 col-md-8 col-sm-8" style="text-align:center;">
				<figure><img src="img/smalllogo1.png" alt=""></figure>
				<hr/>
				<h3>Fish</h3>
				<hr/>
				<p>This is a fish.</p>
				 <div class="center">
				    
					<p>
					  </p><div class="input-group">
						  <span class="input-group-btn">
							  <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[2]">
								<span class="glyphicon glyphicon-minus"></span>
							  </button>
						  </span>
						  <input type="text" name="quant[2]" class="form-control input-number" value="1" min="1" max="100">
						  <span class="input-group-btn">
							  <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
								  <span class="glyphicon glyphicon-plus"></span>
							  </button>
						  </span>
					  </div>
					<p></p>
					<h2 style="padding:0;"><i class="fa fa-trash" aria-hidden="true"></i></h2>
					</div>
			</div> 
        </div> 
    </div>
    <div class="modal-footer">
    </div>
  </div>

</div>

<script>
//number
//plugin bootstrap minus and plus
//http://jsfiddle.net/laelitenetwork/puJ6G/
$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
//end number

// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
@endsection