@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Moduł pacjentów')])

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
            <i class="material-icons">groups</i>
          </div>
        <h4 class="card-title">{{ $patient->name}}</h4>
      </div>
          <a class="nav-link" href="{{ URL::to('patients') }}">
            <i class="material-icons">arrow_back_ios</i>Wróć
          </a>
      <div class="card-body table-responsive">
          <table class="table table-hover">
            <tr>
              <td>Name:</td>
              <td>{{ $patient->name}}</td>
            </tr>
            <tr>
              <td>Email:</td>
              <td>{{ $patient->email}}</td>
            </tr>
            <tr>
              <td>Phone:</td>
              <td>{{ $patient->phone}}</td>
            </tr>
            <tr>
              <td>Address:</td>
              <td>{{ $patient->address}}</td>
            </tr>
            <tr>
              <td>Pesel:</td>
              <td>{{ $patient->pesel}}</td>
            </tr>
          </table>
      </div>
    </div>
  </div>
</div>


@endsection('content')
