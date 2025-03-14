<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $blogs = Blog::all();
        return response()->json($blogs, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $blog = Blog::create($request->validated());
        return response()->json($blog, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        if (!$blog) {
            return response()->json('blog not found', 400);
        }
        return response()->json($blog);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        if (!$blog) {
            return response()->json('blog not found', 400);
        }

        $blog->update($request->validated());
        return response()->json($blog, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if (!$blog) {
            return response()->json('blog not found', 400);
        }

        $blog->delete();
        return response()->json(null, 204);
    }
}
