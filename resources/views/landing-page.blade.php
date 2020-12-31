@include ('menu')
<div class="container">
    <div class="row mt-5">
        @foreach ($products as $product)
        <div class="col-md-4 col-12">
            <a href="{{ route('shop.show', $product->slug ) }}"><img src="{{ asset('images/products/'.$product->slug.'.jpg') }}" alt="Image" class="img-fluid" /></a>
            <a href="{{ route('shop.show', $product->slug ) }}"><h3 class="product-name">{{ $product->name }}</h3></a>
            <p>{{ $product->price }}</p>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <div class="more-link">
                <a href="{{ route('shop.index')}}" class="btn btn-primary"> More Items>></a>
            </div>
        </div>
    </div>
</div>
