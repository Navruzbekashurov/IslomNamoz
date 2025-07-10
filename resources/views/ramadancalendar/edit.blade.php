@extends('layouts.simple')

@section('content')
    <div class="content">
        <h2 class="content-heading">Ramazon kunini tahrirlash</h2>

        <div class="block block-rounded">
            <div class="block-content">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('ramadancalendar.update', $ramadancalendar->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Hudud tanlash --}}
                    <div class="mb-4">
                        <label class="form-label" for="region_id">Hudud</label>
                        <select name="region_id" id="region_id" class="form-select form-control-lg" required>
                            <option value="">-- Tanlang --</option>
                            @foreach($regions as $region)
                                <option value="{{ $region->id }}"
                                    {{ $region->id == $ramadancalendar->region_id ? 'selected' : '' }}>
                                    {{ optional($region->content->firstWhere('language', 'uz'))->field_value ?? 'Nomaʼlum' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Sana --}}
                    <div class="mb-4">
                        <label class="form-label" for="date">Sana</label>
                        <input type="date" name="date" id="date" class="form-control form-control-lg"
                               value="{{ $ramadancalendar->date }}" required>
                    </div>

                    {{-- Saharlik --}}
                    <div class="mb-4">
                        <label class="form-label" for="suhoor_time">Saharlik vaqti</label>
                        <input type="time" name="suhoor_time" id="suhoor_time" class="form-control form-control-lg"
                               value="{{ $ramadancalendar->suhoor_time }}" required>
                    </div>

                    {{-- Iftorlik --}}
                    <div class="mb-4">
                        <label class="form-label" for="iftar_time">Iftorlik vaqti</label>
                        <input type="time" name="iftar_time" id="iftar_time" class="form-control form-control-lg"
                               value="{{ $ramadancalendar->iftar_time }}" required>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-check me-1"></i> Yangilash
                        </button>
                        <a href="{{ route('ramadancalendar.index') }}" class="btn btn-secondary">
                            <i class="fa fa-arrow-left me-1"></i> Ortga
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
