<?php

namespace App\Http\Controllers;

use App\Users;
use App\Reseller;
use App\Supplier;
use App\UserImages;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Symfony\Component\VarDumper\VarDumper;

class UserController extends Controller
{
    public function index()
    {
        return view('users/userlist');
    }

    public function getUsersData()
    {
        $users = Users::select(['id', 'name', 'email', 'phone', 'role', 'created_at']);
        return DataTables::of($users)->toJson();
    }
    public function create()
    {
        return view('users/register');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'phone' => ['required', 'regex:/^\+?\d{1,4}?\s?\(?\d{1,4}\)?[\s.-]?\d{1,10}$/'],
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'role' => ['required'],
            'address' => ['required'],
            'profile_image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:4096'],
        ], [
            'phone.regex' => 'The phone number format is invalid.',
            'email.unique' => 'The email address has already been taken.',
            'profile_image.required' => 'Please select an image.',
            'profile_image.image' => 'The file must be an image.',
            'profile_image.mimes' => 'The image must be a file of type: jpeg, jpg, png.',
            'profile_image.max' => 'The image must be less than 4 MB in size.',
        ]);

        $supplierData = [
            'address' => $request->address,
            'contact_no' => $request->phone,
        ];

        if ($request->hasFile('profile_image')) {
            $user = Users::create($validatedData);
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
            $userImage = [
                'user_id' => $user->id,
                'file_original_name' => $request->file('profile_image')->getClientOriginalName(),
                'file_name' => pathinfo($imagePath, PATHINFO_FILENAME),
                'file_size' => $request->file('profile_image')->getSize(),
                'extension' => $request->file('profile_image')->getClientOriginalExtension(),
            ];
            UserImages::create($userImage);
        }
        if ($request->role == 'supplier') {
            Supplier::create($supplierData);
        } else {
            Reseller::create($supplierData);
        }

        return redirect('/users')->with('success', 'User created/updated successfully!');
    }
}
