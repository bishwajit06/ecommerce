<form action="{{ route('carts.store') }}" method="post">
    @csrf
    <input type="hidden" name="product_id" value="{{$product->id}}">
    <button class="btn btn-primary" type="submit">Add to cart</button>
</form>

