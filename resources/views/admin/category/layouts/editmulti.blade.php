

    @foreach ($subsubcategories as $subcategory)

        <option value="{{$subcategory->id}}" {{$category->parent_id == $subcategory->id ? 'selected' : ''}} {{$category->id == $subcategory->id ? 'disabled' : ''}}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--{{$subcategory->title}}</option>

    @endforeach
