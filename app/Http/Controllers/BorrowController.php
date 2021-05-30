<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        $borrows =Borrow::all();


        return view('borrows.index', compact('borrows'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        $updateData = $request->validate([

            'due_at'=> 'required|max:255',
            'returned_at'=> 'required|max:255',
            'borrowed_by'=> 'required|max:255',
            'book_id'=> 'required|max:255',
        ]);

        Borrow::create($updateData);


        return redirect()->back();
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $borrows = Borrow::findOrFail($id);


        return view(' borrows.edit',compact('borrows'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        //
        $updateData = $request->validate([

            'due_at'=> 'required|max:255',
            'returned_at'=> 'required|max:255',
            'borrowed_by'=> 'required|max:255',
            'book_id'=> 'required|max:255',
        ]);
        $borrows = Borrow::findOrFail($id);

        $borrows->update($request->all());



        return redirect('borrows')->with('completed', 'Borrow been deleted');;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        //
        $borrows = Borrow::findOrFail($id);



        $borrows->delete();


        return redirect('borrows')->with('completed', 'Author been deleted');

    }
}
