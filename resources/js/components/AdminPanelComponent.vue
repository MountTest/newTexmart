<template>
    <div class="row h-100 mx-0">
        <div class="col-lg-2 col-3 px-0">
            <div class="panel">
                <div class="sticky-top" style="top:14%;">
                    <div class="panel-point d-flex align-items-center px-4" :class="{active: point == 1}"
                         v-on:click="point = 1">
                        <i class="fas fa-users fa-2x"></i> <span class="ml-3">Пользователи</span>
                    </div>
                    <div class="panel-point d-flex align-items-center px-4" :class="{active: point == 2}"
                         v-on:click="point = 2">
                        <i class="fas fa-box-open fa-2x"></i> <span class="ml-3">Товары</span>
                    </div>
                    <div class="panel-point d-flex align-items-center px-4" :class="{active: point == 3}"
                         v-on:click="point = 3">
                        <i class="fas fa-handshake fa-2x"></i><span class="ml-3">Услуги</span>
                    </div>
                    <div class="panel-point d-flex align-items-center px-4" :class="{active: point == 4}"
                         v-on:click="point = 4">
                        <i class="fas fa-truck-loading fa-2x"></i> <span class="ml-3">Производители</span>
                    </div>
                    <div class="panel-point d-flex align-items-center px-4" :class="{active: point == 5}"
                         v-on:click="point = 5">
                        <i class="fas fa-newspaper fa-2x"></i> <span class="ml-3">Новости</span>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-10 col-9">
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
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                point: null,
            }
        },
    }
</script>

<style scoped>

</style>