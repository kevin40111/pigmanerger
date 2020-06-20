@extends('layouts.app')

@section('content')
@verbatim

<div>
    <span> {{ message }} </span>
    <button v-on:click="active= !active">open dialog</button>
    <form-dialog
        v-bind:message="message"
        v-bind:emit="emit"
        v-bind:active="active"
        v-bind:title="title"
        v-bind:fields="fields"
        v-bind:map="map">
    </form-dialog>

</div>

@endverbatim
@endsection

@section('script')
<script src="/lib/formDialog.js"></script>
<script>
    new Vue({
        el: '#template',
        methods: {
            test: function(){
                console.log('test')
            }
        },
        created: function() {
            console.log(this);
        },
        data: function() {
            return {
                message: 'Hellow world',
                emit: 'dialogAgree',
                active: false,
                title: '測試',
                fields: {
                    name: 'parent name',
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
