<div class="row mt-5 mb-3">
        <div class="col-12">
            <h3>Related Items...</h3>
        </div>
</div>
<div class="row">
    @foreach($relatedItems as $product)
    <div class="col-md-3 col-12">
        <img src=" {{ asset('images/products/'.$product->slug.'.jpg') }} " alt="" class="img-fluid">
        <a href="{{ route('shop.show', $product->slug ) }}"><h3 class="product-name">{{ $product->name }}</h3></a>
        <p>{{ $product->price }}</p>
    </div>
    @endforeach 
</div>