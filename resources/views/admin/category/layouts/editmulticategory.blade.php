

        @foreach ($subcategories as $subcategory)

            <option value="{{$subcategory->id}}" {{$category->parent_id == $subcategory->id ? 'selected' : ''}} {{$category->id == $subcategory->id ? 'disabled' : ''}}>&nbsp;&nbsp;-{{$subcategory->title}}</option>

            @if(count($subcategory->subcategory))
                @include('admin.category.layouts.editmulti',['subsubcategories' => $subcategory->subcategory])
            @endif

        @endforeach

