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
    methods: {
        agree: function() {
            this.$emit(this.emit, this.fields);
            this.active = true;
        },

        cancel: function() {
            this.active = false;
        }
    },
    template: `
        <div>
            <div>
                <md-dialog :md-active="active">
                    <md-dialog-title> {{title}} </md-dialog-title>

                    <md-dialog-content>
                        <div v-for="(key, field) in fields">
                            <md-field v-if="map[field].type == 'text'">
                                <label> {{map[field].name}} </label>
                                <md-input v-model="field"></md-input>
                            </md-field>

                            <md-field v-if="map[field].type == 'textarea'">
                                <label> {{map[field].name}} </label>
                                <md-textarea v-model="field"></md-textarea>
                            </md-field>

                            <md-field v-if="map[field].type == 'boolean'">
                                <md-switch v-model="field"></md-switch>
                            </md-field>

                            <md-field v-if="map[field].type == 'number'">
                                <label> {{map[field].name}} </label>
                                <md-input v-model="field" type="number"></md-input>
                            </md-field>

                            <md-field v-if="map[field].type == 'password'">
                                <label> {{map[field].name}} </label>
                                <md-input v-model="field" type="password"></md-input>
                            </md-field>
                        </div>
                    </md-dialog-content>

                    <md-dialog-actions>
                        <md-button class="md-raised" v-on:click="cancel">取消</md-button>
                        <md-button class="md-primary md-raised" v-on:click="agree">確認</md-button>
                    </md-dialog-actions>
                </md-dialog>
            </div>
        </div>
    `
  })
