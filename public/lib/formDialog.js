Vue.component('formDialog', {
    props:{
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
    created: function(){
        console.log(this);
    },

    data: function () {
        return {
            count: 0,
            active: false
        }
    },
    created: function() {
        console.log(this.fields);
    },
    methods: {
        agree: function() {
            this.$emit(this.emit, this.fields);
            this.$emit('update:active', this.active = false);
        },

        cancel: function() {
            this.active = false;
            this.$emit('update:active', this.active = false);
        }
    },
    template: `    
        <md-dialog :md-active="active">
            <md-dialog-title> {{title}} </md-dialog-title>

            <md-dialog-content>
                <div v-for="(key, field) in fields">
                    <md-field v-if="map[field].type == 'text'">
                        <label> {{map[field].name}} </label>
                        <md-input v-model="key"></md-input>
                    </md-field>

                    <md-field v-if="map[field].type == 'textarea'">
                        <label> {{map[field].name}} </label>
                        <md-textarea v-model="key"></md-textarea>
                    </md-field>

                    <md-field v-if="map[field].type == 'boolean'">
                        <md-switch v-model="key"></md-switch>
                    </md-field>

                    <md-field v-if="map[field].type == 'number'">
                        <label> {{map[field].name}} </label>
                        <md-input v-model="key" type="number"></md-input>
                    </md-field>

                    <md-field v-if="map[field].type == 'password'">
                        <label> {{map[field].name}} </label>
                        <md-input v-model="key" type="password"></md-input>
                    </md-field>

                    <md-field v-if="map[field].type == 'dateTime'">
                        <label> {{map[field].name}} </label>
                        <md-input v-model="key" type="password"></md-input>
                    </md-field>
                </div>
            </md-dialog-content>

            <md-dialog-actions>
                <md-button class="md-raised" v-on:click="cancel">取消</md-button>
                <md-button class="md-primary md-raised" v-on:click="agree">確認</md-button>
            </md-dialog-actions>
        </md-dialog>
    `
  })
