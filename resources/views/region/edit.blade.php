@extends('layouts.simple')

@section('content')
    <div class="content">
        <h2 class="content-heading">Hududni tahrirlash</h2>

        <div class="block block-rounded">
            <div class="block-content">
                <form action="{{ route('region.update', $region->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @php
                        $languages = \App\Enums\Language::cases();
                        $labels = \App\Enums\Language::labels();
                        $translations = $region->content->keyBy('language');
                    @endphp

                    @foreach($languages as $i => $lang)
                        <div class="mb-4">
                            <label class="form-label">{{ $labels[$lang->value] }} nomi</label>
                            <input type="hidden" name="content[{{ $i }}][language]" value="{{ $lang->value }}">
                            <input type="hidden" name="content[{{ $i }}][field_name]" value="name">
                            <input type="hidden" name="content[{{ $i }}][id]" value="{{ $translations[$lang->value]->id ?? '' }}">
                            <input type="text"
                                   name="content[{{ $i }}][field_value]"
                                   class="form-control form-control-lg"
                                   value="{{ $translations[$lang->value]->field_value ?? '' }}"
                                   placeholder="Masalan: Toshkent"
                                   required>
                        </div>
                    @endforeach

                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save me-1"></i> Yangilash
                    </button>
                    <a href="{{ route('region.index') }}" class="btn btn-secondary ms-2">
                        <i class="fa fa-arrow-left me-1"></i> Ortga
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
