<?php

namespace App\Http\Controllers;

use App\Models\Beg;
/**
 * Class BegController
 * @package App\Http\Controllers
 */
class BegController extends Controller
{

    /**
     * Pagination Limit
     */
    protected $paginationLimit = 10;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $begs = Beg::paginate($this->paginationLimit);

        return view('admin.beg.index', compact('begs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.beg.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store()
    {
        Beg::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $beg = Beg::findOrFail($id);

        return view('admin.beg.show', compact('beg'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $beg = Beg::findOrFail($id);

       return view('admin.beg.edit', compact('beg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
         $beg = Beg::findOrFail($id);
         $beg->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $beg = Beg::findOrFail($id);
        $beg->delete();
    }

}