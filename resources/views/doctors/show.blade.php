@extends('layouts.app', ['activePage' => 'dashboard','titlePage' => __('Moduł lekarzy')])

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
          <i class="material-icons">medication</i>
        </div>
        <h4 class="card-title">{{ $doctor->name }}</h4>
      </div>
        <a class="nav-link" href="{{ URL::to('doctors') }}">
          <i class="material-icons">arrow_back_ios</i>Wróć
        </a>
      <div class="card-body table-responsive">
        <table class="table">
          <tr>
            <td>Name:</td>
            <td>{{ $doctor->name}}</td>
          </tr>
          <tr>
            <td>Email:</td>
            <td>{{ $doctor->email}}</td>
          </tr>
          <tr>
            <td>Phone:</td>
            <td>{{ $doctor->phone}}</td>
          </tr>
          <tr>
            <td>Address:</td>
            <td>{{ $doctor->address}}</td>
          </tr>
          <tr>
            <td>Status:</td>
            <td>{{ $doctor->status}}</td>
          </tr>
          <tr>
            <td>Specjalizacja:</td>
            <td>
              <ul class="list-group list-group-flush">
                @foreach($doctor->specializations as $specializations)
                <li class="list-group-item">{{ $specializations->name }}</li>
                @endforeach
              </ul>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>


@endsection('content')
