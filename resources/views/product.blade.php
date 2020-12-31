@include ('menu')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 col-12">
            <img src="{{ asset('images/products/'.$product->slug.'.jpg') }}" alt="" class="img-fluid">
        </div>
        <div class="col-md-6 col-12">
            <h5>{{ $product->name }}</h5>
            <p>Price: {{ $product->price }}</p>
            <p>{{ $product->description }}</p>
            <!-- <a href="{{ route('cart.index' ) }}" class="btn-primary px-3 py-2"> Add to Cart</a> -->
            <form action="{{ route('cart.store') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $product->id }}"">
                <input type="hidden" name="name" value="{{ $product->name }}"">
                <input type="hidden" name="price" value="{{ $product->price }}"">
                <button type="submit" class="btn-primary px-3 py-2"> Add to Cart </button>
            </form>
        </div>
    </div>
    @include('partials.related-items')
</div>
