<template>
    <div class="container">
        <div class="row justify-content-center mb-3 mt-5">
            <div class="col-sm-12">
                <h2 class="text-center">Статистика пользователей по регионам</h2>
                <pie-chart :chart-data="locates" :height="150" :options="{responsive: true, maintainAspectRation: true}"></pie-chart>
            </div>
        </div>
        <div class="row justify-content-center mb-3 mt-5">
            <div class="col-sm-12">
                <h2 class="text-center">Статистика по пользователям</h2>
                <line-chart :chart-data="users" :height="150" :options="{responsive: true, maintainAspectRation: true}"></line-chart>
            </div>
        </div>

        <div class="row justify-content-center mb-3 mt-5">
            <div class="col-sm-12">
                <h2 class="text-center">Статистика по заявкам</h2>

                <line-chart :chart-data="announces" :height="150" :options="{responsive: true, maintainAspectRation: true}"></line-chart>
            </div>
        </div>

        <div class="row justify-content-center mb-3 mt-5">
            <div class="col-sm-12">
                <h2 class="text-center">Статистика по товарам</h2>

                <line-chart :chart-data="products" :height="150" :options="{responsive: true, maintainAspectRation: true}"></line-chart>
            </div>
        </div>

        <div class="row justify-content-center mb-3 mt-5">
            <div class="col-sm-12">
                <h2 class="text-center">Статистика по услугам</h2>

                <line-chart :chart-data="services" :height="150" :options="{responsive: true, maintainAspectRation: true}"></line-chart>
            </div>
        </div>

        <div class="row justify-content-center mb-3 mt-5">
            <div class="col-sm-12">
                <h2 class="text-center">Статистика по производителям</h2>

                <line-chart :chart-data="productions" :height="150" :options="{responsive: true, maintainAspectRation: true}"></line-chart>
            </div>
        </div>
    </div>
</template>

<script>
    import LineChart from './LineChart'
    import PieChart from './PieChart'

    export default {
        components: {LineChart, PieChart},
        ncomponents: {
            LineChart,
            PieChart
        },
        data: function(){
            return {
                users: [],
                products: [],
                services: [],
                productions: [],
                announces: [],
                locates: []
            }
        },
        mounted() {
            this.update()
        },
        methods: {
            update: function () {
                axios.get('/getstatistic').then((response) => {
                    console.log(response.data.users);
                    this.users = response.data.users;
                    this.products = response.data.products;
                    this.services = response.data.services;
                    this.productions = response.data.productions;
                    this.announces = response.data.announces;
                    this.locates = response.data.locates;
                    // this.users = response.data.users;
                    // this.products = response.data.products;

                })
            }
        }
    }
</script>
