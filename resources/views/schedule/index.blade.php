@extends('layout.main')

@section('breadcrumb')
<li class="breadcrumb-item active">Schedule</li>

@endsection


@section('css')
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href={{ asset('plugins/datatables/dataTables.bootstrap4.css')}}>

@endsection

@section('content')
<div class="col-md-12">
  <div class="card card-primary card-outline">
    <div class="card-header">
      <h5 class="m-0">Schedule</h5>
    </div>
    <div class="card-body">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
            aria-selected="true">Feed</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
            aria-selected="false">Drug / Vitamin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
            aria-selected="false">Operational</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          @include('schedule.feed')
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          @include('schedule.drug')
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
          @include('schedule.operational')
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


@section('js')
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<!-- SlimScroll -->
<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/fastclick.js')}}"></script>
<script>
  $(function () {
      $("#example1").DataTable();
      $("#example2").DataTable();
      $("#example3").DataTable();
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass   : 'iradio_flat-green'
      })
    });
</script>
<!-- iCheck 1.0.1 -->
<script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
@endsection