@extends('layouts.admin')

@section('title')
    Add new transaction
@endsection

@section('content')
<div class="container-fluid">
    <form method="post" action="{{ route('transaction_store') }}" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Add new transaction ({{ $type }})</h3>
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
                    <label>Amount</label>
                    <input type="text" name="amount" class="form-control @if ($errors->has('amount')) is-invalid @endif" id="amount" placeholder="amount" value="{{ old('amount') }}">
                    @if ($errors->has('amount'))
                        <span class="span-error">Please enter a amount</span>
                    @endif
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Date and Time</label>
                    <input type="datetime-local" name="date" class="form-control @if ($errors->has('date')) is-invalid @endif" id="date" placeholder="date" value="{{ old('date') }}">
                    @if ($errors->has('date'))
                        <span class="span-error">Please enter a date</span>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input name="type" type="hidden" value="{{ $type }}" />
                    <input name="wallet_id" type="hidden" value="{{ $wallet->id }}" />
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
