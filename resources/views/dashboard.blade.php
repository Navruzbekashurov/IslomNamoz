@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="row items-push">
            <!-- Welcome Message -->

            <!-- Shortcut Cards -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-pop text-center" href="{{ route('allahnames.index') }}">
                    <div class="block-content">
                        <p class="fs-3 fw-semibold">99 Ismlar</p>
                        <p class="text-muted">Allohning 99 ismini boshqarish</p>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-pop text-center" href="{{ route('ramadancalendar.index') }}">
                    <div class="block-content">
                        <p class="fs-3 fw-semibold">Ramazon Taqvimi</p>
                        <p class="text-muted">Ramazon kunlarini boshqarish</p>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-pop text-center" href="{{ route('region.index') }}">
                    <div class="block-content">
                        <p class="fs-3 fw-semibold">Viloyatlar</p>
                        <p class="text-muted">Viloyatlarni boshqarish</p>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-pop text-center" href="{{ route('section.index') }}">
                    <div class="block-content">
                        <p class="fs-3 fw-semibold">Bo‘limlar</p>
                        <p class="text-muted">Din bo‘yicha bo‘limlarni boshqarish</p>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-pop text-center" href="{{ route('type.index') }}">
                    <div class="block-content">
                        <p class="fs-3 fw-semibold">Turlar</p>
                        <p class="text-muted">Kontent turlari ro‘yxati</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
