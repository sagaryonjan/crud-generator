<?php

namespace App\Http\Controllers;

use App\Models\Best;
/**
 * Class BestController
 * @package App\Http\Controllers
 */
class BestController extends Controller
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
        $bests = Best::paginate($this->paginationLimit);

        return view('admin.best.index', compact('bests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.best.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store()
    {
        Best::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $best = Best::findOrFail($id);

        return view('admin.best.show', compact('best'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $best = Best::findOrFail($id);

       return view('admin.best.edit', compact('best'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
         $best = Best::findOrFail($id);
         $best->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $best = Best::findOrFail($id);
        $best->delete();
    }

}