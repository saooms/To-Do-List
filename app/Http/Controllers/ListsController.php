<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\TDList;

class ListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

        return view('actions.addList')->with('lists', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $list = new TDList; 
        $list->title = $request->input('title');

        $list->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $data[2] = TDList::find($id);
        $data[3] = array();

        array_push($data[3], "all", "unfinished", "kindoffinishedbutnotrealy","finished");

        return view('actions.editList')->with('lists', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'date' => 'required'
        ]);

        $state = ($request->input('orderstate') == 'true')? 1 : 0;

        TDList::where(['id' => $id])->update([
            'title' => $request->input('title'),
            'filterdate' => $request->input('date'),
            'filterstate' => $request->input('filterstate'),
            'orderstate' => $state
        ]);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TDList::find($id)->delete();
        return redirect('/');
    }
}
