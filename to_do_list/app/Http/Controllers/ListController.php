<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\To_do_list;
use App\Http\Requests\ListRequest;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = To_do_list::all();

        return view('/list', compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ListRequest $request)
    {
        $list = new To_do_list;
        $form = $request->all();

        unset($form['_token']);
        $list->fill($form)->save();

        return redirect('/lists');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $edit_status = To_do_list::find($id);

        if($edit_status->status === 0){
            $edit_status->status = 1;
        }elseif($edit_status->status === 1){
            $edit_status->status = 0;
        };
        $edit_status->save();

        return redirect('/lists');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        To_do_list::find($id)->delete();
        return redirect('/lists');
    }
}
