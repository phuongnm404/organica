<div class="brands_products">
    <!--brands_products-->
    <h2>THƯƠNG HIỆU</h2>
    <div class="brands-name">
        <ul class="nav nav-pills nav-stacked">
            @foreach ($brand as $brands)
            <li><a href="#">{{$brands->name}}</a></li>
            @endforeach
        </ul>
    </div>
</div>