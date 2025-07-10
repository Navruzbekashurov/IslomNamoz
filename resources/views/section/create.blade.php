@extends('layouts.simple')

@section('content')
    <div class="content">
        <h2 class="content-heading">Yangi Bo‘lim yaratish</h2>

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

                <form action="{{ route('section.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="form-label" for="type_id">Bo‘lim turi</label>
                        <select name="type_id" id="type_id" class="form-select" required>
                            <option value="">-- Tanlang --</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <h4 class="border-bottom pb-2 mb-3">Kontentlar</h4>

                    @php
                        $languages = \App\Enums\Language::cases();
                        $labels = \App\Enums\Language::labels();
                        $i = 0;
                    @endphp

                    @foreach($languages as $lang)
                        <div class="block block-bordered mb-4">
                            <div class="block-header">
                                <h5 class="block-title mb-0">{{ $labels[$lang->value] }}</h5>
                            </div>
                            <div class="block-content">
                                {{-- Name --}}
                                <input type="hidden" name="content[{{ $i }}][language]" value="{{ $lang->value }}">
                                <input type="hidden" name="content[{{ $i }}][field_name]" value="name">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="content[{{ $i++ }}][field_value]"
                                           class="form-control" placeholder="" required>
                                </div>

                                {{-- Description --}}
                                <input type="hidden" name="content[{{ $i }}][language]" value="{{ $lang->value }}">
                                <input type="hidden" name="content[{{ $i }}][field_name]" value="description">
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="content[{{ $i++ }}][field_value]"
                                              class="form-control"
                                              rows="4"
                                              placeholder="" required></textarea>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus me-1"></i> Saqlash
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
