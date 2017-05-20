<template>
    <div class="ui fluid search selection dropdown"
         :class="{ 'active visible':showMenu, 'error': isError }">
        <i class="dropdown icon" @click="openMenu"></i>
        <input class="search" type="text" autocomplete="off" tabindex="0" v-model="default_date"
               @focus="openMenu"
               @blur="blurInput"
               @keyup.delete="deleteInput"
               placeholder="Select Date"
        />
        <!--<div class="text">test</div>-->
        <div class="menu" :class="menuClass" :style="menuStyle" tabindex="-1">
            <div class="picker" @mousedown="mousedownItem" style="text-align: center">
                <div class="flexbox">
                    <div class="prev" @click="prevYear">&#60;</div>
                    <div>{{year}}</div>
                    <div class="next" @click="nextYear">&#62;</div>
                </div>
                <div class="flexbox monthItem">
                    <template v-for="(month, idx) in monthItems">
                        <div class="item" @click="selectMonth(month)">{{month}}</div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';

    export default {
        props: {
            'isError': {
                type: Boolean,
                default: false
            },
            parent_index: '',
            default_date: ''
        },
        data () {
            return {
                showMenu: false,
                searchText: '',
                mousedownState: false,
                monthItems: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                year: moment().format('YYYY'),
                month: ''
            }
        },
        mounted () {
            this.init()
        },
        computed: {
            menuClass () {
                return {
                    visible: this.showMenu,
                    hidden: !this.showMenu
                }
            },
            menuStyle () {
                return {
                    display: this.showMenu ? 'block' : 'none'
                }
            }
        },
        methods: {
            init () {
                document.addEventListener('click', (e) => {
                    if (this.$el && !this.$el.contains(e.target)) {
                        // console.log('e.targetがthis.$elを含んでいない')
                        this.closeMenu()
                    } else {
                        // console.log('e.targetがthis.$elを含んでいる')
                    }
                }, false)

//                eventBus.on('updateSearchText', () => {
//                    this.searchText = this.default_date;
//                });
            },
            /* 全部削除したら reset : keyup eventにする keydownだと inputに反映される前の値が取得される */
            deleteInput () {
//        console.log('delete INpute')
//        console.log(this.searchText)
                if (!this.searchText) {
                    this.selectPicker('')
                }
            },
            // inputに cursor
            openMenu () {
                this.showMenu = true
                this.mousedownState = false
            },
            // blurされた時
            blurInput () {
//        console.log('blurINput')
//        console.log(this.mousedownState)
                if (!this.mousedownState) {
                    this.closeMenu()
                }
            },
            closeMenu () {
                if (this.showMenu) {
                    this.showMenu = false
                    this.selectPicker()
                }
            },
            mousedownItem () {
                this.mousedownState = true
            },
            prevYear() {
                let newYear = parseInt(this.year) - 1
                this.year = newYear.toString()
            },
            nextYear() {
                let newYear = parseInt(this.year) + 1
                this.year = newYear.toString()
            },
            selectMonth (month) {
                if (month.length < 2) {
                    month = '0' + month
                }
                let ym = month + ' - ' + this.year
                this.month = month
                this.searchText = ym
                this.closeMenu()
            },
            selectPicker(yearMonth) {
//                console.log('selectPicker');
//                console.log(yearMonth);
                console.log(this.searchText);

//                this.$emit('selected', {text: this.searchText, index: this.parent_index, month: (this.monthItems.indexOf(this.month) + 1), year: this.year});
                if (yearMonth) {
                    this.$emit('selected', yearMonth);
                } else {
                    this.$emit('selected', {text: this.searchText, index: this.parent_index, month: (this.monthItems.indexOf(this.month) + 1), year: this.year});
                }
            }
        }
    }
</script>

<style scoped src="semantic-ui-dropdown/dropdown.css"></style>
<style scoped>
    .search {
        font-family: sans-serif;
    }

    ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
        color: #b7b7bd;
    }
    ::-moz-placeholder { /* Firefox 19+ */
        color: #b7b7bd;
    }
    :-ms-input-placeholder { /* IE 10+ */
        color: #b7b7bd;
    }
    :-moz-placeholder { /* Firefox 18- */
        color: #b7b7bd;
    }

    .picker .flexbox {
        display: flex;
        flex-wrap: wrap;
    }

    .picker .flexbox div {
        flex-grow: 1;
        padding: 10px 0;
    }

    .picker .flexbox .item {
        /*flex: 1;*/
        /*flex-basis: 25%;*/
        width: 100%;
        display: block;
    }
    .picker .flexbox {
        padding: 0px;
    }

    .picker .prev:hover, .next:hover {
        cursor: pointer;
        background-color: lightblue;
    }

    .picker .monthItem .item {
        border-top: 1px solid lightblue;
    }

    .picker .monthItem .item:hover {
        cursor: pointer;
        background-color: lightblue;
    }
</style>
