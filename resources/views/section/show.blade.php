@extends('layouts.simple')

@section('content')
    <div class="container">
        <h2 class="mb-4">Section Ma'lumotlari</h2>

        <ul class="list-group mb-4">
            <li class="list-group-item">
                <strong>ID:</strong> {{ $section->id }}
            </li>
            <li class="list-group-item">
                <strong>Bo‘lim Turi (Type):</strong> {{ $section->type->name ?? '—' }}
            </li>
        </ul>

        <h4>Kontentlar</h4>
        @if($section->content->count())
            <ul class="list-group mb-4">
                @foreach($section->content as $content)
                    <li class="list-group-item">
                        <strong>{{ $content->language }}:</strong>
                        {{ ucfirst($content->field_name) }} — {{ $content->field_value }}
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-muted">Kontentlar mavjud emas.</p>
        @endif

        <a href="{{ route('section.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Ortga
        </a>
    </div>

    {{-- Font Awesome uchun --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <style>
        .container {
            margin-top: 30px;
        }

        .list-group-item {
            background-color: #f9f9f9;
            color: #212529;
            font-size: 1rem;
            padding: 0.75rem 1.25rem;
        }

        h4 {
            margin-top: 30px;
            margin-bottom: 15px;
        }
    </style>
@endsection
