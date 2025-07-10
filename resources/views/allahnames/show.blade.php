@extends('layouts.simple')

@section('content')
    <div class="container py-4">
        <h2 class="mb-3">{{ $allahname->name_arabic }}</h2>

        <div class="mb-4">
            <h4 class="mb-2">Kontentlar:</h4>
            <ul class="list-group">
                @forelse($allahname->content as $item)
                    <li class="list-group-item">
                        <strong>{{ strtoupper($item->language) }}:</strong>
                        <em>{{ $item->field_name }}</em> — {{ $item->field_value }}
                    </li>
                @empty
                    <li class="list-group-item text-muted">Kontentlar mavjud emas.</li>
                @endforelse
            </ul>
        </div>

        <a href="{{ route('allahnames.edit', $allahname) }}" class="btn btn-warning">
            ✏️ Tahrirlash
        </a>
    </div>
@endsection
