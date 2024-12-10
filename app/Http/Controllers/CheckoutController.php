<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Course;

class CheckoutController extends Controller
{
    public function createCheckoutSession(Request $request, $slug)
    {
        // Check if the user is logged in
        if (!Auth::check()) {
            session()->flash('error', 'Please log in to continue with the purchase.');
            return response()->json([
                'status' => false,
                'redirect' => route('login')
            ]);
        }

        // User is authenticated, retrieve the course by slug
        $user = Auth::user();
        $course = Course::where('slug', $slug)->firstOrFail();
        $description = strip_tags($course->desc);

        // Check if the user already purchased this course
        $existingOrder = Order::where('user_id', $user->id)
        ->where('course_id', $course->id)
        ->where('status', 'success')
        ->first();

        if ($existingOrder) {
            // If an order already exists with 'success' status, return a message
            session()->flash('warning', 'You have already purchased this course.');
            return response()->json([
                'status' => false,
                'redirect' => route('courseDetails', ['courseSlug' => $slug]) // Use 'courseSlug' instead of 'slug'
            ]);
        }


        // Initialize Stripe
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Create an order entry in the database with pending status
        $order = Order::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
            'amount' => $course->price,
            'currency' => 'USD',
            'status' => 'pending',
        ]);

        try {
            // Create a Stripe Checkout session
            $checkoutSession = StripeSession::create([
                'payment_method_types' => ['card'],
                'customer_email' => $user->email,
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => [
                                'name' => $course->courseTitle,
                                'description' => $description,
                            ],
                            'unit_amount' => $course->price * 100,
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('payment.success') . '?order=' . $order->id . '&session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('payment.cancel')
            ]);

            // Return JSON response with the session URL
            return response()->json([
                'status' => true,
                'url' => $checkoutSession->url
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to create checkout session. ' . $e->getMessage()
            ]);
        }
    }

    public function paymentSuccess(Request $request)
    {
        // Check if the user is logged in
        if (!Auth::check()) {
            session()->flash('error', 'Please log in to continue with this action.');
            return redirect()->route('login');
        }

        $orderId = $request->query('order');
        $sessionId = $request->query('session_id');

        // Check that both orderId and sessionId are present
        if (!$orderId || !$sessionId) {
            session()->flash('error', 'Unable to retrieve the order details. Please try again.');
            return redirect()->route('payment.cancel'); // Redirect to a safe page
        }

        // Check that the order exists
        $order = Order::find($orderId);
        if (!$order) {
            session()->flash('error', 'Order not found. It might have been already canceled or is invalid.');
            return redirect()->route('payment.cancel');
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            // Retrieve the session from Stripe
            $session = StripeSession::retrieve($sessionId);
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to verify the payment. Please contact support.');
            return redirect()->route('payment.cancel');
        }

        // Check for duplicate stripe_payment_id
        $existingOrder = Order::where('stripe_payment_id', $session->payment_intent)->first();
        if ($existingOrder && $existingOrder->id !== $order->id) {
            // If a different order already has this payment intent, redirect to cancel
            session()->flash('error', 'Something went wrong. Duplicate payment detected.');
            return redirect()->route('payment.cancel');
        }

        // Verify the payment status and update the order if paid
        if ($session->payment_status === 'paid') {
            $order->status = 'success';
            $order->payment_completed_at = now();
            $order->stripe_payment_id = $session->payment_intent;
            $order->save();

            session()->flash('success', 'Payment was successful! You now have access to the course.');
        } else {
            session()->flash('error', 'Payment could not be verified. Please contact support.');
            return redirect()->route('payment.cancel');
        }

        // Render the success page with the order details
        return view('payment.success', [
            'order' => $order,
        ]);
    }

    public function paymentCancel(Request $request)
    {
        return view('payment.cancel');
    }

}
