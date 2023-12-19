@extends('agent.layouts.master')
@section('content')
    <style>
        .site-title {
            margin-top: 10px;
            margin-bottom: 50px;
            text-align: center;
        }
    </style>
    <header class="header-fixed header--primary">

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container mb-3 d-flex justify-content-center">
                <a class="logo logo-light" href="{{ route('home') }}">
                    <img alt="{{ __($general->site_name) }}" class="img-fluid logo__is"src="{{ siteLogo() }}" />
                </a>
            </div>
        </nav>
    </header>
    <div class="section login-section"
        style="background-image: url({{ getImage($activeTemplateTrue . 'images/auth-bg.jpg') }})">
        <div class="container">
            <div class="row g-4 g-lg-0 justify-content-between align-items-center">
                <div class="col-lg-6 d-none d-lg-block">
                    <img src="{{ getImage('assets/images/frontend/login/629ddc59573e31654512729.png', '660x625') }}"
                        alt="{{ $general->site_name }}" class="img-fluid">
                </div>
                <div class="col-lg-5">
                    <div class="site-title">
                        <h2>{{ $pageTitle }}</h2>
                    </div>
                    <form action="{{ route('agent.login') }}" method="POST"
                        class="cmn-form mt-30 verify-gcaptcha login-form">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>@lang('Username')</label>
                                    <input type="text" class="form--control" value="{{ old('username') }}"
                                        name="username" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>@lang('Password')</label>
                                    <input type="password" class="form--control" name="password" value="" required>
                                </div>
                            </div>
                            <x-captcha />
                        </div>
                        <div class="d-flex justify-content-between flex-wrap">
                            <div class="form-check me-3">
                                <input class="form-check-input" name="remember" type="checkbox" id="remember">
                                <label class="form-check-label" for="remember">@lang('Remember Me')</label>
                            </div>
                            <a href="{{ route('agent.password.reset') }}" class="forget-text">@lang('Forgot Password?')</a>
                        </div>
                        <button type="submit" class="btn cmn-btn w-100 mt-3">@lang('LOGIN')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="login-main" style="background-image: url('{{ asset('assets/agent/images/login.jpg') }}')">
        <div class="custom-container container">
            <div class="row justify-content-center">
                <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-8 col-sm-11">
                    <div class="login-area">
                        <div class="login-wrapper">
                            <div class="login-wrapper__top" syle="background-color:#EE7214">
                                <h3 class="title text-white">@lang('Welcome to') <strong>TransMax</h3>
                                <p class="text-white">{{ __($pageTitle) }}</p>
                            </div>
                            <div class="login-wrapper__body">
                                <form action="{{ route('agent.login') }}" method="POST" class="cmn-form mt-30 verify-gcaptcha login-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>@lang('Username')</label>
                                                <input type="text" class="form--control" value="{{ old('username') }}" name="username" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>@lang('Password')</label>
                                                <input type="password" class="form--control" name="password" value="" required>
                                            </div>
                                        </div>
                                        <x-captcha />
                                    </div>
                                    <div class="d-flex justify-content-between flex-wrap">
                                        <div class="form-check me-3">
                                            <input class="form-check-input" name="remember" type="checkbox" id="remember">
                                            <label class="form-check-label" for="remember">@lang('Remember Me')</label>
                                        </div>
                                        <a href="{{ route('agent.password.reset') }}" class="forget-text">@lang('Forgot Password?')</a>
                                    </div>
                                    <button type="submit" class="btn cmn-btn w-100 mt-3">@lang('LOGIN')</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
