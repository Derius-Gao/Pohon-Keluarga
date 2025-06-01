@extends('layout')

@section('title', 'Silsilah Keluarga')

@section('content')
<style>
/* CSS umum */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #ffffff; /* Ubah ke putih polos */
    margin: 0;
    padding: 20px;
    color: #333;
}

/* Struktur Pohon Keluarga */
.family-tree {
    list-style: none;
    padding-left: 0;
    display: flex;
    justify-content: center;
    gap: 80px; /* Jarak antar grup keluarga utama (misal antar keluarga inti Kakek/Nenek) */
    position: relative;
    padding-top: 40px;
    min-height: 500px; /* Tambahkan min-height agar ada ruang untuk garis */
}

/* Garis vertikal utama (dari atas ke node root) */
/* Biasanya hanya untuk root yang tidak punya orang tua */
.family-tree > li::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    width: 2px;
    height: 40px;
    background: #4a4a4a;
    transform: translateX(-50%);
    z-index: 1;
}

/* Wrapper untuk Pasangan dan Anak-anak mereka */
.family-couple-wrap {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    padding-bottom: 80px; /* Ruang untuk garis vertikal ke anak */
}

/* Container pasangan (suami-istri) */
.family-couple {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 50px; /* Jarak antar suami dan istri */
    position: relative;
    padding: 0 40px; /* Padding untuk ruang bagi garis horizontal */
    min-width: 280px; /* Memastikan ruang minimum untuk garis pasangan */
}

/* Garis vertikal dari pasangan ke anak-anak mereka */
.family-couple-wrap::after {
    content: '';
    position: absolute;
    bottom: 0; /* Mulai dari bawah .family-couple-wrap */
    left: 50%;
    width: 2px;
    height: 60px; /* Panjang garis ke garis horizontal anak */
    background: #4a4a4a;
    transform: translateX(-50%);
    z-index: 1;
}

/* Styling individu (foto, label) */
.family-tree li img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    border: 5px solid #fff;
    background: #fff;
    cursor: pointer;
    display: block;
    margin: 0 auto;
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    position: relative;
    z-index: 2;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.family-tree li img:hover {
    transform: scale(1.08);
    box-shadow: 0 16px 40px rgba(0,0,0,0.2);
}

.family-label {
    margin-top: 15px; /* Memberi ruang di bawah foto */
    font-weight: 600;
    font-size: 16px;
    color: #3a3a5a;
    letter-spacing: 0.5px;
    background: #ffffff;
    border-radius: 12px;
    padding: 8px 16px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    display: inline-block;
    user-select: none;
    white-space: nowrap;
    transition: all 0.2s ease-in-out;
}
.family-label small {
    font-weight: normal;
    font-size: 12px;
    color: #666;
    display: block;
    margin-top: 2px;
}
/* Tambahan CSS kecil jika ingin tampilan marga lebih menonjol */
.family-label .marga {
    font-size: 11px;
    color: #888;
    margin-top: 2px;
}

.family-children {
    list-style: none;
    padding-left: 0;
    display: flex;
    justify-content: center;
    gap: 80px; /* Jarak antar anak/saudara kandung */
    position: relative;
    margin-top: 10px; /* Ruang di atas grup anak-anak untuk garis vertikal dari orang tua */
    width: 100%;
}

.family-children::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: #4a4a4a;
    border-radius: 0;
    z-index: 1;
}


/* Setiap anak (individual list item dalam family-children) */
.family-children > li {
    position: relative;
    padding-top: 40px; /* Ruang untuk garis vertikal dari horizontal ke anak */
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* Garis vertikal dari setiap anak ke garis horizontal di atasnya */
.family-children > li::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    width: 2px;
    height: 40px; /* Panjang garis dari garis horizontal ke foto anak */
    background: #4a4a4a;
    transform: translateX(-50%);
    z-index: 1;
}

/* --- Grup Saudara Kandung --- */
/* Wrapper untuk mengelompokkan saudara kandung yang mungkin juga berpasangan */
.sibling-group {
    display: flex;
    flex-direction: column; /* Mengizinkan pasangannya ada di bawah atau di samping */
    align-items: center;
    position: relative;
}

/* Modal Styling */
#modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(0,0,0,0.6);
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

#modal > div {
    background: #fff;
    padding: 30px 25px 20px 25px;
    border-radius: 16px;
    max-width: 350px;
    text-align: center;
    position: relative;
    z-index: 10000;
    box-shadow: 0 10px 40px rgba(0,0,0,0.25);
}

