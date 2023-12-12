@extends('admin.layouts.app')

@section('panel')
    @if (@json_decode($general->system_info)->version > systemDetails()['version'])
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-warning mb-3 text-white">
                    <div class="card-header">
                        <h3 class="card-title"> @lang('New Version Available') <button class="btn btn--dark float-end">@lang('Version') {{ json_decode($general->system_info)->version }}</button> </h3>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-dark">@lang('What is the Update ?')</h5>
                        <p>
                            <pre class="f-size--24">{{ json_decode($general->system_info)->details }}</pre>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (@json_decode($general->system_info)->message)
        <div class="row">
            @foreach (json_decode($general->system_info)->message as $msg)
                <div class="col-md-12">
                    <div class="alert border--primary border" role="alert">
                        <div class="alert__icon bg--primary">
                            <i class="far fa-bell"></i>
                        </div>
                        <p class="alert__message">@php echo $msg; @endphp</p>
                        <button class="close" data-bs-dismiss="alert" type="button" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="row gy-4">
        <div class="col-lg-6">
            <div class="row gy-4">
                <div class="col-xxl-6 col-sm-6">
                    <x-widget value="{{ $widget['total_users'] }}" title="Total Users" style="2" icon="las la-users f-size--56" icon_style="solid" link="{{ route('admin.users.all') }}" />
                </div>
                <div class="col-xxl-6 col-sm-6">
                    <x-widget value="{{ $widget['verified_users'] }}" title="Active Users" style="2" color="success" icon="las la-user-check f-size--56" icon_style="solid" link="{{ route('admin.users.active') }}" />
                </div>
                <div class="col-xxl-6 col-sm-6">
                    <x-widget value="{{ $widget['email_unverified_users'] }}" title="Email Unverified Users" style="2" color="danger" icon="lar la-envelope f-size--56" icon_style="solid" link="{{ route('admin.users.email.unverified') }}" />
                </div>
                <div class="col-xxl-6 col-sm-6">
                    <x-widget value="{{ $widget['mobile_unverified_users'] }}" title="Mobile Unverified Users" style="2" color="red" icon="las la-comment-slash f-size--56" icon_style="solid" link="{{ route('admin.users.mobile.unverified') }}" />
                </div>

                <div class="col-xxl-6 col-sm-6">
                    <x-widget value="{{ $widget['total_agent'] }}" title="Total Agent" style="2" color="info" icon="las la-users f-size--56" link="{{ route('admin.agents.all') }}" />
                </div>
                <div class="col-xxl-6 col-sm-6">
                    <x-widget value="{{ $widget['active_agent'] }}" title="Active Agent" style="2" color="green" icon="las la-user-check f-size--56" link="{{ route('admin.agents.active') }}" />
                </div>
                <div class="col-xxl-6 col-sm-6">
                    <x-widget value="{{ $widget['kycUnverified'] }}" title="KYC Unverified Agent" style="2" color="red" icon="lar la-envelope f-size--56" link="{{ route('admin.agents.kyc.unverified') }}" />
                </div>
                <div class="col-xxl-6 col-sm-6">
                    <x-widget value="{{ $widget['kycPending'] }}" title="KYC Pending Agent" style="2" color="danger" icon="las la-comment-slash f-size--56" link="{{ route('admin.agents.kyc.pending') }}" />
                </div>
            </div>

        </div>
        <div class="col-lg-6">

            <div class="row gy-4">

                <div class="col-lg-6 position-relative">
                    <a class="position-absolute w-100 h-100" href="{{ route('admin.send.money.all') }}"></a>
                    <div class="widget-three box--shadow2 b-radius--5 bg--white">
                        <div class="widget-three__icon b-radius--rounded bg--primary">
                            <i class="las la-exchange-alt"></i>
                        </div>
                        <div class="widget-three__content">
                            <h2 class="numbers">{{ $sendMoney['total'] }}</h2>
                            <p>@lang('Total Send Money')</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 position-relative">
                    <a class="position-absolute w-100 h-100" href="{{ route('admin.send.money.pending') }}"></a>
                    <div class="widget-three box--shadow2 b-radius--5 bg--white">
                        <div class="widget-three__icon b-radius--rounded bg--warning">
                            <i class="las la-spinner"></i>
                        </div>
                        <div class="widget-three__content">
                            <h2 class="numbers">{{ $sendMoney['pending'] }}</h2>
                            <p>@lang('Send Money Pending')</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 position-relative">
                    <a class="position-absolute w-100 h-100" href="{{ route('admin.send.money.completed') }}"></a>
                    <div class="widget-three box--shadow2 b-radius--5 bg--white">
                        <div class="widget-three__icon b-radius--rounded bg--success">
                            <i class="las la-check-circle"></i>
                        </div>
                        <div class="widget-three__content">
                            <h2 class="numbers">{{ $sendMoney['completed'] }}</h2>
                            <p>@lang('Send Money Completed')</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 position-relative">
                    <a class="position-absolute w-100 h-100" href="{{ route('admin.send.money.refunded') }}"></a>
                    <div class="widget-three box--shadow2 b-radius--5 bg--white">
                        <div class="widget-three__icon b-radius--rounded bg--danger">
                            <i class="las la-times"></i>
                        </div>
                        <div class="widget-three__content">
                            <h2 class="numbers">{{ $sendMoney['refunded'] }}</h2>
                            <p>@lang('Send Money Refunded')</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <div class="row mb-none-30 mt-30">
        <div class="col-xxl-6 mb-30">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h5 class="card-title">@lang('Monthly Send Money Report') (@lang('Last 12 Month'))</h5>
                        <div class="d-flex align-items-center gap-2">
                            <select name="sending_currency">
                                @foreach ($sendingCountries as $sendingCountry)
                                    <option value="{{ $sendingCountry->currency }}">{{ $sendingCountry->currency }}</option>
                                @endforeach
                            </select>
                            <div>@lang('to')</div>
                            <select name="recipient_currency">
                                @foreach ($receivingCountries as $receivingCountry)
                                    <option value="{{ $receivingCountry->currency }}">{{ $receivingCountry->currency }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="send_money_chart"></div>
                </div>
            </div>
        </div>

        <div class="col-xxl-6 mb-30">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title m-0 py-2">@lang('Country to Country Send Money') (@lang('Last 12 Month'))</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive--sm table-responsive country-to-country-table">
                        <table class="table--light style--two table bg-white">
                            <thead>
                                <th>@lang('Countries')</th>
                                <th>@lang('Sent Amount')</th>
                            </thead>
                            <tbody>
                                @foreach ($sendMoneyData as $transfers)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="user">
                                                    {{ $transfers->sending_country }}
                                                    <span class="thumb ms-2">
                                                        <img src="{{ getImage(getFilePath('country') . '/' . $transfers->sending_country_image, getFileSize('country')) }}" alt="image">
                                                    </span>
                                                </span>
                                                <i class="la la-arrow-right"></i>
                                                <span class="user">
                                                    <span class="thumb me-2">
                                                        <img src="{{ getImage(getFilePath('country') . '/' . $transfers->recipient_country_image, getFileSize('country')) }}" alt="image">
                                                    </span>
                                                    {{ $transfers->recipient_country }}
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <small>
                                                <span class="fw-bold">{{ showAmount($transfers->total_amount) }} {{ $transfers->sending_currency }}</span>
                                                <br>@lang('OR')
                                                <span class="fw-bold">{{ showAmount($transfers->total_base_amount) }} {{ $general->cur_text }}</span>
                                            </small>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row gy-4 mt-2">
        <div class="col-xxl-3 col-sm-6">
            <x-widget value="{{ $general->cur_sym }}{{ showAmount($payment['total_payment_amount']) }}" title="Total Payment for Send Money" style="2" color="success" icon="las la-hand-holding-usd" link="{{ route('admin.payment.list') }}" />
        </div>

        <div class="col-xxl-3 col-sm-6">
            <x-widget value="{{ $payment['total_payment_pending'] }}" title="Pending Payments for Send Money" style="2" color="warning" icon="las la-spinner" link="{{ route('admin.payment.pending') }}" />
        </div>

        <div class="col-xxl-3 col-sm-6">
            <x-widget value="{{ $payment['total_payment_rejected'] }}" title="Rejected Payments for Send Money" style="2" color="danger" icon="las la-spinner" link="{{ route('admin.payment.rejected') }}" />
        </div>

        <div class="col-xxl-3 col-sm-6">
            <x-widget value="{{ $general->cur_sym }}{{ showAmount($payment['total_payment_charge']) }}" title="Payment Charges for Send Money" style="2" color="primary" icon="las la-percentage" link="{{ route('admin.payment.list') }}" />
        </div>
    </div>

    <div class="row gy-4 mt-2">
        <div class="col-xxl-3 col-sm-6">
            <x-widget value="{{ $general->cur_sym }}{{ showAmount($deposit['total_deposit_amount']) }}" title="Total Deposited" style="2" color="success" icon="las la-hand-holding-usd" icon_style="" link="{{ route('admin.deposit.list') }}" />
        </div>
        <div class="col-xxl-3 col-sm-6">
            <x-widget value="{{ $deposit['total_deposit_pending'] }}" title="Pending Deposits" style="2" color="warning" icon="las la-spinner" icon_style="" link="{{ route('admin.deposit.pending') }}" />
        </div>
        <div class="col-xxl-3 col-sm-6">
            <x-widget value="{{ $deposit['total_deposit_rejected'] }}" title="Rejected Deposits" style="2" color="danger" icon="las la-spinner" icon_style="" link="{{ route('admin.deposit.rejected') }}" />
        </div>
        <div class="col-xxl-3 col-sm-6">
            <x-widget value="{{ $general->cur_sym }}{{ showAmount($deposit['total_deposit_charge']) }}" title="Deposit Charges" style="2" color="primary" icon="las la-percentage" icon_style="" link="{{ route('admin.deposit.list') }}" />
        </div>
    </div>

    <div class="row gy-4 mt-2">
        <div class="col-xxl-3 col-sm-6">
            <x-widget value="{{ $general->cur_sym }}{{ showAmount($withdrawals['total_withdraw_amount']) }}" title="Total Withdrawn" style="2" color="success" icon="lar la-credit-card" link="{{ route('admin.withdraw.log') }}" />
        </div>
        <div class="col-xxl-3 col-sm-6">
            <x-widget value="{{ $withdrawals['total_withdraw_pending'] }}" title="Pending Withdrawals" style="2" color="warning" icon="las la-sync" link="{{ route('admin.withdraw.pending') }}" />
        </div>
        <div class="col-xxl-3 col-sm-6">
            <x-widget value="{{ $withdrawals['total_withdraw_rejected'] }}" title="Rejected Withdrawals" style="2" color="danger" icon="las la-times-circle" link="{{ route('admin.withdraw.rejected') }}" />
        </div>
        <div class="col-xxl-3 col-sm-6">
            <x-widget value="{{ $general->cur_sym }}{{ showAmount($withdrawals['total_withdraw_charge']) }}" title="Withdrawal Charge" style="2" color="primary" icon="las la-percent" link="{{ route('admin.withdraw.log') }}" />
        </div>
    </div>

    <div class="row mb-none-30 mt-30">
        <div class="col-xl-6 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang('Monthly Agent\'s Deposit & Withdraw Report') (@lang('Last 12 Month'))</h5>
                    <div id="apex-bar-chart"> </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang('Transactions Report') (@lang('Last 30 Days'))</h5>
                    <div id="apex-line"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-none-30 mt-5">
        <div class="col-xl-4 col-lg-6 mb-30">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <h5 class="card-title">@lang('Login By Browser') (@lang('Last 30 days'))</h5>
                    <canvas id="userBrowserChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang('Login By OS') (@lang('Last 30 days'))</h5>
                    <canvas id="userOsChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang('Login By Country') (@lang('Last 30 days'))</h5>
                    <canvas id="userCountryChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    @include('admin.partials.cron_instruction')
@endsection

@push('breadcrumb-plugins')
    @if ($general->last_cron)
        <a class="btn @if (Carbon\Carbon::parse($general->last_cron)->diffInSeconds() < 600) btn--success @elseif(Carbon\Carbon::parse($general->last_cron)->diffInSeconds() < 1200) btn--warning @else
        btn--danger @endif" href="javascript:void(0)"><i class="fa fa-fw fa-clock"></i>@lang('Last Cron Run') :
            {{ Carbon\Carbon::parse($general->last_cron)->difFforHumans() }}</a>
    @endif
@endpush

@push('style')
    <style>
        .btn-outline--red {
            color: #F44336;
            border-color: #F44336;
        }

        .btn-outline--red:hover {
            background-color: #F44336;
            color: #fff;
        }

        .widget-three__icon {
            width: 80px;
            height: 80px;
        }

        .widget-three__icon i {
            font-size: 32px;
        }

        .widget-three__content {
            margin-top: 15px;
        }

        .country-to-country-table {
            max-height: 400px;
            overflow-x: auto;
        }

        /* width */
        .country-to-country-table::-webkit-scrollbar {
            width: 5px;
        }

        /* Track */
        .country-to-country-table::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        .country-to-country-table::-webkit-scrollbar-thumb {
            border-radius: 8px;
            background: #4634ff;
        }

        /* Handle on hover */
        .country-to-country-table::-webkit-scrollbar-thumb:hover {
            background: #4634ff;
        }
    </style>
@endpush

@push('script')
    <script src="{{ asset('assets/global/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/chart.js.2.8.0.js') }}"></script>

    <script>
        "use strict";

        var options = {
            series: [{
                name: 'Total Deposit',
                data: [
                    @foreach ($months as $month)
                        {{ getAmount(@$depositsMonth->where('months', $month)->first()->depositAmount) }},
                    @endforeach
                ]
            }, {
                name: 'Total Withdraw',
                data: [
                    @foreach ($months as $month)
                        {{ getAmount(@$withdrawalMonth->where('months', $month)->first()->withdrawAmount) }},
                    @endforeach
                ]
            }],
            chart: {
                type: 'bar',
                height: 450,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '50%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: @json($months),
            },
            yaxis: {
                title: {
                    text: "{{ __($general->cur_sym) }}",
                    style: {
                        color: '#7c97bb'
                    }
                }
            },
            grid: {
                xaxis: {
                    lines: {
                        show: false
                    }
                },
                yaxis: {
                    lines: {
                        show: false
                    }
                },
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "{{ __($general->cur_sym) }}" + val + " "
                    }
                }
            }
        };
        var chart = new ApexCharts(document.querySelector("#apex-bar-chart"), options);
        chart.render();



        var ctx = document.getElementById('userBrowserChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: @json($chart['user_browser_counter']->keys()),
                datasets: [{
                    data: {{ $chart['user_browser_counter']->flatten() }},
                    backgroundColor: [
                        '#ff7675',
                        '#6c5ce7',
                        '#ffa62b',
                        '#ffeaa7',
                        '#D980FA',
                        '#fccbcb',
                        '#45aaf2',
                        '#05dfd7',
                        '#FF00F6',
                        '#1e90ff',
                        '#2ed573',
                        '#eccc68',
                        '#ff5200',
                        '#cd84f1',
                        '#7efff5',
                        '#7158e2',
                        '#fff200',
                        '#ff9ff3',
                        '#08ffc8',
                        '#3742fa',
                        '#1089ff',
                        '#70FF61',
                        '#bf9fee',
                        '#574b90'
                    ],
                    borderColor: [
                        'rgba(231, 80, 90, 0.75)'
                    ],
                    borderWidth: 0,

                }]
            },
            options: {
                aspectRatio: 1,
                responsive: true,
                maintainAspectRatio: true,
                elements: {
                    line: {
                        tension: 0 // disables bezier curves
                    }
                },
                scales: {
                    xAxes: [{
                        display: false
                    }],
                    yAxes: [{
                        display: false
                    }]
                },
                legend: {
                    display: false,
                }
            }
        });



        var ctx = document.getElementById('userOsChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: @json($chart['user_os_counter']->keys()),
                datasets: [{
                    data: {{ $chart['user_os_counter']->flatten() }},
                    backgroundColor: [
                        '#ff7675',
                        '#6c5ce7',
                        '#ffa62b',
                        '#ffeaa7',
                        '#D980FA',
                        '#fccbcb',
                        '#45aaf2',
                        '#05dfd7',
                        '#FF00F6',
                        '#1e90ff',
                        '#2ed573',
                        '#eccc68',
                        '#ff5200',
                        '#cd84f1',
                        '#7efff5',
                        '#7158e2',
                        '#fff200',
                        '#ff9ff3',
                        '#08ffc8',
                        '#3742fa',
                        '#1089ff',
                        '#70FF61',
                        '#bf9fee',
                        '#574b90'
                    ],
                    borderColor: [
                        'rgba(0, 0, 0, 0.05)'
                    ],
                    borderWidth: 0,

                }]
            },
            options: {
                aspectRatio: 1,
                responsive: true,
                elements: {
                    line: {
                        tension: 0 // disables bezier curves
                    }
                },
                scales: {
                    xAxes: [{
                        display: false
                    }],
                    yAxes: [{
                        display: false
                    }]
                },
                legend: {
                    display: false,
                }
            },
        });


        // Donut chart
        var ctx = document.getElementById('userCountryChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: @json($chart['user_country_counter']->keys()),
                datasets: [{
                    data: {{ $chart['user_country_counter']->flatten() }},
                    backgroundColor: [
                        '#ff7675',
                        '#6c5ce7',
                        '#ffa62b',
                        '#ffeaa7',
                        '#D980FA',
                        '#fccbcb',
                        '#45aaf2',
                        '#05dfd7',
                        '#FF00F6',
                        '#1e90ff',
                        '#2ed573',
                        '#eccc68',
                        '#ff5200',
                        '#cd84f1',
                        '#7efff5',
                        '#7158e2',
                        '#fff200',
                        '#ff9ff3',
                        '#08ffc8',
                        '#3742fa',
                        '#1089ff',
                        '#70FF61',
                        '#bf9fee',
                        '#574b90'
                    ],
                    borderColor: [
                        'rgba(231, 80, 90, 0.75)'
                    ],
                    borderWidth: 0,

                }]
            },
            options: {
                aspectRatio: 1,
                responsive: true,
                elements: {
                    line: {
                        tension: 0 // disables bezier curves
                    }
                },
                scales: {
                    xAxes: [{
                        display: false
                    }],
                    yAxes: [{
                        display: false
                    }]
                },
                legend: {
                    display: false,
                }
            }
        });

        // apex-line chart
        var options = {
            chart: {
                height: 450,
                type: "area",
                toolbar: {
                    show: false
                },
                dropShadow: {
                    enabled: true,
                    enabledSeries: [0],
                    top: -2,
                    left: 0,
                    blur: 10,
                    opacity: 0.08
                },
                animations: {
                    enabled: true,
                    easing: 'linear',
                    dynamicAnimation: {
                        speed: 1000
                    }
                },
            },
            dataLabels: {
                enabled: false
            },
            series: [{
                    name: "Plus Transactions",
                    data: [
                        @foreach ($trxReport['date'] as $trxDate)
                            {{ getAmount(@$plusTrx->where('date', $trxDate)->first()->amount ?? 0) }},
                        @endforeach
                    ]
                },
                {
                    name: "Minus Transactions",
                    data: [
                        @foreach ($trxReport['date'] as $trxDate)
                            {{ getAmount(@$minusTrx->where('date', $trxDate)->first()->amount ?? 0) }},
                        @endforeach
                    ]
                }
            ],
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.9,
                    stops: [0, 90, 100]
                }
            },
            xaxis: {
                categories: [
                    @foreach ($trxReport['date'] as $trxDate)
                        "{{ $trxDate }}",
                    @endforeach
                ]
            },
            grid: {
                padding: {
                    left: 5,
                    right: 5
                },
                xaxis: {
                    lines: {
                        show: false
                    }
                },
                yaxis: {
                    lines: {
                        show: false
                    }
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#apex-line"), options);

        chart.render();

        sendMoneyGraph();
        $('select[name=sending_currency], select[name=recipient_currency]').on('change', function() {
            sendMoneyGraph();
        });

        function sendMoneyGraph() {
            var url = "{{ route('admin.send_money.statistics') }}";
            var sendingCurrency = $('select[name=sending_currency]').val();
            var recipientCurrency = $('select[name=recipient_currency]').val();

            $.ajax({
                type: "get",
                url: url,
                data: {
                    sending_currency: sendingCurrency,
                    recipient_currency: recipientCurrency
                },
                success: function(response) {
                    const sendingAmount = Object.values(response.allSendMoney).map(item => item.sending_amount);
                    const baseCurrencyAmount = Object.values(response.allSendMoney).map(item => item.base_currency_amount);

                    var options = {
                        series: [{
                            name: 'Sending Amount',
                            data: sendingAmount,
                        }],
                        chart: {
                            type: 'bar',
                            height: 400,
                            toolbar: {
                                show: false
                            }
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '50%',
                                endingShape: 'rounded'
                            },
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            show: true,
                            width: 2,
                            colors: ['transparent']
                        },
                        xaxis: {
                            categories: Object.keys(response.allSendMoney),
                        },
                        yaxis: {
                            title: {
                                text: sendingCurrency,
                                style: {
                                    color: '#7c97bb'
                                }
                            }
                        },
                        grid: {
                            xaxis: {
                                lines: {
                                    show: false
                                }
                            },
                            yaxis: {
                                lines: {
                                    show: false
                                }
                            },
                        },
                        fill: {
                            opacity: 1
                        },
                        tooltip: {
                            y: {
                                formatter: function(val, data) {
                                    if (typeof baseCurrencyAmount[data.seriesIndex] === 'undefined') {
                                        return val + ` ${sendingCurrency}`;
                                    } else {
                                        return val + ` ${sendingCurrency} ({{ $general->cur_sym }}${parseFloat(baseCurrencyAmount[data.seriesIndex]).toFixed(2) })`
                                    }
                                }
                            }
                        }
                    };
                    $('.send_money_chart').html(`<div id="sendMoneyChart"></div>`);
                    var chart = new ApexCharts(document.querySelector("#sendMoneyChart"), options);
                    chart.render();

                }
            });
        }
    </script>
@endpush
