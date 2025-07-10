@extends('layouts.simple')

@section('content')
    <div class="content content-full">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Yangi Type qo‘shish</h3>
            </div>

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

                <form action="{{ route('type.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="form-label" for="name">Type nomi</label>
                        <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror"
                               name="name" id="name" value="{{ old('name') }}" placeholder="" required>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('type.index') }}" class="btn btn-secondary">Bekor qilish</a>
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-plus me-1"></i> Saqlash
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
