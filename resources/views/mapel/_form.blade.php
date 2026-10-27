@php $m = $mapel ?? null; @endphp

<div class="form-group">
    <label for="kode_mapel" class="font-weight-bold">Kode Mapel</label>
    <input type="text" name="kode_mapel" id="kode_mapel" value="{{ old('kode_mapel', $m?->kode_mapel) }}"
        class="form-control @error('kode_mapel') is-invalid @enderror" placeholder="Contoh: MP-PBO" required>
    @error('kode_mapel') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label for="nama_mapel" class="font-weight-bold">Nama Mata Pelajaran</label>
    <input type="text" name="nama_mapel" id="nama_mapel" value="{{ old('nama_mapel', $m?->nama_mapel) }}"
        class="form-control @error('nama_mapel') is-invalid @enderror" required>
    @error('nama_mapel') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label for="kkm" class="font-weight-bold">KKM Minimum</label>
    <input type="number" name="kkm" id="kkm" min="0" max="100" value="{{ old('kkm', $m?->kkm ?? 75) }}"
        class="form-control @error('kkm') is-invalid @enderror" required>
    @error('kkm') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
