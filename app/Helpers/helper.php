<?php

use App\Models\Category;
use Illuminate\Http\Request;

/**
 * Get all categories
 *
 * @return \Illuminate\Support\Collection
 */
function getCategories()
{
    return Category::select('id', 'name')->get();
}

/**
 * Handle newsletter submission
 *
 * @param \Illuminate\Http\Request $request
 * @return \Illuminate\Http\JsonResponse
 */
function handleNewsletter(Request $request)
{
    $email = $request->input('email');

    // Check if email is empty
    if (empty($email)) {
        return response()->json([
            'status' => false,
            'message' => 'Email is required',
        ]);
    }

    // Validate the email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return response()->json([
            'status' => false,
            'message' => 'Email is incorrect',
        ]);
    }

    // Success response
    return response()->json([
        'status' => true,
        'message' => 'Email is valid',
    ]);
}
