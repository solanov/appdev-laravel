<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "Displaying all products";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "Form to create a product";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "Storing new product";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "Showing product with ID: $id";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "Editing product with ID: $id";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "Updating product with ID: $id";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "Deleting product with ID: $id";
    }
}
