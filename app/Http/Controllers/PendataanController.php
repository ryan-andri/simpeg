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
    public function store(Request $request, $input)
    {
        switch ($input) {
            case 'tni':
                $request->validate([
                    'nrp' => 'required',
                    'nama' => 'required'
                ]);
                Pendataan_tni::create($request->post());
                break;
            case 'pns':
                $request->validate([
                    'nip' => 'required',
                    'nama' => 'required'
                ]);
                Pendataan_pns::create($request->post());
                break;
            case 'tks':
                $request->validate([
                    'nit' => 'required',
                    'nama' => 'required'
                ]);
                Pendataan_tks::create($request->post());
                break;
        }

        return redirect()->route('pendataan.index')->with('success', 'Data berhasil di simpan!');
    }
}
