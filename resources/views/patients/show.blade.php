@extends('layouts.app', ['activePage' => 'Pacjenci', 'titlePage' => __('Moduł pacjentów')])

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
        <h4 class="card-title">{{ $patient->name ?? 'None'}}</h4>
      </div>
          <a class="nav-link" href="{{ URL::to('patients') }}">
            <i class="material-icons">arrow_back_ios</i>Wróć
          </a>
      <div class="card-body table-responsive">
          <table class="table table-hover">
            <tr>
              <td>Name:</td>
              <td>{{ $patient->name ?? 'None'}}</td>
            </tr>
            <tr>
              <td>Email:</td>
              <td>{{ $patient->email ?? 'None'}}</td>
            </tr>
            <tr>
              <td>Phone:</td>
              <td>{{ $patient->phone ?? 'None'}}</td>
            </tr>
            <tr>
              <td>Address:</td>
              <td>{{ $patient->address ?? 'None'}}</td>
            </tr>
            <tr>
              <td>Pesel:</td>
              <td>{{ $patient->pesel ?? 'None'}}</td>
            </tr>
          </table>
      </div>
    </div>
  </div>
</div>


@endsection('content')
