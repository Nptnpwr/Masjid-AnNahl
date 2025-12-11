<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasjidProfile as Profile;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::first();
        return view('admin.profile.edit', compact('profile'));
    }

    public function updateStatistik(Request $request)
    {
        $data = $request->validate([
            'capacity' => 'required|numeric',
            'year' => 'required|numeric',
            'routine_activities' => 'nullable|string',
            'public_info' => 'nullable|string',
        ]);

        $profile = Profile::firstOrCreate([]);

        Profile::firstOrCreate([])->update($data);

        return back()->with('success', 'Statistik masjid berhasil diperbarui.');
    }

    public function updateTentang(Request $request)
    {
        // Validasi input
        $data = $request->validate([
            'about_text_1' => 'required|string',
            'about_text_2' => 'nullable|string',
            'about_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $profile = Profile::firstOrCreate([]);

        // if image new
        if ($request->hasFile('about_image')) {

            // del
            if (!empty($profile->about_image) && \Storage::disk('public')->exists($profile->about_image)) {
                \Storage::disk('public')->delete($profile->about_image);
            }

            $data['about_image'] = $request->file('about_image')->store('profile/about', 'public');
        }

        $profile->update($data);

        return back()->with('success', 'Tentang masjid berhasil diperbarui.');
    }


    public function updateVisiMisi(Request $request)
    {
        $data = $request->validate([
            'visi' => 'required',
            'misi' => 'required',
        ]);

        Profile::firstOrCreate([])->update($data);

        return back()->with('success', 'Visi & Misi berhasil diperbarui.');
    }

    public function updateLokasi(Request $request)
    {
        $data = $request->validate([
            'address' => 'required',
            'operating_hours' => 'nullable',
            'maps_embed' => 'nullable|string',
            'maps_url' => 'nullable|url',
        ]);

        Profile::firstOrCreate([])->update($data);

        return back()->with('success', 'Lokasi berhasil diperbarui.');
    }

    public function updateFasilitas(Request $request)
    {
        $request->validate([
            'facility_name' => 'required|array',
            'facility_name.*' => 'required|string',

            'facility_icon' => 'required|array',
            'facility_icon.*' => 'required|string',

            'facility_description' => 'required|array',
            'facility_description.*' => 'required|string',
        ]);

        // reconstruct array of objects
        $facilities = [];

        foreach ($request->facility_name as $i => $name) {
            $facilities[] = [
                'name' => $name,
                'icon' => $request->facility_icon[$i] ?? null,
                'description' => $request->facility_description[$i] ?? null,
            ];
        }

        Profile::first()->update([
            'facilities' => json_encode($facilities),
        ]);

        return back()->with('success', 'Fasilitas berhasil diperbarui.');
    }



    public function updateKontak(Request $request)
    {
        $data = $request->validate([
            'whatsapp' => 'nullable|string',
        ]);

        Profile::firstOrCreate([])->update($data);

        return back()->with('success', 'Kontak berhasil diperbarui.');
    }


    public function index()
    {
        $profile = Profile::first();
        return view('admin.profile.index', compact('profile'));
    }

    public function editTentang()
    {
        $profile = Profile::first();
        return view('admin.profile.edit-tentang', compact('profile'));
    }

    public function editVisiMisi()
    {
        $profile = Profile::first();
        return view('admin.profile.edit-visimisi', compact('profile'));
    }

    public function editStatistik()
    {
        $profile = Profile::first();
        return view('admin.profile.edit-statistik', compact('profile'));
    }

    public function editLokasi()
    {
        $profile = Profile::first();
        return view('admin.profile.edit-lokasi', compact('profile'));
    }

    public function editFasilitas()
    {
        $profile = Profile::first();
        return view('admin.profile.edit-fasilitas', compact('profile'));
    }

    public function editKontak()
    {
        $profile = Profile::first();
        return view('admin.profile.edit-kontak', compact('profile'));
    }

}