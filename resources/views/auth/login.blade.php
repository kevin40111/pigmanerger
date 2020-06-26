@extends('layouts.app')

@section('content')
<div class="md-layout md-alignment-center-center" style="margin-top: 120px">
    <form method="POST" action="{{ route('login') }}" class="md-layout-item md-size-30">
        @csrf
        <md-card>
            <md-card-header>
                <div class="md-title">登入</div>
            </md-card-header>
            <md-card-content>
                <div>
                    <md-field>
                        <label for="email">帳號</label>
                        <md-input name="email" id="email">
                    </md-field>
                    @error('email')
                        <span>
                            <strong style="color: red">{{ $message }}</strong>
                        </span>
                    @enderror

                    <md-field>
                        <label for="password">密碼</label>
                        <md-input type="password" name="password" id="password">
                    </md-field>
                    @error('password')
                        <span>
                            <strong style="color: red">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <md-toolbar class="md-dense" md-elevation="0" style="background-color: #fff">
                    <div class="md-toolbar-row">
                        <div class="md-toolbar-section-start">
                            <md-button href="/register">
                                註冊
                            </md-button>
                        </div>
                        <div class="md-toolbar-section-end">
                            <md-button class="md-accent" href="{{ route('password.request') }}">
                                忘記密碼
                            </md-button>
                            <md-button class="md-dense md-raised md-primary" type="submit">
                                登入
                            </md-button>
                        </div>
                    </div>
                </md-toolbar>
            </md-card-content>
        </md-card>
    </form>
</div>
@endsection