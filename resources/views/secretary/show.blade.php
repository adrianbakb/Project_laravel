@extends('layouts.app', ['activePage' => 'Sekretarki','titlePage' => __('Moduł sekretarek')])

@section('title')
@if (isset($title)){{$title }}
@endif
@endsection('title')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-info">
        <div class="card-icon">
          <i class="material-icons">work</i>
        </div>
        <h4 class="card-title">{{ $secretary->name ?? 'None' }}</h4>
      </div>
        <a class="nav-link" href="{{ URL::to('secretary') }}">
          <i class="material-icons">arrow_back_ios</i>Wróć
        </a>
      <div class="card-body table-responsive">
        <table class="table">
          <tr>
            <td>Name:</td>
            <td>{{ $secretary->name ?? 'None'}}</td>
          </tr>
          <tr>
            <td>Email:</td>
            <td>{{ $secretary->email ?? 'None'}}</td>
          </tr>
          <tr>
            <td>Phone:</td>
            <td>{{ $secretary->phone ?? 'None'}}</td>
          </tr>
          <tr>
            <td>Address:</td>
            <td>{{ $secretary->address ?? 'None'}}</td>
          </tr>
          <tr>
            <td>Status:</td>
            <td>{{ $secretary->status ?? 'None'}}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>


@endsection('content')
