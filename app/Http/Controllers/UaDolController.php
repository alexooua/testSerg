<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UadolModel;

class UaDolController extends Controller
{
    public function  index (){
        return UadolModel::all();
    }
    public function show ($id){
        return UadolModel::find($id);
    }
    public function store (Request $request){
        return UadolModel::create($request->all());
    }
    public function update (Request $request, $id){
        $task=UadolModel::findOrfail($id);
        $task->update($request->all());
        return $task;
    }
    public function delete (Request $request, $id){
        $task=UadolModel::findOrfail($id);
        $task->delete();
        return 204;
    }
}
