@extends('layout.main')

@section('breadcrumb')
<li class="breadcrumb-item active">Product & Category</li>

@endsection

@section('content')
<div class="row">
  <div class="col-md-4">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="m-0">Category</h5>
      </div>
      <div class="card-body">
        <div class="col-md-12">
          <div class="form-group">
            <label for="">
              Category Name
            </label>
            <input class="form-control" type="text" placeholder="Name">
          </div>
        </div>
        <a href="#" class="btn btn-primary">Add</a>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th style="width: 10%">No</th>
            <th>Name</th>
            <th style="width: 20%">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Obat</td>
            <td>
              <a class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
              <a class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Pakan</td>
            <td>
              <a class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
              <a class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>
            </td>
          </tr>
          <tr>
            <td>3</td>
            <td>Cage</td>
            <td>
              <a class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
              <a class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>
            </td>
          </tr>
          <tr>
            <td>4</td>
            <td>Additional</td>
            <td>
              <a class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
              <a class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>
            </td>
          </tr>
          <tr>
            <td>5</td>
            <td>Ayam</td>
            <td>
              <a class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
              <a class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="m-0">Product</h5>
      </div>
      <div class="card-body">
        <div class="col-md-12">
          <div class="form-group">
            <label for="">
              Product Name
            </label>
            <input class="form-control" type="text" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="">
              Category
            </label>
            <select class="form-control">
              <option value="1">Obat</option>
            </select>
          </div>
        </div>
        <a href="#" class="btn btn-primary">Add</a>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th style="width: 10%">No</th>
            <th>Name</th>
            <th>Category</th>
            <th style="width: 20%">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Ayam</td>
            <td>Ayam</td>
            <td>
              <a class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
              <a class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Pestisida</td>
            <td>Obat</td>
            <td>
              <a class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
              <a class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection