@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Moduł wizyt')])


@section('title')
@if (isset($title)){{$title }}
@endif
@endsection('title')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="card card-stats">
      <div class="card-header card-header-info text-center">
        <div class="card-icon">
            <i class="material-icons">view_list</i>
          </div>
        <h3 class="card-title">Dodaj wizytę</h3>
      </div>
      <a class="nav-link" href="{{ URL::to('visits') }}">
        <i class="material-icons">arrow_back_ios</i>Wróć
      </a>
      <div class="card-body table-responsive text-left">
        <form action="{{ action('App\Http\Controllers\VisitController@store') }}" method="POST" role="form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <div class="form-group">
            <label for="name">Lekarz: </label>
              <select name="doctor">
                @foreach($doctors as $doctor)
                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group">
            <label for="name">Pacjent: </label>
              <select name="patient">
                @foreach($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group">
            <div class="card-body table-responsive text-left">
              <label for="name">Data i godzina wizyty:</label>
              <input type="text" class="form-control" name="date" placeholder="yyyy-mm-dd 00:00:00" />
            </div>
          </div>
          <input type="submit" value="Dodaj" class="btn btn-primary"/>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection('content')
