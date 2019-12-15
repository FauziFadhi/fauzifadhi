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
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#schedule" role="tab" aria-controls="schedule"
            aria-selected="false">Schedule Rule</a>
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
        <div class="tab-pane fade" id="schedule" role="tabpanel" aria-labelledby="home-tab">
          @include('period.schedule')
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
@php
$ayam = $products->where('name','Ayam')->first();
$banyakAyam = 0;
if($ayam)
$banyakAyam = $ayam->stock;
$totalBelanja = 0;
if($transactions->count() === 0)
$totalBelanja = 0;
else
$totalBelanja = $transactions->sum->total_cost;

@endphp
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
      $("#example2").DataTable();
      $("#example3").DataTable();
      // $('#example2').DataTable({
      //   "paging": true,
      //   "lengthChange": false,
      //   "searching": false,
      //   "ordering": true,
      //   "info": true,
      //   "autoWidth": false
      // });
    });
    $.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
  });



  var url = document.URL.split('/')
  var period_id = url[url.length-1]
  $('.period_id').val(period_id)
  let allTotal = 0;

  totalBiaya = 0;
  takTerduga = (e) => {
  totalBiaya = 0;
    var biaya = $('#biaya-tak-terduga')
    biaya.find("span").remove()
    biaya.append(`<span>${e.value}</span>`)
  totalBiaya = e.value;
  }

    var banyakAyam = "<?php echo $banyakAyam; ?>"
    var totalBelanja = "<?php echo $totalBelanja; ?>"
    totalGaji = 0;
  gaji = (e) => {
    totalGaji = 0;
    var gaji = $('#gaji-anak-kandang')
    gaji.find("span").remove()
    if(!banyakAyam)
      banyakAyam = 0
    total = e.value*banyakAyam 
    gaji.append(`<span>${total}</span>`)
    totalGaji = total;
  }

  totalPanen = 0
  panen = (e) => {
    totalPanen = 0;
    var panen = $('#panen')
    panen.find("span").remove()
    if(!banyakAyam)
      banyakAyam = 0
    total = e.value*banyakAyam 
    panen.append(`<span>${total}</span>`)
    totalPanen = total
  }
  $('#hitung').click(e => {
    if(totalPanen || totalBiaya || totalGaji || totalBelanja)
      return alert('isi data dengan benar')
    totalSemua = parseInt(totalPanen)-parseInt(totalBiaya)-parseInt(totalGaji)-parseInt(totalBelanja)
    $('#total').find("h3").remove()
    $('#total').append(`<h3>Total: ${totalSemua}</h3>`)
  })

</script>
@endsection