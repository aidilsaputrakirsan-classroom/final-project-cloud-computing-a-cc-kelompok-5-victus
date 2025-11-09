<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        // require authentication for create/store/edit/update/destroy actions
        $this->middleware('auth')->except(['index']);
    }
    public function index(Request $request)
    {
        // support sorting via ?sort=column&direction=asc|desc
        $allowedSorts = ['id', 'name', 'slug', 'parent', 'active', 'posts'];
        $sort = $request->get('sort');
        $direction = strtolower($request->get('direction', 'asc')) === 'desc' ? 'desc' : 'asc';

        $query = Category::withCount('posts');

        if (in_array($sort, $allowedSorts, true)) {
            switch ($sort) {
                case 'id':
                    $query = $query->orderBy('id', $direction);
                    break;
                case 'name':
                    $query = $query->orderBy('name', $direction);
                    break;
                case 'slug':
                    $query = $query->orderBy('slug', $direction);
                    break;
                case 'parent':
                    // order by parent category name using a subquery on aliased table
                    $query = $query->orderBy(
                        DB::table('categories as p')->select('p.name')->whereColumn('p.id', 'categories.parent_id'),
                        $direction
                    );
                    break;
                case 'active':
                    $query = $query->orderBy('is_active', $direction);
                    break;
                case 'posts':
                    $query = $query->orderBy('posts_count', $direction);
                    break;
            }
        } else {
            // default ordering by id ascending
            $query = $query->orderBy('id', 'asc');
        }

        $categories = $query->paginate(15)->appends($request->except('page'));
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        $parents = Category::whereNull('parent_id')->get();
        return view('categories.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:categories,slug',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'is_active' => 'sometimes|boolean',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = str()->slug($data['name']);
        }

        $data['is_active'] = $request->has('is_active');

        Category::create($data);

        return redirect()->route('categories.index')->with('success', 'Category created');
    }

    public function edit(Category $category)
    {
        $parents = Category::whereNull('parent_id')->where('id', '!=', $category->id)->get();
        return view('categories.edit', compact('category', 'parents'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:categories,slug,' . $category->id,
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'is_active' => 'sometimes|boolean',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = str()->slug($data['name']);
        }

        $data['is_active'] = $request->has('is_active');

        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Category updated');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted');
    }
}
