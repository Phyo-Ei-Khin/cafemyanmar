@include ('menu')
<div class="container mt-5">
    @if (session()->has('success_message'))
        <div class="alert alert-success">
            {{ session()->get('success_message')}}
        </div>
    @endif

    @if( count($errors) > 0 )
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ( Cart::count() > 0 )
        <h3 class="mb-4">{{ Cart::count() }} item(s) in Shopping Cart!</h3>
        <div class="row">
            <table class="table">
                <tr class="bg-primary">
                    <td></td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Options</td>
                    <td>Quantity</td>
                    <td>Total</td>
                </tr>
                @foreach (Cart::content() as $item)
                <tr>
                    <td style="width: 20%; "><a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ asset('images/products/'.$item->model->slug.'.jpg') }}" alt="" class="img-fluid"></a></td>
                    <td><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->name }}</a></td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="cart-option" style="border:none; background:none ">Remove</button>
                        </form>
                        <!-- <form action="{{ route('cart.switchToSaveForLater', $item->rowId) }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="cart-option" style="border:none; background:none ">Save for Later</button>
                        </form> -->
                    </td>
                    <td>
                        <select class="quantity" data-id = {{ $item->rowId }}>
                            @for( $i = 1; $i < 10 ; $i ++ )
                                <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </td>
                    <td>
                        {{ $item->subtotal() }}
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="row" style="background: rgba(128, 128, 128, 0.49); padding: 12px;">
            <div class="col-12 col-md-6">
                Shipping is free because we're awesome like that. Also because that's additional stuff I don't feel like figuring our.
            </div>
            <div class="col-12 offset-md-4 col-md-2">
                <table>
                    <tr>
                        <td> SubTotal: </td>
                        <td>{{ Cart::subtotal() }}</td>
                    </tr>
                    <tr>
                        <td>Tax(10%): </td>
                        <td>{{ Cart::tax() }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Total: </td>
                        <td style="font-weight: bold;">{{ Cart::total() }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 col-md-6 text-left">
                <a href="{{ route('shop.index') }}" class="btn-primary px-3 py-2">Continue Shopping!</a>
            </div>
            <div class="col-12 col-md-6 text-right">
                <a href="{{ route('checkout.index') }}" class="btn-primary px-3 py-2">Proceed to Checkout</a>
            </div>
        </div>
        @else 
            <h3 class="mb-4">No Items in Shopping Cart! </h3>
            <a href="{{ route('shop.index') }} " class="button btn-primary p-2">Continue Shopping!!</a>
        @endif
    
    
    @include('partials.related-items')
</div>
<script>
    (function() {
        const classname = document.querySelectorAll('.quantity')

        Array.from(classname).forEach(function(element){
            element.addEventListener('change', function(){
                const id = element.getAttribute('data-id')
                axios.patch(`/cart/${id}`, {
                    quantity: this.value
                })
                .then(function (response) {
                    // console.log(response);
                    window.location.href = "{{ route('cart.index') }}"
                })
                .catch(function (error) {
                    console.log(error);
                    window.location.href = "{{ route('cart.index') }}"
                });
            })
        })
    })();
</script>