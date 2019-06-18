<?php

namespace App\Http\Controllers;

use App\Models\Big;
/**
 * Class BigController
 * @package App\Http\Controllers
 */
class BigController extends Controller
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
        $bigs = Big::paginate($this->paginationLimit);

        return view('admin.big.index', compact('bigs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.big.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store()
    {
        Big::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $big = Big::findOrFail($id);

        return view('admin.big.show', compact('big'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $big = Big::findOrFail($id);

       return view('admin.big.edit', compact('big'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
         $big = Big::findOrFail($id);
         $big->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $big = Big::findOrFail($id);
        $big->delete();
    }

}