@extends('layouts.backend')

@section('content')
    <div class="container">
        {{-- Sarlavha va tugma yonma-yon joylashadi --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Bo'limlar ro'yxati</h2>
            <a href="{{ route('section.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Yangi Bo'lim yaratish
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped align-middle">
                <thead class="thead">
                <tr>
                    <th style="width: 50px;">ID</th>
                    <th>Bo‘lim Turi</th>
                    <th>Kontentlar</th>
                    <th style="width: 220px;">Amallar</th>
                </tr>
                </thead>
                <tbody>
                @forelse($section as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->type->name ?? '—' }}</td>
                        <td>
                            @foreach($item->content as $content)
                                <div class="mb-1">
                                    <strong>{{ $content->language }}:</strong>
                                    <span title="{{ $content->field_value }}">
                                        {{ Str::limit($content->field_name . ' — ' . $content->field_value, 50) }}
                                    </span>
                                </div>
                            @endforeach
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Action Buttons">
                                <a href="{{ route('section.show', $item->id) }}" class="btn btn-info btn-sm" title="Ko‘rish">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('section.edit', $item->id) }}" class="btn btn-warning btn-sm" title="Tahrirlash">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('section.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Ishonchingiz komilmi?')" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="O‘chirish">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">Hozircha hech qanday bo'lim mavjud emas.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $section->links() }}
        </div>
    </div>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <style>
        .container {
            margin-top: 40px;
        }

        .table th, .table td {
            vertical-align: top;
        }

        .thead-dark th {
            background-color: #343a40;
            color: #fff;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn-group .btn {
            margin-right: 4px;
        }

        .btn-group .btn:last-child {
            margin-right: 0;
        }
    </style>
@endsection
