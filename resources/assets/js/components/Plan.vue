<template>
    <div class="container">
        <div class="loader" v-show="is_saving">
            <div class="loader-inner">
                <div class="inner-load">
                    <grid-loader :loading="is_saving"></grid-loader>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Plan <button type="button" class="btn btn-primary btn-xs pull-right" :class="{ 'btn-primary' : !is_saving, 'btn-success' : is_saving }" @click="save">Save</button></div>

                    <div class="panel-body">

                        <form>
                            <div class="form-group">
                                <h4>What is your starting hashrate?</h4>
                                <div class="col-md-2">
                                    <label>Starting Quantity</label>
                                    <input type="number" class="form-control" v-model="starting_quantity" />
                                </div>
                                <div class="col-md-2">
                                    <label>Hashrate</label>
                                    <v-select placeholder="Select Hashrate" v-model="starting_hashrate" :value.sync="starting_hashrate" :options="hashrates"></v-select>
                                </div>
                                <div class="col-md-2">
                                    <label>Reinvest</label>
                                    <div class="funkyradio">
                                        <div class="funkyradio-success">
                                            <input type="checkbox" checked name="reinvest" id="reinvest" v-model="reinvest"/>
                                            <label for="reinvest">Reinvest</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label>Reinvest Period</label>
                                    <v-select placeholder="Reinvest Period" :value.sync="reinvest_period" :options="periods"></v-select>
                                </div>
                                <div class="col-md-2">
                                    <label>Investment Term</label>
                                    <v-select placeholder="Investment Term" :value.sync="investment_term" :options="terms"></v-select>
                                </div>
                                <div class="col-md-2">
                                    <label>Stop Reinvesting</label>
                                    <v-select placeholder="Stop Reinvesting" :value.sync="stop_reinvesting" :options="terms"></v-select>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <h4>When will you be investing more hashrate?</h4>
                                </div>
                                <div v-for="(obj, ind) in investing_more">
                                    <iq :hashrates="hashrates" :obj.sync="obj" :index="ind"></iq>
                                    <div class="col-md-1">
                                        <label>&nbsp;</label>
                                        <button type="button" @click="addObjToInvesting" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-plus-sign"></span></button>
                                    </div>
                                    <div class="col-md-1">
                                        <label>&nbsp;</label>
                                        <button type="button" @click="removeObjFromInvesting(ind)" :class="{ 'disabled': investing_more.length == 1 }" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-remove"></span></button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import vselect from 'vue-select';
    import picker from './MonthYearPicker.vue';
    import iq from './InvestingQuantity.vue';
    import grid_loader from 'vue-spinner/src/GridLoader.vue';

    export default {
        components: {
            'v-select': vselect,
            'select-ym': picker,
            'Vue': Vue,
            'iq': iq,
            'grid-loader': grid_loader
        },
        mounted() {
            console.log('Component mounted.')
            this.token = $('meta[name=csrf-token]').attr("content");
        },
        data() {
            return {
                terms: ['10 Years', '9 Years', '8 Years', '7 Years', '6 Years', '5 Years', '4 Years', '3 Years', '2 Years', '1 Years'],
                investment_term: '10 Years',
                stop_reinvesting: '6 Years',
                hashrates: ['TH/s', 'GH/s', 'MH/s', 'kH/s'],
                periods: ['Daily', 'Monthly', 'Annually'],
                starting_quantity: 1,
                starting_hashrate: 'TH/s',
                reinvest: true,
                reinvest_period: 'Daily',
                investing_more: [
                    {
                        quantity: '',
                        hashrate: '',
                        date_selected: '',
                        month: '',
                        year: ''
                    }
                ],
                is_saving: false,
                token: ''
            };
        },
        methods: {
            changeDate(ym) {
                console.log(ym);
                this.investing_more[ym.index].date_selected = ym.text;
                this.investing_more[ym.index].month = ym.month;
                this.investing_more[ym.index].year = ym.year;
            },
            addObjToInvesting() {
                var obj = {
                    quantity: '',
                    hashrate: '',
                    date_selected: '',
                    month: '',
                    year: ''
                };
                this.investing_more.push(obj);
            },
            removeObjFromInvesting(index) {
                if(this.investing_more.length == 1)
                    return;

                console.log('index', index);

                this.investing_more.splice(index, 1);
            },
            save() {
                this.is_saving = true;
                var self = this;

                var obj = {
                    term: this.investment_term,
                    stop_term: this.stop_reinvesting,
                    starting_quantity: this.starting_quantity,
                    starting_hashrate: this.starting_hashrate,
                    reinvest: this.reinvest,
                    reinvest_period: this.reinvest_period,
                    reinvestments: this.investing_more,
                    _token: this.token
                };

                this.$http.post('/plans', obj).then(function(response) {
                    console.log('res', response);
                    window.location.href = '/home';
                    self.is_saving = false;
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

    .dropdown-toggle {
        height: 36px;
    }

    .funkyradio div {
        clear: both;
        /*margin: 0 50px;*/
        overflow: hidden;
    }

    .funkyradio label {
        /*min-width: 400px;*/
        width: 100%;
        border-radius: 3px;
        border: 1px solid #D1D3D4;
        font-weight: normal;
    }
    .funkyradio input[type="radio"]:empty, .funkyradio input[type="checkbox"]:empty {
        display: none;
    }
    .funkyradio input[type="radio"]:empty ~ label, .funkyradio input[type="checkbox"]:empty ~ label {
        position: relative;
        line-height: 2.5em;
        text-indent: 3.25em;
        /*margin-top: 2em;*/
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .funkyradio input[type="radio"]:empty ~ label:before, .funkyradio input[type="checkbox"]:empty ~ label:before {
        position: absolute;
        display: block;
        top: 0;
        bottom: 0;
        left: 0;
        content:'';
        width: 2.5em;
        background: #D1D3D4;
        border-radius: 3px 0 0 3px;
    }
    .funkyradio input[type="radio"]:hover:not(:checked) ~ label:before, .funkyradio input[type="checkbox"]:hover:not(:checked) ~ label:before {
        content:'\2714';
        text-indent: .9em;
        color: #C2C2C2;
    }
    .funkyradio input[type="radio"]:hover:not(:checked) ~ label, .funkyradio input[type="checkbox"]:hover:not(:checked) ~ label {
        color: #888;
    }
    .funkyradio input[type="radio"]:checked ~ label:before, .funkyradio input[type="checkbox"]:checked ~ label:before {
        content:'\2714';
        text-indent: .9em;
        color: #333;
        background-color: #ccc;
    }
    .funkyradio input[type="radio"]:checked ~ label, .funkyradio input[type="checkbox"]:checked ~ label {
        color: #777;
    }
    .funkyradio input[type="radio"]:focus ~ label:before, .funkyradio input[type="checkbox"]:focus ~ label:before {
        box-shadow: 0 0 0 3px #999;
    }
    .funkyradio-default input[type="radio"]:checked ~ label:before, .funkyradio-default input[type="checkbox"]:checked ~ label:before {
        color: #333;
        background-color: #ccc;
    }
    .funkyradio-primary input[type="radio"]:checked ~ label:before, .funkyradio-primary input[type="checkbox"]:checked ~ label:before {
        color: #fff;
        background-color: #337ab7;
    }
    .funkyradio-success input[type="radio"]:checked ~ label:before, .funkyradio-success input[type="checkbox"]:checked ~ label:before {
        color: #fff;
        background-color: #5cb85c;
    }
    .funkyradio-danger input[type="radio"]:checked ~ label:before, .funkyradio-danger input[type="checkbox"]:checked ~ label:before {
        color: #fff;
        background-color: #d9534f;
    }
    .funkyradio-warning input[type="radio"]:checked ~ label:before, .funkyradio-warning input[type="checkbox"]:checked ~ label:before {
        color: #fff;
        background-color: #f0ad4e;
    }
    .funkyradio-info input[type="radio"]:checked ~ label:before, .funkyradio-info input[type="checkbox"]:checked ~ label:before {
        color: #fff;
        background-color: #5bc0de;
    }
</style>