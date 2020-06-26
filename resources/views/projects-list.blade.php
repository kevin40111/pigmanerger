@extends('layouts.app')

@section('template')
@verbatim

<div>
    <form-dialog
        v-on:create="createProject"
        v-bind:message="message"
        v-bind:emit='emit'
        v-bind:active.sync="active"
        v-bind:title="title"
        v-bind:fields="fields"
        v-bind:map="map">
    </form-dialog>
    <span> {{ message }} </span>
    <button v-on:click="active= true">open dialog</button>
</div>

@endverbatim
@endsection

@section('script')
<script src="/lib/formDialog.js"></script>
<script>
    new Vue({
        el: '#template',
        methods: {
            createProject: function(data) {
                console.log(data);
                axios.post('projects/createProject', data).then(function(response) {
                    console.log(response);
                });
            },

            getProjects: function() {
                axios.get('projects/getProjects').then(function(response) {
                    console.log(response);
                });
            }
        },
        created: function() {
            this.getProjects();
        },
        data: function() {
            return {
                message: 'Hellow world',
                emit: 'create',
                active: false,
                title: '測試',
                fields: {
                    name: '1213123123',
                    password: 'parent passowrd',
                },
                map: {
                    name: {
                        type: 'text',
                        name: 'name 測試'
                    },
                    password: {
                        type: 'password',
                        name: 'password 測試'
                    }
                }
            }
        }
    })
</script>
@endsection()
