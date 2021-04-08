

        @foreach ($subcategories as $subcategory)

                <option value="{{$subcategory->id}}">&nbsp;&nbsp;-{{$subcategory->title}}</option>

                @if(count($subcategory->subcategory))
                    @include('admin.category.layouts.multi',['subsubcategories' => $subcategory->subcategory])
                @endif

        @endforeach

