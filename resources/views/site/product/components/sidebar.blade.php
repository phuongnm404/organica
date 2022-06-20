<div class="left-sidebar">
    <div class="panel-group category-products" id="accordian">
        <!--category-productsr-->
        <h2>Danh mục</h2>
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
                        <li><a
                                href="{{ route('productCategory',['slug' => $categoryChilren->slug, 'id' => $categoryChilren->id]) }}">{{
                                $categoryChilren->name }}</a></li>
                        @endforeach

                    </ul>
                </div>
            </div>

        </div>
        @endforeach
    </div>
    <div class="panel-group brands_products">
        <!--brands_products-->
        <h2>THƯƠNG HIỆU</h2>
        <div class=" panel panel-default brands-name">
            <ul class="nav nav-pills nav-stacked">
                @foreach ($brand as $brands)
                <li><a href="{{route('filterBrand', ['id'=>$brands->id])}}">{{$brands->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="panel-group brands_products">
        <!--brands_products-->
        <h2>ĐẶC TÍNH</h2>
        <div class="brands-name">
            <ul class="nav nav-pills nav-stacked">
                @foreach ($tag as $tags)
                <li><a href="{{route('filterBrand', ['id'=>$tags->id])}}">{{$tags->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

</div>