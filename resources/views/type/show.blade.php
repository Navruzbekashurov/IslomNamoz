@extends('layouts.simple')

@section('content')
    <div class="container">
        <h2>Type ma'lumotlari</h2>

        <p><strong>ID:</strong> {{ $type->id }}</p>
        <p><strong>Nomi:</strong> {{ $type->name }}</p>

        <a href="{{ route('type.index') }}" class="btn btn-secondary mt-3">Ortga</a>
    </div>
@endsection
