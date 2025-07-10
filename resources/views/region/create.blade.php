@extends('layouts.simple')

@section('content')
    <div class="content">
        <h2 class="content-heading">Yangi hudud qo‘shish</h2>

        <div class="block block-rounded">
            <div class="block-content">
                <form action="{{ route('region.store') }}" method="POST">
                    @csrf

                    @php
                        $languages = \App\Enums\Language::cases();
                        $labels = \App\Enums\Language::labels();
                    @endphp

                    @foreach($languages as $i => $lang)
                        <div class="mb-4">
                            <label class="form-label">{{ $labels[$lang->value] }}</label>
                            <input type="hidden" name="content[{{ $i }}][language]" value="{{ $lang->value }}">
                            <input type="hidden" name="content[{{ $i }}][field_name]" value="name">
                            <input type="text"
                                   name="content[{{ $i }}][field_value]"
                                   class="form-control form-control-lg"
                                   placeholder="Example: Tashkent"
                                   required>
                        </div>
                    @endforeach

                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check me-1"></i> Saqlash
                    </button>
                    <a href="{{ route('region.index') }}" class="btn btn-secondary ms-2">
                        <i class="fa fa-arrow-left me-1"></i> Ortga
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
