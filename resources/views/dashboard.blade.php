@extends('layouts.app', ['activePage' => 'Strona główna', 'titlePage' => __('Strona główna')])

@section('title')
@if (isset($title)){{$title }}
@endif
@endsection('title')

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">looks_one</i>
              </div>
              <p class="card-category">Dostępność</p>
              <h3 class="card-title">Lekarze</h3>
                <div class="card text-center">
                  @foreach ($docstatistics as $stat)
                    @if ($stat->status == "Active")
                      <p>Liczba lekarzy dostępnych: {{ $stat->user_count }}</p>
                    @endif
                    @if ($stat->status == "Inactive")
                      <p>Liczba lekarzy niedostępnych: {{ $stat->user_count }}</p>
                    @endif
                  @endforeach
                </div>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-danger">help_outline</i>
                <a href="{{ URL::to('doctors') }}">Więcej informacji o lekarzach...</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">groups</i>
              </div>
              <p class="card-category">Ilość</p>
              <h3 class="card-title">Pacjenci</h3>
              <div class="card text-center">

                    <p>Liczba wszystkich pacjentów: {{ $patstatistics}}</p>

              </div>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> Last 24 Hours
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">view_list</i>
              </div>
              <p class="card-category">Ilość</p>
              <h3 class="card-title">Wizyty</h3>
              <div class="card text-center">

                    <p>Liczba wszystkich wizyt: {{ $visitstatistics}}</p>

              </div>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">grade</i> Tracked from Github
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">grade</i>
              </div>
              <p class="card-category">Rodzaje</p>
              <h3 class="card-title">Specjalizacje</h3>
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
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">update</i> Just Updated
              </div>
            </div>
          </div>
        </div>
      </div>
          <i class="material-icons text-danger">send</i>
          <a href="{{ URL::to('message') }}">Wyślij zapytanie...</a>
      </div>
    </div>
  
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush
