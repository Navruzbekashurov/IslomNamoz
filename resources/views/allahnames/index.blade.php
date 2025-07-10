@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Alloh ismlari ro‘yxati</h2>
            <a href="{{ route('allahnames.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Yangi qo‘shish
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table">
                <tr>
                    <th style="width: 60px;">ID</th>
                    <th>Arabcha nom</th>
                    <th style="width: 220px;">Amallar</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($name as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td class="fs-5">{{ $item->name_arabic }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('allahnames.show', $item->id) }}" class="btn btn-info btn-sm" title="Ko‘rish">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('allahnames.edit', $item->id) }}" class="btn btn-warning btn-sm" title="Tahrirlash">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('allahnames.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Rostdan o‘chirmoqchimisiz?')" style="display: inline-block;">
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
                        <td colspan="3" class="text-center text-muted">Hozircha hech qanday ism mavjud emas.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $name->links() }}
        </div>
    </div>

    {{-- Font Awesome (fa-icons) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <style>
        .container {
            margin-top: 40px;
        }

        .table td {
            vertical-align: middle !important;
        }

        .btn-group .btn {
            margin-right: 4px;
        }

        .btn-group .btn:last-child {
            margin-right: 0;
        }
    </style>
@endsection
