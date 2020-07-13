<template>
    <div class="pt-5">
        <h2 class="text-center">Новости</h2>

        <div class="row justify-content-between align-items-center">
            <p class="mt-2">в списке: <span class="font-weight-bold">{{news.length}}</span> Новости(-ей)</p>
            <div class="position-relative">
                <input type="text" class="search px-2" placeholder="Поиск..." v-on:keyup="search" ref="search">
            </div>
        </div>
        <div class="row justify-content-end">
            <button class="btn bg-success py-2 text-white rounded-10" @click="typechange">Создать новость</button>
        </div>
        <!--<div class="">-->

        <!--</div>-->
        <div class="mt-5">
            <div class="row py-2 px-4">
                <div class="col-4">
                    <span class="list-title">Изображение</span>
                </div>
                <div class="col-7">
                    <span class="list-title">Название</span>
                </div>
                <!--<div class="col-3">-->
                <!--<span class="list-title">Описание</span>-->
                <!--</div>-->
                <!--<div class="col-3">-->
                    <!--<span class="list-title">Номер телефона</span>-->
                <!--</div>-->
                <div class="col-1">
                    <span class="list-title">Действие</span>
                </div>
            </div>
            <div class="row list-point py-2 px-4 mb-1 position-relative" v-for="new_one in news">
                <div class="col-4 px-5">
                    <img :src="storage_url + '/storage/' + new_one.preview" class="img-fluid" style="border-radius: 0%;" alt="">
                </div>
                <div class="col-7">
                    <span class="">{{ new_one.title }}</span>
                </div>
                <div class="col-1">
                    <span class="text-center"><i class="fas fa-user-edit fa-lg user-edit" @click="editchange(new_one.id)"></i></span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        // name: "UserIndexComponent",
        data: function () {
            return {
                storage_url: window.location.origin,
                news: [],
            }
        },

        mounted() {
            this.update();
        },

        methods: {
            update: function () {
                axios.get('getnews/').then((response) => {
                    // console.log(response.data);
                    this.news = response.data;
                });

            },

            search: function () {
                const value = this.$refs.search.value != '' ? this.$refs.search.value : 'empty';
                // console.log(value);
                axios.get('search_news/' +  value + '/').then((response) => {
                    this.news = response.data;
                });
                // var elementId = this.$refs.search;
                // console.log(elementId.value)
            },

            typechange: function () {
                this.$store.state.type = 2;
            },

            editchange(id) {
                this.$store.state.type = 2;
                this.$store.state.news = id;
            }
        }
    }



</script>
