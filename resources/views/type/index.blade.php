@extends('layouts.backend')

@section('content')
    <div class="container">
        {{-- Sarlavha va tugma yonma-yon joylashadi --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Type ro‘yxati</h2>
            <a href="{{ route('type.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Yangi Type qo‘shish
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="thead">
                <tr>
                    <th style="width: 60px;">ID</th>
                    <th>Nomi</th>
                    <th style="width: 220px;">Amallar</th>
                </tr>
                </thead>
                <tbody>
                @forelse($type as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('type.show', $item->id) }}" class="btn btn-info btn-sm" title="Ko‘rish">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('type.edit', $item->id) }}" class="btn btn-warning btn-sm" title="Tahrirlash">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('type.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Haqiqatan o‘chirishni xohlaysizmi?')" style="display:inline-block;">
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
                        <td colspan="3" class="text-center text-muted">Hozircha hech qanday Type mavjud emas.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <style>
        .container {
            margin-top: 40px;
        }

        .table td, .table th {
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
