<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ProfileCompletedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        
        if ($user && $user->role->name !== 'admin') {
            // Fields that are always required
            $commonRequiredFields = [
                'address_1', 'address_2', 'area_region', 
                'state', 'country', 'phone', 'type_classification', 
                'picture', 'documents'
            ];

            // Additional required fields for vendors
            $vendorRequiredFields = ['contact_person', 'website', 'coordinates'];

            // Determine required fields based on role
            $requiredFields = $user->role->name === 'vendor'
                ? array_merge($commonRequiredFields, $vendorRequiredFields)
                : $commonRequiredFields;

            // Check for missing fields
            foreach ($requiredFields as $field) {
                if (empty($user->$field)) {
                    return redirect()->route('profile')->with('error', 'You can use the website once your profile is complete and verified by an admin.');
                }
            }
        }

        return $next($request);
    }
}
