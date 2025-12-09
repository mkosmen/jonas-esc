<div>
  <p>
    The following products are about to run out of stock...
  </p>

  <ul style="list-style:none;padding:0;margin:0;">
    @foreach ($products as $product)
      <li style="list-style:none;padding:0;margin:0;margin-bottom:10px">
        <p>Product Name: {{ $product->name }}</p>
        <p>Quantity: {{ $product->stock_quantity }}</p>
      </li>
    @endforeach
  </ul>
</div>
