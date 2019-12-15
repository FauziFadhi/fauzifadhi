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
            <input class="form-control" type="text" name="category-name" placeholder="Name">
          </div>
        </div>
        <a href="#" class="btn btn-primary" id="category-submit">Add</a>
      </div>
      <table class="table table-striped" id="example1">
        <thead>
          <tr>
            <th style="width: 10%">No</th>
            <th>Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="body-category">
          @foreach ($categories as $index => $category)

          <tr>
            <td>{{$index+1}}</td>
            <script>
              var categoryIndex = {{$index}}
            </script>
            <td>{{$category->name}}</td>
            <td>
              <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                <a class="btn btn-sm btn-success updateCategory" data-id="{{$category->id}}"><i
                    class="fa fa-edit"></i></a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card card-primary card-outline">
      <div class="card-header">
        @error('message')
        <span class="bg-danger">{{$message}}</span>
        @enderror
        <h5 class="m-0">Product</h5>
      </div>
      <div class="card-body">
        <div class="col-md-12">
          <div class="form-group">
            <label for="">
              Product Name
            </label>
            <input class="form-control" type="text" name="product-name" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="">
              Category
            </label>
            <select name="category-id" id="category-id" class="form-control">
              @foreach ($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="">
              Unit
            </label>
            <select name="unit" id="unit" class="form-control">
              <option value="Sacks">Sacks</option>
              <option value="Kg">Kg</option>
              <option value="Pcs">Pcs</option>
            </select>
          </div>
        </div>
        <a href="#" id="product-submit" class="btn btn-primary">Add</a>
      </div>
      <table class="table table-striped" id="example2">
        <thead>
          <tr>
            <th style="width: 10%">No</th>
            <th>Name</th>
            <th>Category</th>
            <th>Stock</th>
            <th>Unit</th>
            <th style="width: 20%">Action</th>
          </tr>
        </thead>
        <tbody id="body-product">
          @foreach ($products as $index => $product)
          <script>
            var productIndex = {{$index}}
          </script>
          <tr>
            <td>{{$index+1}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->category->name}}</td>
            <td>{{$product->stock}}</td>
            <td>{{$product->unit}}</td>
            <td>
              <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                <a class="btn btn-sm btn-success" data-id="{{$product->id}}"><i class="fa fa-edit"></i></a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@section('js')
<!-- DataTables -->
<script src={{ asset('plugins/datatables/jquery.dataTables.js')}}></script>
<script src={{ asset('plugins/datatables/dataTables.bootstrap4.js')}}></script>
<!-- SlimScroll -->
<script src={{ asset('plugins/slimScroll/jquery.slimscroll.min.js')}}></script>
<!-- FastClick -->
<script src={{ asset('plugins/fastclick/fastclick.js')}}></script>
<script>
  $.ajaxSetup({

headers: {

    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

}

});
$(() => {
  $("#example1").DataTable();
  $("#example2").DataTable();
})
  $('#category-submit').click(e => {
    e.preventDefault()

    var name = $("input[name=category-name]").val()
    $.ajax(({
      type: 'POST',
      url:'categories',
      data: {name},
      success: data => {
        alert('categories has been added')
          $('#category-id').append(`
          <option value="${data.category.id}">${data.category.name}</option>
          `)
        $('#body-category').append(`
              <tr>
            <td>${categoryIndex+2}</td>
            <td>${data.category.name}</td>
            <td>
              <a class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
              <a class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>
            </td>
          </tr>
        `)
      }
      
    }))
  })
  $('#product-submit').click(e => {
    e.preventDefault()

    var name = $("input[name=product-name]").val()
    var category_id = $("select[name=category-id]").val()
    var unit = $("select[name=unit]").val()
    $.ajax(({
      type: 'POST',
      url:'products',
      data: {name, category_id, unit},
      success: data => {
        alert('product has been added')
        $('#body-product').append(`
              <tr>
            <td>${productIndex+2}</td>
            <td>${data.product.name}</td>
            <td>${data.product.category.name}</td>
            <td>${0}</td>
            <td>${data.product.unit}</td>
            <td>
              <a class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
              <a class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>
            </td>
          </tr>
        `)
      }
      
    }))
  })
</script>

@endsection