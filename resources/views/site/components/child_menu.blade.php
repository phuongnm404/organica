@if($categoryParent->categoryChildren -> count() )

<ul role="menu" class="sub-menu">
    @foreach ($categoryParent->categoryChildren as $categoryChild )
    <li>
        <a href="shop.html">{{$categoryChild->name}}</a>

        @if($categoryChild->categoryChildren -> count() )
        @include('site.components.child_menu', ['categoryParent' => $categoryChild])
        @endif

    </li>
    @endforeach

</ul>
@endif