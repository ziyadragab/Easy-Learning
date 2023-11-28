@extends('admin.layouts.master')
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-footer text-end w-2">
                            <a href="{{ route('admin.setting.create') }}" class="btn btn-primary">+ Add New Setting</a>
                        </div>
                        <h4>Setting</h4>
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
