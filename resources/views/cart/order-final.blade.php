
  <h3 style="color:#f7941d;">Your Order</h3>
  <div class="table-responsive">
  <table class="table table-condensed" id="cartable">
    <thead>
          <tr style="color:#f7941d;">
              <th colspan="2">Product</th>
              <th>Total</th>
          </tr>
      </thead>
      <tbody>
        @foreach($products as $product)
          <tr>
            <td><strong>{{ $product->product_name }}</strong></td>
            <td></td>
            <td>{{ '$'.$product->subtotal }}</td>
          </tr>
          <?php   if(!empty($product->subsribe)): ?>
          <tr id="sublist">
            <td colspan="2">
                <h6>Auto-Replenish: This item will ship now and deliver every
                  <span style="color:#f7941d;"><?php echo $product->subsribe.' month(s)' ?>.</span></h6>
              </td>
          </tr>
        <?php endif ?>
        @endforeach


          <tr>
              <td><strong>SUBTOTAL</strong></td>
              <td></td>
              <td>{{ '$'.$transaction->subtotal }}</td>
          </tr>
          <tr>
              <td><strong>PRICING</strong></td>
              <td></td>
              <td>{{ '$'.$transaction->shipping }}</td>
          </tr>
          <tr>
              <td><strong>TOTAL</strong></td>
              <td></td>
              <td>{{ '$'.$transaction->total }}</td>
          </tr>

      </tbody>
  </table>
  </div>
