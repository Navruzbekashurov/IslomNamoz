@extends('layouts.simple')

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Alloh ismini tahrirlash</h3>
            </div>

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

                <form action="{{ route('allahnames.update', $allahname->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Arabcha nom --}}
                    <div class="mb-4">
                        <label class="form-label" for="name_arabic">Arabcha nom</label>
                        <input type="text" id="name_arabic" name="name_arabic" class="form-control form-control-lg"
                               value="{{ old('name_arabic', $allahname->name_arabic) }}" required>
                    </div>

                    <hr>
                    <h4 class="content-heading">Kontentlar</h4>

                    @php
                        $labels = \App\Enums\Language::labels();
                    @endphp

                    @foreach ($allahname->content as $i => $content)
                        <div class="mb-4 p-3 rounded bg-body-light dark-mode bg-dark text-dark-mode">
                            <input type="hidden" name="content[{{ $i }}][id]" value="{{ $content->id }}">

                            <div class="mb-3">
                                <label class="form-label">Til</label>
                                <input type="text" class="form-control" value="{{ $labels[$content->language] ?? $content->language }}" disabled>
                                <input type="hidden" name="content[{{ $i }}][language]" value="{{ $content->language }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Maydon nomi</label>
                                <input type="text" name="content[{{ $i }}][field_name]" class="form-control"
                                       value="{{ old("content.$i.field_name", $content->field_name) }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Qiymat</label>
                                <input type="text" name="content[{{ $i }}][field_value]" class="form-control"
                                       value="{{ old("content.$i.field_value", $content->field_value) }}" required>
                            </div>
                        </div>
                    @endforeach

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save opacity-50 me-1"></i> Yangilash
                        </button>
                        <a href="{{ route('allahnames.index') }}" class="btn btn-secondary">
                            <i class="fa fa-arrow-left opacity-50 me-1"></i> Bekor qilish
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
