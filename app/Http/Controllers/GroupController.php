<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use Session;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Group::all());
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
        return view('groups/create');
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
        return response()->json(Group::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::findOrFail($id);
        // Need to create a view to edit the below:
        // return View::make('groups.edit')
        //   ->with('group', $group);

        return view('groups/edit');
        //return response()->redirectToAction('GroupController@create');
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
        $group = Group::findOrFail($id);
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
