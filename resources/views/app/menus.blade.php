@extends('layouts.master')

@section('content')

<script type="text/javascript" src="{{ asset('js/template/jquery.isotope.min.js') }}"></script>	
<script>
    
    $(window).load(function() {  
    var $container = $('#container');
    //Run to initialise column sizes
    updateSize();

    //Load masonry when images all loaded
    $container.imagesLoaded( function(){

        $container.isotope({
            // options
            itemSelector : '.element',	
            layoutMode : 'masonry',
            transformsEnabled: true,
            columnWidth: function( containerWidth ) {
                containerWidth = $browserWidth;
                return Math.floor(containerWidth / $cols);
              }
        });
    });
    
	    // update columnWidth on window resize
    $(window).smartresize(function(){  
        updateSize();
        $container.isotope( 'reLayout' );
    });
	
    //Set item size
    function updateSize() {
        $browserWidth = $container.width();
        $cols = 4;

        if ($browserWidth >= 1170) {
            $cols = 4;
        }
        else if ($browserWidth >= 800 && $browserWidth < 1170) {
            $cols = 3;
        }
        else if ($browserWidth >= 480 && $browserWidth < 800) {
            $cols = 2;
        }
        else if ($browserWidth >= 320 && $browserWidth < 480) {
            $cols = 1;
        }
        else if ($browserWidth < 401) {
            $cols = 1;
        }
        //console.log("Browser width is:" + $browserWidth);
        //console.log("Cols is:" + $cols);

        // $gutterTotal = $cols * 20;
		$browserWidth = $browserWidth; // - $gutterTotal;
        $itemWidth = $browserWidth / $cols;
        $itemWidth = Math.floor($itemWidth);

        $(".element").each(function(index){
            $(this).css({"width":$itemWidth+"px"});             
        });
			

    
	  var $optionSets = $('#options .option-set'),
	      $optionLinks = $optionSets.find('a');

	  $optionLinks.click(function(){
	    var $this = $(this);
	    // don't proceed if already selected
	    if ( $this.hasClass('selected') ) {
	      return false;
	    }
	    var $optionSet = $this.parents('.option-set');
	    $optionSet.find('.selected').removeClass('selected');
	    $this.addClass('selected');

	    // make option object dynamically, i.e. { filter: '.my-filter-class' }
	    var options = {},
	        key = $optionSet.attr('data-option-key'),
	        value = $this.attr('data-option-value');
	    // parse 'false' as false boolean
	    value = value === 'false' ? false : value;
	    options[ key ] = value;
	    if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
	      // changes in layout modes need extra logic
	      changeLayoutMode( $this, options )
	    } else {
	      // otherwise, apply new options
	      $container.isotope( options );
	    }
	    
	    return false;
	  });		

    };

        // Initialize the gallery
        $('.thumb').touchTouch();
    
    });
    
  </script>
<!--==============================content=================================-->
<div id="content">
    <!--==============================row6=================================-->
    <div class="row_6">
        <div class="container">
            <h2 class="pad_bot3"><i class="fa fa-cutlery" aria-hidden="true"></i> My Menu  </h2>
			
            <div class="row">
        		<div class="col-lg-12 col-md-12 col-sm-12">
                  <div id="options" class="clearfix">
                      <ul id="filters" class="pagination option-set clearfix" data-option-key="filter">
                        <li><a href="#filter" data-option-value="*" class="selected">All</a></li>
						@foreach ($FoodTypeList as $FoodType)
							<li><a href="#filter" data-option-value=".{{ $FoodType['type_id'] }}">{{ $FoodType['name'] }}</a></li>
						@endforeach
                      </ul>
                  </div><!-- #options -->
                  <div class="containerExtra">
                  <div id="container" class="clearfix">
					<div class="element transition amyBtn" data-category="transition">
						<div class="card">
							<div class="card-content">
                    			<a href="#" class="thumb"><figure class="img-polaroid"><img class="img-thumb" src="{{ asset('img/add.png') }}" alt=""></figure></a>
								<span class="description">Add new dishes</span>
								@for ($i = 0; $i <= 5; $i++)
									<span>+</span>
								@endfor
							</div>
						</div>
					</div>
					@foreach ($MenuList as $Menu)
						<div class="element transition {{ $Menu['food_type'] }} myBtn"  id="{{ route('singlemenus', $Menu['merchant_product_id']) }}" data-category="transition">
							<div class="card">
								<div class="card-content">
                    				<a href="#" class="thumb"><figure class="img-polaroid"><img class="img-thumb" src="{{ $Menu['product_image'] }}" alt=""></figure></a>
									<span class="description">{{ $Menu['name'] }}</span>
									@for ($i = 0; $i <= round($Menu['avg_ratings']); $i++)
										<span>☆</span>
									@endfor
								</div>
							</div>
						</div>
					@endforeach
					
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
    background-color: #1565C0;
    color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
	border-radius: 10px;
    padding: 2px 16px;
    background-color: #1565C0;
    color: white;
}
.center{
	width: 150px;
	margin: 40px auto;
}

