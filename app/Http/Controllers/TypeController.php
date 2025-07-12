<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Validation\ValidatesRequests;

class TypeController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::get();
        return response($types, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50|unique:types,name',
            'sort' => 'nullable|integer',
        ]);

        if (empty($request->sort)) {
            $max = Type::get()->max('sort');
            $request['sort'] = $max+1;
        }

        $type = Type::create($request->all());
        return response($type, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return response($type, Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $type->update($request->all());
        return response($type, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
