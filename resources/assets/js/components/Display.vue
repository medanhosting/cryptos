<template>
    <div class="container">
        <div class="loader" v-show="is_loading">
            <div class="loader-inner">
                <div class="inner-load">
                    <grid-loader :loading="is_loading"></grid-loader>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import grid_loader from 'vue-spinner/src/GridLoader.vue';

    export default {
        components: {
            'grid-loader': grid_loader
        },
        mounted() {
            console.log('Component mounted.');
            this.token = $('meta[name=csrf-token]').attr("content");
            this.init();
        },
        data() {
            return {
                is_loading: false,
                token: ''
            };
        },
        methods: {
            init() {
                this.$http.get('/get-plan').then(function(response) {

                }, function(response) {

                });
            }
        }
    }
</script>

<style>
    .loader {
        position: absolute;
        background: rgba(0,0,0,0.5);
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 9999999;
    }

    .loader div.loader-inner {
        position: absolute;
        top: 50%;
        left: 50%;
    }

    .loader div.loader-inner div.inner-load {
        position: relative;
        left: -50%;
    }

    .loader div.loader-inner div.inner-load p {
        color: #fff;
        text-align: center;
        font-weight: lighter;
    }
</style>