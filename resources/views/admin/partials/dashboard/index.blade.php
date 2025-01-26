@extends('admin.layouts.index')
@section('title', 'Dashboard - SIGISKAM')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Dashboard</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <p class="d-inline-flex gap-1">
            <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#maps"
                aria-expanded="true" aria-controls="maps">
                Maps
            </button>
            <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#chart"
                aria-expanded="false" aria-controls="chart">
                Chart
            </button>
        </p>
        {{-- Chart --}}
        <div class="accordion">
            <div class="collapse" id="chart" data-bs-parent=".accordion">
                <div class="card card-body">
                    <canvas id="barChart" style="width: 100%; max-width: 1000px;"></canvas>
                </div>
            </div>
            {{-- Maps --}}
            <div class="collapse show" id="maps" data-bs-parent=".accordion">
                <div class="card card-body">
                    <div id="map" style="height: 550px" class="ml-6"></div>
                </div>
            </div>
            {{-- MODAL INFORMASI BENCANA --}}
            <div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="locationModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="locationModalLabel">Informasi Lokasi Bencana</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="modalContent">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Informasi</th>
                                        <th scope="col">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody id="modalTableBody">
                                    <!-- Tampilkan Data -->
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        {{-- <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <canvas id="barChart" style="width: 100%; max-width: 1000px;"></canvas>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('barChart').getContext('2d');

            // Fetch data dari API
            fetch('{{ url('admin/data') }}')
                .then(response => response.json())
                .then(data => {
                    // Menyusun data kecamatan dan tahun
                    const labels = [];
                    const datasets = [{
                        label: 'Total per Kecamatan',
                        data: []
                    }];
                    const infoPerKecamatan = []; // Array untuk menyimpan informasi tahun dan total

                    // Menyusun data per kecamatan dan tahun
                    data.forEach(item => {
                        labels.push(item.kecamatan);
                        let totalPerKecamatan = 0;

                        // Mengumpulkan total data untuk setiap kecamatan
                        item.data.forEach(yearData => {
                            totalPerKecamatan += yearData.total;

                            // Menyimpan informasi tahun dan totalnya
                            infoPerKecamatan.push(`${yearData.tahun}: ${yearData.total}`);
                        });

                        datasets[0].data.push(totalPerKecamatan);
                    });

                    // Membuat diagram batang
                    const barChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: datasets
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            },
                            plugins: {
                                tooltip: {
                                    callbacks: {
                                        label: function(tooltipItem) {
                                            // Menampilkan informasi tahun dan total saat hover pada batang
                                            const kecamatan = tooltipItem.label;
                                            const index = labels.indexOf(kecamatan);
                                            const info = infoPerKecamatan.slice(index * 2, (index +
                                                1) * 2);
                                            return `${kecamatan}: ${info.join(', ')}`;
                                        }
                                    }
                                }
                            }
                        }
                    });
                })
                .catch(error => console.error('Error fetching data:', error));
        });
    </script>

@endsection
