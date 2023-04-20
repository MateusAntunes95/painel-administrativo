@extends('layout', ['title' => 'Editando úsuario'])
@section('content')
<form method="POST" action="{{ route('user.update', $user->id) }}">
    @csrf
    @method('PATCH')
    @include('user._form')
</form>
@endsection
