@extends('layouts.app', ['activePage' => 'Specjalizacje', 'titlePage' => __('Moduł specializacji')])

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
            <i class="material-icons">grade</i>
          </div>
          <h3 class="card-title">Specjalizacje</h3>
        </div>
        <div class="card-body table-responsive text-center">
          <table class="table table-hover">
            <thead>
              <tr>
                <th >#</th>
                <th >Name</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($specializations as $specializations)
              <tr>
                <th scope="row">{{ $specializations->id }}</th>
                <td><a href="{{ URL::to('doctors/specializations/' . $specializations->id )}}">{{ $specializations->name }}</a> </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="card-footer">
            <a href="{{ URL::to('/specializations/create' )}}">Dodaj nową specjalizację</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection('content')
