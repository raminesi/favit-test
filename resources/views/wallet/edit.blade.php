@extends('layouts.admin')

@section('title')
    Update wallet
@endsection

@section('content')
<div class="container-fluid">
    <form method="post" action="{{ route('wallet_update' , [$wallet->id]) }}" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Update wallet</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control @if ($errors->has('title')) is-invalid @endif" id="title" placeholder="title" value="@if(old('title')) {{ old('title') }} @else {{ $wallet->title }} @endif">
                    @if ($errors->has('title'))
                        <span class="span-error">Please enter a title</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="description" class="form-control" id="description" placeholder="description" value="@if(old('description')) {{ old('description') }} @else {{ $wallet->description }} @endif">
                </div>

            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Status</label>
                    <div class="input-group">
                        <label><input name="status" value="active" type="radio" @if($wallet->status == 'active') checked="checked" @endif /> Active  ,</label>
                        <label><input name="status" value="inactive" type="radio" @if($wallet->status == 'inactive') checked="checked" @endif  /> Inactive  ,</label>
                        <label><input name="status" value="archive" type="radio" @if($wallet->status == 'archive') checked="checked" @endif  /> Archive </label>
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
