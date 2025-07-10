@extends('layouts.simple')

@section('content')
    <div class="content content-full">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="bg-black-10-title">Yangi Alloh ismini qo‘shish</h3>
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

                <form action="{{ route('allahnames.store') }}" method="POST">
                    @csrf

                    <!-- Arabcha nom -->
                    <div class="mb-4">
                        <label class="form-label" for="name_arabic">Arabcha nom</label>
                        <input type="text" class="form-control form-control-lg @error('name_arabic') is-invalid @enderror"
                               id="name_arabic" name="name_arabic" value="{{ old('name_arabic') }}" required>
                        @error('name_arabic')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Ko‘p tilli kontent -->
                    <h4 class="content-heading">Tillar bo‘yicha nom va tavsif</h4>

                    @php
                        $languages = \App\Enums\Language::cases();
                        $labels = \App\Enums\Language::labels();
                        $i = 0;
                    @endphp

                    @foreach ($languages as $lang)
                        <div class="block block-bordered mb-3 p-3">
                            <h5 class="mb-3 text-primary">{{ $labels[$lang->value] }}</h5>

                            <!-- Name -->
                            <input type="hidden" name="content[{{ $i }}][language]" value="{{ $lang->value }}">
                            <input type="hidden" name="content[{{ $i }}][field_name]" value="name">
                            <div class="mb-3">
                                <label class="form-label">Ismi</label>
                                <input type="text" name="content[{{ $i++ }}][field_value]"
                                       class="form-control form-control-lg" placeholder="Masalan: Rahmon" required>
                            </div>

                            <!-- Description -->
                            <input type="hidden" name="content[{{ $i }}][language]" value="{{ $lang->value }}">
                            <input type="hidden" name="content[{{ $i }}][field_name]" value="description">
                            <div class="mb-3">
                                <label class="form-label">Tavsif</label>
                                <textarea name="content[{{ $i++ }}][field_value]"
                                          class="form-control" rows="2" placeholder="Masalan: Mehribon va rahmli..." required></textarea>
                            </div>
                        </div>
                    @endforeach

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('allahnames.index') }}" class="btn btn-secondary">Bekor qilish</a>
                        <button type="submit" class="btn btn-success">Saqlash</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
