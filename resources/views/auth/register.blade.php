@extends('layouts.app')

@section('content')
    <div class="md-layout md-alignment-center-center" style="margin-top: 120px">
        <form method="POST" action="{{ route('register') }}" class="md-layout-item md-size-40">
            @csrf
            <md-card>
                <md-card-header>
                    <div class="md-title">註冊</div>
                </md-card-header>
                <md-card-content>
                    <div>
                        <md-field>
                            <label for="name">姓名</label>
                            <md-input name="name" id="name" type="text">
                        </md-field>

                        <md-field>
                            <label for="email">E-mail</label>
                            <md-input name="email" id="email" type="email">
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

                        <md-field>
                            <label for="password-confirm">確認密碼</label>
                            <md-input type="password" name="password_confirmation" id="password-confirm">
                        </md-field>

                        @error('password')
                            <span>
                                <strong style="color: red">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <md-toolbar class="md-dense" md-elevation="0" style="background-color: #fff">
                        <div class="md-toolbar-row">
                            <div class="md-toolbar-section-end">
                                <md-button class="md-dense md-raised md-primary" type="submit">
                                    送出
                                </md-button>
                            </div>
                        </div>
                    </md-toolbar>
                </md-card-content>
            </md-card>
        </form>
    </div>
@endsection
