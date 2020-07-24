<template>
    <div class="pt-5">
        <h2 class="text-center">Услуги</h2>

        <div class="row justify-content-between align-items-center">
            <p class="mt-2">в списке: <span class="font-weight-bold">{{products.length}}</span> услуг(-а)</p>
            <div class="position-relative">
                <input type="text" class="search px-2" placeholder="Поиск..." v-on:keyup="search" ref="search">
            </div>
        </div>
        <!--<div class="">-->

        <!--</div>-->
        <div class="mt-5">
            <div class="row py-2 px-4">
                <div class="col-3">
                    <span class="list-title">Изображение</span>
                </div>
                <div class="col-4">
                    <span class="list-title">Название</span>
                </div>
                <!--<div class="col-3">-->
                <!--<span class="list-title">Описание</span>-->
                <!--</div>-->
                <div class="col-3">
                    <span class="list-title">Номер телефона</span>
                </div>
                <div class="col-2">
                    <span class="list-title">Действие</span>
                </div>
            </div>
            <div class="row list-point py-2 px-4 mb-1 position-relative" v-for="product in products">
                <div class="col-3">
                    <img :src="storage_url + '/storage/' + product.logo" class="user-image" style="border-radius: 0%;" alt="">
                </div>
                <div class="col-4">
                    <span class="">{{ product.title }}</span>
                </div>
                <!--<div class="col-3">-->
                <!--<span class="">{{ product.description }}</span>-->
                <!--</div>-->
                <div class="col-3">
                    <span class="">{{ product.phone1}}</span>
                </div>
                <div class="col-2">
                    <span class="text-center"><i class="fas fa-user-edit fa-lg user-edit" @click="product_profile(product.id)"></i></span>
                    <span class="text-center ml-2"><i class="fas fa-trash fa-lg user-delete" @click="deleteitems(product.id)"></i></span>
                </div>
                <div class="col-12 user-profile py-4 mt-2" v-if="profile == product.id">
                    <div class="row">
                        <div class="col-5 d-flex align-items-center justify-content-center">
                            <img :src="storage_url + '/storage/' + product.logo" class="user-image" alt="">
                        </div>
                        <div class="col-7 border-left">
                            <div class="form-group">
                                <label class="text-md-right">Название</label>
                                <input type="text" class="form-control rounded-10 shadow-sm" id="prof_title" name="name" :value="product.title" autocomplete="name" autofocus>
                            </div>
                            <!--<div class="form-group">-->
                            <!--<label class="text-md-right">Описание</label>-->
                            <!--<input type="text" class="form-control rounded-10 shadow-sm" id="prof_email" name="email" :value="product.description" autocomplete="name" autofocus>-->
                            <!--</div>-->
                            <div class="form-group">
                                <label class="d-block texmart-text-grey">Телефонный номер
                                </label>
                                <input type="text"
                                       class="form-control rounded-10 shadow-sm" id="prof_phone"
                                       name="user_phone" :value="product.phone1" autocomplete="phone">
                            </div>
                            <editor :value="product.description"
                                    api-key="7igxhp273q1om5tyajc6o1k5glvmodbbfjoq7e4n7x2b0lq8"
                                    id="prof_desc"
                                    :init="{

         height: auto,
         menubar: false,
       }"
                            />
                            <div class="my-2">
                                <button class="btn py-2 btn-success" @click="saveProfile(product)">Сохранить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Editor from '@tinymce/tinymce-vue'

    export default {
        // name: "UserIndexComponent",
        data: function () {
            return {
                storage_url: window.location.origin,
                products: [],
                profile: 0,
                type: 2
            }
        },

        components: {
            'editor': Editor
        },

        mounted() {
            this.update();
        },

        methods: {
            update: function () {
                axios.get('getproducts/' + this.type).then((response) => {
                    // console.log(response.data);
                    this.products = response.data;
                });

            },

            search: function () {
                const value = this.$refs.search.value != '' ? this.$refs.search.value : 'empty';
                console.log(value);
                axios.get('search_product/' +  value + '/' + this.type).then((response) => {
                    this.products = response.data;
                });
                // var elementId = this.$refs.search;
                // console.log(elementId.value)
            },

            product_profile(id) {
                if(this.profile == id)
                {
                    this.profile = 0;
                }
                else
                {
                    this.profile = id;
                }
            },

            deleteitems(id) {
                axios.get('/delete_products/' + id + '/' + this.type).then((response) => {
                    this.products = response.data;
                    this.$fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Услуга удалена',
                        showConfirmButton: false,
                        backdrop: false,
                        timer: 1500
                    });
                });
            },

            saveProfile(product) {
                var title = document.getElementById('prof_title');
                var desc = tinyMCE.get('prof_desc').getContent();
                var phone = document.getElementById('prof_phone');
                var us_index = this.products.indexOf(product);
                axios.post('update_product/' + this.type, {
                    id: product.id,
                    title: title.value,
                    desc: desc,
                    phone: phone.value
                }).then((response) => {
                    // user = response.data
                    // user.index();
                    Vue.set(this.products, us_index, response.data);
                    this.$fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Изменения сохранены',
                        showConfirmButton: false,
                        backdrop: false,
                        timer: 1500
                    })
                })
            }

        }
    }



</script>
