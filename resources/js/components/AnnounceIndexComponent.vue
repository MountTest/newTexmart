<template>
    <div class="pt-5">
        <h2 class="text-center">Заявки</h2>

        <div class="row justify-content-between align-items-center">
            <p class="mt-2">в списке: <span class="font-weight-bold">{{announces.length}}</span> заявок(-ка -ки)</p>
            <div class="position-relative">
                <input type="text" class="search px-2" placeholder="Поиск..." v-on:keyup="search" ref="search">
            </div>
        </div>
        <!--<div class="">-->

        <!--</div>-->
        <div class="mt-5">
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
                    <span class="text-center"><i class="fas fa-user-edit fa-lg user-edit" @click="product_profile(announce.id)"></i></span>
                    <span class="text-center ml-2"><i class="fas fa-trash fa-lg user-delete" @click="deleteitems(announce.id)"></i></span>
                </div>
                <div class="col-12 user-profile py-4 mt-2" v-if="profile == announce.id">
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
                                <button class="btn py-2 btn-success" @click="saveProfile(announce)">Сохранить</button>
                            </div>
                        </div>
                    </div>
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
                announces: [],
                profile: 0,
            }
        },


        mounted() {
            this.update();
        },

        methods: {
            update: function () {
                axios.get('getannounces').then((response) => {
                    // console.log(response.data);
                    this.announces = response.data;
                });

            },

            search: function () {
                const value = this.$refs.search.value != '' ? this.$refs.search.value : 'empty';
                console.log(value);
                axios.get('search_announce/' +  value).then((response) => {
                    this.announces = response.data;
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

            saveProfile(announce) {
                var title = document.getElementById('name');
                var desc = document.getElementById('desc');
                var phone = document.getElementById('phone');
                var email = document.getElementById('email');
                var us_index = this.announces.indexOf(announce);
                axios.post('update_announce', {
                    id: announce.id,
                    name: title.value,
                    desc: desc.value,
                    email: email.value,
                    phone: phone.value
                }).then((response) => {
                    // user = response.data
                    // user.index();
                    Vue.set(this.announces, us_index, response.data);
                    this.$fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Изменения сохранены',
                        showConfirmButton: false,
                        backdrop: false,
                        timer: 1500
                    })
                })
            },

            deleteitems(id) {
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