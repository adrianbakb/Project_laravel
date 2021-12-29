@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Moduł lekarzy')])

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
            <i class="material-icons">medication</i>
          </div>
          <h3 class="card-title">Lekarze</h3>
        </div>
        <div class="card-body table-responsive text-center">
          <table class="table table-hover">
            <thead>
              <tr>
                <th >#</th>
                <th >Name</th>
                <th >Email</th>
                <th >Phone</th>
                <th >Specializacja</th>
                <th >Status</th>
                <th >Operacje</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($doctorsList as $doctor)
              <tr>
                <th scope="row">{{ $doctor->id }}</th>
                  <td><a href="{{ URL::to('doctors/' .$doctor->id)}}"> {{ $doctor->name }}</td>
                  <td>{{ $doctor->email }}</td>
                  <td>{{ $doctor->phone }}</td>
                  <td>
                    <ul class="list-group list-group-flush">
                      @foreach($doctor->specializations as $specializations)
                      <li class="list-group-item">{{ $specializations->name }}</li>
                      @endforeach
                    </ul>
                  </td>
                  <td>{{ $doctor->status }}</td>
                  <td><a href="{{ URL::to('doctors/delete/' . $doctor->id ) }}" onclick="return confirm('Czy na pewno chcesz usunąć?')">Usuń lekarza</a><br>
                    <a href="{{ URL::to('doctors/edit/' . $doctor->id ) }}" >Edytuj lekarza</a></td>
              </tr>
              @endforeach
          </tbody>
        </table>
        </div>
        <div class="card-footer">
          <a href="{{ URL::to('/doctors/create' )}}">Dodaj nowego lekarza</a>
          <div class="stats">
            @foreach ($statistics as $stat)
              @if ($stat->status == "Active")
                Liczba lekarzy dostępnych: {{ $stat->user_count }}
                <br>
              @endif
              @if ($stat->status == "Inactive")
                Liczba lekarzy niedostępnych: {{ $stat->user_count }}
              @endif
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
