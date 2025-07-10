@extends('layouts.simple')

@section('content')
    <div class="content">
        <h2 class="content-heading">Bo‘limni tahrirlash</h2>

        <div class="block block-rounded">
            <div class="block-content">
                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('section.update', $section->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="form-label" for="type_id">Bo‘lim turi</label>
                        <select name="type_id" id="type_id" class="form-select" required>
                            <option value="">-- Tanlang --</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}" {{ $section->type_id == $type->id ? 'selected' : '' }}>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <h4 class="border-bottom pb-2 mb-3">Kontentlar</h4>

                    @php
                        $labels = \App\Enums\Language::labels();
                        $grouped = $section->content->groupBy('language');
                        $i = 0;
                    @endphp

                    @foreach($grouped as $lang => $contents)
                        <div class="block block-bordered mb-4">
                            <div class="block-header">
                                <h5 class="block-title mb-0">{{ $labels[$lang] ?? $lang }}</h5>
                            </div>
                            <div class="block-content">
                                @foreach($contents as $content)
                                    <input type="hidden" name="content[{{ $i }}][id]" value="{{ $content->id }}">
                                    <input type="hidden" name="content[{{ $i }}][language]" value="{{ $lang }}">
                                    <input type="hidden" name="content[{{ $i }}][field_name]" value="{{ $content->field_name }}">

                                    @if ($content->field_name === 'name')
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="content[{{ $i++ }}][field_value]"
                                                   class="form-control"
                                                   value="{{ $content->field_value }}" required>
                                        </div>
                                    @elseif ($content->field_name === 'description')
                                        <div class="mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea name="content[{{ $i++ }}][field_value]"
                                                      class="form-control"
                                                      rows="4"
                                                      required>{{ $content->field_value }}</textarea>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save me-1"></i> Yangilash
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
