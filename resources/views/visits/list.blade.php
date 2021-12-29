@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Moduł wizyt')])

@section('title')
@if (isset($title)){{$title }}
@endif
@endsection('title')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card card-stats">
        <div class="card-header card-header-info text-center">
          <div class="card-icon">
            <i class="material-icons">view_list</i>
          </div>
            <h3 class="card-title">Wizyty</h3>
        </div>
      <div class="card-body table-responsive text-center">
        <table class="table table-hover">
          <thead>
            <tr>
              <th >#</th>
              <th >Pacjent</th>
              <th >Lekarz</th>
              <th >Data</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($visits as $visits)

            <tr>
              <th scope="row">{{ $visits->id}}</th>
              <td> {{ $visits->patient->name }} ({{ $visits->patient->pesel }})</td>
              <td>{{ $visits->doctor->name }}</td>
              <td> {{ $visits->date }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
        <div class="card-footer">
            <a href="{{ URL::to('/visits/create' )}}">Dodaj nową wizytę</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection('content')
