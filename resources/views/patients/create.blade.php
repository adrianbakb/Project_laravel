@extends('layouts.app', ['activePage' => 'Pacjenci', 'titlePage' => __('Moduł pacjentów')])

@section('title')
@if (isset($title)){{$title }}
@endif
@endsection('title')

@section('content')
<div class="content">
  @if ($errors->any())                                                            <!--wyświetlanie/obsługa błędów-->
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li> {{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-info text-center">
        <div class="card-icon">
            <i class="material-icons">add_circle_outline</i>
          </div>
        <h3 class="card-title">Dodaj pacjenta</h3>
      </div>
        <a class="nav-link" href="{{ URL::to('patients') }}">
          <i class="material-icons">arrow_back_ios</i>Wróć
        </a>
      <div class="card-body table-responsive">
        <form action="{{ action('App\Http\Controllers\PatientController@store') }}" method="POST" role="form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="form-group">
              <label for="name">Imię i nazwisko</label>
              <input type="text" class="form-control" name="name" />
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email" />
            </div>
            <div class="form-group">
              <label for="password">Hasło</label>
              <input type="password" class="form-control" name="password" />
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" name="phone" />
            </div>
            <div class="form-group">
              <label for="address">Adres</label>
              <input type="text" class="form-control" name="address" />
            </div>
            <div class="form-group">
              <label for="pesel">Pesel</label>
              <input type="text" class="form-control" name="pesel" />
            </div>
          <input type="submit" value="Dodaj" class="btn btn-primary"/>
      </form>
      </div>
    </div>
  </div>
</div>
@endsection('content')
