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
      <a id="period-create" class="btn ml-auto mr-5 btn-success">Create</a>
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
          @foreach ($periods as $index => $period)

          <tr>
            <td>{{$index+1}}</td>
            <td>{{$period->start_date}}</td>
            <td>{{$period->end_date}}</td>
            <td>{{$period->total_chicken | 0}}</td>
            <td>{{$period->total_income | 0}}</td>
            <td>
              <a class="btn btn-sm btn-success" href="{{ route('periods.show',$period->id) }}"><i
                  class="fa fa-edit"></i></a>
            </td>
            @endforeach
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
  $.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
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
  $('#period-create').click(e => {
    e.preventDefault()
    var date = new Date()
    var start_date = `${date.getFullYear()}-${date.getMonth()+1}-${date.getDate()}`
    $.ajax({
      type: 'POST',
      url: 'periods',
      data: {
        start_date
      },
      success: data => {
      alert('new period is created')
      error: (error, xhr) => {
        alert(error)
      }
location.href = data
},
error: function (request, status, error) {
alert(request.responseText);
}
})
})
</script>
@endsection