<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Components\Recursive;

class CategoryController extends Controller
{

    private $category;

    public function __construct(Category $category) {
        $this->category = $category;
    }

    public function getCategory($parentId) {
        $data = $this->category->all();
        $recursive = new Recursive($data);
        $htmlOption = $recursive->categoryRecursive($parentId);
        return $htmlOption;
    }

    public function create() {
        $htmlOption = $this->getCategory($parentId = '');
        //$htmlOption = $this->categoryRecursive(0);
        return view('admin.category.add', compact('htmlOption'));
    }

    public function index() {
        $categories = $this->category->latest()->paginate(5);
        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request) {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str::slug($request->name)
        ]);

        return redirect()->route('categories.index');
    }

    public function edit($id) {
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('admin.category.edit', compact('category', 'htmlOption'));
    }

    public function update($id, Request $request) {
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str::slug($request->name)
        ]);
        return redirect()->route('categories.index');
    }

    public function delete($id) {
        $this->category->find($id)->delete();
        return redirect()->route('categories.index');
    }

    public function search(Request $request) {
        $categories = Category::where('name', 'like', '%'.$request->key.'%')->get();
        return view('admin.category.search', compact('categories'));
    }

}
