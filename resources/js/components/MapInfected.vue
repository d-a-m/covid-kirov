<template>
    <div class="map">
        <yandex-map
            :coords="this.center"
            :zoom="3"
            :controls="[]"
            :options="this.options"
            @boundschange="boundsChange"
        >
            <ymap-marker
                v-for="region in regions"
                :coords="region['coords']"
                :key="region['id']"
                :balloon-template="balloonTemplate(region)"
                marker-id="point.id"
                marker-type="Circle"
                :circle-radius="region['radius']"
                :marker-fill="getMarkerFill()"
                :marker-stroke="getMarkerStroke()"
            />
        </yandex-map>
    </div>
</template>

<script>
    import { yandexMap, ymapMarker } from 'vue-yandex-maps';

    export default {
        name: "MapInfected",
        components: { yandexMap, ymapMarker },
        props: {
            points: {
                type: String,
                required: true,
            }
        },
        data() {
            return {
                center: [58.603581, 49.667978],
                options: {
                    suppressMapOpenBlock: true,
                    minZoom: 1
                },
                regions: [],
            }
        },
        created() {
            this.prepareRegions(JSON.parse(this.points));
        },
        methods: {
            prepareRegions(data) {
                data.map(point => {
                        this.regions.push({
                            id: point['id'],
                            slug: point['slug'],
                            total: point['total'],
                            new: point['new'],
                            coords: this.prepareCoordinates(point['coords']),
                            radius: this.getMarkerRadius(point),
                            date: new Date(point['created_at']).toLocaleDateString('ru', {
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric',
                                hour: 'numeric',
                                minute: 'numeric',
                            })
                        })
                    });
            },

            boundsChange(map) {
                const newZoom = map.originalEvent.newZoom;
                this.center = map.originalEvent.newCenter;

                this.regions.map(region => {
                    region['radius'] = this.getMarkerRadius(region, newZoom);
                });
            },
            balloonTemplate(region) {
                return `
                    <div style="font: 13px/20px Montserrat,sans-serif">
                      <h2 style="font-size: 1rem; margin-bottom: 7px; font-weight: bold">${region.slug}</h2>
                      <p class="p-0 m-0"><strong>Заражённые</strong>: <span style="color: black">${region.total}</span></p>
                      <p class="p-0 m-0"><strong>Новые</strong>: <span style="color: red">${region.new}</span></p>

                      <p class="p-0 m-0 text-muted small">Обновлено: ${region.date}</p>
                    </div>`;
            },
            prepareCoordinates(coordinates) {
                const c = coordinates.split(',');
                return [c[1], c[0]];
            },
            getMarkerFill() {
                return {
                    enabled: true,
                    color: '#E3342F',
                    opacity: 0.5
                }
            },
            getMarkerStroke() {
                return {
                    color: '#E3342F',
                    opacity: 0.5,
                    width: 0
                }
            },
            getMarkerRadius(region, zoom = 3) {
                const total = region['total'];
                let k = 10;

                if (total < 100) {
                    k = 600;
                } else if (total < 500) {
                    k = 450;
                } else if (total < 1000) {
                    k = 300;
                } else if (total < 10000) {
                    k = 50;
                }

                return  (total * k) / zoom;
            }
        }
    }
</script>

<style scoped>
    .map {
        width: 100%;
        height: 300px;
    }

    .ymap-container {
        height: 100%;
        border: none;
        box-shadow: none;
        padding: 0;
    }
</style>