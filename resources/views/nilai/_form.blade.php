@php $n = $nilai ?? null; @endphp

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="siswa_id" class="font-weight-bold">Siswa</label>
        <select name="siswa_id" id="siswa_id" class="form-control @error('siswa_id') is-invalid @enderror" required>
            <option value="">-- Pilih Siswa --</option>
            @foreach ($siswas as $s)
                <option value="{{ $s->id }}" {{ old('siswa_id', $n?->siswa_id) == $s->id ? 'selected' : '' }}>
                    {{ $s->nama }} ({{ $s->kelas->nama_kelas ?? '-' }})</option>
            @endforeach
        </select>
        @error('siswa_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="form-group col-md-6">
        <label for="mapel_id" class="font-weight-bold">Mata Pelajaran</label>
        <select name="mapel_id" id="mapel_id" class="form-control @error('mapel_id') is-invalid @enderror" required>
            <option value="">-- Pilih Mata Pelajaran --</option>
            @foreach ($mapels as $m)
                <option value="{{ $m->id }}" {{ old('mapel_id', $n?->mapel_id) == $m->id ? 'selected' : '' }}>
                    {{ $m->nama_mapel }} (KKM {{ $m->kkm }})</option>
            @endforeach
        </select>
        @error('mapel_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
        <label for="nilai_tugas" class="font-weight-bold">Nilai Tugas (30%)</label>
        <input type="number" step="0.01" min="0" max="100" name="nilai_tugas" id="nilai_tugas"
            value="{{ old('nilai_tugas', $n?->nilai_tugas) }}"
            class="form-control @error('nilai_tugas') is-invalid @enderror" required>
        @error('nilai_tugas') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="form-group col-md-4">
        <label for="nilai_uts" class="font-weight-bold">Nilai UTS (30%)</label>
        <input type="number" step="0.01" min="0" max="100" name="nilai_uts" id="nilai_uts"
            value="{{ old('nilai_uts', $n?->nilai_uts) }}"
            class="form-control @error('nilai_uts') is-invalid @enderror" required>
        @error('nilai_uts') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="form-group col-md-4">
        <label for="nilai_uas" class="font-weight-bold">Nilai UAS (40%)</label>
        <input type="number" step="0.01" min="0" max="100" name="nilai_uas" id="nilai_uas"
            value="{{ old('nilai_uas', $n?->nilai_uas) }}"
            class="form-control @error('nilai_uas') is-invalid @enderror" required>
        @error('nilai_uas') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<p class="small text-muted">Nilai akhir dan status kelulusan dihitung otomatis (Tugas 30% + UTS 30% + UAS 40%, dibandingkan dengan KKM mapel).</p>
