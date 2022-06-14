<div class="category-tab">
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach($categorys as $indexCategory => $categoryItem)
            <li class="{{ $indexCategory == 0 ? 'active' : '' }}">
                <a href="#category_tab_{{ $categoryItem->id }}" data-toggle="tab">
                    {{ $categoryItem->name }}
                </a>
            </li>
            @endforeach

        </ul>
    </div>


    <div class="tab-content">
        @foreach($categorys as $indexCategoryProduct => $categoryItemProduct)
        <div class="tab-pane fade {{ $indexCategoryProduct == 0 ? 'active in' : '' }}"
            id="category_tab_{{ $categoryItemProduct->id }}">

            @foreach($categoryItemProduct->products as $productItemTabs)
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{$productItemTabs->feature_image_path}}" alt="" />
                            <b>{{$productItemTabs->name}}</b>
                            <h3>{{number_format($productItemTabs->price)}}<sup>đ</sup>/{{$productItemTabs->weight}}</h3>

                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào
                                giỏ
                                hàng</a>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach


        </div>
        @endforeach

    </div>
</div>