<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use App\Models\Photo;
use Illuminate\Http\Request;

class BorrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        $borrowers=Borrower::all();

        return view('borrowers.index', compact('borrowers'));

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request )
    {
        //
        $updateData = $request->validate([
            'name'=> 'required|max:255',
            'contact_number'=> 'required|max:255',
            'photo_id'=> 'required|max:255',
            'code'=> 'required|max:255',
        ]);
        if($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();


            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);
            $updateData['photo_id'] = $photo->id;


        }

        Borrower::create($updateData);


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
        $borrowers = Borrower::findOrFail($id);


        return view('borrowers.edit',compact('borrowers'));
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
            'name'=> 'required|max:255',
            'contact_number'=> 'required|max:255',
            'photo_id'=> 'file',
            'code'=> 'required|max:255',
        ]);
        if($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();


            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);

            $updateData['photo_id'] = $photo->id;
        }
        $borrowers =  Borrower::findOrFail($id);

        $borrowers->update($request->all());

        Borrower::whereId($id)->update($updateData);

        return redirect('borrowers')->with('completed', 'borrowers been deleted');

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
        $borrowers = Borrower::findOrFail($id);



        $borrowers->delete();


        return redirect('borrowers')->with('completed', 'Borrower been deleted');

    }
}
