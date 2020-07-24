<template>
    <div class="row h-100 mx-0">
        <div class="col-lg-2 col-3 px-0">
            <div class="panel">
                <div class="sticky-top" style="top:14%;">
                    <div class="panel-point d-flex align-items-center px-4" :class="{active: point == 0}"
                         v-on:click="point = 0">
                        <div class="text-center" style="width:36px;">
                            <i class="fas fa-clipboard-list fa-2x"></i>
                        </div>
                        <span class="ml-3">Данные на проверку</span>
                    </div>
                    <div class="panel-point d-flex align-items-center px-4" :class="{active: point == 1}"
                         v-on:click="point = 1">
                        <div class="text-center" style="width:36px;">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                        <span class="ml-3">Пользователи</span>
                    </div>
                    <div class="panel-point d-flex align-items-center px-4" :class="{active: point == 7}"
                         v-on:click="point = 7">
                        <div class="text-center" style="width:36px;">
                            <i class="fas fa-list fa-2x"></i>
                        </div>
                         <span class="ml-3">Объявления</span>
                    </div>
                    <div class="panel-point d-flex align-items-center px-4" :class="{active: point == 2}"
                         v-on:click="point = 2">
                        <div class="text-center" style="width:36px;">
                            <i class="fas fa-box-open fa-2x"></i>
                        </div>
                        <span class="ml-3">Товары</span>
                    </div>
                    <div class="panel-point d-flex align-items-center px-4" :class="{active: point == 3}"
                         v-on:click="point = 3">
                        <div class="text-center" style="width:36px;">
                            <i class="fas fa-handshake fa-2x"></i>
                        </div>
                        <span class="ml-3">Услуги</span>
                    </div>
                    <div class="panel-point d-flex align-items-center px-4" :class="{active: point == 4}"
                         v-on:click="point = 4">
                        <div class="text-center" style="width:36px;">
                            <i class="fas fa-truck-loading fa-2x"></i>
                        </div>
                         <span class="ml-3">Производители</span>
                    </div>
                    <div class="panel-point d-flex align-items-center px-4" :class="{active: point == 5}"
                         v-on:click="point = 5">
                        <div class="text-center" style="width:36px;">
                            <i class="fas fa-newspaper fa-2x"></i>
                        </div>
                         <span class="ml-3">Новости</span>
                    </div>
                    <div class="panel-point d-flex align-items-center px-4" v-if="user == 1" :class="{active: point == 6}"
                         v-on:click="point = 6">
                        <div class="text-center" style="width:36px;">
                            <i class="fas fa-chart-bar fa-2x"></i>
                        </div>
                         <span class="ml-3">Статистика</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-10 col-9">
                <div class="container py-4 mt-5" v-if="point == 0">
                    <check-index-component></check-index-component>
                </div>
                <div class="container py-4 mt-5" v-if="point == 1">
                    <user-index-component></user-index-component>
                </div>
                <div class="container py-4 mt-5" v-if="point == 2">
                    <product-index-component></product-index-component>
                </div>
            <div class="container py-4 mt-5" v-if="point == 3">
                <service-index-component></service-index-component>
            </div>
            <div class="container py-4 mt-5" v-if="point == 4">
                <production-index-component></production-index-component>
            </div>
            <div class="container py-4 mt-5" v-if="point == 5 && this.$store.state.type == 1">
                <news-index-component></news-index-component>
            </div>
            <div class="container py-4 mt-5" v-if="point == 5 && this.$store.state.type == 2">
                <news-create-component></news-create-component>
            </div>
            <div class="container py-4 mt-5" v-if="point == 6 && user == 1">
                <statistic-index-component></statistic-index-component>
            </div>
            <div class="container py-4 mt-5" v-if="point == 7">
                <announce-index-component></announce-index-component>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
          'user'
        ],
        data: function () {
            return {
                point: null,
            }
        },
    }
</script>

<style scoped>

</style>