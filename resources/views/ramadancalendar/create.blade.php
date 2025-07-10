@extends('layouts.backend')

@section('content')
    <div class="content">
        <div class="block block-rounded shadow-sm">
            <div class="block-header block-header-default">
                <h3 class="block-title">Ramazon kunini qo‘shish</h3>
            </div>

            <div class="block-content">
                {{-- Xatoliklar --}}
                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('ramadancalendar.store') }}" method="POST">
                    @csrf

                    {{-- Hudud --}}
                    <div class="mb-4">
                        <label class="form-label" for="region_id">Hududni tanlang</label>
                        <select name="region_id" id="region_id" class="form-select" required>
                            <option value="">-- Tanlang --</option>
                            @foreach($regions as $region)
                                <option value="{{ $region->id }}">
                                    {{ optional($region->content->firstWhere('language', 'uz'))->field_value ?? 'Nomaʼlum' }}
                                </option>
                            @endforeach
                        </select>
                        <div class="form-text text-muted">Hudud bo‘yicha taqvim belgilanishi kerak</div>
                    </div>

                    {{-- Sana --}}
                    <div class="mb-4">
                        <label class="form-label" for="date">Sana</label>
                        <div class="input-group">
                            <input type="date" name="date" id="date" class="form-control" required>
                            <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                        </div>
                    </div>

                    {{-- Saharlik --}}
                    <div class="mb-4">
                        <label class="form-label" for="suhoor_time">Saharlik vaqti (HH:MM)</label>
                        <div class="input-group">
                            <input type="time" name="suhoor_time" id="suhoor_time" class="form-control" required>
                            <span class="input-group-text"><i class="fa fa-moon"></i></span>
                        </div>
                    </div>

                    {{-- Iftorlik --}}
                    <div class="mb-4">
                        <label class="form-label" for="iftar_time">Iftorlik vaqti (HH:MM)</label>
                        <div class="input-group">
                            <input type="time" name="iftar_time" id="iftar_time" class="form-control" required>
                            <span class="input-group-text"><i class="fa fa-sun"></i></span>
                        </div>
                    </div>

                    {{-- Tugmalar --}}
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="{{ route('ramadancalendar.index') }}" class="btn btn-secondary">
                            <i class="fa fa-arrow-left opacity-50 me-1"></i> Orqaga
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-save opacity-50 me-1"></i> Saqlash
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Font Awesome agar kerak bo‘lsa --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
@endsection
