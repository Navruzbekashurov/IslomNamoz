@extends('layouts.backend')

@section('content')
    <div class="container">
        {{-- Sarlavha va tugma yonma-yon joylashadi --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Hududlar ro‘yxati</h2>
            <a href="{{ route('region.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Yangi hudud qo‘shish
            </a>
        </div>

        @php
            $labels = \App\Enums\Language::labels();
        @endphp

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="thead">
                <tr>
                    <th style="width: 60px;">N</th>
                    <th>Viloyatlar</th>
                    <th style="width: 220px;">Amallar</th>
                </tr>
                </thead>
                <tbody>
                @forelse($region as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @foreach($labels as $code => $label)
                                @php
                                    $name = optional($item->content->firstWhere('language', $code))->field_value;
                                @endphp
                                <div>
                                    <strong>{{ $code }}:</strong> {{ $name ?? '—' }}
                                </div>
                            @endforeach
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('region.edit', $item->id) }}" class="btn btn-warning btn-sm" title="Tahrirlash">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('region.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Ishonchingiz komilmi?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" title="O‘chirish">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">Hozircha hech qanday hudud mavjud emas.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $region->links() }}
        </div>
    </div>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    {{-- Styling --}}
    <style>
        .container {
            margin-top: 40px;
        }

        .table th, .table td {
            vertical-align: middle !important;
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
