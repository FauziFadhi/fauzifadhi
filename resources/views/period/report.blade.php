<div class="container">
  <div class="justify-content-center">
    <div class="col-md-12">
      <table class="table mt-2 table-striped table-bordered">
        <thead>
          <th colspan="3">
            <h4>Expense</h4>
          </th>
        </thead>
        <tbody class="px-lg-5">
          @foreach ($products as $product)
          <tr>
            <td>Pembelian {{$product->name}}</td>
            <td></td>
            <td>{{ $product->transactions->where('period_id',$transactions[0]->period_id)->sum->total_cost }}</td>
          </tr>
          @endforeach
          <tr>
            <td>Biaya Tak Terduga</td>
            <td><input class="form-control" placeholder="Rp" oninput="this.value = this.value.replace(/[^0-9.]/g, '');">
            </td>
            <td>Rp 1.050.000</td>
          </tr>
          <tr>
            <td>Gaji Anak Kandang</td>
            <td><input class="form-control" placeholder="Rp / Ayam"
                oninput="this.value = this.value.replace(/[^0-9.]/g, '');">
            </td>
            <td>Rp 1.050.000</td>
          </tr>
        </tbody>
        <thead>
          <th colspan="3">
            <h4>Income</h4>
          </th>
        </thead>
        <tbody class="px-lg-5">
          <tr>
            <td>Harvest Chicken</td>
            <td></td>
            <td>80.000.000</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>