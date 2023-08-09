<?php

namespace App\Http\Controllers;

use App\Models\Pendataan_tni;
use App\Models\Pendataan_pns;
use App\Models\Pendataan_tks;

use Illuminate\Http\Request;

class PendataanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pendataan.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $devisi = $input['devisi'];

        if ($devisi == 'tni') {
            $tni = Pendataan_tni::where('nrp', $input['nrp'])->first();
            if (!is_null($tni)) {
                return redirect()->route('pendataan.index')->with('dupe', 'Data NRP: ' . $input['nrp'] . ' sudah ada!');
            }
            $request->validate([
                'nrp' => 'required',
                'nama' => 'required'
            ]);
            Pendataan_tni::create($request->post());
        } elseif ($devisi == 'pns') {
            $pns = Pendataan_pns::where('nip', $input['nip'])->first();
            if (!is_null($pns)) {
                return redirect()->route('pendataan.index')->with('dupe', 'Data NIP: ' . $input['nip'] . ' sudah ada!');
            }
            $request->validate([
                'nip' => 'required',
                'nama' => 'required'
            ]);
            Pendataan_pns::create($request->post());
        } elseif ($devisi == 'tks') {
            $tks = Pendataan_tks::where('nit', $input['nit'])->first();
            if (!is_null($tks)) {
                return redirect()->route('pendataan.index')->with('dupe', 'Data NIT: ' . $input['nit'] . ' sudah ada!');
            }
            $request->validate([
                'nit' => 'required',
                'nama' => 'required'
            ]);
            Pendataan_tks::create($request->post());
        }

        return redirect()->route('pendataan.index')->with('success', 'Data ' . $devisi . ' berhasil di simpan!');
    }
}