@php $k = $kelas ?? null; @endphp

<div class="form-group">
    <label for="nama_kelas" class="font-weight-bold">Nama Kelas</label>
    <input type="text" name="nama_kelas" id="nama_kelas" value="{{ old('nama_kelas', $k?->nama_kelas) }}"
        class="form-control @error('nama_kelas') is-invalid @enderror" placeholder="Contoh: XI RPL 1" required>
    @error('nama_kelas') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label for="tingkat" class="font-weight-bold">Tingkat</label>
    <select name="tingkat" id="tingkat" class="form-control @error('tingkat') is-invalid @enderror" required>
        <option value="">-- Pilih Tingkat --</option>
        @foreach (['X', 'XI', 'XII'] as $t)
            <option value="{{ $t }}" {{ old('tingkat', $k?->tingkat) == $t ? 'selected' : '' }}>{{ $t }}</option>
        @endforeach
    </select>
    @error('tingkat') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label for="jurusan" class="font-weight-bold">Jurusan</label>
    <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan', $k?->jurusan) }}"
        class="form-control @error('jurusan') is-invalid @enderror" placeholder="Contoh: Rekayasa Perangkat Lunak" required>
    @error('jurusan') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label for="tahun_ajaran" class="font-weight-bold">Tahun Ajaran</label>
    <input type="text" name="tahun_ajaran" id="tahun_ajaran" value="{{ old('tahun_ajaran', $k?->tahun_ajaran) }}"
        class="form-control @error('tahun_ajaran') is-invalid @enderror" placeholder="Contoh: 2025/2026" required>
    @error('tahun_ajaran') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