#modal span {
    position: absolute;
    top: 15px;
    right: 20px;
    cursor: pointer;
    font-size: 28px;
    font-weight: bold;
    color: #888;
    transition: color 0.2s ease;
}

#modal span:hover {
    color: #333;
}

#modal-content img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 15px;
    border: 4px solid #bdb2ff;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

#modal-content h3 {
    margin: 0 0 10px 0;
    font-size: 22px;
    color: #3a3a5a;
    font-weight: 700;
}

#modal-content p {
    margin: 0 0 8px 0;
    font-size: 15px;
    color: #555;
}

#modal-content b {
    color: #4a4a4a;
}

form {
    text-align: center;
    margin-bottom: 35px;
}
form label {
    font-weight: bold;
    color: #3a3a5a;
    margin-right: 10px;
}
form select {
    padding: 8px 16px;
    border-radius: 10px;
    border: 1.5px solid #bdb2ff;
    font-weight: 600;
    color: #3a3a5a;
    background-color: #ffffff;
    cursor: pointer;
    outline: none;
    transition: all 0.2s ease;
}
form select:focus {
    border-color: #8a7aff;
    box-shadow: 0 0 0 3px rgba(138, 122, 255, 0.2);
}

/* Responsif */
@media (max-width: 900px) {
    .family-tree, .family-children {
        gap: 40px;
    }
    .family-couple {
        gap: 40px;
        padding: 0 20px;
        min-width: unset;
    }
    .family-tree li img {
        width: 80px;
        height: 80px;
        border-width: 4px;
    }
    .family-label {
        font-size: 14px;
        padding: 6px 12px;
    }
    .family-couple-wrap::after {
        height: 40px;
    }
    .family-children::before {
        left: 20px;
        right: 20px;
    }
    .family-children > li::before {
        height: 30px;
    }
}

@media (max-width: 600px) {
    .family-tree {
        flex-direction: column;
        align-items: center;
        gap: 60px;
    }
    .family-tree > li {
        padding-top: 0;
    }
    .family-tree > li::before {
        display: none;
    }
    .family-couple {
        flex-direction: column;
        gap: 20px;
        padding: 0;
    }
    .family-couple::before {
        display: none;
    }
    /* Untuk tampilan mobile, jika couple distack, beri margin di bawah anggota pertama */
    .family-couple > div:first-child {
        margin-bottom: 20px; /* Ruang antara suami dan istri saat distack */
    }
    .family-couple-wrap::after {
        height: 60px;
    }
    .family-children {
        flex-direction: column;
        align-items: center;
        gap: 30px;
        margin-top: 30px;
    }
    .family-children::before {
        display: none;
    }
    .family-children > li::before {
        height: 20px;
        top: -20px;
    }
    .family-label {
        padding: 5px 10px;
        font-size: 13px;
    }
}

</style>

<h1 style="text-align:center;letter-spacing:1px;margin-bottom:25px;color:#3a3a5a;font-weight:700;">Silsilah Keluarga</h1>

<form method="GET" action="{{ route('familytree.index') }}">
    <label for="id_marga">Filter Marga: </label>
    <select name="id_marga" id="id_marga" onchange="this.form.submit()">
        <option value="">-- Semua Marga --</option>
        @foreach ($margas as $marga)
            <option value="{{ $marga->id_marga }}" {{ ($id_marga == $marga->id_marga) ? 'selected' : '' }}>
                {{ $marga->nama_marga }}
            </option>
        @endforeach
    </select>
</form>

@php
function renderUserNode($user) {
    $foto = $user->foto ? asset('storage/' . $user->foto) : 'https://via.placeholder.com/100?text=No+Photo';
    $label = $user->name;
    $subLabel = '';
    $margaName = $user->marga ? $user->marga->nama_marga : '';

    if ($user->level == 'kp') {
        $subLabel = '(Kepala Keluarga)';
    } elseif ($user->id_ayah || $user->id_ibu) {
        $subLabel = '(' . ($user->jenis_kelamin === 'laki-laki' ? 'Anak Laki-laki' : 'Anak Perempuan') . ')';
    } else {
        $subLabel = '(Pasangan)';
    }

    echo "<div>";
    echo "<img src='{$foto}' alt='Foto {$user->name}' title='{$user->name}' onclick='showModal({$user->id_user})'>";
    echo "<div class='family-label'>{$label}";
    echo "<small>{$subLabel}</small>";
    if ($margaName) {
        echo "<span class='marga'>{$margaName}</span>";
    }
    echo "</div>";
    echo "</div>";
}

