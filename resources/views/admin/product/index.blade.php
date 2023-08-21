@extends('layouts.admin')


@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            @if(session("message"))
                <div class="alert alert-success">
                    {{session("message")}}
                </div>
            @endif
           <livewire:admin.product.index />
        </div>
    </div>
@endsection
