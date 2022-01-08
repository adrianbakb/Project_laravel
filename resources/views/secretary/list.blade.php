@extends('layouts.app', ['activePage' => 'Sekretarki', 'titlePage' => __('Moduł sekretarek')])

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
            <i class="material-icons">work</i>
          </div>
          <h3 class="card-title">Sekretarki</h3>
        </div>
        <div class="card-body table-responsive text-center">
          <table class="table table-hover">
            <thead>
              <tr>
                <th >#</th>
                <th >Name</th>
                <th >Email</th>
                <th >Phone</th>
                <th >Status</th>
                <th >Operacje</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($secretaryList as $secretary)
              <tr>
                <th scope="row">{{ $secretary->id }}</th>
                  <td><a href="{{ URL::to('secretary/' .$secretary->id)}}"> {{ $secretary->name }}</td>
                  <td>{{ $secretary->email }}</td>
                  <td>{{ $secretary->phone }}</td>
                  <td>{{ $secretary->status }}</td>
                  <td><a href="{{ URL::to('secretary/delete/' . $secretary->id ) }}" onclick="return confirm('Czy na pewno chcesz usunąć?')">Usuń sekretarkę</a><br>
                    <a href="{{ URL::to('secretary/edit/' . $secretary->id ) }}" >Edytuj sekretarkę</a></td>
              </tr>
              @endforeach
          </tbody>
        </table>
        </div>
        <div class="card-footer">
          <a href="{{ URL::to('/secretary/create' )}}">Dodaj nową sekretarkę</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
