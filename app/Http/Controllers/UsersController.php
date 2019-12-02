<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {}

    public function create (Request $request)
    {
        try {
            $this->validate($request, [
                'firstname' => 'required',
                'lastname' => 'required',
                'telephone' => 'required',
                'address' => 'required',
                'houseNumber' => 'required',
                'zipcode' => 'required',
                'city' => 'required',
                'accountOwner' => 'required',
                'iban' => 'required',
            ]);

            $entity = new User();
            return response()->json($entity->register($request));
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

}
