<div class="header-bottom">
    <!--header-bottom-->
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="mainmenu pull-left">
                    <ul class="nav navbar-nav collapse navbar-collapse">
                        <li><a href="{{route('home.index')}}" class="active">Home</a></li>
                        {{--
                        <li class="dropdown" data-toggle="dropdown"><a href=""> Sản phẩm <i
                                    class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="#">Rau củ quả</a></li>
                                <li><a href="#">Trái cây trong nước</a></li>
                                <li class="dropdown" data-toggle="dropdown"><a href="">Thức uống<i
                                            class="fa fa-angle-right"></i></a>
                                    <ul role="menu" class="sub-child-menu">
                                        <li><a href="#">Thức uống trong nước</a></li>
                                        <li><a href="#">Thức uống khác</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li> --}}




                        @foreach ($categoryLimit as $categoryParent)
                        <li class="dropdown"><a href="">{{$categoryParent->name}}<i class="fa fa-angle-down"></i></a>
                            @include('site.components.child_menu', ['categoryParent' => $categoryParent])
                        </li>
                        @endforeach




                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>