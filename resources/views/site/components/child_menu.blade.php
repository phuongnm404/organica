@if($categoryParent->categoryChildren -> count() )

<ul role="menu" class="sub-menu">
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
@endif