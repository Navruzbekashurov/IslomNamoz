@extends('layouts.backend')

@section('content')
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Ramazon taqvimi</h2>
            <a href="{{ route('ramadancalendar.create') }}" class="btn btn-primary">+ Yangi kun qo‘shish</a>
        </div>

        <div class="block block-rounded">
            <div class="block-content block-content-full">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Hudud</th>
                            <th>Sana</th>
                            <th>Saharlik</th>
                            <th>Iftorlik</th>
                            <th>Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ramadancalendar as $day)
                            <tr>
                                <td>{{ $loop->iteration + ($ramadancalendar->currentPage() - 1) * $ramadancalendar->perPage() }}</td>
                                <td>{{ optional($day->region->content->firstWhere('language', 'uz'))->field_value ?? 'Nomaʼlum' }}</td>
                                <td>{{ $day->date }}</td>
                                <td>{{ $day->suhoor_time }}</td>
                                <td>{{ $day->iftar_time }}</td>
                                <td>
                                    <a href="{{ route('ramadancalendar.show', $day->id) }}" class="btn btn-sm btn-info">Ko‘rish</a>
                                    <a href="{{ route('ramadancalendar.edit', $day->id) }}" class="btn btn-sm btn-warning">Tahrirlash</a>
                                    <form action="{{ route('ramadancalendar.destroy', $day->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('O‘chirishga ishonchingiz komilmi?')">O‘chirish</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $ramadancalendar->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
