<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\TDList;

class CardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $data[2] = array();
        $data[3] = array();
        foreach ($data[0] as $list) {
            array_push($data[2], $list->title);
        }

        array_push($data[3], "unfinished", "kindoffinishedbutnotrealy" ,"finished");

        return view('actions.addCard')->with('lists', $data);
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
            'body' => 'required',
            'list' => 'required',
            'state' => 'required'
        ]);

        $card = new Card;
        $card->title = $request->input('title');
        $card->text = $request->input('body');

        $lists = TDList::all();
        $card->list_id = $lists[$request->input('list')]->id;
        $card->state_id = $request->input('state');
        $card->save();

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
        $data[2] = array();
        

        foreach ($data[0] as $list) {
            array_push($data[2], $list->title);
        }

        $data[3] = Card::find($id);
        $data[4] = array();

        array_push($data[4], "unfinished", "kindoffinishedbutnotrealy" ,"finished");

        return view('actions.editCard')->with('lists', $data);
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
            'body' => 'required',
            'list' => 'required',
            'state' => 'required'
        ]);
        
        $lists = TDList::all();
        Card::where(['id' => $id])->update([
            'title' => $request->input('title'),
            'text' => $request->input('body'),
            'list_id' => $lists[$request->input('list')]->id, 
            'state_id' => $request->input('state')
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
        Card::find($id)->delete();
        return redirect('/');
    }
}
