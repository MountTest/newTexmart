<template>
    <div class="pt-5">
            <h2 class="text-center">Пользователи</h2>

        <div class="row justify-content-between align-items-center">
            <div>
            <button class="btn py-2 rounded-10 list-btn" :class="{active: check == 1}" v-on:click="check = 1" @click="update">
                Заказчики
            </button>
            <button class="btn py-2 rounded-10 list-btn" :class="{active: check == 2}" v-on:click="check = 2" @click="update">
                Производители
            </button>
            </div>
            <div class="position-relative">
                <input type="text" class="search px-2" placeholder="Поиск..." v-on:keyup="search" ref="search">
            </div>
        </div>
        <!--<div class="">-->
            <p class="mt-2">в списке: <span class="font-weight-bold">{{users.length}}</span> пользователь(-ей)</p>
        <!--</div>-->
        <div class="mt-5">
            <div class="row py-2 px-4">
                <div class="col-4">
                    <span class="list-title">ФИО</span>
                </div>
                <div class="col-3">
                    <span class="list-title">Email</span>
                </div>
                <div class="col-3">
                    <span class="list-title">Номер телефона</span>
                </div>
                <div class="col-1">
                    <span class="list-title">Действие</span>
                </div>
            </div>
            <div class="row list-point py-2 px-4 mb-1 position-relative" v-for="user in users">
                <div class="col-4">
                    <span class="">{{user.name}}</span>
                </div>
                <div class="col-3">
                    <span class="">{{ user.email}}</span>
                </div>
                <div class="col-3">
                    <span class="">{{ user.phone }}</span>
                </div>
                <div class="col-1">
                    <span class="text-center"><i class="fas fa-user-edit fa-lg user-edit" @click="user_profile(user.id)"></i></span>
                </div>
                <div class="col-12 user-profile py-4 mt-2" v-if="profile == user.id">
                    <div class="row">
                        <div class="col-5 d-flex align-items-center justify-content-center">
                            <img :src="storage_url + '/storage/' + user.avatar" class="user-image" alt="">
                        </div>
                        <div class="col-7 border-left">
                            <div class="form-group">
                                <label class="text-md-right">ФИО</label>
                                <input type="text" class="form-control rounded-10 shadow-sm" id="prof_name" name="name" :value="user.name" autocomplete="name" autofocus>
                            </div>
                            <div class="form-group">
                                <label class="text-md-right">Email</label>
                                <input type="text" class="form-control rounded-10 shadow-sm" id="prof_email" name="email" :value="user.email" autocomplete="name" autofocus>
                            </div>
                            <div class="form-group">
                                <label class="d-block texmart-text-grey">Телефонный номер
                                </label>
                                <input type="text"
                                       class="form-control rounded-10 shadow-sm" id="prof_phone"
                                       name="user_phone" :value="user.phone" autocomplete="phone">
                            </div>
                            <div class="my-2">
                                <button class="btn py-2 btn-success" @click="saveProfile(user)">Сохранить</button>
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
                users: [],
                check: 1,
                profile: 0
            }
        },

        mounted() {
            this.update();
        },

        methods: {
            update: function () {
                axios.get('getusers/' + this.check).then((response) => {
                    this.users = response.data;
                    // this.$fire({
                    //     position: 'top-end',
                    //     icon: 'success',
                    //     title: 'Данные пользователя изменены',
                    //     showConfirmButton: false,
                    //     backdrop: false,
                    //     timer: 1500
                    // })
                });

            },

            search: function () {
                const value = this.$refs.search.value != '' ? this.$refs.search.value : 'empty';
                console.log(value);
                axios.get('search_user/' +  value).then((response) => {
                    this.users = response.data;
                    this.check = null;
                });
                // var elementId = this.$refs.search;
                // console.log(elementId.value)
            },

            user_profile(id) {
                if(this.profile == id)
                {
                    this.profile = 0;
                }
                else
                {
                    this.profile = id;
                }
            },

            saveProfile(user) {
                var name = document.getElementById('prof_name');
                var email = document.getElementById('prof_email');
                var phone = document.getElementById('prof_phone');
                var us_index = this.users.indexOf(user);
                axios.post('update_user', {
                    id: user.id,
                    name: name.value,
                    email: email.value,
                    phone: phone.value
                }).then((response) => {
                    // user = response.data
                    // user.index();
                    Vue.set(this.users, us_index, response.data);
                    this.$fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Данные пользователя изменены',
                        showConfirmButton: false,
                        backdrop: false,
                        timer: 1500
                    })
                })
            }

        }
    }



</script>
