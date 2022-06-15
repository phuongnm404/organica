<div class="left-sidebar">
    <h2>Danh mục</h2>
    <div class="panel-group category-products" id="accordian">
        <!--category-productsr-->
        @foreach($categorys as $category)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordian" href="#sportswear_{{$category->id}}">
                        <span class="badge pull-right">
                            @if($category->categoryChildren->count())
                            <i class="fa fa-plus"></i>
                            @endif
                        </span>
                        {{ $category->name }}
                    </a>
                </h4>
            </div>

            <div id="sportswear_{{$category->id}}" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul>
                        @foreach($category->categoryChildren as $categoryChilren)
                        <li><a href="#">{{ $categoryChilren->name }}</a></li>
                        @endforeach

                    </ul>
                </div>
            </div>

        </div>
        @endforeach
    </div>
    <!--/category-products-->

    <div class="brands_products">
        <!--brands_products-->
        <h2>THƯƠNG HIỆU</h2>
        <div class="brands-name">
            <ul class="nav nav-pills nav-stacked">
                @foreach ($productAll as $productAllItem )
                <li><a href="#"> <span class="pull-right">(50)</span>{{$productAllItem->brand}}</a></li>
                @endforeach

            </ul>
        </div>
    </div>
    <!--/brands_products-->


    {{-- <div class="shipping text-center">
        <!--shipping-->
        <img src="eshopper/images/home/shipping.jpg" alt="" />
    </div>
    <!--/shipping--> --}}

</div>