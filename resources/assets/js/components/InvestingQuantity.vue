<template>
        <div>
            <div class="col-md-4">
                <label>Investing Quantity</label>
                <input type="number" placeholder="Select Quantity" class="form-control" v-model="obj.quantity" />
            </div>
            <div class="col-md-2">
                <label>Hashrate</label>
                <v-select placeholder="Select Hashrate" v-model="obj.hashrate" :value.sync="obj.hashrate" :options="hashrates"></v-select>
            </div>
            <div class="col-md-4">
                <label>When</label>
                <select-ym v-on:selected="changeDate" v-model="obj.date_selected" :default_date.sync="obj.date_selected" :parent_index="index"></select-ym>
            </div>
        </div>
</template>

<script>
    import vselect from 'vue-select';
    import picker from './MonthYearPicker.vue';

    export default {
        components: {
            'v-select': vselect,
            'select-ym': picker
        },
        mounted() {
            console.log('Component mounted.')
        },
        props: ['hashrates', 'obj', 'index'],
        data() {
            return {
//                quantity: '',
//                hashrate: '',
//                date_selected: '',
//                month: '',
//                year: ''
            };
        },
        methods: {
            changeDate(ym) {
                console.log('ym', ym);
                this.obj.date_selected = ym.text;
                this.obj.month = ym.month;
                this.obj.year = ym.year;
            }
        }
    }
</script>
