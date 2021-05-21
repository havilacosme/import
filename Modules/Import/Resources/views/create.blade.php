@extends('adminlte::page')

@section('title', 'Importação CSV')

@section('content_header')
@endsection

@section('content')
    <div class="card card-info">
      <div class="card-header card-theme">
        <h3 class="card-title">Importação CSV</h3>
      </div>
      <form class="form-horizontal" action="{{ route('import.store') }}" method="POST" enctype="multipart/form-data">
            @include('import::form')
      </form>
    </div>
@endsection

@section('footer')
  <div class="float-right d-none d-sm-block">
    <b>Versão</b> 1.0.0
  </div>
  <strong>Copyright &copy; 2020-2030 <a href="#">GigaDados Tecnologia </a>.</strong> Todos os direitos reservado.
@endsection

@section('css')
@endsection