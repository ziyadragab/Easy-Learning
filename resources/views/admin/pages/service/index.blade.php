@extends('admin.layouts.master')
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-footer text-end w-2">
                            <a href="{{ route('admin.service.create') }}" class="btn btn-primary">+ Add New Service</a>
                        </div>
                        <h4>All Services</h4>
                        {!! $dataTable->table(['class'=>'table table-bordered dt-table-hover dataTable text-center'])
                        !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
{!! $dataTable->scripts() !!}
@endpush
@endsection
