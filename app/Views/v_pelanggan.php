<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="asset/fontawesome/css/all.css">
    <link rel="stylesheet" href="asset/sweetalert/node_modules/sweetalert2/dist/sweetalert2.min.css">
</head>
<body>
    <div class="container mt-5">
        <p class="fs-2 fw-bold text-center">Data Pelanggan</p>
        <!-- Tombol untuk membuka SweetAlert form -->
        <button type="button" class="btn btn-success float-end mb-3" id="tmbhDataBtn">
            <i class="fa-solid fa-cart-plus"></i> Tambah Data
        </button>

        <table class="table table-bordered mt-4">
            <thead class="text-center">
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No. Telp</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- Tambahkan data sesuai kebutuhan -->
                </tr>
            </tbody>
        </table>
    </div>

    <script src="asset/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="asset/bootstrap/js/jquery-3.7.1.min.js"></script>
    <script src="asset/sweetalert/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

    <script>
    // Fungsi untuk menampilkan SweetAlert2 dengan form
    document.getElementById("tmbhDataBtn").addEventListener("click", function() {
        // Menampilkan form input data pelanggan di dalam modal SweetAlert2
        Swal.fire({
            title: 'Tambah Data Pelanggan',
            html: `
                <div>
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" class="swal2-input" placeholder="Nama Pelanggan" required>
                    <label for="alamat">Alamat:</label>
                    <input type="text" id="alamat" class="swal2-input" placeholder="Alamat Pelanggan" required>
                    <label for="noTelp">No. Telp:</label>
                    <input type="text" id="noTelp" class="swal2-input" placeholder="No. Telp" required>
                </div>
            `,
            focusConfirm: false,
            showCancelButton: true,
            confirmButtonText: 'Konfirmasi Data',
            cancelButtonText: 'Batal',
            preConfirm: () => {
                // Ambil nilai dari form input
                const nama = document.getElementById("nama").value;
                const alamat = document.getElementById("alamat").value;
                const noTelp = document.getElementById("noTelp").value;

                // Validasi input
                if (!nama || !alamat || !noTelp) {
                    Swal.showValidationMessage('Harap mengisi semua field');
                    return false;
                }

                return { nama, alamat, noTelp }; // Kembalikan data yang diinput
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const { nama, alamat, noTelp } = result.value;

                // Menampilkan konfirmasi dengan data yang diinput
                Swal.fire({
                    title: 'Konfirmasi Data',
                    html: `
                        <p><strong>Nama:</strong> ${nama}</p>
                        <p><strong>Alamat:</strong> ${alamat}</p>
                        <p><strong>No. Telp:</strong> ${noTelp}</p>
                    `,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Data Benar',
                    cancelButtonText: 'Ubah Data',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Menampilkan pesan berhasil jika data benar
                        Swal.fire({
                            title: 'Data Ditambahkan!',
                            text: 'Data pelanggan baru telah berhasil ditambahkan.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    } else {
                        // Jika data perlu diperbaiki, kembali ke form untuk mengedit
                        Swal.fire({
                            title: 'Ubah Data',
                            text: 'Silakan perbaiki data yang salah.',
                            icon: 'warning',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            }
        });
    });
    </script>
</body>
</html>
