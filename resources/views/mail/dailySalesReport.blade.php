<div>
  <p>
    Daily Sales Report - {{ date('Y-m-d') }}
  </p>

  <table style="border-collapse: collapse;width: 100%;">
    <thead>
      <tr>
        <th
          style="border: 1px solid #ddd;padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;background-color: #696969;color: white">
          Product Name</th>
        <th
          style="border: 1px solid #ddd;padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;background-color: #696969;color: white;text-align:right">
          Price</th>
        <th
          style="border: 1px solid #ddd;padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;background-color: #696969;color: white;text-align:right">
          Quantity</th>
        <th
          style="border: 1px solid #ddd;padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;background-color: #696969;color: white;text-align:right">
          Total</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
        <tr>
          <td style="border: 1px solid #ddd;padding: 8px;">{{ $product->name }}</td>
          <td style="border: 1px solid #ddd;padding: 8px;text-align:right">{{ $product->priceMoney }}</td>
          <td style="border: 1px solid #ddd;padding: 8px;text-align:right">{{ $product->quantity }}</td>
          <td style="border: 1px solid #ddd;padding: 8px;text-align:right">{{ $product->totalPriceMoney }}</td>
        </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td style="border: 1px solid #ddd;padding: 8px;text-align:right" colspan="3">
          <b>Grand Total</b>
        </td>
        <td style="border: 1px solid #ddd;padding: 8px;text-align:right"><b>{{ $grandTotalMoney }}</b></td>
      </tr>
    </tfoot>
  </table>
</div>
