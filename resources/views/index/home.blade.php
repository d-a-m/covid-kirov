<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Covid-19</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, viewport-fit=cover">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
</head>
<body>

    <header>
        <div class="header__menu h-12 shadow-outline p-3">
            <div class="row">
                <div class="col-sm-4 logotype">
                    <div class="logotype__icon">
                        <img src="/img/icons/coronavirus.png" />
                    </div>
                    <div class="logotype__title">
                        <h1 class="logotype__title-name">Covid-19</h1>
                        <p class="logotype__title-description">Кировская область</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container" id="app">
        <section id="region-common-data" class="mb-4">
            <h2>Данные по Кировской области</h2>
            <div class="row info__today">
                <div class="col-sm col-12 mb-3 mb-sm-0">
                    <p class="info__today-value info__today-infected">
                        {{ number_format($regionCommonData['infected'], 0, ',', ' ') }}
                    </p>
                    <p class="info__today-value-description">Заражённые</p>
                </div>

                <div class="col-sm col-12 mb-3 mb-sm-0">
                    <p class="info__today-value info__today-recovered">
                        {{ number_format($regionCommonData['recovered'], 0, ',', ' ') }}
                    </p>
                    <p class="info__today-value-description">Выздоровевшие</p>
                </div>

                <div class="col-sm col-12 mb-3 mb-sm-0">
                    <p class="info__today-value info__today-died">
                        {{ number_format($regionCommonData['died'], 0, ',', ' ') }}
                    </p>
                    <p class="info__today-value-description">Смерти</p>
                </div>

                <div class="col-sm col-12 mb-3 mb-sm-0">
                    <p class="info__today-value info__today-isolated">
                        {{ number_format($regionCommonData['isolated'], 0, ',', ' ') }}
                    </p>
                    <p class="info__today-value-description">Под наблюдением</p>
                </div>

                <div class="col-sm col-12 mb-3 mb-sm-0">
                    <p class="info__today-value info__today-tested">
                        {{ number_format($regionCommonData['tested'], 0, ',', ' ') }}
                    </p>
                    <p class="info__today-value-description">Протестировано</p>
                </div>
            </div>
        </section>

        <section id="region-maps" class="mb-4">
            <h2>Распространение коронавируса по Кировской области</h2>
            <div class="row info__today">
                <div class="col-sm col-12 mb-3 mb-sm-0">
                    <p class="info__today-value info__today-infected">
                        486
                    </p>
                    <p class="info__today-value-description">Заражённые</p>
                </div>

                <div class="col-sm col-12 mb-3 mb-sm-0">
                    <p class="info__today-value info__today-recovered">
                        38
                    </p>
                    <p class="info__today-value-description">Выздоровевшие</p>
                </div>

                <div class="col-sm col-12 mb-3 mb-sm-0">
                    <p class="info__today-value info__today-died">
                        3
                    </p>
                    <p class="info__today-value-description">Смерти</p>
                </div>

                <div class="col-sm col-12 mb-3 mb-sm-0">
                    <p class="info__today-value info__today-isolated">
                        4644
                    </p>
                    <p class="info__today-value-description">Под наблюдением</p>
                </div>

                <div class="col-sm col-12 mb-3 mb-sm-0">
                    <p class="info__today-value info__today-tested">
                        38 000
                    </p>
                    <p class="info__today-value-description">Протестировано</p>
                </div>
            </div>
        </section>

        <section id="dynamics" class="mb-4">
            <div class="row info__today">
                <chart-tabs>
                    <template v-slot:tab1>
                        <h2>Заражённые коронавирусом в Кировской области</h2>
                        <div class="actualData row mt-3">
                            <div class="col-sm col-12 mb-3 mb-sm-0">
                                <p class="info__today-value info__today-infected">
                                    {{ number_format($kirov['infected'], 0, ',', ' ') }}
                                </p>
                                <p class="info__today-value-description">Заражённые</p>
                            </div>

                            <div class="col-sm col-12 mb-3 mb-sm-0">
                                <p class="info__today-value info__today-recovered">
                                    {{ number_format($kirov['recovered'], 0, ',', ' ') }}
                                </p>
                                <p class="info__today-value-description">Выздоровевшие</p>
                            </div>

                            <div class="col-sm col-12 mb-3 mb-sm-0">
                                <p class="info__today-value info__today-died">
                                    {{ number_format($kirov['dead'], 0, ',', ' ') }}
                                </p>
                                <p class="info__today-value-description">Смерти</p>
                            </div>
                        </div>
                        <dynamics-chart
                            chart="{{ json_encode($kirov['infectedChart']) }}"
                            item_name="Заражённые"
                            item_key="infected"
                            colors={{ json_encode(['#E3342F']) }}
                        ></dynamics-chart>
                    </template>

                    <template v-slot:tab2>
                        <h2>Заражённые коронавирусом в России</h2>

                        <div class="actualData row mt-3">
                            <div class="col-sm col-12 mb-3 mb-sm-0">
                                <p class="info__today-value info__today-infected">
                                    {{ number_format($russia['infected'], 0, ',', ' ') }}
                                </p>
                                <p class="info__today-value-description">Заражённые</p>
                            </div>

                            <div class="col-sm col-12 mb-3 mb-sm-0">
                                <p class="info__today-value info__today-recovered">
                                    {{ number_format($russia['recovered'], 0, ',', ' ') }}
                                </p>
                                <p class="info__today-value-description">Выздоровевшие</p>
                            </div>

                            <div class="col-sm col-12 mb-3 mb-sm-0">
                                <p class="info__today-value info__today-died">
                                    {{ number_format($russia['dead'], 0, ',', ' ') }}
                                </p>
                                <p class="info__today-value-description">Смерти</p>
                            </div>
                        </div>

                        <dynamics-chart
                            chart="{{ json_encode($russia['infectedChart']) }}"
                            item_name="Заражённые"
                            item_key="infected"
                            colors={{ json_encode(['#E3342F']) }}
                        ></dynamics-chart>
                    </template>

                    <template v-slot:tab3>
                        <h2>Заражённые коронавирусом в мире</h2>

                        <div class="actualData row mt-3">
                            <div class="col-sm col-12 mb-3 mb-sm-0">
                                <p class="info__today-value info__today-infected">
                                    {{ number_format($world['infected'], 0, ',', ' ') }}
                                </p>
                                <p class="info__today-value-description">Заражённые</p>
                            </div>

                            <div class="col-sm col-12 mb-3 mb-sm-0">
                                <p class="info__today-value info__today-recovered">
                                    {{ number_format($world['recovered'], 0, ',', ' ') }}
                                </p>
                                <p class="info__today-value-description">Выздоровевшие</p>
                            </div>

                            <div class="col-sm col-12 mb-3 mb-sm-0">
                                <p class="info__today-value info__today-died">
                                    {{ number_format($world['dead'], 0, ',', ' ') }}
                                </p>
                                <p class="info__today-value-description">Смерти</p>
                            </div>
                        </div>
                        <dynamics-chart
                                chart="{{ json_encode($world['infectedChart']) }}"
                                item_name="Заражённые"
                                item_key="infected"
                                colors={{ json_encode(['#E3342F']) }}
                        ></dynamics-chart>
                    </template>
                </chart-tabs>
            </div>
        </section>

        <section id="dynamics" class="mb-4">
            <h2>Распространение коронавируса по России на карте</h2>
            <div class="row mt-3">
                <div class="col-12">
                    <map-infected
                        points="{{ json_encode($regions['infectedMap']) }}"></map-infected>
                </div>

                <div class="col-12 mt-3">
                    <?php
                        $numOfCols = 2;
                        $rowCount = 0;
                        $bootstrapColWidth = 12 / $numOfCols;
                    ?>
                    <div class="region__wrapper">
                        <?php
                            foreach ($regions['infectedMap']->reverse() as $region) {
                        ?>
                            <div class="region">
                                <div class="region__city">
                                    {{ $region['slug'] }}
                                </div>
                                <div class="region__total">
                                    {{ $region['total'] }}
                                </div>
                                <div class="region__new">
                                    + {{ $region['new'] }}
                                </div>
                            </div>


                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <footer>

    </footer>

    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>