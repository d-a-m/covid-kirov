<template>
    <div class="w-100">
        <apexchart type="bar" height="300" width="100%" :options="chartOptions" :series="series"></apexchart>
    </div>
</template>

<script>
    import VueApexCharts from 'vue-apexcharts';

    export default {
        name: "DynamicsChart",
        components: {
            'apexchart': VueApexCharts,
        },
        props: {
            chart: {
                type: String,
                required: true,
            },

            item_name: {
                type: String,
                required: true,
            },

            item_key: {
                type: String,
                required: true,
            },

            colors: {
                type: String,
                required: true,
            },

        },
        data() {
            return {
                series: [{
                    name: '',
                    data: []
                }],
                chartOptions: {
                    chart: {
                        type: 'column',
                        toolbar: {
                            show: false,
                        },
                    },
                    grid: {
                        show: false,
                    },
                    plotOptions: {
                        bar: {
                            dataLabels: {
                                position: 'top',
                            },
                        }
                    },
                    tooltip: {
                        enabled: true,
                        x: {
                            show:false,
                        }
                    },
                    dataLabels: {
                        enabled: false,
                        offsetY: -20,
                        style: {
                            fontSize: '12px',
                            fontFamily: 'Montserrat',
                            colors: ["#304758"]
                        }
                    },
                    xaxis: {
                        categories: [],
                        labels: {
                            show: false,
                        },
                        position: 'bottom',
                        axisBorder: {
                            show: false
                        },
                        axisTicks: {
                            show: false
                        },
                        tooltip: {
                            enabled: true,
                            offsetY: 0,
                            style: {
                                fontSize: 14,
                                fontFamily: 'Montserrat',
                                border: 0,
                            },
                        }
                    },
                    yaxis: {
                        tooltip: {
                            enabled: false,
                        },
                        axisBorder: {
                            show: false
                        },
                        axisTicks: {
                            show: false,
                        },
                        labels: {
                            show: false,
                        },
                        formatter: (value) => {
                            return value + '%';
                        }
                    },
                },
            }
        },
        created() {
            this.prepareColors();
            this.prepareDataName();
            this.prepareDataSeries();
        },
        methods: {
            prepareColors() {
                this.chartOptions.colors = JSON.parse(this.colors);
            },

            prepareDataName() {
                this.series[0].name = this.item_name;
            },

            prepareDataSeries() {
                const chartData = JSON.parse(this.chart);
                chartData.map((item) => {
                    this.series[0].data.push(item[this.item_key]);
                    this.chartOptions.xaxis.categories.push(
                        new Date(item['date']).toLocaleDateString('ru', {
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        })
                    );
                });
            }
        }
    }
</script>

<style scoped>

</style>