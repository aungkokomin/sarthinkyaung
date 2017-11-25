@extends('master_home')
@section('title') Home @endsection
@section('content')
    <div id="templatemo_main">
        <div id="sidebar" class="float_l">
            <div class="sidebar_box"><span class="bottom"></span>
                <h3>Categories</h3>   
                <div class="content">
                    @foreach($category as $categories)
                    <ul class="sidebar_list">
                        <li><a href="{{url('/category/'.$categories->id.'/browse')}}">{{$categories->name}}</a></li>
                    </ul>
                    @endforeach
                </div>
            </div>
        </div>
        <div id="content" class="float_r">
            <!-- <div id="slider-wrapper">
                <div>
                    <a href="#"><img src="{{asset('img/slider/01.jpg')}}" alt="" title="This is an example of a caption" /></a>
                </div>
                <div id="htmlcaption" class="nivo-html-caption">
                    <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.
                </div>
            </div>
            <script type="text/javascript" src="js/jquery-1.4.3.min.js"></script>
            <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
            <script type="text/javascript">
            $(window).load(function() {
                $('#slider').nivoSlider();
            });
            </script> -->
            @foreach($course as $courses)
            <div class="product_box">
                <h3>{{$courses->title}}</h3>
                <a href="productdetail.html"><img src="{{asset('uploads/course/'.$courses->img)}}" alt="Shoes 1" style="width: 200px; height: 150px;" /></a>
                <p>{{str_limit($courses->description,100)}}</p>
                <p class="product_price">$ 100</p>
                <a href="shoppingcart.html" class="addtocart"></a>
                <a href="productdetail.html" class="detail"></a>
            </div>
            @endforeach            
            <div class="cleaner"></div>         
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
@endsection
