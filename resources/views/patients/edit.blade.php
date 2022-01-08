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
          <i class="material-icons">edit</i>
        </div>
        <h3 class="card-title">Edycja pajcenta</h3>
      </div>
      <a class="nav-link" href="{{ URL::to('patients') }}">
        <i class="material-icons">arrow_back_ios</i>Wróć
      </a>
      <div class="card-body table-responsive">
        <form action="{{ action('App\Http\Controllers\PatientController@editStore') }}" method="POST" role="form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <input type="hidden" name="id" value="{{ $patient->id }}" />
          <div class="form-group">
            <label for="name">Imię i nazwisko: </label>
            <input type="text" class="form-control" name="name" value="{{ $patient->name }}" />
          </div>
          <div class="form-group">
            <label for="email">Email: </label>
            <input type="text" class="form-control" name="email" value="{{ $patient->email }}" />
          </div>
          <div class="form-group">
            <label for="phone">Phone: </label>
            <input type="text" class="form-control" name="phone" value="{{ $patient->phone }}" />
          </div>
          <div class="form-group">
            <label for="address">Adres: </label>
            <input type="text" class="form-control" name="address" value="{{ $patient->address }}" />
          </div>
          <div class="form-group">
            <label for="pesel">Pesel: </label>
            <input type="text" class="form-control" name="pesel" value="{{ $patient->pesel }}" />
          </div>
          <input type="submit" value="Edytuj" class="btn btn-primary"/>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection('content')
