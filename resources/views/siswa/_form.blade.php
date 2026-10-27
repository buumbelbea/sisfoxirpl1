@php $s = $siswa ?? null; @endphp

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="nis" class="font-weight-bold">NIS</label>
        <input type="text" name="nis" id="nis" value="{{ old('nis', $s?->nis) }}"
            class="form-control @error('nis') is-invalid @enderror" required>
        @error('nis') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="form-group col-md-6">
        <label for="nama" class="font-weight-bold">Nama Lengkap</label>
        <input type="text" name="nama" id="nama" value="{{ old('nama', $s?->nama) }}"
            class="form-control @error('nama') is-invalid @enderror" required>
        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="kelas_id" class="font-weight-bold">Kelas</label>
        <select name="kelas_id" id="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror" required>
            <option value="">-- Pilih Kelas --</option>
            @foreach ($kelas as $k)
                <option value="{{ $k->id }}" {{ old('kelas_id', $s?->kelas_id) == $k->id ? 'selected' : '' }}>
                    {{ $k->nama_kelas }}</option>
            @endforeach
        </select>
        @error('kelas_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="form-group col-md-6">
        <label for="jenis_kelamin" class="font-weight-bold">Jenis Kelamin</label>
        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror"
            required>
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="L" {{ old('jenis_kelamin', $s?->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-Laki</option>
            <option value="P" {{ old('jenis_kelamin', $s?->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
        </select>
        @error('jenis_kelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="form-group">
    <label for="no_hp" class="font-weight-bold">No HP</label>
    <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp', $s?->no_hp) }}"
        class="form-control @error('no_hp') is-invalid @enderror">
    @error('no_hp') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label for="alamat" class="font-weight-bold">Alamat</label>
    <textarea name="alamat" id="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $s?->alamat) }}</textarea>
    @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
