<?php

namespace App\Http\Controllers;

use App\Models\Pant;
/**
 * Class PantController
 * @package App\Http\Controllers
 */
class PantController extends Controller
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
        $pants = Pant::paginate($this->paginationLimit);

        return view('admin.pant.index', compact('pants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pant.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store()
    {
        Pant::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $pant = Pant::findOrFail($id);

        return view('admin.pant.show', compact('pant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $pant = Pant::findOrFail($id);

       return view('admin.pant.edit', compact('pant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
         $pant = Pant::findOrFail($id);
         $pant->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $pant = Pant::findOrFail($id);
        $pant->delete();
    }

}