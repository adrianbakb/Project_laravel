@extends('layouts.app', ['activePage' => 'Sekretarki', 'titlePage' => __('Moduł sekretarek')])

@section('title')
@if (isset($title)){{$title }}
@endif
@endsection('title')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="card">
      @if ($errors->any())                                                            <!--wyświetlanie/obsługa błędów-->
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
          <li> {{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      <div class="card-header card-header-info text-center">
        <div class="card-icon">
            <i class="material-icons">add_circle_outline</i>
          </div>
        <h3 class="card-title">Dodaj sekretarkę</h3>
      </div>
        <a class="nav-link" href="{{ URL::to('secretary') }}">
          <i class="material-icons">arrow_back_ios</i>Wróć
        </a>
      <div class="card-body table-responsive">
        <form action="{{ action('App\Http\Controllers\SecretaryController@store') }}" method="POST" role="form">
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
          <input type="hidden" name="status" value="Active" />
          <input type="submit" value="Dodaj" class="btn btn-primary"/>
      </form>
      </div>
    </div>
  </div>
</div>
@endsection('content')
