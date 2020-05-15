@extends('layouts.app')

@section('content')
<div class="md-layout md-alignment-center-center" style="margin-top: 120px">
    <form method="POST" action="{{ route('password.email') }}" class="md-layout-item md-size-40">
        @csrf
        <md-card>
            <md-card-header>
                <div class="md-title">重寄驗證信</div>
            </md-card-header>
            <md-card-content>
                <div>
                    <md-field>
                        <label for="email">E-mail</label>
                        <md-input class="form-control @error('email') is-invalid @enderror" name="email" id="email" type="email" value="{{ $email ?? old('email') }}">
                    </md-field>
                    @error('email')
                        <span>
                            <strong style="color: red">{{ $message }}</strong>
                        </span>
                    @enderror
                    @if (session('status'))
                        <div >
                            <span style="color: green" class="md-subheading"> {{ session('status') }} </span>
                        </div>
                    @endif
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
