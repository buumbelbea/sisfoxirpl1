@php $g = $guru ?? null; @endphp

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="nip" class="font-weight-bold">NIP</label>
        <input type="text" name="nip" id="nip" value="{{ old('nip', $g?->nip) }}"
            class="form-control @error('nip') is-invalid @enderror" required>
        @error('nip') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="form-group col-md-6">
        <label for="nama" class="font-weight-bold">Nama Guru</label>
        <input type="text" name="nama" id="nama" value="{{ old('nama', $g?->nama) }}"
            class="form-control @error('nama') is-invalid @enderror" required>
        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
        <label for="jenis_kelamin" class="font-weight-bold">Jenis Kelamin</label>
        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror"
            required>
            <option value="">-- Pilih --</option>
            <option value="L" {{ old('jenis_kelamin', $g?->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-Laki</option>
            <option value="P" {{ old('jenis_kelamin', $g?->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
        </select>
        @error('jenis_kelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="form-group col-md-4">
        <label for="email" class="font-weight-bold">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email', $g?->email) }}"
            class="form-control @error('email') is-invalid @enderror">
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="form-group col-md-4">
        <label for="no_hp" class="font-weight-bold">No HP</label>
        <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp', $g?->no_hp) }}"
            class="form-control @error('no_hp') is-invalid @enderror">
        @error('no_hp') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="form-group">
    <label for="alamat" class="font-weight-bold">Alamat</label>
    <textarea name="alamat" id="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $g?->alamat) }}</textarea>
    @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
