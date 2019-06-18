<?php

namespace App\Http\Controllers;

use App\Models\Bait;
/**
 * Class BaitController
 * @package App\Http\Controllers
 */
class BaitController extends Controller
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
        $baits = Bait::paginate($this->paginationLimit);

        return view('admin.bait.index', compact('baits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bait.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store()
    {
        Bait::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $bait = Bait::findOrFail($id);

        return view('admin.bait.show', compact('bait'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $bait = Bait::findOrFail($id);

       return view('admin.bait.edit', compact('bait'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
         $bait = Bait::findOrFail($id);
         $bait->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $bait = Bait::findOrFail($id);
        $bait->delete();
    }

}