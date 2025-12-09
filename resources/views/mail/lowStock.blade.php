<div>
  <p>
    The following products are about to run out of stock...
  </p>

  <ul>
    @foreach ($products as $product)
      <li>
        <p>Product Name: {{ $product->name }}</p>
        <p>Quantity: {{ $product->stock_quantity }}</p>
      </li>
    @endforeach
  </ul>
</div>
