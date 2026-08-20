@extends('layouts.app')

@section('title', 'Edit Jenis')

@section('content')
    <form action="{{ route('jenis.update', $jenis) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('Jenis._form')
    </form>
@endsection
