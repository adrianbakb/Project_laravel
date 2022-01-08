@extends('layouts.app', ['activePage' => 'Wiadomość', 'titlePage' => __('Moduł wiadomości')])


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
        <h3 class="card-title">Napisz zapytanie</h3>
      </div>
      <a class="nav-link" href="{{ URL::to('home') }}">
        <i class="material-icons">arrow_back_ios</i>Wróć
      </a>
      <div class="card-body table-responsive text-left">
        <form action="{{ action('App\Http\Controllers\MessageController@store') }}" method="POST" role="form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <div class="form-group">
            <label for="name">Pacjent: </label>
              <select name="patient">
                @foreach($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group">
            <label for="name">Sekretarka: </label>
              <select name="secretary">
                @foreach($secretary as $secretary)
                <option value="{{ $secretary->id }}">{{ $secretary->name }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group">
            <div class="card-body table-responsive text-left">
              <label for="message">Treść wiadomości:</label>
              <input type="text" class="form-control" name="message" placeholder="podaj cel wizyty" />
            </div>
          </div>
          <input type="submit" value="Wyślij" class="btn btn-primary"/>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection('content')