/* Add Modal (background) */
.amodal {
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

/* Add Menu Content */
.amodal-content {
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
.aclose {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.aclose:hover,
.aclose:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.amodal-header {
    padding: 2px 16px;
	border-radius: 10px 10px 0px 0px;
    background-color: #1565C0;
    color: white;
}

.amodal-body {padding: 2px 16px;}

.amodal-footer {
	border-radius: 10px;
    padding: 2px 16px;
    background-color: #1565C0;
    color: white;
}

</style>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
	  <div class="modal-tit">
      
	  </div>
    </div>
    <div class="modal-body">
        <div class="row privacy_page">
            <div class="col-lg-4 col-md-4 col-sm-4">
				<a href="#" class="thumb"><figure class="img-polaroid"><img class="img-thumb" id="modal_image" src="{{ asset('img/food_img.jpg') }}" alt=""></figure></a>
			</div>   
			<div class="col-lg-8 col-md-8 col-sm-8" style="text-align:center;">
				<figure><img src="{{ asset('img/smalllogo1.png') }}" alt=""></figure>
				<hr/>
				<div class="modal-info">
					<form action="{{ route('domenuedit')}}" method="POST">
						{{ csrf_field() }}
							<div class="input-group" style="width:100%;">
								<input style="display: none;" id="itemid" type="text" name="itemid" class="form-control input-number">

								<h3>Name</h3>
								<input id="itemname" type="text" name="itemname" class="form-control input-number">
								<hr/>
								<h3>Price</h3>
								$<input id="itemprice" type="text" name="itemprice" class="form-control input-number">
								<hr/>
								<h3>Image</h3>
								<input id="itemproduct_image" type="text" name="itemproduct_image" class="form-control input-number">
								<input style="display: none;" id="itemmerchant_id" type="text" name="itemmerchant_id" class="form-control input-number">
								<input style="display: none;" id="food_type" type="text" name="food_type" class="form-control input-number">
								<input style="display: none;" id="avg_ratings" type="text" name="avg_ratings" class="form-control input-number">
								<hr/>
								<p></p>
								<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
								<p></p><a><i>Delete this item</i></a>
							</div>
					</form>
				</div>
			</div> 
        </div> 
    </div>
    <div class="modal-footer">
    </div>
  </div>

</div>

<!-- Add Modal -->
<div id="amyModal" class="amodal">

  <!-- Modal content -->
  <div class="amodal-content">
    <div class="amodal-header">
      <span class="aclose">&times;</span>
	  <div class="amodal-tit">
		<h2 style="color: #FFFFFF;">Add new item</h2>
	  </div>
    </div>
    <div class="amodal-body">
        <div class="row privacy_page">
            <div class="col-lg-4 col-md-4 col-sm-4">
				<a href="#" class="thumb"><figure class="img-polaroid"><img class="img-thumb" id="modal_image" src="{{ asset('img/emp-img.jpg') }}" alt=""></figure></a>
			</div>   
			<div class="col-lg-8 col-md-8 col-sm-8" style="text-align:center;">
				<figure><img src="{{ asset('img/smalllogo1.png') }}" alt=""></figure>
				<hr/>
				<div class="amodal-info">
					<form action="{{ route('domenuadd')}}" method="POST">
						{{ csrf_field() }}
							<div class="input-group" style="width:100%;">

								<h3>Name</h3>
								<input id="aitemname" type="text" name="aitemname" class="form-control input-number">
								<hr/>
								<h3>Price</h3>
								$<input id="aitemprice" type="text" name="aitemprice" class="form-control input-number">
								<hr/>
								<h3>Image</h3>
								<input id="aitemproduct_image" type="text" name="aitemproduct_image" class="form-control input-number">
								<hr/>
								<h3>Food Type</h3>
								<select id="aitemfood_type" name="aitemfood_type"  class="form-control">
									@foreach ($FoodTypeList as $FoodType)
										<option value="{{ $FoodType['type_id'] }}">{{ $FoodType['name'] }}</option>
									@endforeach
								</select>
								<input style="display: none;" id="itemmerchant_id" type="text" name="itemmerchant_id" class="form-control input-number">
								<input style="display: none;" id="outlet_id" type="text" name="outlet_id" class="form-control input-number">
								<hr/>
								<p></p>
								<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Add</button>
							</div>
					</form>
				</div>
			</div> 
        </div> 
    </div>
    <div class="amodal-footer">
    </div>
  </div>

</div>

<script>

// Get the modal
var modal = document.getElementById('myModal');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
$('.myBtn').click(function(){
	var food = $(this).attr('id');
	alert($(this).attr('id'));
	$.get(food,function(data){
		var header="<h3>" + data.name + "</h3>";
		var body="$ "+data.price+"<br/> ";
		for (i = 0; i < Math.round(data.avg_ratings); i++) { 
			body += "<span>☆</span>";
		}
		var title = "<h2 style='color: #FFFFFF;'>"+data.name+"</h2>"
		//$(".modal-info").html(body);
		//$(".modal-head").html(header);
		$(".modal-tit").html(title);
		$("#modal_image").attr("src",data.product_image);
		$('#itemid').attr('value', data.merchant_product_id);
		$('#itemname').attr('value', data.name);
		$('#itemprice').attr('value', data.price);
		$('#itemproduct_image').attr('value', data.product_image);
		$('#itemmerchant_id').attr('value', data.merchant_id);
		$('#food_type').attr('value', data.food_type);
		$('#avg_ratings').attr('value', data.avg_ratings);
	});
	

	modal.style.display = "block";
});

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

<script>
//Add modal
// Get the modal
var amodal = document.getElementById('amyModal');

// Get the <span> element that closes the modal
var aspan = document.getElementsByClassName("aclose")[0];

// When the user clicks the button, open the modal 
$('.amyBtn').click(function(){
	amodal.style.display = "block";
});

// When the user clicks on <span> (x), close the modal
aspan.onclick = function() {
    amodal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == amodal) {
        amodal.style.display = "none";
    }
}


</script>

@endsection