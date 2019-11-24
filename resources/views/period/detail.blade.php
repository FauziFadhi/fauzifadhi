@extends('layout.main')

@section('breadcrumb')
<li class="breadcrumb-item active">Period Detail</li>

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
    <div class="card-header">
      <h5 class="m-0">Detail</h5>
    </div>
    <div class="card-body">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#stock" role="tab" aria-controls="stock"
            aria-selected="true">Add Stock</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#report" role="tab" aria-controls="report"
            aria-selected="false">Report</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="stock" role="tabpanel" aria-labelledby="home-tab">
          @include('period.add-stock')
        </div>
        <div class="tab-pane fade" id="report" role="tabpanel" aria-labelledby="profile-tab">
          @include('period.report')
        </div>
      </div>
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