<template>
    <div class="pt-5">
            <div class="d-flex">
                <div class="d-flex align-items-center" style="color:#855d02; cursor:pointer;" @click="typechange">
                    <i class="fas fa-long-arrow-alt-left fa-2x"></i><span class="ml-3">Назад</span>
                </div>
            </div>
        <h2 class="text-center" v-if="news.description == null">Создать новость</h2>
        <h2 class="text-center" v-if="news.description != null">Редактирование новости</h2>

        <div class="container px-5 mt-5">
            <div class="row py-2 px-5">
                <div class="col-12 my-3">
                    <div class="form-group">
                        <label class="text-md-right">Название новости</label>
                        <input type="text" class="form-control rounded-10 shadow-sm" v-if="news.description == null" id="name" name="name" autocomplete="name" autofocus>
                        <input type="text" class="form-control rounded-10 shadow-sm" v-if="news.description != null" id="name" name="name" :value="news.title" autocomplete="name" autofocus>
                    </div>
                </div>
                <div class="col-12 my-3">
                    <div class="form-group text-center">
                        <img :src="storage_url + '/storage/' + news.preview" v-if="news.description != null" style="max-width:400px;" alt="">
                        <br>
                        <label class="text-md-right">Превью новости</label>
                        <input type="file" name="preview" id="image"
                               class="form-control">
                    </div>
                </div>
                <div class="col-12 my-3">
                    <div id="2">
                        <!--{{ news.description}}-->
                    <editor :value="news.description"
                            api-key="7igxhp273q1om5tyajc6o1k5glvmodbbfjoq7e4n7x2b0lq8"
                            id="desc"
                            :init="{
         height: 300,
         menubar: false,
       }"
                    />
                    </div>
                </div>
                <div class="col-12 text-center my-3">
                    <button class="btn bg-success py-2" @click="savenew">
                        Сохранить
                    </button>
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
                news: null,
            }
        },
        mounted() {
            if (this.$store.state.news != null){
                this.update();
            }
            else
            {
                this.news = {description : null};
                console.log(this.news);
            }

        },
        components: {
            'editor': Editor
        },

        methods: {
            update: function () {
                axios.get('get_new_edit/' + this.$store.state.news).then((response) => {
                    // console.log(response.data);
                    this.news = response.data;
                });

            },
            typechange: function () {
                this.$store.state.type = 1;
                this.$store.state.news = null;
            },

            savenew: function () {
                let formData = new FormData;
                formData.set('title', document.getElementById('name').value);
                formData.set('desc', tinyMCE.get('desc').getContent());
                formData.set('preview', document.getElementById('image').files[0]);
                formData.set('id', this.$store.state.news ? this.$store.state.news : null);
                // var title = ;
                // var preview = document.getElementById('image');
                // var desc = tinyMCE.get('desc').getContent();
                // var id = this.$store.state.news ? this.$store.state.news : null;
                // console.log(preview.files[0]);
                axios.post('store_new',  formData).then((response) => {
                    // user = response.data
                    // user.index();
                    this.$fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Новость сохранена',
                        showConfirmButton: false,
                        backdrop: false,
                        timer: 1500
                    });
                    this.$store.state.news = null;
                    this.$store.state.type = 1;

                })
            }

        }
    }
</script>

<style scoped>

</style>