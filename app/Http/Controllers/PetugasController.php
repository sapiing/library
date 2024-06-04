<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = Petugas::orderBy('created_at', 'DESC')->get();
        $totalPetugas = Petugas::count();
        return view("pages.petugas.index", compact('petugas', 'totalPetugas')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('pages.petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
          "nama"=> "required",
          "email"=> "required",
          "alamat"=> "required",
          "nomor_telepon"=> "required",
          "jenis_kelamin"=> "required",
        ]);

        $anggota = new Petugas([
          "nama"=> $validateData['nama'],
          'email'=> $validateData['email'],
          'alamat'=> $validateData['alamat'],
          'nomor_telepon'=> $validateData['nomor_telepon'],
          'jenis_kelamin'=> $validateData['jenis_kelamin'],
        ]);

        $anggota->save();

        return redirect()->route('petugas')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $petugas = Petugas::find($id);
        return view('pages.petugas.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $petugas = Petugas::findOrFail( $id );
        $petugas->update( $request->all() );
        return redirect()->route('petugas')->with('success','Berhasil mengedit data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $petugas = Petugas::findOrFail($id);
        $petugas->delete();
        return redirect()->route('petugas')->with('success','Data berhasil di hapus');
    }

    public function search(Request $request)
    {
      $query = $request->input('query');
      $petugas = Petugas::query(); // Adjust the query logic here

      if ($query) {
        $petugas->where('nama', 'like', "%$query%") // You can add more columns to search here
          ->orWhere('email', 'like', "%$query%")
          ->orWhere('nomor_telepon', 'like', "%$query%");
      }

      $totalPetugas = Petugas::count();

      $petugas = $petugas->get();
      return view('pages.petugas.index', compact('petugas', 'totalPetugas')); // Adjust the view name
    }
}
