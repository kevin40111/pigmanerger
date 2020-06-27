Vue.component('formDialog', {
    props: {
        map: {
            type: Object,
            require: true
        },
        title: {
            type: String,
            default: '',
        },
        fields: {
            type: Object,
            require: true
        },
        emit: {
            type: String,
            require: true
        },
        active: {
            type: Boolean,
            require: true
        }
    },
    created: function () {
        console.log(this);
    },

    data: function () {
        return {
            count: 0,
            active: false
        }
    },
    created: function () {
        console.log('---form fields:---');
        console.log(this.fields);
    },
    methods: {
        init: function() {
            this.fields = JSON.parse(JSON.stringify(this.fields));
            this.map = JSON.parse(JSON.stringify(this.map));
        },

        agree: function () {
            this.$emit(this.emit, this.fields);
            this.$emit('update:active', this.active = false);
        },

        cancel: function () {
            this.active = false;
            this.$emit('update:active', this.active = false);
        },

        disabledDates: function (date) {
            return date < Date.now();
        }
    },
    template: `
        <md-dialog :md-active="active" v-on:md-opened="init()">
            <md-dialog-title> {{title}} </md-dialog-title>

            <md-dialog-content style="min-width:500px">
                <div v-for="(key, field) in map">
                    <md-field v-if="map[field].type == 'text'">
                        <label> {{map[field].name}} </label>
                        <md-input v-model="fields[field]"></md-input>
                    </md-field>

                    <md-field v-if="map[field].type == 'textarea'">
                        <label> {{map[field].name}} </label>
                        <md-textarea v-model="fields[field]"></md-textarea>
                    </md-field>

                    <md-field v-if="map[field].type == 'number'">
                        <label> {{map[field].name}} </label>
                        <md-input v-model="fields[field]" type="number"></md-input>
                    </md-field>

                    <md-field v-if="map[field].type == 'password'">
                        <label> {{map[field].name}} </label>
                        <md-input v-model="fields[field]" type="password"></md-input>
                    </md-field>

                    <div v-if="map[field].type == 'date'">
                        <md-datepicker v-model="fields[field]" :md-model-type="String" v-bind:md-disabled-dates="disabledDates">
                            <label>{{map[field].name}}</label>
                        </md-datepicker>
                    </div>

                    <div v-if="map[field].type == 'boolean'">
                        <md-switch v-model="fields[field]">{{map[field].name}}</md-switch>
                    </div>
                </div>
            </md-dialog-content>

            <md-dialog-actions>
                <md-button class="md-raised" v-on:click="cancel">取消</md-button>
                <md-button class="md-primary md-raised" v-on:click="agree">確認</md-button>
            </md-dialog-actions>
        </md-dialog>
    `
})