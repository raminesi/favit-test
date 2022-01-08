@extends('layouts.admin')

@section('title')
    Add new wallet
@endsection

@section('content')
<div class="container-fluid">
    <form method="post" action="{{ route('wallet_store') }}" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Add new wallet</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control @if ($errors->has('title')) is-invalid @endif" id="title" placeholder="title" value="{{ old('title') }}">
                    @if ($errors->has('title'))
                        <span class="span-error">Please enter a title</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="description" class="form-control" id="description" placeholder="description" value="{{ old('description') }}">
                </div>

            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Status</label>
                    <div class="input-group">
                        <label><input name="status" value="active" type="radio" checked="checked" /> Active  ,</label>
                        <label><input name="status" value="inactive" type="radio"  /> Inactive  ,</label>
                        <label><input name="status" value="archive" type="radio"  /> Archive </label>
                    </div>
                  </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-info float-right">Submit</button>
                </div>
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </form>
</div>
@endsection
