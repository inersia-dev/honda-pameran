@extends('pusat.layouts.pusat')

@section('title', __('Dashboard'))

@section('content')
@php
    $h_ = 320;
    $i_ = 250;
@endphp
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<style>
    .graphic-container {
        min-height: 320px;
        max-height: 320px;
        overflow-y: auto;
        overflow-x: hidden;
    }
</style>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form class="row" action="{{ url()->current() }}">
                        <div class="col-12">
                            <div class="row">
                                <div class="pb-2 col-sm">
                                    <div  style="padding-top: 5px; padding-bottom: 5px">
                                        <label class="form-check-label">Dealer</label>
                                    </div>
                                    <select name="dealer" class="data-dealer form-control">
                                        <option value="">Semua</option>
                                        <option value=""></option>
                                        {{-- @foreach ($datadealer as $data_d)
                                            <option value="{{ $data_d->id }}"
                                                @if (request()->dealer == $data_d->id)
                                                    selected
                                                @endif
                                            >{{ $data_d->nama_dealer }}, {{ Str::title($data_d->kota_dealer) }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>

                                <div class="pb-2 col-sm">
                                    <div  style="padding-top: 5px; padding-bottom: 5px">
                                        <label class="form-check-label">Activity</label>

                                    </div>
                                    <select class="form-control" name="kategori" id="kategori">
                                        <option value="">Semua</option>
                                        <option value=""></option>
                                        {{-- @foreach ($datakategori as $data_k)
                                            <option value="{{ $data_k->id }}">{{ $data_k->nama_kategori }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                                <div class="pb-2 col-sm">
                                    <div  style="padding-top: 5px; padding-bottom: 5px">
                                        <label class="form-check-label">Area</label>
                                    </div>
                                    <select class="form-control data-lokasi" name="lokasi">
                                        <option value="">Semua</option>
                                        <option value=""></option>
                                        {{-- @foreach ($datalokasi as $data_l)
                                            <option value="{{ $data_l->id }}"
                                                @if (request()->lokasi == $data_l->id)
                                                    selected
                                                @endif
                                            >{{ $data_l->kelurahan_lokasi }}, {{ $data_l->kecamatan_lokasi }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                                <div class="pb-2 col-sm">
                                </div>
                                <div class="pb-2 col-sm">
                                </div>
                                <div class="pb-2 col-sm">
                                    <div  style="padding-top: 5px; padding-bottom: 5px">
                                        <label class="form-check-label">Analysis</label>
                                    </div>
                                    <select class="form-control data-lokasi" name="lokasi">
                                        <option value="">Daily</option>
                                        <option value="" selected>Monthly</option>
                                        <option value="">Yearly</option>
                                        <option value=""></option>
                                        {{-- @foreach ($datalokasi as $data_l)
                                            <option value="{{ $data_l->id }}"
                                                @if (request()->lokasi == $data_l->id)
                                                    selected
                                                @endif
                                            >{{ $data_l->kelurahan_lokasi }}, {{ $data_l->kecamatan_lokasi }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div id="chart"></div>
                </div>
                <div class="col-sm-3">
                    <div id="chart2"></div>
                </div>
                <div class="col-sm-5">
                    <div id="chart3"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div id="chart4"></div>
                </div>
                <div class="col-sm-3">
                    <div class="row">
                        <div class="col-12">
                            <label class="font-weight-bold">Leaderboard Penjualan Dealer</label>
                        </div>
                        <div class="col-12">
                            <div class="row p-2" style="font-size: 9px">
                                <div class="col-1 p-0 pl-2">No.</div>
                                <div class="col font-weight-bold justify-content-start">
                                    Nama Dealer
                                </div>
                                <div class="col font-weight-bold text-right">
                                    Jumlah Penjualan
                                </div>
                            </div>
                        </div>
                        <div class="col-12 graphic-container">
                            @php
                                $no_pen = 1;
                                $data_pen = 400;
                            @endphp
                            @foreach ($datadealer as $dealer_pen)
                                <div class="row p-2" style="font-size: 9px">
                                    <div class="col-1 p-0 pl-2">{{ $no_pen++; }}</div>
                                    <div class="col font-weight-bold justify-content-start" style="color: #ec1b25;">
                                        {{ $dealer_pen->nama_dealer }}
                                    </div>
                                    <div class="col-2 font-weight-bold text-right">{{ $data_pen -= 10 }}</div>
                                </div>
                                <hr class="m-0 p-0">
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="row">
                        <div class="col-12">
                            <label class="font-weight-bold">Leaderboard LPJ Dealer</label>
                        </div>
                        <div class="col-12">
                            <div class="row p-2" style="font-size: 9px">
                                <div class="col-1 p-0 pl-2">No.</div>
                                <div class="col font-weight-bold justify-content-start">
                                    Nama Dealer
                                </div>
                                <div class="col font-weight-bold text-right">
                                    Jumlah LPJ
                                </div>
                            </div>
                        </div>
                        <div class="col-12 graphic-container">
                            @php
                                $no_lpj = 1;
                                $data_lpj = 36;
                            @endphp
                            @foreach ($datadealer as $dealer_lpj)
                                <div class="row p-2" style="font-size: 9px">
                                    <div class="col-1 p-0 pl-2">{{ $no_lpj++ }}</div>
                                    <div class="col font-weight-bold justify-content-start" style="color: #ec1b25;">
                                        {{ $dealer_lpj->nama_dealer }}
                                    </div>
                                    <div class="col-2 font-weight-bold text-right">{{ $data_lpj-- }}</div>
                                </div>
                                <hr class="m-0 p-0">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-4">
                            <div id="chart7"></div>
                        </div>
                        <div class="col-sm-4">
                            <div id="chart8"></div>
                        </div>
                        <div class="col-sm-4">
                            <div id="chart9"></div>
                        </div>
                        <div class="col-sm-4">
                            <div id="chart10"></div>
                        </div>
                        <div class="col-sm-4">
                            <div id="chart11"></div>
                        </div>
                        <div class="col-sm-4">
                            <div id="chart12"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div id="chart13"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- 1 CHART BARIS 1 BAGIAN KIRI --}}
    <script>
        var options = {
        chart: {
            height: {{ $h_ }},
            type: "line"
        },
        fill: {
                opacity: 1
        },
        legend: {
            position: 'top'
        },
        series: [
            {
                name: "Pameran",
                type: "column",
                data: [440]
            },
            {
                name: "Pameran Ruko",
                type: "column",
                data: [505]
            },
            {
                name: "Roadshow",
                type: "column",
                data: [414]
            },
            {
                name: "Showroom Event",
                type: "column",
                data: [671]
            },
            {
                name: "Showroom Event Virtual",
                type: "column",
                data: [227]
            },
        ],
        stroke: {
            width: 4,
            curve: 'smooth',
            colors: ['transparent']
        },
        title: {
            text: "Jenis Proposal"
        },
        labels: ["Proposal"],
        dataLabels: {
          enabled: true,
            style: {
                fontSize: '10px',
                colors: ["#304758"]
            }
        },
        yaxis: [
            {
                title: {
                    text: "Final Approve"
                }
            }
        ]
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();
    </script>

    {{-- 2 CHART BARIS 1 BAGIAN TENGAH--}}
    <script>
        var options = {
        chart: {
            height: {{ $h_ }},
            type: "line"
        },
        plotOptions: {
          bar: {
            borderRadius: 4,
          }
        },
        series: [
            {
            name: "Proposal",
            type: "column",
            data: [240, 305, 414]
            },
        ],
        stroke: {
            width: 3,
            curve: 'smooth'
        },
        title: {
            text: "Status Proposal"
        },
        theme: {
            palette: 'palette3' // upto palette10
        },
        labels: ["Akan Berjalan", "Sedang Berjalan", "Selesai"],
        dataLabels: {
          enabled: true,
            style: {
                fontSize: '10px',
                colors: ["#304758"]
            }
        },
        yaxis: [
            {
                title: {
                    text: "Proposal"
                }
            },
        ],
        xaxis: {
            labels: {
                style: {
                    fontSize: '9px'
                }
            }
        },
        grid: {
          row: {
            colors: ['#fff', '#f2f2f2']
          }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: "horizontal",
                shadeIntensity: 0.25,
                gradientToColors: undefined,
                inverseColors: true,
                opacityFrom: 0.85,
                opacityTo: 0.85,
                stops: [50, 0, 100]
            },
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart2"), options);

        chart.render();
    </script>

    {{-- 3 CHART BARIS 1 BAGIAN KANAN --}}
    <script>
        var options = {
        chart: {
            height: {{ $h_ }},
            type: "bar"
        },
        plotOptions: {
          bar: {
            horizontal: true,
            endingShape: 'rounded',
            borderRadius: 4,
          }
        },
        legend: {
            position: 'top'
        },
        series: [
            {
                name: "Proposal",
                type: "column",
                data: [340, 205, 114, 141, 187, 107, 127]
            },
        ],
        title: {
            text: "Final Proposal - AREA"
        },
        theme: {
            palette: 'palette4' // upto palette10
        },
        dataLabels: {
          enabled: true,
            style: {
                fontSize: '10px',
                colors: ["#304758"]
            }
        },
        xaxis: {
            categories: ["Balikpapan", "Berau", "Bulungan", "Nunukan", "Paser", "Penajam Paser Utara", "Tarakan"],
            labels: {
                style: {
                    fontSize: '9px'
                }
            }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart3"), options);

        chart.render();
    </script>

    {{-- 4 CHART BARIS 2 BAGIAN KIRI --}}
    <script>
        var options = {
            series: [
                {
                    name: 'Downloader Motorku-X',
                    data: [410, 504, 510, 490, 460]
                },
                {
                    name: 'Database',
                    data: [440, 550, 410, 370, 320]
                },
                {
                    name: 'Prospecting',
                    data: [380, 478, 310, 290, 260]
                },
                {
                    name: 'Penjualan',
                    data: [110, 199, 198, 179, 156]
                }
            ],
            plotOptions: {
                bar: {
                    horizontal: true,
                    endingShape: 'rounded',
                    borderRadius: 4,
                }
            },
            chart: {
                type: 'bar',
                height: 350,
                stacked: true,
            },
            title: {
                text: 'Data'
            },
            theme: {
                palette: 'palette4' // upto palette10
            },
            xaxis: {
                categories: ["Pameran", "Pameran Ruko", "Roadshow", "Showroom Event", "Showroom Event Virtual"],
            },
            fill: {
                opacity: 1
            },
            legend: {
                position: 'top',
                horizontalAlign: 'left',
                offsetX: 40
            },
            dataLabels: {
                enabled: true,
                style: {
                    fontSize: '10px',
                    colors: ["#222"]
                }
            },
        };

        var chart = new ApexCharts(document.querySelector("#chart4"), options);

        chart.render();
    </script>

    {{-- 7 CHART BARIS 3 Gender--}}
    <script>
        var options = {
            series: [1240, 790],
            chart: {
                height: {{ $i_ }},
                type: 'pie',
            },
            title: {
                text: "Gender"
            },
            theme: {
                palette: 'palette2' // upto palette10
            },
            labels: ['Laki-laki', 'Perempuan'],
            dataLabels: {
                formatter: function (val, opts) {
                    return opts.w.config.series[opts.seriesIndex]
                },
                enabled: true,
                    style: {
                        fontSize: '10px'
                    }
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#chart7"), options);

        chart.render();
    </script>

    {{-- 8 CHART BARIS 3 Usia--}}
    <script>
        var options = {
        chart: {
            height: {{ $i_ }},
            type: "line"
        },
        plotOptions: {
          bar: {
            borderRadius: 4,
          }
        },
        title: {
            text: "Usia (Tahun)"
        },
        labels: ["Jumlah"],
        fill: {
                opacity: 1
        },
        legend: {
            position: 'top'
        },
        series: [
            {
                name: "> 17 Thn",
                type: "column",
                data: [440]
            },
            {
                name: "17 - 25 Thn",
                type: "column",
                data: [505]
            },
            {
                name: "26 - 35 Thn",
                type: "column",
                data: [414]
            },
            {
                name: "36 - 45 Thn",
                type: "column",
                data: [671]
            },
            {
                name: "46 - 55 Thn",
                type: "column",
                data: [227]
            },
            {
                name: "> 55 Thn",
                type: "column",
                data: [120]
            },
        ],
        stroke: {
            width: 4,
            curve: 'smooth',
            colors: ['transparent']
        },
        theme: {
            palette: 'palette5' // upto palette10
        },
        dataLabels: {
          enabled: true,
            style: {
                fontSize: '11px',
                colors: ["#304758"]
            }
        },
        xaxis: {
            labels: {
                style: {
                    fontSize: '11px'
                }
            }
        },
        };

        var chart = new ApexCharts(document.querySelector("#chart8"), options);

        chart.render();
    </script>

    {{-- 9 CHART BARIS 3 Hasil--}}
    <script>
        var options = {
        chart: {
            height: {{ $i_ }},
            type: "bar"
        },
        plotOptions: {
          bar: {
            horizontal: true,
            endingShape: 'rounded',
            borderRadius: 4,
          }
        },
        legend: {
            position: 'top'
        },
        series: [
            {
                name: "DP",
                type: "column",
                data: [350, 290, 210, 186, 86]
            },
        ],
        title: {
            text: "Hasil"
        },
        theme: {
            palette: 'palette9' // upto palette10
        },
        dataLabels: {
          enabled: true,
            style: {
                fontSize: '10px',
                colors: ["#fff"]
            }
        },
        xaxis: {
            categories: [
                'Database',
                'Prospecting',
                'Polling',
                'SSU',
                'Reject',
            ],
            labels: {
                style: {
                    fontSize: '9px'
                }
            }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart9"), options);

        chart.render();
    </script>

    {{-- 10 CHART BARIS 3 Range DP--}}
    <script>

        var options = {
        chart: {
            height: {{ $i_ }},
            type: "bar"
        },
        plotOptions: {
          bar: {
            horizontal: true,
            endingShape: 'rounded',
            borderRadius: 4,
          }
        },
        legend: {
            position: 'top'
        },
        series: [
            {
                name: "DP",
                type: "column",
                data: [50, 90, 76, 86, 46, 58, 48, 29, 46, 58, 48, 29]
            },
        ],
        title: {
            text: "Range DP"
        },
        theme: {
            palette: 'palette2' // upto palette10
        },
        dataLabels: {
          enabled: true,
            style: {
                fontSize: '10px',
                colors: ["#fff"]
            }
        },
        xaxis: {
            categories: [
                '≤ 1 jt',
                '1 - 2 jt',
                '2 - 3 jt',
                '3 - 4 jt',
                '4 - 5 jt',
                '5 - 6 jt',
                '6 - 7 jt',
                '7 - 8 jt',
                '8 - 9 jt',
                '9 - 10 jt',
                '> 10 jt'
            ],
            labels: {
                style: {
                    fontSize: '9px'
                }
            }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart10"), options);

        chart.render();
    </script>

    {{-- 11 CHART BARIS 3 Pengeluaran--}}
    <script>
        var options = {
        chart: {
            height: {{ $i_ }},
            type: "bar"
        },
        plotOptions: {
          bar: {
            horizontal: true,
            endingShape: 'rounded',
            borderRadius: 4,
          }
        },
        legend: {
            position: 'top'
        },
        series: [
            {
                name: "DP",
                type: "column",
                data: [46, 58, 48, 29, 46, 58, 48]
            },
        ],
        title: {
            text: "Pengeluaran"
        },
        theme: {
            palette: 'palette8' // upto palette10
        },
        dataLabels: {
          enabled: true,
            style: {
                fontSize: '10px',
                colors: ["#fff"]
            }
        },
        xaxis: {
            categories: [
                '< Rp 900.000,- ',
                'Rp 900.001,- s/d Rp 1.250.000,- ',
                'Rp 1.250.001,- s/d Rp 1.750.000,- ',
                'Rp 1.750.001,- s/d Rp 2.500.000,- ',
                'Rp 2.500.001,- s/d Rp 4.000.000,- ',
                'Rp 4.000.001.- s/d Rp 6.000.000,- ',
                '> Rp 6.000.000,- '
            ],
            labels: {
                style: {
                    fontSize: '9px'
                }
            }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart11"), options);

        chart.render();
    </script>

    {{-- 12 CHART BARIS 3 Finance Company--}}
    <script>
        var options = {
        chart: {
            height: {{ $i_ }},
            type: "bar"
        },
        plotOptions: {
          bar: {
            horizontal: true,
            endingShape: 'rounded',
            borderRadius: 4,
          }
        },
        legend: {
            position: 'top'
        },
        series: [
            {
                name: "Proposal",
                type: "column",
                data: [340, 205, 114, 141, 187, 107, 127]
            },
        ],
        title: {
            text: "Finance Company"
        },
        theme: {
            palette: 'palette3' // upto palette10
        },
        dataLabels: {
          enabled: true,
            style: {
                fontSize: '10px',
                colors: ["#fff"]
            }
        },
        xaxis: {
            categories: ["CASH", "Mega Finance", "MCF", "WOM", "OTO", "FIF", "ADIRA"],
            labels: {
                style: {
                    fontSize: '9px'
                }
            }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart12"), options);

        chart.render();
    </script>

    {{-- 13 CHART BARIS 3 Pekerjaan--}}
    <script>

        var options = {
        chart: {
            height: 518,
            type: "bar"
        },
        plotOptions: {
          bar: {
            horizontal: true,
            endingShape: 'rounded',
            borderRadius: 4,
          }
        },
        legend: {
            position: 'top'
        },
        series: [
            {
                name: "DP",
                type: "column",
                data: [45, 15, 22, 36, 26, 18, 14, 18, 21, 28, 18, 19, 11, 16, 26, 16, 16, 13, 19, 24, 21, 12, 28, 19]
            },
        ],
        title: {
            text: "Pekerjaan"
        },
        theme: {
            palette: 'palette7' // upto palette10
        },
        dataLabels: {
          enabled: true,
            style: {
                fontSize: '10px',
                colors: ["#fff"]
            }
        },
        xaxis: {
            categories: [
                'Pegawai Negeri',
                'Pegawai Swasta Pertanian/ Perkebunan/ Kehutanan/ Perikanan/ Peternakan',
                'Pegawai Swasta Industri',
                'Pegawai Swasta Konstruksi',
                'Pegawai Swasta Pertambangan',
                'Pegawai Swasta Jasa',
                'Pegawai Swasta Perdagangan (Retail)',
                'Ojek',
                'Pertanian/ Perkebunan/ Kehutanan/ Perikanan/ Peternakan',
                'Industri',
                'Konstruksi',
                'Pertambangan',
                'Jasa',
                'Perdagangan (Retail)',
                'Mahasiswa/ Pelajar',
                'Guru / Dosen',
                'TNI/ Polri',
                'Ibu Rumah Tangga',
                'Dokter',
                'Pengacara',
                'Wartawan',
                'Petani',
                'Nelayan',
                'Lainnya..',
            ],
            labels: {
                style: {
                    fontSize: '9px'
                }
            }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart13"), options);

        chart.render();
    </script>


@endsection
