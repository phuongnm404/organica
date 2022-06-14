<!--/header-bottom-->

<div class="mainmenu pull-left">
    <ul class="nav navbar-nav collapse navbar-collapse">
        <li><a href="{{route('home.index')}}" class="active">Home</a></li>

        @foreach ($categoryLimit as $categoryParent)
        <li class="dropdown"><a href="#">{{$categoryParent->name}}<i class="fa fa-angle-down"></i></a>
            @include('site.components.child_menu', ['categoryParent' => $categoryParent])
        </li>
        @endforeach


        {{-- <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
            <ul>
                <li class="dropdown"><a href="shop.html">1<i class="fa fa-angle-right"></a>
                    <ul>
                        <li>1.1</li>
                        <li>1.2</li>
                        <li>1.3</li>
                    </ul>
                </li>
                <li><a href="product-details.html">2</a></li>
                <li><a href="checkout.html">3</a></li>

            </ul>
        </li>
        <li><a href="contact-us.html">Contact</a></li> --}}
    </ul>








</div>