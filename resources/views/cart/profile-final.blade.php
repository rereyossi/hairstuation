
  <h3 style="color:#f7941d;">Billing details</h3>

    <table class="table table-responsive">

      <tr>
        <td>firstname<td>
        <td></td>
        <td>{{ $profile->firstname }}</td>
      </tr>

      <tr>
        <td>lastname<td>
        <td></td>
        <td>{{ $profile->lastname }}</td>
      </tr>


      <tr>
        <td>Street Address)<td>
        <td></td>
        <td>{{ $profile->street }}</td>
      </tr>

      <tr>
        <td>Town / City<td>
        <td></td>
        <td>{{ $profile->city }}</td>
      </tr>

      <tr>
        <td>Appartement, Office, Etc (Optional)<td>
        <td></td>
        <td>{{ $profile->optionals }}</td>
      </tr>

      <tr>
        <td>State / Country<td>
        <td></td>
        <td>{{ $profile->state }}</td>
      </tr>

      <tr>
        <td>Postcode / Zip<td>
        <td></td>
        <td>{{ $profile->postcode }}</td>
      </tr>

      <tr>
        <td>Email Address<td>
        <td></td>
        <td>{{ $profile->email }}</td>
      </tr>

      <tr>
        <td>Phone<td>
        <td></td>
        <td>{{ $profile->phone }}</td>
      </tr>

      <tr>
        <td>Order Notes<td>
        <td></td>
        <td>{{ $profile->note }}</td>
      </tr>

    </div>
  </table>
