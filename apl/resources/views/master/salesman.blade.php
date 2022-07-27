@extends('layouts.master')
@section('title', 'Salesman')
@section('breadcrumb')
<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted">Salesman</a>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('master.salesman') }}" class="text-muted">Salesman</a>
    </li>
</ul>
@endsection
    
@section('content')
    @livewire('master.salesman-index')
@endsection