@extends('layouts.simple')

@section('content')
    <div class="content">
        <h2 class="content-heading">Ramazon kuni tafsilotlari</h2>

        <div class="block block-rounded">
            <div class="block-content">
                <dl class="row mb-0">
                    <dt class="col-sm-3">Hudud</dt>
                    <dd class="col-sm-9">
                        {{ optional($ramadancalendar->region->content->firstWhere('language', 'uz'))->field_value ?? 'Nomaʼlum' }}
                    </dd>

                    <dt class="col-sm-3">Sana</dt>
                    <dd class="col-sm-9">{{ $ramadancalendar->date }}</dd>

                    <dt class="col-sm-3">Saharlik</dt>
                    <dd class="col-sm-9">{{ $ramadancalendar->suhoor_time }}</dd>

                    <dt class="col-sm-3">Iftorlik</dt>
                    <dd class="col-sm-9">{{ $ramadancalendar->iftar_time }}</dd>
                </dl>

                <a href="{{ route('ramadancalendar.index') }}" class="btn btn-secondary mt-4">Ortga</a>
            </div>
        </div>
    </div>
@endsection
