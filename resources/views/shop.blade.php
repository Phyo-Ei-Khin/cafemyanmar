@include('menu')
<div class="container">
    <div class="row mt-5">
        <div class="col-12 col-md-3 category">
            <h3>By Category</h3>
            <ul>
                @foreach($categories as $category)
                    <li><a href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category -> name }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="col-12 col-md-9">
        <h3>{{ $categoryName }}</h3>
            <div class="row">
                @foreach ($products as $product)
                <div class="col-md-4 col-12">
                    <a href="{{ route('shop.show', $product->slug ) }}"><img src="{{ asset('images/products/'.$product->slug.'.jpg') }}" alt="Image" class="img-fluid" /></a>
                    <a href="{{ route('shop.show', $product->slug ) }}"><h3 class="product-name">{{ $product->name }}</h3></a>
                    <p>{{ $product->price }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
