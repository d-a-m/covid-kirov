<div class="col-lg-3">
    <ul class="list-group">
        <li class="list-group-item">
            <ul class="list-unstyled">
                <li><a href="{{ route('admin.index') }}">Админпанель</a></li>
                <li><a href="{{ route('home') }}">На сайт</a></li>
            </ul>
        </li>
        <li class="list-group-item">
            <h5>Данные по районам области</h5>
            <ul class="list-group-sublist">
                <li><a href="{{ route('admin.regions-area-data.index') }}">Все данные по районам</a></li>
                <li><a href="{{ route('admin.regions-area-data.create') }}">Добавить данные</a></li>
            </ul>
        </li>

        <li class="list-group-item">
            <h5>Данные по области</h5>
            <ul class="list-group-sublist">
                <li><a href="{{ route('admin.region-common-data.index') }}">Все данные по области</a></li>
                <li><a href="{{ route('admin.region-common-data.create') }}">Добавить данные</a></li>
            </ul>
        </li>
    </ul>
</div>