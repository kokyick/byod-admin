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
            <h2 class="pad_bot3"><i class="fa fa-cutlery" aria-hidden="true"></i> My Restaurants  </h2>
			
            <div class="row">
        		<div class="col-lg-12 col-md-12 col-sm-12">
                  <div id="options" class="clearfix">
                      <ul id="filters" class="pagination option-set clearfix" data-option-key="filter">
                        <li><a href="#filter" data-option-value="*" class="selected">All</a></li>
						@foreach ($MerchantList as $Merchant)
							<li><a href="#filter" data-option-value=".{{ $Merchant['merchant_id'] }}">{{ $Merchant['biz_name'] }}</a></li>
						@endforeach
                      </ul>
                  </div><!-- #options -->
                  <div class="containerExtra">
                  <div id="container" class="clearfix">
					@foreach ($RestaurantList as $Restaurant)
						<div class="element transition {{ $Restaurant['merchant_id'] }}" data-category="transition">
							<div class="card">
								<div class="card-content">
                    				<a href="{{ route('menus', $Restaurant['outlet_id']) }}" class="thumb"><figure class="img-polaroid"><img class="img-thumb" src="{{ $Restaurant['featured_photo'] }}" alt=""></figure></a>
									<span class="description">{{ $Restaurant['name'] }}</span>
									@for ($i = 0; $i <= round($Restaurant['avg_ratings']); $i++)
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
@endsection