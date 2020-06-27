@extends('layouts.app')

@section('template')
@verbatim

<div>
    <form-dialog
        v-on:create="createProject"
        :emit='emit'
        :active.sync="active"
        :title.once="title"
        :fields.once="fields"
        :map.once="map">
    </form-dialog>

    <md-table md-fixed-header v-model="projects"  md-card v-on:md-selected="onSelect">
        <md-table-toolbar >
            <div class="md-toolbar-section-start" style="flex: 1">
                <h1 class="md-title">專案列表</h1>
            </div>
            <div>
                <md-button class="md-icon-button" v-on:click="fieldInit()">
                    <md-icon>note_add</md-icon>
                </md-button>
            </div>
        </md-table-toolbar>

        <md-table-toolbar style="background-color:#cccc" slot="md-table-alternate-header" slot-scope="{ count }">
            <div class="md-toolbar-section-end">
            <md-button class="md-icon-button" v-on:click="deleteProject()">
                <md-icon>delete</md-icon>
            </md-button>
            </div>
        </md-table-toolbar>

        <md-table-row slot="md-table-row" slot-scope="{ item }" md-selectable="multiple">
            <md-table-cell md-label="ID">{{item.id}}</md-table-cell>
            <md-table-cell md-label="專案名稱">{{item.title}}</md-table-cell>
            <md-table-cell md-label="預計總收入" md-sort-by="income"><span style="color:green">{{item.income | toCurrency}}</span></md-table-cell>
            <md-table-cell md-label="預計總支出" md-sort-by="outcome"><span style="color:red">{{item.outcome | toCurrency}}</span></md-table-cell>
            <md-table-cell md-label="已完工" >
                <md-button class="md-icon-button">
                    <md-icon v-bind:style="{color: item.finish ? 'green' : 'red'}">done</md-icon>
                </md-button>
            </md-table-cell>
            <md-table-cell>
                <md-button class="md-icon-button" style="margin-right:10px" v-on:click="updateProject(item)">
                    <md-icon>edit</md-icon>
                </md-button>

                <md-button class="md-icon-button" style="margin-right:10px">
                    <md-icon>text_snippet</md-icon>
                </md-button>
            </md-table-cell>
        </md-table-row>
    </md-table>
</div>

@endverbatim
@endsection

@section('script')
<script src="/lib/formDialog.js"></script>
<script>
    Vue.filter('toCurrency', function (value) {
        if (typeof value !== "number") {
            return value;
        }
        var formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'NTD',
            minimumFractionDigits: 0
        });
        return formatter.format(value);
    });

    new Vue({
        el: '#template',
        methods: {
            fieldInit: function() {
                this.active = true;
                this.fields = {
                    title: '',
                    content: '',
                    income: 0,
                    outcome: 0,
                    finish: false,
                    start_at: null,
                    close_at: null
                };
            },

            onSelect: function(items) {
                this.selected = (items);
            },

            createProject: function(data) {
                const vm = this;
                axios.post('projects/createOrUpdateProeject', data).then(function(response) {
                    vm.projects = response.data.projects;
                });
            },

            deleteProject: function(project_id) {
                const vm = this;
                deleted = vm.selected.map(project => project.id);
                axios.post('projects/deleteProjects', {deleted: deleted}).then(function(response) {
                    vm.projects = response.data.projects;
                });
            },

            updateProject: function(fields) {
                console.log(fields);
                const vm = this;
                vm.fields = fields;
                vm.active = true;
            },

            getProjects: function() {
                const vm = this;
                axios.get('projects/getProjects').then(function(response) {
                    vm.projects = response.data.projects;
                });
            }
        },
        created: function() {
            this.getProjects();
        },
        data: function() {
            return {
                selected: [],
                projects: [],
                emit: 'create',
                active: false,
                title: '新增專案',
                fields: {},
                map: {
                    title: {
                        type: 'text',
                        name: '專案名稱'
                    },
                    content: {
                        type: 'textarea',
                        name: '專案內容'
                    },
                    income: {
                        type: 'number',
                        name: '預期總收入'
                    },
                    outcome: {
                        type: 'number',
                        name: '預期總支出'
                    },
                    start_at: {
                        type: 'date',
                        name: '請選擇開始日'
                    },
                    close_at: {
                        type: 'date',
                        name: '請選擇結束日'
                    },
                    finish: {
                        type: 'boolean',
                        name: '是否完工'
                    }
                }
            }
        }
    })
</script>
@endsection()
