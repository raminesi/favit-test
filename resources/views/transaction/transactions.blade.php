@extends('layouts.admin')

@section('title')
    List of transactions
@endsection

@section('header')

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">List of transactions</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="transaction" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Title</th>
          <th>Date & Time</th>
          <th>Amount</th>
          <th>Type</th>
          <th>Created date</th>
        </tr>
        </thead>
        <tbody>
            @foreach ( $transactions as $transaction)
            <tr>
                <td>{{ $transaction->title }}</td>
                <td>{{ $transaction->date }}</td>
                <td>{{ $transaction->amount }}</td>
                <td>{{ $transaction->type }}</td>
                <td>{{ $transaction->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection


@section('header')
    <!-- DataTables  & Plugins -->
    <script src={{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src={{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src={{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src={{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src={{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src={{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src={{ asset('admin/plugins/jszip/jszip.min.js') }}"></script>
    <script src={{ asset('admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src={{ asset('admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src={{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src={{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src={{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
@endsection

@section('pageScript')
<script>
    $('#transaction').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
    });
</script>
@endsection
