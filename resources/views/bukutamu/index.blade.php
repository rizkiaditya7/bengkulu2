@extends('front.layout')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold text-blue-700 mb-6 text-center">
        📖 BUKU TAMU DIGITAL UPT BKN BENGKULU
    </h2>


    <div class="bg-white p-4 rounded-xl shadow-md mb-6">
        <div class="flex flex-col md:flex-row items-center md:items-end gap-4">

            {{-- Tanggal Awal --}}
            <div class="w-full md:w-auto">
                <label class="block font-semibold text-gray-700 mb-1">Tanggal Awal</label>
                <input type="date" id="start_date" name="start_date" value="{{ request('start_date') }}"
                    class="border border-gray-300 rounded-lg px-3 py-2 w-full md:w-48 focus:ring-2 focus:ring-blue-500 focus:outline-none" />
            </div>

            {{-- Tanggal Akhir --}}
            <div class="w-full md:w-auto">
                <label class="block font-semibold text-gray-700 mb-1">Tanggal Akhir</label>
                <input type="date" id="end_date" name="end_date" value="{{ request('end_date') }}"
                    class="border border-gray-300 rounded-lg px-3 py-2 w-full md:w-48 focus:ring-2 focus:ring-blue-500 focus:outline-none" />
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




    {{-- Tombol tambah --}}
    <div class="flex justify-end mb-4">
        <a href="{{ route('bukutamu.create') }}"
            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md transition">
            + Tambah Tamu
        </a>
        {{-- Export Excel --}}
        <a href="#" id="exportExcel"
            class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg shadow-md transition flex items-center gap-1">
            ⬇️ <span>Export Excel</span>
        </a>

        {{-- Export PDF --}}
        <a href="#" id="exportPDF"
            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow-md transition flex items-center gap-1">
            🧾 <span>Export PDF</span>
        </a>

    </div>

    {{-- Pesan sukses --}}
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    {{-- Tabel Data --}}
    <div class="overflow-x-auto bg-white rounded-lg shadow-lg p-4">
        <table id="bukutamuTable" class="min-w-full border border-blue-100">
            <thead class="bg-gradient-to-r from-sky-400 to-blue-500 text-white">
                <tr>
                    <th class="py-3 px-4 text-left font-semibold">No</th>
                    <th class="py-3 px-4 text-left font-semibold">Nama</th>
                    <th class="py-3 px-4 text-left font-semibold">No. HP</th>
                    <th class="py-3 px-4 text-left font-semibold">Jabatan</th>
                    <th class="py-3 px-4 text-left font-semibold">Instansi</th>
                    <th class="py-3 px-4 text-left font-semibold">Foto</th>
                    <th class="py-3 px-4 text-center font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-blue-100">
                @foreach ($data as $item)
                <tr class="hover:bg-blue-50 transition">
                    <td class="py-3 px-4">{{ $loop->iteration }}</td>
                    <td class="py-3 px-4 font-medium text-gray-800">{{ $item->nama }}</td>
                    <td class="py-3 px-4">{{ $item->no_hp }}</td>
                    <td class="py-3 px-4">{{ $item->jabatan }}</td>
                    <td class="py-3 px-4">{{ $item->instansi }}</td>
                    <td class="py-3 px-4">
                        @if ($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}"
                            class="w-16 h-16 object-cover rounded-md border border-blue-200">
                        @else
                        <span class="text-gray-400 italic">Tidak ada</span>
                        @endif
                    </td>
                    <td class="py-3 px-4 text-center space-x-1">
                        <a href="{{ route('bukutamu.show', $item->id) }}"
                            class="inline-block bg-sky-500 hover:bg-sky-600 text-white px-3 py-1 rounded-md text-sm transition">
                            Lihat
                        </a>
                        <a href="{{ route('bukutamu.edit', $item->id) }}"
                            class="inline-block bg-amber-400 hover:bg-amber-500 text-white px-3 py-1 rounded-md text-sm transition">
                            Edit
                        </a>
                        <form action="{{ route('bukutamu.destroy', $item->id) }}" method="POST" class="inline-block"
                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-rose-500 hover:bg-rose-600 text-white px-3 py-1 rounded-md text-sm transition">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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

{{-- DataTables CDN --}}
@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.tailwindcss.css">
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.tailwindcss.js"></script>
<!-- Tambahkan CDN Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
$(document).ready(function() {
    // Buat elemen loading spinner
    $('body').append(`
        <div id="loadingOverlay" class="fixed inset-0 bg-black/40 flex items-center justify-center hidden z-50">
            <div class="bg-white px-5 py-3 rounded-lg shadow-lg flex items-center gap-2">
                <svg class="animate-spin h-5 w-5 text-sky-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                </svg>
                <span class="text-sky-600 font-medium">Memuat data...</span>
            </div>
        </div>
    `);

    let table = $('#bukutamuTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('bukutamu.search') }}",
            data: function(d) {
                d.q = $('#searchInput').val();
                d.start_date = $('#start_date').val();
                d.end_date = $('#end_date').val();
            },
            beforeSend: function() {
                $('#loadingOverlay').removeClass('hidden');
            },
            complete: function() {
                $('#loadingOverlay').addClass('hidden');
            },
            error: function(xhr, status, error) {
                $('#loadingOverlay').addClass('hidden');
                console.error('Error:', error);
            }
        },
        columns: [{
                data: null,
                render: (data, type, row, meta) => meta.row + 1
            },
            {
                data: 'nama'
            },
            {
                data: 'no_hp'
            },
            {
                data: 'jabatan'
            },
            {
                data: 'instansi'
            },
            {
                data: 'foto',
                render: function(data) {
                    if (!data) return '<span class="text-gray-400 italic">Tidak ada</span>';
                    return `<img src="/storage/${data}" class="w-16 h-16 object-cover rounded-md border border-blue-200">`;
                }
            },
            {
                data: 'id',
                render: function(data) {
                    return `
                        <a href="/bukutamu/${data}" class="bg-sky-500 text-white px-2 py-1 rounded-md text-sm">Lihat</a>
                        <a href="/bukutamu/${data}/edit" class="bg-amber-400 text-white px-2 py-1 rounded-md text-sm">Edit</a>
                        <form action="/bukutamu/${data}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-rose-500 text-white px-2 py-1 rounded-md text-sm">Hapus</button>
                        </form>
                    `;
                }
            }
        ]
    });

    $('#filterButton').on('click', function() {
        loadCharts();
        table.ajax.reload();
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
document.getElementById("exportExcel").addEventListener("click", function(e) {
    e.preventDefault();

    const start = document.getElementById("start_date").value;
    const end = document.getElementById("end_date").value;

    let url = "{{ route('bukutamu.export') }}?start_date=" + start + "&end_date=" + end;
    window.location.href = url;
});

document.getElementById("exportPDF").addEventListener("click", function(e) {
    e.preventDefault();

    const start = document.getElementById("start_date").value;
    const end = document.getElementById("end_date").value;

    let url = "{{ route('bukutamu.export.pdf') }}?start_date=" + start + "&end_date=" + end;
    window.location.href = url;
});
</script>

@endpush
@endsection