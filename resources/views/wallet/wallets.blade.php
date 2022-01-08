@extends('layouts.admin')

@section('title')
    List of wallets
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
      <h3 class="card-title">List of wallets</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="wallets" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Title</th>
          <th>Credit</th>
          <th>Created date</th>
          <th>Updated date</th>
          <th>Tools</th>
        </tr>
        </thead>
        <tbody>
            @foreach ( $wallets as $wallet)
            <tr>
                <td>{{ $wallet->title }}</td>
                <td>{{ $wallet->credit }}</td>
                <td>{{ $wallet->created_at }}</td>
                <td>{{ $wallet->updated_at }}</td>
                <td>
                    <a href="{{ route('transaction_add' , ['deposit' , $wallet->id]) }}"><i class="fas fa-angle-double-up"></i></a> <a href="{{ route('transaction_add' , ['withdraw' , $wallet->id]) }}"><i class="fas fa-angle-double-down"></i></a>
                    <a href="{{ route('wallet_transaction' , [$wallet->id]) }}"><i class="fas fa-eye"></i></a> <a href="{{ route('wallet_edit' , [$wallet->id]) }}"><i class="fas fa-edit"></i></a>
                </td>
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
    $('#wallets').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
    });
</script>
@endsection
