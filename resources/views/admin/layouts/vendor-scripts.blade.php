<script src="/assets/libs/jquery/jquery.min.js"></script>
<script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="/assets/js/pages/form-validation.init.js"></script>
<script src="/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="/assets/js/pages/datatable-pages.init.js"></script>
<script src="/assets/js/app.js"></script>


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
    fetch('{{url('admin/maps')}}')
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