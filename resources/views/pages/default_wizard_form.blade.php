@extends('admin.master')
@section('title')
    JUMIA
@endsection
@section('content')


    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                  {{--  <livewire:test />--}}
                    <livewire:wizard-form />
                </div>
            </div>
        </div>
    </div>
@endsection
