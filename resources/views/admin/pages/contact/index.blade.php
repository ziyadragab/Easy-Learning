@extends('admin.layouts.master')
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4>{{__('messages.all') .' '.__('messages.messages') }}</h4>
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
