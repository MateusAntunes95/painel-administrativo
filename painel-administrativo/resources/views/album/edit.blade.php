@extends('layout', ['title' => 'Editando album'])
@section('content')
<form method="POST" action="{{ route('album.update', $album->id) }}">
    @csrf
    @method('PATCH')
    @include('album._form')
</form>
@endsection
