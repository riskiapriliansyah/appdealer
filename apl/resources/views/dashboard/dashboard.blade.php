@extends('layouts.master')
@section('title', 'Dashboard')
@section('breadcrumb')
<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted">Dashboard</a>
    </li>
</ul>
@endsection
    
@section('content')
    @livewire('dashboard.dashboard-index')
@endsection