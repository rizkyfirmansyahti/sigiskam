@extends('users.layouts.index')
@section('title', 'Beranda - SIGISKAM')
@section('content')
    {{-- HEADER --}}
    <nav class="navbar navbar-expand-lg " style="background: linear-gradient(to right, #d9241c, #fe7000);">
        <div class="container-fluid">
            <img src="/images/logo_kampar.png" alt="Logo Kampar" class="ms-4" width="50">
            <h3 style="color: white">SIGISKAM</h3>
            <img src="/images/logo_polkam.png" alt="Logo Kampar" class="me-4" width="50">
        </div>
    </nav>
    {{-- BUTTON MODAL LOGIN DAN SEARCH --}}
    <div class="btn-group w-100" role="group">
        <button type="button" class="btn btn-success border-start-0 rounded-0" data-bs-toggle="modal"
            data-bs-target="#modalSearch">Search</button>
        <button type="button" class="btn btn-primary border-end-0 rounded-0" data-bs-toggle="modal"
            data-bs-target="#modalLogin">Login</button>
    </div>

    {{-- MODAL SEARCH --}}
    <div class="modal fade" id="modalSearch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Search</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2 position-relative">
                        <input type="text" class="form-control ps-5" id="search" placeholder="Search..." required>
                        <!-- Ikon pencarian -->
                        <span class="position-absolute" style="top: 50%; left: 15px; transform: translateY(-50%);">
                            <span class="mdi mdi-search-web mdi-24px"></span>
                        </span>
                    </div>

                    <div id="searchResults" class="card bg-light">
                        <!-- Hasil pencarian akan muncul di sini -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL LOGIN --}}
    <div class="modal fade" id="modalLogin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Login</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('auth') }}" method="post" class="needs-validation" novalidate>
                        @csrf
                        <div class="mb-2">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username"
                                placeholder="Silahkan masukkan username anda" name="username" required>
                            <div class="invalid-feedback">
                                Silahkan masukkan username anda!
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password"
                                placeholder="Silahkan masukkan password anda" name="password" required>
                            <div class="invalid-feedback">
                                Silahkan masukkan password anda!
                            </div>
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                </form>
            </div>
        </div>
    </div>



    {{-- MAPS --}}
    <div id="map" style="height: 620px"></div>

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

    <footer class="d-flex justify-content-center align-items-center pt-2 pb-2"
        style="background: linear-gradient(to right, #d9241c, #fe7000); color: white; font-weight: bold">
        <span>&copy; 2024 Fadillah Utami</span>
    </footer>

    {{-- SCRIPT --}}
    <script src="https://cdn.jsdelivr.net/npm/leaflet.fullscreen@2.4.0/Control.FullScreen.min.js"></script>
    <script src="https://unpkg.com/leaflet-draw/dist/leaflet.draw.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    {{-- Script Leaflet JS --}}
    <script>
        // Parse DMS ke Desimal
        function dmsToDecimal(dms) {
            const regex = /(\d+)°(\d+)'([\d.]+)"?([NSEW])/;
            const match = dms.match(regex);

            if (!match) return null;

            let [_, degrees, minutes, seconds, direction] = match;
            degrees = parseFloat(degrees);
            minutes = parseFloat(minutes);
            seconds = parseFloat(seconds);

            let decimal = degrees + minutes / 60 + seconds / 3600;
            if (direction === "S" || direction === "W") {
                decimal *= -1;
            }
            return decimal;
        }

        // Parse Tanggal
        function parseDateWithDay(dateString) {
            const date = new Date(dateString);
            if (isNaN(date.getTime())) {
                return 'Invalid Date';
            }
            const months = [
                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            ];
            const days = [
                'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
            ];
            const dayOfWeek = days[date.getDay()];
            const day = date.getDate();
            const month = months[date.getMonth()];
            const year = date.getFullYear();
            return `${dayOfWeek}, ${day} ${month} ${year}`;
        }

        // Parse Waktu
        function parseTime(timeString) {
            if (!timeString || typeof timeString !== 'string') {
                return 'Invalid Time';
            }
            const [hours, minutes] = timeString.split(':');
            return `${hours}:${minutes}`;
        }

        // Inisialisasi peta
        var map = L.map('map').setView([0.34503860193591596, 101.03634547826526], 9);

        // Tambahkan layer tile
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Ambil data dari API
        fetch('/data-bencana')
            .then(response => response.json())
            .then(data => {
                data.forEach(location => {
                    // Konversi lat long
                    const lat = isNaN(location.latitude) ? dmsToDecimal(location.latitude) : parseFloat(location
                        .latitude);
                    const lng = isNaN(location.longitude) ? dmsToDecimal(location.longitude) : parseFloat(
                        location.longitude);

                    if (lat !== null && lng !== null) {
                        // Market Di Maps
                        const marker = L.marker([lat, lng]).addTo(map);
                        marker.on('click', () => {
                            const konversiTanggal = parseDateWithDay(location.tanggal);
                            const konversiWaktu = parseTime(location.waktu);
                            const modalTableBody = document.getElementById('modalTableBody');
                            modalTableBody.innerHTML = '';
                            const rows = [
                                ['Tanggal', konversiTanggal],
                                ['Waktu', konversiWaktu],
                                ['Kecamatan', location.kecamatan || 'null'],
                                ['Kelurahan', location.kelurahan || 'null'],
                                ['Kepala Keluarga', location.kepala_keluarga || 'null'],
                                ['Jiwa', location.jiwa || 'null'],
                                ['Kerugian Materi', location.materi || 'null'],
                                ['Keterangan', location.keterangan || 'null']
                            ];

                            rows.forEach(([label, value]) => {
                                const row = document.createElement('tr');
                                const cell1 = document.createElement('td');
                                const cell2 = document.createElement('td');
                                cell1.textContent = label;
                                if (label === 'Keterangan' && value !== 'N/A') {
                                    cell2.innerHTML =
                                        value;
                                } else {
                                    cell2.textContent = value;
                                }
                                row.appendChild(cell1);
                                row.appendChild(cell2);
                                modalTableBody.appendChild(row);
                            });
                            new bootstrap.Modal(document.getElementById('locationModal')).show();
                        });
                    }
                });
            })
            .catch(error => {
                console.error('Gagal mengambil data dari API:', error);
            });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#search').on('input', function() {
                var query = $(this).val();

                // Cek jika input kosong, maka tidak melakukan pencarian
                if (query.length > 0) {
                    $.ajax({
                        url: "{{ route('search') }}",
                        method: "GET",
                        data: {
                            query: query,
                        },
                        success: function(data) {
                            // Kosongkan hasil pencarian sebelumnya
                            $('#searchResults').html('');

                            // Jika ada hasil pencarian
                            if (data.length > 0) {
                                data.forEach(function(item) {
                                    // Tampilkan kecamatan dan kelurahan
                                    var button = $(
                                        `<button class="btn btn-sm btn-primary mb-2 d-flex align-items-start">
                                    ${item.kecamatan} - ${item.kelurahan}
                                </button>`
                                    );

                                    // Tambahkan event click ke tombol
                                    button.on('click', function() {
                                        const modalTableBody = document
                                            .getElementById('modalTableBody');
                                        modalTableBody.innerHTML = '';
                                        const konversiTanggal =
                                            parseDateWithDay(item.tanggal);
                                        const konversiWaktu = parseTime(item
                                            .waktu);
                                        const rows = [
                                            ['Tanggal', konversiTanggal],
                                            ['Waktu', konversiWaktu],
                                            ['Kecamatan', item.kecamatan ||
                                                'null'
                                            ],
                                            ['Kelurahan', item.kelurahan ||
                                                'null'
                                            ],
                                            ['Kepala Keluarga', item
                                                .kepala_keluarga || 'null'
                                            ],
                                            ['Jiwa', item.jiwa || 'null'],
                                            ['Kerugian Materi', item
                                                .materi || 'null'
                                            ],
                                            ['Keterangan', item
                                                .keterangan || 'null'
                                            ],
                                        ];

                                        rows.forEach(([label, value]) => {
                                            const row = document
                                                .createElement('tr');
                                            const cell1 = document
                                                .createElement('td');
                                            const cell2 = document
                                                .createElement('td');
                                            cell1.textContent = label;
                                            if (label ===
                                                'Keterangan' &&
                                                value !== 'N/A') {
                                                cell2.innerHTML = value;
                                            } else {
                                                cell2.textContent =
                                                    value;
                                            }
                                            row.appendChild(cell1);
                                            row.appendChild(cell2);
                                            modalTableBody.appendChild(
                                                row);
                                        });

                                        // Tampilkan modal detail
                                        new bootstrap.Modal(document
                                            .getElementById('locationModal')
                                        ).show();

                                        // Tutup modal pencarian
                                        const searchModal = document
                                            .getElementById('modalSearch');
                                        if (searchModal) {
                                            const bootstrapModal = bootstrap
                                                .Modal.getInstance(modalSearch);
                                            if (bootstrapModal) {
                                                bootstrapModal.hide();
                                            }
                                        }
                                    });

                                    $('#searchResults').append(button);
                                });
                            } else {
                                // Jika tidak ada hasil, tampilkan pesan
                                $('#searchResults').html('<p>No results found.</p>');
                            }
                        },
                    });
                } else {
                    // Jika input kosong, kosongkan hasil pencarian
                    $('#searchResults').html('');
                }
            });
        });
    </script>
@endsection
