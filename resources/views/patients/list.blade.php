@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Moduł pacjentów')])

@section('title')
@if (isset($title)){{$title }}
@endif
@endsection('title')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-info text-center">
        <div class="card-icon">
          <i class="material-icons">groups</i>
        </div>
        <h3 class="card-title">Pacjenci</h3>
      </div>
      <div class="card-body table-responsive text-center">
        <table class="table table-hover">
          <thead>
            <tr>
              <th >#</th>
              <th >Name</th>
              <th >Email</th>
              <th >Phone</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($patientsList as $patient)

            <tr>
              <th scope="row">{{ $patient->id }}</th>
              <td><a href="{{ URL::to('patients/' .$patient->id)}}"> {{ $patient->name }}</td>
                <td>{{ $patient->email }}</td>
                <td>{{ $patient->phone }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection('content')
