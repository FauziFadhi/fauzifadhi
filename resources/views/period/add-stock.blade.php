<div class="container">
  <div class="align-items-center px-5 mt-3">
    <div class="form-group">
      <label for="Product">Name Product</label>
      <select class="form-control">
        <option>Ayam</option>
        <option>Pestisida</option>
      </select>
    </div>
    <div class="form-group mt-2">
      <label for="Product">Quantity (Kg)</label>
      <input type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '');"
        placeholder="Quantity/Kg">
    </div>
    <div class="form-group mt-2">
      <label for="Product">Cost (/Kg)</label>
      <input type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '');"
        placeholder="Cost/Kg">
    </div>
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
      <tr>
        <td>1</td>
        <td>2 January 2019</td>
        <td>Ayam</td>
        <td>5000</td>
        <td>1000</td>
        <td>Rp. 5,000,000</td>
        <td>
          <a class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
          <a class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>
        </td>
      </tr>
      <tr>
        <td>2</td>
        <td>2 January 2019</td>
        <td>Pestisida</td>
        <td>50</td>
        <td>60000</td>
        <td>3,000,000</td>
        <td>
          <a class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
          <a class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>
        </td>
      </tr>
    </tbody>
  </table>
</div>