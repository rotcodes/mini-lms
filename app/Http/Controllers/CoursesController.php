<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->get('category');
        $sortType = $request->get('sort', 'new');
        $minPrice = $request->get('min');
        $maxPrice = $request->get('max');
        $search = $request->get('search');

        $query = Course::query();

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        if ($minPrice !== null && $maxPrice !== null) {
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('courseTitle', 'like', '%' . $search . '%')
                  ->orWhere('desc', 'like', '%' . $search . '%');
            });
        }

        switch ($sortType) {
            case 'new':
                $query->orderBy('created_at', 'desc');
                break;
            case 'old':
                $query->orderBy('created_at', 'asc');
                break;
            case 'price':
                $query->orderBy('price', 'asc');
                break;
        }

        $courses = $query->paginate(6);

        return view('courses', [
            'courses' => $courses,
            'sortType' => $sortType,
            'categoryId' => $categoryId,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
            'search' => $search,
            'categories' => Category::withCount('courses')->get(),
        ]);
    }


}
