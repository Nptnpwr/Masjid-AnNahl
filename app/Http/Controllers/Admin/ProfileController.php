<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::first();
        return view('admin.profile.edit', compact('profile'));
    }

    public function updateInformasi(Request $request)
    {
        $data = $request->validate([
            'kapasitas' => 'required|numeric',
            'tahun_berdiri' => 'required',
            'kegiatan_rutin' => 'nullable|string',
            'informasi_publik' => 'nullable|string',
            'whatsapp' => 'nullable|string',
        ]);

        Profile::first()->update($data);

        return back()->with('success', 'Informasi umum berhasil diperbarui.');
    }

    public function updateTentang(Request $request)
    {
        $data = $request->validate([
            'about_text_1' => 'required',
            'about_text_2' => 'nullable',
        ]);

        Profile::first()->update($data);

        return back()->with('success', 'Tentang masjid berhasil diperbarui.');
    }

    public function updateVisiMisi(Request $request)
    {
        $data = $request->validate([
            'visi' => 'required',
            'misi' => 'required',
        ]);

        Profile::first()->update($data);

        return back()->with('success', 'Visi & Misi berhasil diperbarui.');
    }

    public function updateLokasi(Request $request)
    {
        $data = $request->validate([
            'alamat' => 'required',
            'jam_operasional' => 'nullable',
            'maps_url' => 'nullable|url',
        ]);

        Profile::first()->update($data);

        return back()->with('success', 'Lokasi berhasil diperbarui.');
    }

    public function updateFasilitas(Request $request)
    {
        $data = $request->validate([
            'fasilitas' => 'array',
            'fasilitas.*.name' => 'required|string',
            'fasilitas.*.icon' => 'nullable|string',
            'fasilitas.*.description' => 'nullable|string',
        ]);

        Profile::first()->update([
            'facilities' => json_encode($data['fasilitas']),
        ]);

        return back()->with('success', 'Fasilitas berhasil diperbarui.');
    }
}

?>