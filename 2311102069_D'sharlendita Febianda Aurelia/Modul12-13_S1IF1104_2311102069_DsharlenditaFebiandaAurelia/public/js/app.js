function loadData() {
    const result = document.getElementById('result');

    result.innerHTML = "<div class='loading'>Loading data...</div>";

    fetch('/get-mahasiswa')
        .then(res => {
            if (!res.ok) throw new Error("Gagal ambil data dari server");
            return res.json();
        })
        .then(data => {

            if (!Array.isArray(data) || data.length === 0) {
                result.innerHTML = `
                    <div class="empty-card">
                        <h3>Data masih kosong</h3>
                        <p>Silakan tambahkan data mahasiswa terlebih dahulu.</p>
                        <a href="/tambah-mahasiswa" class="cta empty-btn">Tambah Data</a>
                    </div>
                `;
                return;
            }

            let html = "<div class='card-container'>";

            data.forEach((mhs, i) => {
                const nama = mhs.nama ?? '-';
                const nim = mhs.nim ?? '-';
                const jurusan = mhs.jurusan ?? '-';
                const avatar = nama !== '-' ? nama.charAt(0).toUpperCase() : '?';

                html += `
                    <div class="card mahasiswa-card" style="animation-delay:${i * 0.1}s">
                        <div class="student-header">
                            <div class="student-avatar">${avatar}</div>

                            <div>
                                <h3>${nama}</h3>
                                <p class="student-subtitle">Mahasiswa Aktif</p>
                            </div>
                        </div>

                        <div class="student-detail">
                            <p>
                                <span>NIM</span>
                                <strong>${nim}</strong>
                            </p>

                            <p>
                                <span>Jurusan</span>
                                <strong>${jurusan}</strong>
                            </p>
                        </div>

                        <div class="card-actions">
                            <button type="button" onclick="edit(${mhs.id})" class="action-btn edit-btn">
                                Edit
                            </button>

                            <button type="button" onclick="hapus(${mhs.id})" class="action-btn delete-btn">
                                Delete
                            </button>
                        </div>
                    </div>
                `;
            });

            html += "</div>";
            result.innerHTML = html;
        })
        .catch(err => {
            console.error(err);
            result.innerHTML = "<div class='loading'>Gagal mengambil data</div>";
        });
}

function hapus(id) {
    if (!confirm("Yakin mau hapus data ini?")) return;

    fetch(`/delete-mahasiswa/${id}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        }
    })
    .then(res => {
        if (!res.ok) throw new Error("Gagal hapus");
        return res.json();
    })
    .then(res => {
        if (res.success) {
            alert("Data berhasil dihapus");
            loadData();
        } else {
            alert("Gagal hapus data");
        }
    })
    .catch(err => {
        console.error(err);
        alert("Error saat menghapus");
    });
}

function edit(id) {
    window.location.href = `/edit-mahasiswa/${id}`;
}

document.addEventListener('DOMContentLoaded', function () {
    loadData();
});

