@extends('layout', ['title' => 'Criar album'])
@section('content')
<form method="post" enctype="multipart/form-data" action="{{ route('album.store') }}">
    @csrf
    @include('album._form')
</form>
@endsection