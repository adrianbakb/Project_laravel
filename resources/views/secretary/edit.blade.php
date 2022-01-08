@extends('layouts.app', ['activePage' => 'Sekretarki', 'titlePage' => __('Moduł sekretarek')])

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
        <h3 class="card-title">Edycja sekretarki</h3>
      </div>
      <a class="nav-link" href="{{ URL::to('secretary') }}">
        <i class="material-icons">arrow_back_ios</i>Wróć
      </a>
      <div class="card-body table-responsive">
        <form action="{{ action('App\Http\Controllers\SecretaryController@editStore') }}" method="POST" role="form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <input type="hidden" name="id" value="{{ $secretary->id }}" />
          <div class="form-group">
            <label for="name">Imię i nazwisko: </label>
            <input type="text" class="form-control" name="name" value="{{ $secretary->name }}" />
          </div>
          <div class="form-group">
            <label for="email">Email: </label>
            <input type="text" class="form-control" name="email" value="{{ $secretary->email }}" />
          </div>
          <div class="form-group">
            <label for="phone">Phone: </label>
            <input type="text" class="form-control" name="phone" value="{{ $secretary->phone }}" />
          </div>
          <div class="form-group">
            <label for="address">Adres: </label>
            <input type="text" class="form-control" name="address" value="{{ $secretary->address }}" />
          </div>
          <div class="form-group">
            <label for="pesel">Pesel: </label>
            <input type="text" class="form-control" name="pesel" value="{{ $secretary->pesel }}" />
          </div>
          <div class="form-group">
            <label for="pesel">Status: </label><br>
              @if($secretary->status == 'Active')
                Aktywny<input type="radio" class="form-check-inline" name="status" value="Active" checked="checked"/>
                Nieaktywny<input type="radio" class="form-check-inline" name="status" value="Inactive" />
              @else
                Aktywny<input type="radio" class="form-check-inline" name="status" value="Active" />
                Nieaktywny<input type="radio" class="form-check-inline" name="status" value="Inactive" checked="checked" />
              @endif
          </div>
          <input type="submit" value="Edytuj" class="btn btn-primary"/>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection('content')
