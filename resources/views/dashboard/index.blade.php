@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/fullcalendar/lib/main.css') }}">
@endpush

@section('content')
    <div class="row">
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-0 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                                <i class="fas fa-car fa-2x"></i>
                                {{-- <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg> --}}
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">Mobil</h2>
                                <h3 class="fw-extrabold">{{ $dashboard_data['mobil_count'] }}</h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">Mobil</h2>
                                <h3 class="fw-extrabold">{{ $dashboard_data['mobil_count'] }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-0 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                                <i class="fas fa-id-badge fa-2x"></i>
                                {{-- <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg> --}}
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">Sopir</h2>
                                <h3 class="fw-extrabold">{{ $dashboard_data['sopir_count'] }}</h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">Sopir</h2>
                                <h3 class="fw-extrabold">{{ $dashboard_data['sopir_count'] }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-0 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                                <svg class="icon" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                    </path>
                                </svg>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">Pelanggan</h2>
                                <h3 class="fw-extrabold">{{ $dashboard_data['pelanggan_count'] }}</h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">Pelanggan</h2>
                                <h3 class="fw-extrabold">{{ $dashboard_data['pelanggan_count'] }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-0 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
                                <svg class="icon" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="fw-extrabold h5">Pemasukan <small class="text-danger">(Booking
                                        selesai)</small></h2>
                                <h3 class="mb-1">{{ formatPrice($dashboard_data['pemasukan']) }}</h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">Pemasukan <small class="text-danger">(Booking
                                        selesai)</small></h2>
                                <h3 class="fw-extrabold mb-2">{{ formatPrice($dashboard_data['pemasukan']) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-0 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
                                <i class="fas fa-clipboard-check fa-2x"></i>
                                {{-- <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg> --}}
                            </div>
                            <div class="d-sm-none">
                                <h2 class="fw-extrabold h5">Booking Baru</h2>
                                <h3 class="mb-1">{{ $dashboard_data['booking_baru'] }}</h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">Booking Baru</h2>
                                <h3 class="fw-extrabold mb-2">{{ $dashboard_data['booking_baru'] }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0">
                                <svg class="icon" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="fw-extrabold h5">Booking </h2>
                                <h3 class="mb-1">{{ $dashboard_data['booking_count'] }}</h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">Booking</h2>
                                <h3 class="fw-extrabold mb-2">{{ $dashboard_data['booking_count'] }}</h3>
                            </div>
                            <small class="d-flex align-items-center text-gray-500">
                                Booking On Going
                                {{ $dashboard_data['booking_ongoing'] }}
                            </small>
                            <div class="small d-flex mt-1">
                                Booking Selesai
                                {{ $dashboard_data['booking_selesai'] }}
                                {{-- <div>Since last month <svg class="icon icon-xs text-success" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg><span class="text-success fw-bolder">22%</span></div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-xl-8">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h2 class="fs-5 fw-bold mb-0">Booking Terkini</h2>
                                </div>
                                <div class="col text-end">
                                    <a href="{{ route('booking.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="border-bottom" scope="col">Pelanggan</th>
                                        <th class="border-bottom" scope="col">Mobil</th>
                                        <th class="border-bottom" scope="col">Durasi</th>
                                        <th class="border-bottom" scope="col">Harga Sewa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dashboard_data['booking_terkini'] as $booking)
                                        <tr>
                                            <th class="text-gray-900" scope="row">
                                                {{ $booking->user->nama }}
                                            </th>
                                            <td class="fw-bolder text-gray-500">
                                                {{ $booking->mobil->nama }}
                                            </td>
                                            <td class="fw-bolder text-gray-500">
                                                {{ $booking->getBookingDuration() }} Hari <br>
                                                <small class="text-danger">
                                                    {{ indonesianDate($booking->tgl_mulai_sewa) }} -
                                                    {{ indonesianDate($booking->tgl_akhir_sewa) }} </small>
                                            </td>
                                            <td class="fw-bolder text-gray-500">
                                                {{ formatPrice($booking->harga) }}
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
        <div class="col-12 col-xl-4">
            <div class="col-12 px-0 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-header d-flex flex-row align-items-center flex-0 border-bottom">
                        <div class="d-block">
                            <div class="h6 fw-normal text-gray mb-2">Booking  <small class="text-danger">(Status Selesai)</small> </div>
                            <h2 class="h3 fw-extrabold">{{formatPrice($dashboard_data['pemasukan'])}}</h2>
                        </div>
                        <div class="d-block ms-auto">
                            <div class="d-flex align-items-center text-end mb-2">
                                <select name="tahun" id="selectTahun" onchange="generateChartData(this.value)">
                                    @foreach ($dashboard_data['tahun_pemasukan'] as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach        
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <canvas id="bookingChart" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('vendor/fullcalendar/lib/main.js') }}"></script>
    <script>
        let chart
        generateChartData()

        function generateChartData(year = null) {
            const url = "{{ route('dashboard.booking_chart') }}"
            let formData = year == null ? {
                year: 'now'
            } : {
                year: year
            }

            // const incomeSelectedYear = document.getElementById('incomeSelectedYear')

            // if (year != null) {
            //     incomeSelectedYear.innerHTML = year
            // }

            $.ajax({
                url: url,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                data: formData,
                dataType: 'json',
                success: function(data) {
                    if (data.code === 1) {
                        if (year != null) {
                            chart.destroy()
                            chart = showChart(data)
                        } else {
                            chart = showChart(data)
                        }
                    }

                    if (data.code === 0) {
                        console.log('error')
                    }
                }
            })
        }

        function showChart(data) {
            let canvasForecast = $('#bookingChart');
            const labels = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
                "Oktober", "November", "Desember"
            ]
            let barChart = new Chart(canvasForecast, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                            // lineTension: 0,
                            label: 'Pendapatan',
                            borderColor: "#6777ef",
                            backgroundColor: "#6777ef",
                            pointHoverBorderColor: "#6777ef",
                            pointBorderWidth: 0,
                            pointHoverRadius: 10,
                            pointHoverBorderWidth: 1,
                            pointRadius: 3,
                            fill: false,
                            borderWidth: 4,
                            data: data.booking
                        },
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    // Can't just just `stacked: true` like the docs say
                    scales: {
                        yAxes: [{
                            // stacked: true,
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    animation: {
                        duration: 750,
                    },
                }
            });

            return barChart
        }
    </script>
@endpush
