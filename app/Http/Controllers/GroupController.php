<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use Session;
use View;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        // Returning JSON view:
        // return response()->json(Group::all());

        $groups = Group::all();
        return view('groups.index',compact('groups'))
            ->with('i', (request()->input('page', 1)));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Load the create form for creating new resource
        // Would need to create a view for this, I guess??
        // return View::make('groups.create');
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = new Group();
        $postData = $request->all();
        $group->fill($postData)->save();
        return response()->redirectToAction('GroupController@create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return response()->json(Group::find($id));

        $group = Group::find($id);
        return view('groups.show',compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::find($id);
        return view('groups.edit', compact('group'));
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
        $group = Group::find($id);
        $group->fill($request->all())->save();

        Session::flash('message', 'Successfully updated group.');
        // Alternatively??
        return response()->redirectToAction('GroupController@edit', ['id' => $id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();

        Session::flash('message', 'Group successfully deleted.');
        ///return Redirect::route('items.index');
    }
}
