<div class="container">
  <div class="align-items-center px-5 mt-3">
    <form method="post" action="{{route('period-transactions.store')}}">
      @csrf
      <div class="form-group">
        <label for="Product">Name Product</label>
        <select name="product_id" class="form-control">
          @foreach ($products as $product)
          <option value="{{$product->id}}">{{$product->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group mt-2">
        <label for="Product">Quantity (Kg)</label>
        <input type="text" name="qty" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '');"
          placeholder="Qty">
        <input type="hidden" name="period_id" class="form-control" id="period_id">
      </div>
      <div class="form-group mt-2">
        <label for="Product">Cost (/Kg)</label>
        <input type="text" name="cost" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '');"
          placeholder="Cost/Kg">
      </div>
      <div class="form-group mt-2">
        <button type="submit" class="btn btn-primary" id="transaction-submit">Add</button>
      </div>
    </form>
  </div>
  <hr>
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th style="width: 10%">No</th>
        <th>Input Date</th>
        <th>Name</th>
        <th>Qty</th>
        <th>Cost /Kg</th>
        <th>Total</th>
        <th style="width: 20%">Action</th>
      </tr>

    </thead>
    <tbody>
      @foreach ($transactions as $index => $trans)

      <tr>
        <td>{{$index+1}}</td>
        <td>{{$trans->input_date}}</td>
        <td>{{$trans->product->name}}</td>
        <td>{{$trans->qty}}</td>
        <td>{{$trans->cost}}</td>
        <td>{{$trans->cost * $trans->qty}}</td>
        <td>
          <a class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>