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
                    <form action="{{ route('agent.password.verify.code') }}" method="POST" class="login-form w-100">
                        @csrf

                        <div class="code-box-wrapper d-flex w-100">
                            <div class="form-group mb-3 flex-fill">
                                <span class="text-white fw-bold">@lang('Verification Code')</span>
                                <div class="verification-code">
                                    <input type="text" name="code" class="overflow-hidden" autocomplete="off">
                                    <div class="boxes">
                                        <span>-</span>
                                        <span>-</span>
                                        <span>-</span>
                                        <span>-</span>
                                        <span>-</span>
                                        <span>-</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap justify-content-between">
                            <a href="{{ route('agent.password.reset') }}" class="forget-text">@lang('Try to send again')</a>
                        </div>
                        <button type="submit" class="btn cmn-btn w-100 mt-4">@lang('Submit')</button>
                    </form>
                    <a href="{{ route('agent.login') }}" class="text-white mt-4"><i class="las la-sign-in-alt"
                            aria-hidden="true"></i>@lang('Back to Login')</a>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="login-main" style="background-image: url('{{ asset('assets/agent/images/login.jpg') }}')">
        <div class="container custom-container d-flex justify-content-center">
            <div class="login-area">
                <div class="text-center mb-3">
                    <h2 class="text-white mb-2">@lang('Verify Code')</h2>
                    <p class="text-white mb-2">@lang('Please check your email and enter the verification code you got in your email.')</p>
                </div>
                <form action="{{ route('agent.password.verify.code') }}" method="POST" class="login-form w-100">
                    @csrf

                    <div class="code-box-wrapper d-flex w-100">
                        <div class="form-group mb-3 flex-fill">
                            <span class="text-white fw-bold">@lang('Verification Code')</span>
                            <div class="verification-code">
                                <input type="text" name="code" class="overflow-hidden" autocomplete="off">
                                <div class="boxes">
                                    <span>-</span>
                                    <span>-</span>
                                    <span>-</span>
                                    <span>-</span>
                                    <span>-</span>
                                    <span>-</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between">
                        <a href="{{ route('agent.password.reset') }}" class="forget-text">@lang('Try to send again')</a>
                    </div>
                    <button type="submit" class="btn cmn-btn w-100 mt-4">@lang('Submit')</button>
                </form>
                <a href="{{ route('agent.login') }}" class="text-white mt-4"><i class="las la-sign-in-alt"
                        aria-hidden="true"></i>@lang('Back to Login')</a>
            </div>
        </div>
    </div> --}}
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/agent/css/code_verification.css') }}">
@endpush

@push('script')
    <script>
        (function($) {
            'use strict';
            $('[name=code]').on('input', function() {

                $(this).val(function(i, val) {
                    if (val.length >= 6) {
                        $('form').find('button[type=submit]').html(
                            '<i class="las la-spinner fa-spin"></i>');
                        $('form').find('button[type=submit]').removeClass('disabled');
                        $('form')[0].submit();
                    } else {
                        $('form').find('button[type=submit]').addClass('disabled');
                    }
                    if (val.length > 6) {
                        return val.substring(0, val.length - 1);
                    }
                    return val;
                });

                for (let index = $(this).val().length; index >= 0; index--) {
                    $($('.boxes span')[index]).html('');
                }
            });

        })(jQuery)
    </script>
@endpush
