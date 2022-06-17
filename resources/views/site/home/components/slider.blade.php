<section id="slider">
    <!--slider-->
    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#slider-carousel" data-slide-to="1"></li>
            <li data-target="#slider-carousel" data-slide-to="2"></li>
        </ol>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($sliders as $key => $slider )
                <div class="item {{$key == 0 ? 'active' : ''}}">

                    <img class="d-block w-100" src="{{$slider->image_path}}" alt="{{$slider->name}}">

                </div>
                @endforeach
            </div>
        </div>
        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>

</section>
<!--/slider-->