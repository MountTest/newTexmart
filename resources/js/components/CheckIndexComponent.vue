<template>
    <div class="pt-5">
        <h2 class="text-center">Данные на проверку</h2>
        <div v-if="products != []">
        <div class="mt-5">
            <h3>Товары</h3>
            <div class="row py-2 px-4">
                <div class="col-3">
                    <span class="list-title">Изображение</span>
                </div>
                <div class="col-4">
                    <span class="list-title">Название</span>
                </div>
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
                    <span class="text-center ml-2"><i class="fas fa-trash fa-lg user-delete" @click="deleteitems(product.id, 1)"></i></span>
                </div>
                <div class="col-12 user-profile py-4 mt-2" v-if="profprod == product.id">
                    <div class="row">
                        <div class="col-5 d-flex align-items-center justify-content-center">
                            <img :src="storage_url + '/storage/' + product.logo" style="max-width:200px;" alt="">
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
                                <button class="btn py-2 btn-success" @click="saveProfile(product, 1)">Опубликовать</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div v-if="services != []">
            <div class="mt-5">
                <h3>Услуги</h3>
                <div class="row py-2 px-4">
                    <div class="col-3">
                        <span class="list-title">Изображение</span>
                    </div>
                    <div class="col-4">
                        <span class="list-title">Название</span>
                    </div>
                    <div class="col-3">
                        <span class="list-title">Номер телефона</span>
                    </div>
                    <div class="col-2">
                        <span class="list-title">Действие</span>
                    </div>
                </div>
                <div class="row list-point py-2 px-4 mb-1 position-relative" v-for="service in services">
                    <div class="col-3">
                        <img :src="storage_url + '/storage/' + service.logo" class="user-image" style="border-radius:0%;" alt="">
                    </div>
                    <div class="col-4">
                        <span class="">{{ service.title }}</span>
                    </div>
                    <!--<div class="col-3">-->
                    <!--<span class="">{{ product.description }}</span>-->
                    <!--</div>-->
                    <div class="col-3">
                        <span class="">{{ service.phone1}}</span>
                    </div>
                    <div class="col-2">
                        <span class="text-center"><i class="fas fa-user-edit fa-lg user-edit" @click="product_profile(service.id)"></i></span>
                        <span class="text-center ml-2"><i class="fas fa-trash fa-lg user-delete" @click="deleteitems(service.id, 2)"></i></span>
                    </div>
                    <div class="col-12 user-profile py-4 mt-2" v-if="profprod == service.id">
                        <div class="row">
                            <div class="col-5 d-flex align-items-center justify-content-center">
                                <img :src="storage_url + '/storage/' + service.logo" style="max-width:200px;" alt="">
                            </div>
                            <div class="col-7 border-left">
                                <div class="form-group">
                                    <label class="text-md-right">Название</label>
                                    <input type="text" class="form-control rounded-10 shadow-sm" id="prof_title" name="name" :value="service.title" autocomplete="name" autofocus>
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
                                           name="user_phone" :value="service.phone1" autocomplete="phone">
                                </div>
                                <editor :value="service.description"
                                        api-key="7igxhp273q1om5tyajc6o1k5glvmodbbfjoq7e4n7x2b0lq8"
                                        id="prof_desc"
                                        :init="{

         height: auto,
         menubar: false,
       }"
                                />
                                <div class="my-2">
                                    <button class="btn py-2 btn-success" @click="saveProfile(service, 2)">Опубликовать</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="productions != []">
            <div class="mt-5">
                <h3>Производство</h3>
                <div class="row py-2 px-4">
                    <div class="col-3">
                        <span class="list-title">Изображение</span>
                    </div>
                    <div class="col-4">
                        <span class="list-title">Название</span>
                    </div>
                    <div class="col-3">
                        <span class="list-title">Номер телефона</span>
                    </div>
                    <div class="col-2">
                        <span class="list-title">Действие</span>
                    </div>
                </div>
                <div class="row list-point py-2 px-4 mb-1 position-relative" v-for="production in productions">
                    <div class="col-3">
                        <img :src="storage_url + '/storage/' + production.logo" class="user-image" style="border-radius:0%;" alt="">
                    </div>
                    <div class="col-4">
                        <span class="">{{ production.title }}</span>
                    </div>
                    <!--<div class="col-3">-->
                    <!--<span class="">{{ product.description }}</span>-->
                    <!--</div>-->
                    <div class="col-3">
                        <span class="">{{ production.phone1}}</span>
                    </div>
                    <div class="col-2">
                        <span class="text-center"><i class="fas fa-user-edit fa-lg user-edit" @click="product_profile(production.id)"></i></span>
                        <span class="text-center ml-2"><i class="fas fa-trash fa-lg user-delete" @click="deleteitems(production.id, 3)"></i></span>
                    </div>
                    <div class="col-12 user-profile py-4 mt-2" v-if="profprod == production.id">
                        <div class="row">
                            <div class="col-5 d-flex align-items-center justify-content-center">
                                <img :src="storage_url + '/storage/' + production.logo" style="max-width:200px;" alt="">
                            </div>
                            <div class="col-7 border-left">
                                <div class="form-group">
                                    <label class="text-md-right">Название</label>
                                    <input type="text" class="form-control rounded-10 shadow-sm" id="prof_title" name="name" :value="production.title" autocomplete="name" autofocus>
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
                                           name="user_phone" :value="production.phone1" autocomplete="phone">
                                </div>
                                <editor :value="production.description"
                                        api-key="7igxhp273q1om5tyajc6o1k5glvmodbbfjoq7e4n7x2b0lq8"
                                        id="prof_desc"
                                        :init="{

         height: auto,
         menubar: false,
       }"
                                />
                                <div class="my-2">
                                    <button class="btn py-2 btn-success" @click="saveProfile(production, 3)">Опубликовать</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="announces != []">
            <!--<div class="">-->

            <!--</div>-->
            <div class="mt-5">
                <h3>Заявки</h3>
                <div class="row py-2 px-4">
                    <div class="col-3">
                        <span class="list-title">ФИО</span>
                    </div>
                    <div class="col-3">
                        <span class="list-title">Email</span>
                    </div>
                    <div class="col-3">
                        <span class="list-title">Номер телефона</span>
                    </div>
                    <div class="col-1">
                        <span class="list-title">Страна</span>
                    </div>
                    <div class="col-2">
                        <span class="list-title">Действие</span>
                    </div>
                </div>
                <div class="row list-point py-2 px-4 mb-1 position-relative" v-for="announce in announces">
                    <div class="col-3">
                        <span class="">{{ announce.name }}</span>
                    </div>
                    <div class="col-3">
                        <span class="">{{ announce.email }}</span>
                    </div>
                    <div class="col-3">
                        <span class="">{{ announce.phone}}</span>
                    </div>
                    <div class="col-1">
                        <span class="">{{ announce.locate}}</span>
                    </div>
                    <div class="col-2">
                        <span class="text-center"><i class="fas fa-user-edit fa-lg user-edit" @click="product_profile_anno(announce.id)"></i></span>
                        <span class="text-center ml-2"><i class="fas fa-trash fa-lg user-delete" @click="deleteitemsanno(announce.id)"></i></span>
                    </div>
                    <div class="col-12 user-profile py-4 mt-2" v-if="profanno == announce.id">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-md-right">Название</label>
                                    <input type="text" class="form-control rounded-10 shadow-sm" id="name" name="name" :value="announce.name" autocomplete="name" autofocus>
                                </div>
                                <div class="form-group">
                                    <label class="text-md-right">Email</label>
                                    <input type="email" class="form-control rounded-10 shadow-sm" id="email" name="name" :value="announce.email" autocomplete="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <label class="d-block texmart-text-grey">Телефонный номер
                                    </label>
                                    <input type="text"
                                           class="form-control rounded-10 shadow-sm" id="phone"
                                           name="phone" :value="announce.phone" autocomplete="phone">
                                </div>
                            </div>
                            <div class="col-6 border-left">
                                <div class="form-group">
                                    <label class="text-md-right">Описание</label>
                                    <br>
                                    <textarea class="p-2" style="border-color: rgba(0,0,0,0.2)" name="desc" id="desc" cols="50" rows="8">{{announce.content}}</textarea>
                                </div>
                                <!--<div class="form-group">-->
                                <!--<label class="text-md-right">Опубликованно?</label>-->
                                <!--<input type="checkbox" class="form-check-input" id="publish" :checked="isChecked(announce.check)">-->
                                <!--</div>-->
                                <div class="my-2">
                                    <button class="btn py-2 btn-success" @click="saveProfileAnno(announce)">Опубликовать</button>
                                </div>
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
        data: function () {
            return {
                storage_url: window.location.origin,
                products: [],
                services: [],
                productions: [],
                announces: [],
                profprod: 0,
                profanno: 0,
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
                axios.get('get_for_check').then((response) => {
                    // console.log(response.data);
                    this.products = response.data.products;
                    this.services = response.data.services;
                    this.productions = response.data.productions;
                    this.announces = response.data.announces;
                });
            },

            product_profile(id) {
                if(this.profprod == id)
                {
                    this.profprod = 0;
                }
                else
                {
                    this.profprod = id;
                }
            },

            saveProfile(product, type) {
                var title = document.getElementById('prof_title');
                var desc = tinyMCE.get('prof_desc').getContent();
                var phone = document.getElementById('prof_phone');

                axios.post('publish_product', {
                    id: product.id,
                    title: title.value,
                    desc: desc,
                    phone: phone.value
                }).then((response) => {
                    // user = response.data
                    // user.index();
                    console.log(type);
                    var us_index = null;
                    if (type == 1){
                        us_index = this.products.indexOf(product);
                        Vue.delete(this.products, us_index);
                    }
                    else if (type == 2){
                        us_index = this.services.indexOf(product);
                        Vue.delete(this.services, us_index);
                    }
                    else if (type == 3){
                        us_index = this.productions.indexOf(product);
                        Vue.delete(this.productions, us_index);
                    }
                    this.$fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Опубликовано',
                        showConfirmButton: false,
                        backdrop: false,
                        timer: 3500
                    })
                })
            },

            deleteitems(id, type) {
                axios.get('/delete_products/' + id + '/' + type).then((response) => {
                    if (type == 1) {
                        this.products = response.data;
                        this.$fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Товар удален',
                            showConfirmButton: false,
                            backdrop: false,
                            timer: 1500
                        });
                    }
                    else if (type == 2) {
                    this.services = response.data;
                    this.$fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Услуга удалена',
                        showConfirmButton: false,
                        backdrop: false,
                        timer: 1500
                    });
                    }
                    else if (type == 3) {
                        this.productions = response.data;
                        this.$fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Производство удалено',
                            showConfirmButton: false,
                            backdrop: false,
                            timer: 1500
                        });
                    }
                });
            },

            product_profile_anno(id) {
                if(this.profanno == id)
                {
                    this.profanno = 0;
                }
                else
                {
                    this.profanno = id;
                }
            },

            saveProfileAnno(announce) {
                var title = document.getElementById('name');
                var desc = document.getElementById('desc');
                var phone = document.getElementById('phone');
                var email = document.getElementById('email');
                var us_index = this.announces.indexOf(announce);
                axios.post('publish_announce', {
                    id: announce.id,
                    name: title.value,
                    desc: desc.value,
                    email: email.value,
                    phone: phone.value
                }).then((response) => {
                    // user = response.data
                    // user.index();
                    Vue.delete(this.announces, us_index);
                    this.$fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Опубликовано',
                        showConfirmButton: false,
                        backdrop: false,
                        timer: 3500
                    })
                })
            },

            deleteitemsanno(id) {
                axios.get('/delete_announces/' + id).then((response) => {
                    this.announces = response.data;
                    this.$fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Заявка удалена',
                        showConfirmButton: false,
                        backdrop: false,
                        timer: 1500
                    });
                });
            }
        }
    }
</script>

<style scoped>

</style>