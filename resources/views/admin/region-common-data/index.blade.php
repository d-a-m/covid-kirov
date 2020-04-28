@extends('layout.admin.app')

@section('content')

    @include('layout.admin.header')

    <div class="container">
        <div class="row">
            @include('layout.admin.sidebar')
            <div class="col-lg-9">
                @if($data->isNotEmpty())
                    @foreach($data as $item)
                        <div class="category">
                            <a href="{{ route('admin.region-common-data.edit', [$item->id]) }}">
                                Данные за {{ $item->date }} [id: {{ $item->id }}]
                            </a>

                            <div class="buttons">
                                <a href="{{ route('admin.region-common-data.destroy', [$item->id]) }}"
                                    data-method="delete" data-token="{{ csrf_token() }}"
                                    data-confirm="Удалить?"
                                    class="small text-muted"
                                >
                                    Удалить
                                </a>
                            </div>
                        </div>
                        <hr />
                    @endforeach

                    {{ $data->render() }}
                @else
                    <p>Список пуст.</p>
                @endif
            </div>
        </div>
    </div>
@stop

@section('script')
    <script src="/js/admin.js"></script>
@stop