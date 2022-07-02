<div id="header-bottom" class="header-bottom">
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
                        <li><a href="{{route('home.index')}}">Home</a></li>
                        <li class="dropdown" data-toggle="dropdown"><a href=""> Sản phẩm <i
                                    class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                @foreach ($categoryLimit as $categoryParent)
                                <li class="sub-menu-child"><a href="{{route('productAll')}}">{{$categoryParent->name}}
                                        &ensp; <i class=" fa fa-angle-right"></i></a>

                                    <ul class="sub-menu-list">
                                        @foreach ($categoryParent->categoryChildren as $categoryChild )
                                        <li>
                                            <a
                                                href="{{route('productCategory', ['slugCategory'=> $categoryChild->slug, 'id'=>$categoryChild->id ])}}">{{$categoryChild->name}}</a>
                                            @if($categoryChild->categoryChildren -> count() )
                                            @include('site.components.child_menu', ['categoryParent' => $categoryChild])
                                            @endif

                                        </li>
                                        @endforeach

                                    </ul>




                                </li>
                                @endforeach

                            </ul>
                        </li>
                        <li><a href="{{route('home.index')}}">Tin tức</a></li>
                        <li><a href="{{route('home.index')}}">Cửa hàng</a></li>
                        <li><a href="{{route('home.index')}}">Tuyển dụng</a></li>
                        <li><a href="{{route('home.index')}}">Liên hệ</a></li>


                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>