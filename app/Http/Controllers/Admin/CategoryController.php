<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $viewPrefix = 'admin.pages.categories.';
    protected $routeNamePrefix = 'admin.categories.';

    public function __construct()
    {
        view()->share('routeNamePrefix', $this->routeNamePrefix);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Category::withDepth()->defaultOrder()->having('depth', '>', 0)->get();
        return view("{$this->viewPrefix}index", compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents = Category::withDepth()->defaultOrder()->get();
        return view("{$this->viewPrefix}create", compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $node = new Category($data);
        $node->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $parents = Category::withDepth()->whereNotDescendantOf($category)->where('id', '<>', $category->id)->defaultOrder()->get();
        return view("{$this->viewPrefix}edit", compact('category', 'parents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }

    public function move(Category $category, $type)
    {
        if ($type === 'up') {
            $category->up();
        } elseif ($type === 'down') {
            $category->down();
        }
        return back();
    }
}
