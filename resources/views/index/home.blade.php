<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Заболевшие коронавирусом в Кирове и Кировской области | Статистика | Карта</title>
    <meta name="description" content="Последние новости и статистика по заболевшим коронавирусом (COVID-19) в Кирове и Кировской области от Минздрава и Роспотребнадзора." />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, viewport-fit=cover">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
</head>
<body>
    <div class="container" id="app">

        <div class="header__menu h-12 p-3 mb-4">
            <div class="row">
                <div class="col-12 col-sm-4 logotype">
                    <div class="logotype__title">
                        <h1 class="logotype__title-name">Covid-19</h1>
                        <p class="logotype__title-description">Коронавирус в Кировской области</p>
                    </div>
                </div>
                <div class="col-12 col-sm-8 menu">
                    <a href="#dynamics-map">Карта</a>
                    <a href="#phones">Телефоны</a>
                </div>
            </div>
        </div>

        <section id="alert" class="self-isolation mb-4">
            <h2>Режим самоизоляции в Кирове продлён до <u>11 мая</u></h2>
            <p>По данным постановления Правительства Кировской области №222-П от 30 апреля 2020 года</p>
        </section>

        <section id="operative-data" class="mb-4">
            <h2 class="mb-3">Последние новости</h2>

            <p>На сегодня, {{ \App\Helpers\DateHelper::getRussianToday() }}, в Кировской области, @if($kirov['infected']) было зафиксировано {{ number_format($kirov['infected'], 0, ',', ' ') }} @else не было зафиксировано @endif {{ \App\Helpers\StringHelper::getNumEnding($kirov['infected'], ['случай','случая','случаев']) }} заражения новой коронавирусной инфекцией (COVID - 19), смертей – {{ number_format($kirov['dead'], 0, ',', ' ') }}, выздоровевших – {{ number_format($kirov['recovered'], 0, ',', ' ') }}.</p>
            <p>Во всем мире заразилось {{ number_format($world['infected'], 0, ',', ' ') }} {{ \App\Helpers\StringHelper::getNumEnding($world['infected'], ['человек','человека','человек']) }}, {{ number_format($world['recovered'], 0, ',', ' ') }} {{ \App\Helpers\StringHelper::getNumEnding($world['recovered'], ['человек','человека','человек']) }} выздоровело и {{ number_format($world['dead'], 0, ',', ' ') }} {{ \App\Helpers\StringHelper::getNumEnding($world['dead'], ['человек','человека','человек']) }} погибло от коронавируса.</p>
        </section>

        <section id="dynamics-infected" class="mb-4">
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

                            <div class="col-sm col-12 mb-3 mb-sm-0">
                                <p class="info__today-value info__today-isolated">
                                    {{ number_format($kirov['isolated'], 0, ',', ' ') }}
                                </p>
                                <p class="info__today-value-description">Под наблюдением</p>
                            </div>

                            <div class="col-sm col-12 mb-3 mb-sm-0">
                                <p class="info__today-value info__today-tested">
                                    {{ number_format($kirov['tested'], 0, ',', ' ') }}
                                </p>
                                <p class="info__today-value-description">Протестировано</p>
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

                <div class="col-12">
                    <p class="text-right text-muted small mt-3">
                        Время обновления: {{ \App\Helpers\DateHelper::getRussianDate($world['updated_at']) }} <br />
                        Источники данных:

                        <a href="https://covid19.rosminzdrav.ru/" target="_blank" rel="nofollow" class="text-muted">Минздрав РФ</a>,
                        <a href="https://www.medkirov.ru/" target="_blank" rel="nofollow" class="text-muted">Минздрав Кировской области</a>
                        <a href="https://systems.jhu.edu/" target="_blank" rel="nofollow" class="text-muted">JHU CSSE</a>
                    </p>
                </div>
            </div>
        </section>

        <div class="row mb-0 mb-sm-4">
            <div class="col col-sm-4">
                <a href="https://medkirov.ru/" rel="nofollow" target="_blank" class="organization__link">
                    <div class="organization">
                        <div class="organization__logotype">
                            <img src="/img/organizations/medicine.jpg" alt="Министерство здравоохранения Кировской области"/>
                        </div>
                        <div class="organization__name">
                            Министерство здравоохранения Кировской области
                        </div>
                    </div>
                </a>
            </div>

            <div class="col col-sm-4">
                <a href="https://kirovreg.ru/" rel="nofollow" target="_blank" class="organization__link">
                    <div class="organization">
                        <div class="organization__logotype">
                            <img src="/img/organizations/government.jpg" alt="Правительство Кировской области"/>
                        </div>
                        <div class="organization__name">
                            Правительство Кировской области
                        </div>
                    </div>
                </a>
            </div>

            <div class="col col-sm-4">
                <a href="https://r43.fss.ru/" rel="nofollow" target="_blank" class="organization__link">
                    <div class="organization">
                        <div class="organization__logotype">
                            <img src="/img/organizations/social.jpg" alt="Кировское РО Фонда социального страхования"/>
                        </div>
                        <div class="organization__name">
                            Кировское РО Фонда социального страхования
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <section id="dynamics-map" class="mb-4">
            <h2>Распространение коронавируса по России на карте</h2>
            <div class="row mt-3">
                <div class="col-12">
                    <map-infected
                        points="{{ json_encode($regions['infectedMap']) }}"></map-infected>
                </div>

                <div class="col-12 mt-3">
                    <div class="region__wrapper">
                        @foreach ($regions['infectedMap']->reverse() as $region)
                            <div class="region">
                                <div class="region__city">
                                    {{ $region['slug'] }}
                                </div>
                                <div class="region__value">
                                    {{ number_format($region['total'], 0, ',', ' ') }}
                                    <div class="region__new">
                                        + {{ number_format($region['new'], 0, ',', ' ') }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-12">
                        <p class="text-right text-muted small mt-3">
                            Время обновления: {{ \App\Helpers\DateHelper::getRussianDate($region['updated_at']) }} <br />
                            Источники данных:
<<<<<<< HEAD
                            <a href="https://covid19.rosminzdrav.ru/" target="_blank" rel="nofollow" class="text-muted">Минздрав РФ</a>,
=======
                            <a href="https://covid19.rosminzdrav.ru/" target="_blank" rel="nofollow" class="text-muted">Минздраф РФ</a>,
>>>>>>> 481bcdc44728550b991e42a64af45380a111bdc7
                            <a href="https://vk.com/" target="_blank" rel="nofollow" class="text-muted">vk.com</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="phones" class="mb-4">
            <h2 class="mb-3">Важные телефоны</h2>

            <p class="phone">8-800-100-43-03</p>
            <p>Телефон горячей линии по коронавирусу (Covid-19) в Кировской области. По этому телефону необходимо сообщать о своём возвращении из-за границы или регионов Российской Федерации, где замечены случаи короновируса.</p>

            <p class="phone">8-800-201-21-09</p>
            <p>Единый телефон по вопросам социального обслуживания пожилых граждан и инвалидов.</p>

            <p class="phone">8 (8332) 40-67-24</p>
            <p>Информационная «горячая линия» Роспотребназдора в Кировской области.</p>

            <p class="phone">8 922-911-84-35</p>
            <p>Телефон «горячей линии» Государственной инспекции труда в Кировской области в связи с распространением коронавируса. Горячая линия работает до 17:00 30 апреля.</p>

            <p class="phone">8 (8332) 410-410</p>
            <p>Горячая линия для представителей бизнеса, на которой можно узнать о текущих разрешениях на работу определённых сфер и поддержки бизнеса.</p>

            <p class="phone">8-800-302-75-49</p>
            <p>Горячая линия ФСС по вопросам выплаты пособий и больничных листков из-за временной потери трудоспособности из-за карантина по коронавируса.</p>
        </section>
    </div>

    <footer>

    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(62483320, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/62483320" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->

</body>
</html>