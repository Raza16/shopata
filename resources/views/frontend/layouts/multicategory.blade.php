


    @foreach($subcategories as $subcategory)

            <li {{$item->products->count() != 0 ? '' : 'hidden'}}
                ><a href="{{url('shop/'.$subcategory->slug)}}" id="category">{{$subcategory->title}}</a></li>

                @if(count($subcategory->subcategory))
                    @include('frontend.layouts.multicategory',['subcategories' => $subcategory->subcategory])
                @endif


    @endforeach