function renderFamilyUnit($user, &$shown) {
    if (in_array($user->id_user, $shown)) {
        return;
    }
    $shown[] = $user->id_user;

    $pasangan = method_exists($user, 'pasangan') ? $user->pasangan() : null;
    $allChildren = method_exists($user, 'anak') ? $user->anak() : collect();

    echo '<li>';
    echo '<div class="family-couple-wrap">';
    echo '<div class="family-couple">';
    renderUserNode($user);
    if ($pasangan && !in_array($pasangan->id_user, $shown)) {
        renderUserNode($pasangan);
        $shown[] = $pasangan->id_user;
    }
    echo '</div>';

    if ($allChildren && $allChildren->count() > 0) {
        echo '<ul class="family-children">';
        foreach ($allChildren as $child) {
            renderFamilyUnit($child, $shown);
        }
        echo '</ul>';
    }
    echo '</div>';
    echo '</li>';
}
@endphp

@php $shown = []; @endphp
<ul class="family-tree">
    @foreach ($kepalaKeluarga as $kp)
        @php renderFamilyUnit($kp, $shown); @endphp
    @endforeach
</ul>

<!-- Modal Detail/Edit/Hapus -->
<div id="modal">
    <div>
        <span onclick="closeModal()">×</span>
        <div id="modal-content">Loading...</div>
        @if(in_array(auth()->user()->level, ['admin','superadmin','kp']))
        <div id="modal-action" style="margin-top:18px;display:none;">
            <button class="btn btn-warning" id="modalEditBtn">Edit</button>
            <button class="btn btn-danger" id="modalDeleteBtn">Hapus</button>
        </div>
        @endif
    </div>
</div>

<script>
let currentUserId = null;
function showModal(id_user) {
    const modal = document.getElementById('modal');
    const content = document.getElementById('modal-content');
    modal.style.display = 'flex';
    content.innerHTML = 'Loading...';
    currentUserId = id_user;

    fetch("{{ url('/familytree/user') }}/" + id_user)
        .then(res => {
            if (!res.ok) throw new Error(`HTTP error! status: ${res.status}`);
            return res.json();
        })
        .then(data => {
            let fotoUrl = data.foto;
            if (!fotoUrl.startsWith('http')) {
                fotoUrl = "{{ asset('storage') }}/" + fotoUrl;
            }
            content.innerHTML = `
                <img src="${fotoUrl}" alt="${data.name}">
                <h3>${data.name}</h3>
                <p><b>Email:</b> ${data.email || '-'}</p>
                <p><b>Level:</b> ${data.level || '-'}</p>
                <p><b>Jenis Kelamin:</b> ${data.jenis_kelamin || '-'}</p>
                <p><b>Marga:</b> ${data.marga || '-'}</p>
            `;
            @if(in_array(auth()->user()->level, ['admin','superadmin','kp']))
            document.getElementById('modal-action').style.display = 'block';
            @endif
        })
        .catch(error => {
            console.error('Fetch error:', error);
            content.innerHTML = '<p style="color:red;">Gagal mengambil data. Pastikan ID user benar dan endpoint API berfungsi.</p>';
            @if(in_array(auth()->user()->level, ['admin','superadmin','kp']))
            document.getElementById('modal-action').style.display = 'none';
            @endif
        });
}

function closeModal() {
    document.getElementById('modal').style.display = 'none';
    @if(in_array(auth()->user()->level, ['admin','superadmin','kp']))
    document.getElementById('modal-action').style.display = 'none';
    @endif
}

document.getElementById('modal').addEventListener('click', function(event) {
    if (event.target === this) {
        closeModal();
    }
});

@if(in_array(auth()->user()->level, ['admin','superadmin','kp']))
document.getElementById('modalEditBtn').onclick = function() {
    closeModal();
    openEditModal(currentUserId);
};
document.getElementById('modalDeleteBtn').onclick = function() {
    if (confirm('Yakin ingin menghapus anggota ini?')) {
        fetch("{{ url('/users') }}/" + currentUserId, {
            method: 'POST',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            body: new URLSearchParams({'_method':'DELETE'})
        })
        .then(res => res.json())
        .then(res => {
            if (res.success) {
                location.reload();
            } else {
                alert(res.message || 'Gagal menghapus data');
            }
        })
        .catch(() => alert('Gagal menghapus data'));
    }
};
@endif
</script>
@endsection