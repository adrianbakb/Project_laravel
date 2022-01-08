@extends('layouts.app', ['activePage' => 'Pacjenci', 'titlePage' => __('Moduł pacjentów')])

@section('title')
@if (isset($title)){{$title }}
@endif
@endsection('title')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-info text-center">
        <div class="card-icon">
          <i class="material-icons">groups</i>
        </div>
        <h3 class="card-title">Pacjenci</h3>
      </div>
      <div class="card-body table-responsive text-center">
        <table class="table table-hover">
          <thead>
            <tr>
              <th >#</th>
              <th >Imię i nazwisko</th>
              <th >Adres e-mail</th>
              <th >Telefon</th>
              <th >Operacje</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($patientsList as $patient)

            <tr>
              <th scope="row">{{ $patient->id }}</th>
              <td><a href="{{ URL::to('patients/' .$patient->id)}}"> {{ $patient->name }}</td>
                <td>{{ $patient->email }}</td>
                <td>{{ $patient->phone }}</td>
                <td><a href="{{ URL::to('patients/delete/' . $patient->id ) }}" onclick="return confirm('Czy na pewno chcesz usunąć?')">Usuń pacjenta</a><br>
                    <a href="{{ URL::to('patients/edit/' . $patient->id ) }}" >Edytuj pacjenta</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="card-footer">
          <a href="{{ URL::to('/patients/create' )}}">Dodaj pacjenta</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection('content')
