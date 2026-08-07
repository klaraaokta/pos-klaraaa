@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<form action="{{ route('admin.users.update', $user) }}" method="post">
@include('users._form')
</form>
@endsection