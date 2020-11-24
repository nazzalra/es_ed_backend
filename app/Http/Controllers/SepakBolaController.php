<?php

namespace App\Http\Controllers;

use App\Models\SepakBola;
use Illuminate\Http\Request;

class SepakBolaController extends Controller{
    public function index(){
        $results = SepakBola::orderBy('id','DESC')->get();
        $json = json_encode($results);
        return $json;
    }
    public function store(Request $request){
        $klub = $request->input('klub');
        $pemain = ucwords($request->input('pemain'));
        $sb = new SepakBola();
        $sb->klub = $klub;
        $sb->pemain = $pemain;
        $sb->save();

        $data = ['pesan' => $pemain . ' telah ditambahkan.'];
        return response()->json($data);
    }
}