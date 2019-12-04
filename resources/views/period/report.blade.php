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
            <td>
              @php
              if($transactions->count() === 0)
              echo '0';
              else
              echo $product->transactions->where('period_id',$transactions[0]->period_id)->sum->total_cost;
              @endphp
            </td>
          </tr>
          @endforeach
          <tr>
            <td>Biaya Tak Terduga</td>
            <td><input class="form-control" id="inp-biaya-tak-terduga" placeholder="Rp"
                oninput="this.value = this.value.replace(/[^0-9.]/g, ''); takTerduga(this);">
            </td>
            <td id="biaya-tak-terduga"></td>
          </tr>
          <tr>
            <td>Gaji Anak Kandang</td>
            <td><input class="form-control" placeholder="Rp / Ayam"
                oninput="this.value = this.value.replace(/[^0-9.]/g, ''); gaji(this);">
            </td>
            <td id="gaji-anak-kandang"></td>
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
            <td><input class="form-control" placeholder="Rp / Ayam"
                oninput="this.value = this.value.replace(/[^0-9.]/g, ''); panen(this);"></td>
            <td id="panen"></td>
          </tr>
        </tbody>
      </table>
      <div class="col-md-12">
        <div class="row">
          <button id="hitung">Hitung</button>
          <span class="ml-auto text-danger" id="total">

          </span>
        </div>
      </div>
    </div>
  </div>
</div>