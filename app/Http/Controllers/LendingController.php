<?php

namespace App\Http\Controllers;

use App\Models\Lending;
use Illuminate\Http\Request;

class LendingController extends Controller
{
    public function index(){
        return Lending::all();
    }
    
    public function show ($user_id, $copy_id, $start)
    {
        $lending = Lending::where('user_id', $user_id)
        ->where('copy_id', $copy_id)
        ->where('start', $start)
        ->get();
        return $lending[0];
    }

    public function store(Request $request){
        $record = new Lending();
        $record->fill($request->all());
        $record->save();
    }

    public function update(Request $request, $user_id, $copy_id, $start){
        $record = $this->show($user_id, $copy_id, $start);
        $record->fill($request->all());
        $record->save();
    }

    public function destroy($user_id, $copy_id, $start){
        $this->show($user_id, $copy_id, $start)->delete();
    }
}
