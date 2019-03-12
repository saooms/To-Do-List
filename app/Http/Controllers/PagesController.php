<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\TDList;

class PagesController extends Controller
{
    public function index()
    {
        $data = array();
        $data[0] = TDList::ALL();
        $data[1] = array();
        
        foreach ($data[0] as $list) {
            if ($list->orderstate == 1) {
                array_push($data[1], Card::where(['list_id' => $list->id])->orderBy('state_id', 'desc')->get());
            }
            else {
                array_push($data[1], Card::where(['list_id' => $list->id])->get());
            }
        }

        return view('pages.index')->with('lists', $data);
    }

}
