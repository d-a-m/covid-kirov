@if(isset($data))
    {{ Form::model($data, ['url' => route('admins.region-area-data.update', [$data->id]), 'method' => 'patch']) }}
@else
    {{ Form::open(['url' => route('admin.regions-area-data.store'), 'method' => 'post']) }}
@endif

    <div class="row">
        <div class="col-12">
            @include('forms.admin.date', ['key' => 'date', 'label' => 'Дата'])
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            @include('forms.admin.number', ['key' => 'infected', 'label' => 'Заражённые'])
        </div>

        <div class="col-4">
            @include('forms.admin.number', ['key' => 'recovered', 'label' => 'Выздоровевшие'])
        </div>

        <div class="col-4">
            @include('forms.admin.number', ['key' => 'died', 'label' => 'Умершие'])
        </div>

        <div class="col-4">
            @include('forms.admin.number', ['key' => 'infected', 'label' => 'Заражённые'])
        </div>

        <div class="col-4">
            @include('forms.admin.number', ['key' => 'tested', 'label' => 'Протестированные'])
        </div>

        <div class="col-4">
            @include('forms.admin.number', ['key' => 'isolated', 'label' => 'На контроле присмотром врачей'])
        </div>

        <div class="col-12">
            @include('forms.admin.select', ['key' => 'region', 'label' => 'Район области', 'list' => $regionsArea])
        </div>
    </div>



{{--'region' => 'required|string',--}}



    <div class="form-group">
        <input type="submit" value="Отправить" class="btn btn-primary">
    </div>

{{ Form::close() }}