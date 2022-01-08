@extends('layouts.admin')

@section('title')
    List of users
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
      <h3 class="card-title">List of users</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="users" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Created date</th>
          <th>Created update</th>
          <th>Tools</th>
        </tr>
        </thead>
        <tbody>
            @foreach ( $users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
                <td>
                    <a href="{{ route('user_wallets' , [$user->id]) }}"><i class="fas fa-eye"></i></a>
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
    $('#users').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
    });
</script>
@endsection
