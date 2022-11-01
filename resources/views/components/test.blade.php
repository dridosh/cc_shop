<div {{$attributes->class([ "test2_class"=>false])}} >
    <div {{$header->attributes->class(["test3"=>true])}}>
        {{$header}}
    </div>
    {{$slot}}
    {{$footer}}


    {{--
    @foreach ($products as $product)
              <br>
              <p>{{$product}} </p>
              <p><b>ID:</b> {{$product->id}}</p>
              <p><b>Title:</b> {{$product->title}}</p>
              <p><b>Price:</b> {{$product->price}}</p>
              <p><b>Brand:</b> {{$product->brand->title}}</p>
              <p><b>Category:</b></p>
              @foreach($product->categories as $category )
                   <p>{{$count++}}<i> {{$category->title}}</i></p>
              @endforeach
         @endforeach

    --}}

</div>