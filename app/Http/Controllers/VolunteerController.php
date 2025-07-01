<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Volunteer;
use Illuminate\Support\Facades\Storage;
class VolunteerController extends Controller
{
    public function create()
    {
        return view('volunteer.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'no_telp' => 'required|string|regex:/^[0-9]{1,12}$/',
            'alamat' => 'required|string',
            'status_kesehatan' => ['required', Rule::in(['ya', 'tidak'])],
            'penjelasan' => [
                'nullable',
                'string',
                Rule::requiredIf(function () use ($request) {
                    return $request->status_kesehatan === 'ya';
                }),
            ],
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('foto_volunteer'), $fotoName);
            $validatedData['foto'] = 'foto_volunteer/' . $fotoName;
        }

        Volunteer::create($validatedData);

        return redirect('/')->with('success', 'Volunteer berhasil dikirim!');
    }
}
