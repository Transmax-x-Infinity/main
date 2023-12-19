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
                    <form action="{{ route('agent.password.change') }}" method="POST" class="login-form">
                        @csrf
                        <input type="hidden" name="email" value="{{ $email }}">
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="mb-3">
                            <label>@lang('New Password')</label>
                            <input type="password" name="password" class="form--control" required>
                        </div>
                        <div class="mb-3">
                            <label>@lang('Re-type New Password')</label>
                            <input type="password" name="password_confirmation" class="form--control"
                                id="password_confirmation" required>
                        </div>
                        <div class="d-flex flex-wrap justify-content-between">
                            <a href="{{ route('agent.login') }}" class="forget-text">@lang('Login Here')</a>
                        </div>
                        <button type="submit" class="btn cmn-btn w-100">@lang('Submit')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="login-main" style="background-image: url('{{ asset('assets/agent/images/login.jpg') }}')">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-8 col-sm-11">
                    <div class="login-area">
                        <div class="login-wrapper">
                            <div class="login-wrapper__top">
                                <h3 class="title text-white">@lang('Recover Account')</h3>
                            </div>
                            <div class="login-wrapper__body">
                                <form action="{{ route('agent.password.change') }}" method="POST" class="login-form">
                                    @csrf
                                    <input type="hidden" name="email" value="{{ $email }}">
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="mb-3">
                                        <label>@lang('New Password')</label>
                                        <input type="password" name="password" class="form--control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>@lang('Re-type New Password')</label>
                                        <input type="password" name="password_confirmation" class="form--control"
                                            id="password_confirmation" required>
                                    </div>
                                    <div class="d-flex flex-wrap justify-content-between">
                                        <a href="{{ route('agent.login') }}" class="forget-text">@lang('Login Here')</a>
                                    </div>
                                    <button type="submit" class="btn cmn-btn w-100">@lang('Submit')</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
