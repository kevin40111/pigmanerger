<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="/js/vue/vue.min.js"></script>
    <script src="/js/axios.min.js"></script>
    <script src="/js/vue-material/vue-material.min.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,500,700,400italic|Material+Icons">

    <!-- Styles -->
    <link href="/css/vue-material/vue-material.min.css" rel="stylesheet">
    <link href="/css/vue-material/theme/default.css" rel="stylesheet">

</head>
<body>
    <div id="app" class="page-container">
        <md-app md-waterfall md-mode="reveal">
            <md-app-toolbar class="md-primary">
                @auth
                    <md-button class="md-icon-button" @click="menuVisible = !menuVisible">
                        <md-icon>menu</md-icon>
                    </md-button>
                @endauth
                <span class="md-title">工程管理平台</span>
            </md-app-toolbar>
            @auth
                <md-app-drawer :md-active.sync="menuVisible">
                    <md-list>
                        <md-list-item class="md-layout md-alignment-center-center">
                            <md-button class="md-icon-button" href="/logout">
                                <md-icon>cancel</md-icon>
                            </md-button>
                            <span class="md-list-item-text">個人資料</span>
                        </md-list-item>

                        <md-list-item class="md-layout md-alignment-center-center">
                            <md-button class="md-icon-button" href="/logout">
                                <md-icon>cancel</md-icon>
                            </md-button>
                            <span class="md-list-item-text">登出</span>
                        </md-list-item>

                        <md-divider class="md-inset"></md-divider>
                    </md-list>
                </md-app-drawer>
            @endauth
            <md-app-content>
                @yield('content')

                <div id="template" style="min-height: 100vh" v-pre>
                    @yield('template')
                </div>
            </md-app-content>
        </md-app>
    </div>

    <style>
        .md-dialog-container {
            transform:initial!important;
        }
    </style>

    <script>
      Vue.use(VueMaterial.default)
      app = new Vue({
        el: '#app',
        data: {
            "menuVisible": false
        }
      })
    </script>
     @yield('script')

</body>
</html>
