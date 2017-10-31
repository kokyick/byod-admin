@extends('layouts.master')

@section('content')

<!--==============================content=================================-->
<div id="content">
	<!--index-->
    <script src="{{ asset('js/template/camera.js') }}"></script>
    <script src="{{ asset('js/template/jquery.mobile.customized.min.js') }}"></script>
    
    <script>	
        $(window).load( function(){	
            
        	   jQuery('.camera_wrap').camera();	 
               
        });
    </script>
    <!--==============================slider=================================-->
    <div class="slider">
        <div class="camera_wrap">
          <div data-src="img/picture1.jpg"></div>
           <!--<div data-src="img/picture2.jpg"></div>-->
          <div data-src="img/picture3.jpg"></div>
        </div>
    </div>
    <!--==============================row1=================================-->
    <div class="row_1">
        <div class="container">
            <p class="title1">Someone is hungry!</p>
            <p class="title2">Beciegast nveriti vitaesaert asety kertya aset aplica boserde nerafae kertyuraue styasnemo faserani  iasera khatrsasas ptaiadeser daesraeds. Casrolern atur aut oditaut. onsequuntur magni dolqui ratione voluptatemsequi nesciunt orasario jauystase joasuaserya vytarsa numquam eius modi teincidunt, ut labore et dolore magnam liaseras.</p>
            <a href="#" class="btn btn-default btn-lg btn1">more</a>
        </div>
    </div>
    <!--==============================row2=================================-->
    <div class="row_2">
        <div class="container">
            <div class="row">
                <ul class="list1">
                    <li class="col-lg-4 col-md-4 col-sm-4 listbox1">
                        <div class="box1">
                            <a href="#">
                                <figure><img src="{{ asset('img/page1_img1.jpg') }}" alt=""></figure>
                                <p>Mains</p>
                            </a>
                        </div>
                    </li>
                    <li class="col-lg-4 col-md-4 col-sm-4 listbox2">
                        <div class="box2">
                            <a href="#">
                                <p>Snacks</p>
                                <figure><img src="img/page1_img2.jpg" alt=""></figure>
                            </a>
                        </div>
                    </li>
                    <li class="col-lg-4 col-md-4 col-sm-4 listbox3">
                        <div class="box3">
                            <a href="#">
                                <figure><img src="img/page1_img3.jpg" alt=""></figure>
                                <p>Drinks</p>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--==============================row3=================================-->
    <div class="row_3">
        <div class="container">
            <div class="row">
                <ul class="list3">
                    <li class="col-lg-6 col-md-6 col-sm-6">
                        <div class="box4">
                            <figure><img src="img/page1_img4.jpg" alt=""></figure>
                            <div class="info1 maxheight">
                                <p class="list3title1">Best Restaurant</p>
                                <p class="list3title2">Migytafsas deuauyt asares</p>
                                <p class="list3title3">Kictaesaert asetyertya aset aplicibrdedas.</p>
                                <a href="#" class="btn-link btn-link1">learn more<span></span></a>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-6 col-md-6 col-sm-6">
                        <div class="box4">
                            <figure><img src="img/page1_img5.jpg" alt=""></figure>
                            <div class="info1 maxheight">
                                <p class="list3title1">Top Area</p>
                                <p class="list3title2">Btreasas lisemeyta siqades</p>
                                <p class="list3title3">Kictaesaert asetyertya aset aplicibrdedas.</p>
                                <a href="#" class="btn-link btn-link1">learn more<span></span></a>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-6 col-md-6 col-sm-6">
                        <div class="box4">
                            <figure><img src="img/page1_img6.jpg" alt=""></figure>
                            <div class="info1 maxheight">
                                <p class="list3title1">Top picks</p>
                                <p class="list3title2">Dolore nuyfasa kerytertas</p>
                                <p class="list3title3">Kictaesaert asetyertya aset aplicibrdedas.</p>
                                <a href="#" class="btn-link btn-link1">learn more<span></span></a>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-6 col-md-6 col-sm-6">
                        <div class="box4">
                            <figure><img src="img/page1_img7.jpg" alt=""></figure>
                            <div class="info1 maxheight">
                                <p class="list3title1">Promotions</p>
                                <p class="list3title2">Fertyuasa mietyas lteasas</p>
                                <p class="list3title3">Kictaesaert asetyertya aset aplicibrdedas.</p>
                                <a href="#" class="btn-link btn-link1">learn more<span></span></a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--==============================row4=================================-->
    <div class="row_4">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 chef row4_col">
                    <h2>About Us</h2>
                    <figure><img src="img/page1_img8.jpg" alt=""></figure>
                    <p class="title3">Vivamus eget</p>
                    <p>Vitaesaert asetyertya asetrde maeciegast nieri vrtye remiad.Molirnatur aut oditaut. onsq ntmagni dolores eo qui ratione. </p>
                    <p class="m_bot1">Nasgaesaert asetyertya asetrde maeciegast nieriti vrtye remiades.Molirnatur aut oditaut.</p>
                    <a href="#" class="btn-link btn-link2">read more<span></span></a>
                </div>
                <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-3 col-md-3 col-sm-3 row4_col">
                    <h2>Latest Services</h2>
                    <ul class="list2">
                        <li><a href="#">muygasa kausyse</a></li>
                        <li><a href="#">nuyatsas lasras batsas </a></li>
                        <li><a href="#">kiaustyas</a></li>
                        <li><a href="#">batresa ksate</a></li>
                        <li><a href="#">Grerhasa mero</a></li>
                        <li><a href="#">Lanytadas nyats</a></li>
                        <li><a href="#">nuyatsas lasras batsas</a></li>
                        <li><a href="#">batresa </a></li>
                    </ul>
                </div>
                <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-3 col-md-3 col-sm-3 locations row4_col">
                    <h2>Locations</h2>
                    <figure><img src="img/smalllogo1.png" alt=""></figure>
                    <p class="title4">28 Jackson Blvd Ste 1020<br>Chicago<br>IL 60604-2340</p>
                    <hr class="line1">
                    <a href="#" class="btn-link btn-link3"><span></span>info@whaletress.org</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection