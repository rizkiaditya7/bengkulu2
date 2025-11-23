@extends('admin.layout')
@section('content')
<div class="flex-1 flex flex-col overflow-hidden">
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <button id="menu-toggle" class="md:hidden text-gray-600">
            <i class="fas fa-bars text-2xl"></i>
        </button>
        <h2 class="text-2xl font-bold text-gray-800">Dashboard</h2>
        <div class="flex items-center space-x-4">
            <span class="text-gray-600">Admin</span>
            <img class="h-10 w-10 rounded-full object-cover"
                src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">

        </div>
    </header>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
        <div class="container mx-auto">
            <div class="mb-8">
                <h3 class="text-3xl font-bold text-gray-800">Selamat Datang Kembali, Admin!</h3>
                <p class="text-gray-500">Berikut adalah ringkasan singkat dari kunjungan tamu UPT Bengkulu.</p>
            </div>

            <div class="bg-white p-4 rounded-xl shadow-md mb-6">
                <div class="flex flex-col md:flex-row items-center md:items-end gap-4">

                    {{-- Tanggal Awal --}}
                    <div class="w-full md:w-auto">
                        <label class="block font-semibold text-gray-700 mb-1">Tanggal Awal</label>
                        <input type="date" id="start_date" name="start_date" value="{{ request('start_date') }}"
                            class="border border-gray-300 text-gray-700 rounded-lg px-3 py-2 w-full md:w-48 focus:ring-2 focus:ring-blue-500 focus:outline-none" />
                    </div>

                    {{-- Tanggal Akhir --}}
                    <div class="w-full md:w-auto">
                        <label class="block font-semibold text-gray-700 mb-1">Tanggal Akhir</label>
                        <input type="date" id="end_date" name="end_date" value="{{ request('end_date') }}"
                            class="border border-gray-300 text-gray-700 rounded-lg px-3 py-2 w-full md:w-48 focus:ring-2 focus:ring-blue-500 focus:outline-none" />
                    </div>

                    {{-- Tombol Filter --}}
                    <div>
                        <button id="filterButton"
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                            Filter
                        </button>
                    </div>

                    {{-- Tombol Reset --}}
                    <div>
                        <button id="resetButton"
                            class="bg-gray-500 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-600 transition">
                            Reset
                        </button>
                    </div>

                </div>
            </div>
            <!-- <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Total Berita</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $totalBerita }}</p>
                    </div>
                    <div class="bg-blue-100 p-4 rounded-full">
                        <i class="fas fa-newspaper text-2xl text-blue-600"></i>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Total Artikel</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $totalArtikel }}</p>
                    </div>
                    <div class="bg-green-100 p-4 rounded-full">
                        <i class="fas fa-pen-alt text-2xl text-green-600"></i>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Total Galeri</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $totalGaleri }}</p>
                    </div>
                    <div class="bg-yellow-100 p-4 rounded-full">
                        <i class="fas fa-images text-2xl text-yellow-600"></i>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Jumlah Pejabat</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $totalPejabat }}</p>
                    </div>
                    <div class="bg-red-100 p-4 rounded-full">
                        <i class="fas fa-users text-2xl text-red-600"></i>
                    </div>
                </div>
            </div> -->

            <!-- <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-8">
                <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow-md">
                    <h4 class="text-xl font-bold text-gray-800 mb-4">Berita Terbaru</h4>
                    <ul class="space-y-4">
                        @foreach ($beritaTerbaru as $berita)
                        <li class="flex items-center justify-between">
                            <p class="text-gray-700">{{ Str::limit($berita->judul, 50) }}</p>
                            <span
                                class="text-xs text-gray-400">{{ $berita->created_at ? $berita->created_at->format('d M Y') : '-' }}
                            </span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h4 class="text-xl font-bold text-gray-800 mb-4">Aksi Cepat</h4>
                    <div class="flex flex-col space-y-3">
                        <a href="{{ route('admin.tambah-berita') }}">
                            <button
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition-colors">
                                <i class="fas fa-plus mr-2"></i>Tambah Berita
                            </button>
                        </a>
                        <a href="{{ route('admin.tambah-artikel') }}">
                            <button
                                class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg transition-colors">
                                <i class="fas fa-plus mr-2"></i>Tambah Artikel
                            </button>
                        </a>
                        <a href="{{ route('admin.album.store') }}">
                            <button
                                class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-4 rounded-lg transition-colors">
                                <i class="fas fa-plus mr-2"></i>Tambah Galeri
                            </button>
                        </a>
                    </div>
                </div>
            </div> -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-2">Jumlah Tamu per Instansi</h3>
                    <canvas id="chartInstansi"></canvas>
                </div>

                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-2">Jumlah Tamu per Jabatan</h3>
                    <canvas id="chartJabatan"></canvas>
                </div>
                <div class="bg-white p-4 rounded-lg shadow mt-6">
                    <h3 class="text-lg font-semibold mb-2">Jumlah Tamu per Hari</h3>
                    <canvas id="chartHarian"></canvas>
                </div>
            </div>
        </div>
    </main>

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.tailwindcss.js"></script>
    <!-- Tambahkan CDN Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    $(document).ready(function() {

        $('#filterButton').on('click', function() {
            loadCharts();
        });
        $('#resetButton').on('click', function() {
            $('#start_date').val('');
            $('#end_date').val('');
            table.ajax.reload();
        });
        // Event: Search manual pakai input custom
        $('#searchInput').on('keyup', function() {
            clearTimeout(window.searchDelay);
            window.searchDelay = setTimeout(() => {
                table.ajax.reload();
            }, 500);
        });

        let chartInstansi, chartJabatan, chartHarian;

        function loadCharts() {
            let startDate = $("#start_date").val();
            let endDate = $("#end_date").val();

            // Grafik per instansi
            $.get("{{ route('chart.instansi') }}", {
                start_date: startDate,
                end_date: endDate
            }, function(response) {
                if (chartInstansi) chartInstansi.destroy();
                chartInstansi = new Chart(document.getElementById('chartInstansi'), {
                    type: 'bar',
                    data: {
                        labels: response.labels,
                        datasets: [{
                            label: 'Jumlah Tamu per Instansi',
                            data: response.values,
                            backgroundColor: 'rgba(54, 162, 235, 0.6)',
                            borderColor: 'rgb(54, 162, 235)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });

            // Grafik per jabatan
            $.get("{{ route('chart.jabatan') }}", {
                start_date: startDate,
                end_date: endDate
            }, function(response) {
                if (chartJabatan) chartJabatan.destroy();
                chartJabatan = new Chart(document.getElementById('chartJabatan'), {
                    type: 'pie',
                    data: {
                        labels: response.labels,
                        datasets: [{
                            data: response.values,
                            backgroundColor: [
                                '#36A2EB', '#FF6384', '#FFCE56',
                                '#4BC0C0', '#9966FF', '#FF9F40'
                            ]
                        }]
                    },
                    options: {
                        plugins: {
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }
                });
            });

            // Grafik harian
            $.get("{{ route('chart.harian') }}", {
                start_date: startDate,
                end_date: endDate
            }, function(res) {
                if (chartHarian) chartHarian.destroy();
                chartHarian = new Chart($('#chartHarian'), {
                    type: 'line',
                    data: {
                        labels: res.labels,
                        datasets: [{
                            label: 'Jumlah Tamu per Hari',
                            data: res.values,
                            borderColor: '#36A2EB',
                            backgroundColor: 'rgba(54,162,235,0.2)',
                            tension: 0.3,
                            fill: true,
                            pointRadius: 4
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }
                });
            });
        }


        // Jalankan setelah halaman siap
        loadCharts();
    });
    </script>

    @endpush
    @endsection