@include ('menu')
<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-md-7">
            <form action="subscription.php" method="post">
                <div class="group">
                    <label>
                    <span>Name</span>
                    <input name="cardholder-name" class="field" placeholder="Jane Doe" />
                    </label>
                    <label>
                    <span>Phone</span>
                    <input class="field" placeholder="(123) 456-7890" type="tel" />
                    </label>
                </div>
                <div class="group">
                    <label>
                    <span>Card</span>
                    <div id="card-element" class="field"></div>
                    </label>
                </div>
                <button type="submit">Pay $25</button>
                <div class="outcome">
                    <div class="error" role="alert"></div>
                    <div class="success">
                    Success! Your Stripe token is <span class="token"></span>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-12 col-md-5">
            <h3 class="mb-3">Your Order!</h3>
            <table class="table">
                @foreach (Cart::content() as $item)
                    <tr>
                        <td><a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ asset('images/products/'.$item->model->slug.'.jpg') }}" alt="" class="img-fluid" style="width: 80px; "></a></td>
                        <td>
                            <p><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->name }}</a></p>
                            <p>{{ $item->price }}</p>
                        </td>
                        <td class="text-right">{{ $item->qty }}</td>
                    </tr>
                @endforeach
            </table>    
            <table class="table">
                <tr>
                    <td>SubTotal:</td>
                    <td class="text-right">{{ Cart::subtotal() }}</td>
                </tr>
                <tr>
                    <td>Tax(10%)</td>
                    <td class="text-right">{{ Cart::tax() }}</td>
                </tr>
                <tr>
                    <td style = "font-weight: bold; ">Total:</td>
                    <td style = "font-weight: bold; text-align: right;">{{ Cart::Total() }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">

    var stripe = Stripe('YOUR_PUBLIC_KEY');
    var elements = stripe.elements();

var card = elements.create('card', {
  style: {
    base: {
      iconColor: '#666EE8',
      color: '#31325F',
      lineHeight: '40px',
      fontWeight: 300,
      fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
      fontSize: '15px',

      '::placeholder': {
        color: '#CFD7E0',
      },
    },
  }
});

card.mount('#card-element');
function setOutcome(result) {
  var successElement = document.querySelector('.success');
  var errorElement = document.querySelector('.error');
  successElement.classList.remove('visible');
  errorElement.classList.remove('visible');

  if (result.token) {
    // Use the token to create a charge or a customer
    // https://stripe.com/docs/charges
    successElement.querySelector('.token').textContent = result.token.id;
    successElement.classList.add('visible');
  } else if (result.error) {
    errorElement.textContent = result.error.message;
    errorElement.classList.add('visible');
  }
}

card.on('change', function(event) {
  setOutcome(event);
});

document.querySelector('form').addEventListener('submit', function(e) {
  e.preventDefault();
  var form = document.querySelector('form');
  var extraDetails = {
    name: form.querySelector('input[name=cardholder-name]').value,
  };
  stripe.createToken(card, extraDetails).then(setOutcome);
});
</script>