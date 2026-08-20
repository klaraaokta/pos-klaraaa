@extends('layouts.app')

@section('title', 'Tambah Jenis')

@section('content')
    <form action="{{ route('jenis.store') }}" method="POST" enctype="multipart/form-data">
        @include('Jenis._form')
    </form>
@endsection
