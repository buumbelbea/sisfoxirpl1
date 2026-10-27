@extends('layouts.main')

@section('title', 'Detail Siswa')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-user-graduate mr-2 text-primary"></i>Detail Siswa</h1>
        <a href="{{ route('siswa.index') }}" class="btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm mr-1"></i> Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-lg-5 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Biodata Siswa</h6>
                </div>
                <div class="card-body">
                    <table class="table table-borderless mb-0">
                        <tr><th width="35%">NIS</th><td><span class="badge badge-secondary">{{ $siswa->nis }}</span></td></tr>
                        <tr><th>Nama</th><td class="font-weight-bold">{{ $siswa->nama }}</td></tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>
                                <span class="badge badge-{{ $siswa->jenis_kelamin == 'L' ? 'primary' : 'danger' }}">
                                    {{ $siswa->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}
                                </span>
                            </td>
                        </tr>
                        <tr><th>Kelas</th><td><span class="badge badge-info">{{ $siswa->kelas->nama_kelas ?? '-' }}</span></td></tr>
                        <tr><th>No HP</th><td>{{ $siswa->no_hp ?? '-' }}</td></tr>
                        <tr><th>Alamat</th><td>{{ $siswa->alamat ?? '-' }}</td></tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-7 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Nilai Akademik</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Mata Pelajaran</th>
                                    <th class="text-center">Tugas</th>
                                    <th class="text-center">UTS</th>
                                    <th class="text-center">UAS</th>
                                    <th class="text-center">Akhir</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($siswa->nilais as $n)
                                    <tr>
                                        <td>{{ $n->mapel->nama_mapel ?? '-' }}</td>
                                        <td class="text-center">{{ $n->nilai_tugas }}</td>
                                        <td class="text-center">{{ $n->nilai_uts }}</td>
                                        <td class="text-center">{{ $n->nilai_uas }}</td>
                                        <td class="text-center"><span class="badge badge-info">{{ $n->nilai_akhir }}</span></td>
                                        <td class="text-center">
                                            <span class="badge badge-{{ $n->keterangan == 'Lulus' ? 'success' : 'danger' }}">{{ $n->keterangan }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4 text-muted">Belum ada nilai untuk siswa ini.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
