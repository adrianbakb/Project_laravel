@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Moduł specializacji')])

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
            <i class="material-icons">add_circle_outline</i>
          </div>
          <h3 class="card-title">Dodawanie specjalizacji</h3>
        </div>
        <a class="nav-link" href="{{ URL::to('specializations') }}">
          <i class="material-icons">arrow_back_ios</i>Wróć
        </a>
        <div class="card-body table-responsive">
          <form action="{{ action('App\Http\Controllers\SpecializationController@store') }}" method="POST" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="form-group">
              <label for="name">Nazwa specjalizacji</label>
              <input type="text" class="form-control" name="name" />
            </div>
            <div class="card-footer">
            <input type="submit" value="Dodaj" class="btn btn-primary"/>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection('content')
