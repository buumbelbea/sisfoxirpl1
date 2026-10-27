<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NilaiController extends Controller
{
    public function index()
    {
        $nilais = Nilai::with(['siswa.kelas', 'mapel'])->orderBy('id')->get();

        return view('nilai.index', compact('nilais'));
    }

    public function create()
    {
        $siswas = Siswa::with('kelas')->orderBy('nama')->get();
        $mapels = Mapel::orderBy('nama_mapel')->get();

        return view('nilai.create', compact('siswas', 'mapels'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'siswa_id' => [
                'required',
                'exists:siswas,id',
                Rule::unique('nilais')->where(fn ($q) => $q->where('mapel_id', $request->mapel_id)),
            ],
            'mapel_id' => 'required|exists:mapels,id',
            'nilai_tugas' => 'required|numeric|min:0|max:100',
            'nilai_uts' => 'required|numeric|min:0|max:100',
            'nilai_uas' => 'required|numeric|min:0|max:100',
        ], [
            'siswa_id.unique' => 'Nilai siswa ini untuk mata pelajaran tersebut sudah ada.',
        ]);

        Nilai::create($this->hitung($data));

        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil ditambahkan.');
    }

    public function edit(Nilai $nilai)
    {
        $siswas = Siswa::with('kelas')->orderBy('nama')->get();
        $mapels = Mapel::orderBy('nama_mapel')->get();

        return view('nilai.edit', compact('nilai', 'siswas', 'mapels'));
    }

    public function update(Request $request, Nilai $nilai)
    {
        $data = $request->validate([
            'siswa_id' => [
                'required',
                'exists:siswas,id',
                Rule::unique('nilais')
                    ->where(fn ($q) => $q->where('mapel_id', $request->mapel_id))
                    ->ignore($nilai->id),
            ],
            'mapel_id' => 'required|exists:mapels,id',
            'nilai_tugas' => 'required|numeric|min:0|max:100',
            'nilai_uts' => 'required|numeric|min:0|max:100',
            'nilai_uas' => 'required|numeric|min:0|max:100',
        ], [
            'siswa_id.unique' => 'Nilai siswa ini untuk mata pelajaran tersebut sudah ada.',
        ]);

        $nilai->update($this->hitung($data));

        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil diperbarui.');
    }

    public function destroy(Nilai $nilai)
    {
        $nilai->delete();

        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil dihapus.');
    }

    /**
     * Nilai akhir = tugas 30% + UTS 30% + UAS 40%, keterangan berdasarkan KKM mapel.
     */
    private function hitung(array $data): array
    {
        $akhir = round(
            ($data['nilai_tugas'] * 0.3) + ($data['nilai_uts'] * 0.3) + ($data['nilai_uas'] * 0.4),
            2
        );
        $kkm = Mapel::findOrFail($data['mapel_id'])->kkm;

        $data['nilai_akhir'] = $akhir;
        $data['keterangan'] = $akhir >= $kkm ? 'Lulus' : 'Tidak Lulus';

        return $data;
    }
}
