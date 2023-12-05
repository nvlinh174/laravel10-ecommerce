<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Page\StoreRequest;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $viewPrefix = 'admin.pages.pages.';
    protected $routeNamePrefix = 'admin.pages.';

    public function __construct()
    {
        view()->share('routeNamePrefix', $this->routeNamePrefix);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Page::all();
        return view("{$this->viewPrefix}index", compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("{$this->viewPrefix}create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Page::create($data);
        return redirect()->route("{$this->routeNamePrefix}index")->with('success_message', 'Thêm dữ liệu thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        $item = $page;
        return view("{$this->viewPrefix}edit", compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Page $page)
    {
        $data = $request->validated();

        Page::where('id', $page->id)->update($data);
        return redirect()->route("{$this->routeNamePrefix}index")->with('success_message', 'Cập nhật dữ liệu thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        //
    }
}
