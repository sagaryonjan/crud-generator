<?php

namespace App\Http\Controllers;

use App\Models\Beast;
/**
 * Class BeastController
 * @package App\Http\Controllers
 */
class BeastController extends Controller
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
        $beasts = Beast::paginate($this->paginationLimit);

        return view('admin.beast.index', compact('beasts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.beast.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store()
    {
        Beast::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $beast = Beast::findOrFail($id);

        return view('admin.beast.show', compact('beast'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $beast = Beast::findOrFail($id);

       return view('admin.beast.edit', compact('beast'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
         $beast = Beast::findOrFail($id);
         $beast->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $beast = Beast::findOrFail($id);
        $beast->delete();
    }

}