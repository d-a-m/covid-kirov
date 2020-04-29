<template>
    <div class="w-100">
        <ul class="tabs">
            <li v-for="tab in tabs" :class="{'is-active': tab.active}" @click="setActive(tab)">
                {{ tab.caption }}
            </li>
        </ul>

        <div v-for="(tab, index) in tabs">
            <div v-show="currentTab.id === index + 1">
                <slot :name="'tab' + (index + 1)"></slot>
            </div>
        </div>

    </div>
</template>

<script>
    import DynamicsChart from '../DynamicsChart';

    export default {
        name: "ChartTabs",
        components: {DynamicsChart},
        data() {
            return {
                tabs: [
                    {
                        id: 1,
                        caption: 'В Кирове',
                        active: true,
                    },
                    {
                        id: 2,
                        caption: 'В России',
                        active: false,
                    },
                    {
                        id: 3,
                        caption: 'В мире',
                        active: false,
                    },
                ]
            }
        },
        methods: {
            setActive(tab) {
                this.tabs.forEach(el => {
                    el.active = el === tab;
                })
            }
        },
        computed: {
            currentTab: function () {
                return this.tabs.reduce((accum, curr) => {
                    return curr.active ? curr : accum
                }, {});
            }
        }
    }
</script>

<style scoped lang="scss">
    .tabs {
        padding: 0;
        margin: 0 0 20px 0;

        & li {
            cursor: pointer;
            display: inline;
            list-style-type: none;
            border-bottom: 1px solid #e7e8ec;
            padding: 10px 15px;

            &:hover {
                border-bottom: 1px solid #333;
            }

            @media (max-width: 768px) {
                padding: 5px;
            }
        }

        li.is-active {
            border-bottom: 1px solid #333;
        }
    }
</style>