
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
          @foreach($cart as $row)
        <tr>
            <td><strong><?php echo $row->name;?></strong></td>
              <td></td>
              <td><?php echo '$ '.$row->subtotal;?></td>
          </tr>
          <?php   if($row->options->has('subs')): ?>
          <tr id="sublist">
            <td colspan="2">
                <h6>Auto-Replenish: This item will ship now and deliver every
                  <span style="color:#f7941d;"><?php echo $row->options->subs.'month(s)' ?>.</span></h6>
              </td>
          </tr>
        <?php endif ?>

              @endforeach


          <tr id="sublist">
            <td></td>
          </tr>
          <tr id="sublist">
            <td></td>
          </tr>
          <tr id="sublist">
            <td></td>
          </tr>
          <tr>
            <td>SUBTOTAL</td>
              <td></td>
              <td>$<span id="order-subtotal"><?php echo Cart::total(); ?></span></td>
          </tr>
          <tr>
            <td>SHIPPING</td>
              <td></td>
              <td>$<span id="order-shipping">0</span></td>
          </tr>
          <tr>
            <td><strong>TOTAL</strong></td>
              <td></td>
              <td style="color:#f7941d;"><strong>$<span id="order-total" ><?php echo Cart::total(); ?><span></strong></td>
          </tr>
      </tbody>
  </table>
  </div>
  <span>&nbsp;</span>
  
  <span style="color:#f7941d;">*We will send you email for payment and shipping information</span>
