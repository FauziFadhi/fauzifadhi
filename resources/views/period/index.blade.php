@extends('layout.main')

@section('breadcrumb')
<li class="breadcrumb-item active">Period List</li>

@endsection

@section('css')
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href={{ asset('plugins/datatables/dataTables.bootstrap4.css')}}>

@endsection

@section('content')
<div class="col-md-12">
  <div class="card card-primary card-outline">
    <div class="card-header row">
      <h5 class="m-0">List Period</h5>
      <a href="/period/3/stock" class="btn ml-auto mr-5 btn-success">Create</a>
    </div>
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th style="width: 10%">No</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Total Chicken</th>
            <th>Total Income</th>
            <th style="width: 20%">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>2 January 2019</td>
            <td>5 June 2019</td>
            <td>4,529</td>
            <td>Rp. 56,452,000</td>
            <td>
              <a class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
              <a class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>7 June 2019</td>
            <td>12 October 2019</td>
            <td>4,783</td>
            <td>Rp. 59,236,000</td>
            <td>
              <a class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
              <a class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <th style="width: 10%">No</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Total Chicken</th>
            <th>Total Income</th>
            <th style="width: 20%">Action</th>
          </tr>
        </tfoot>
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
  $(function () {
      $("#example1").DataTable();
      // $('#example2').DataTable({
      //   "paging": true,
      //   "lengthChange": false,
      //   "searching": false,
      //   "ordering": true,
      //   "info": true,
      //   "autoWidth": false
      // });
    });
</script>
@endsection