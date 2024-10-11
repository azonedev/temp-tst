<?php

namespace App\Http\Controllers;

use App\Events\RegisteredEvent;
use App\Http\Requests\RegisterRequest;
use App\Models\Registration;
use App\Models\User;
use App\Models\VaccineCenter;
use App\Services\RegisterationService;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class RegisterationController extends Controller
{
    public function __construct(public RegisterationService $registeration)
    {

    }

    public function index(): view
    {
        $centers = VaccineCenter::select('name','id')->get();
        return view('register', compact('centers'));
    }

    public function create(RegisterRequest $request)
    {
        $validatedData = $request->validated();

        DB::beginTransaction();
        try {

            $user = $this->registeration->saveUserInfo($validatedData);
            $registrationRecord = $this->registeration->createRegisteration($user->id, $validatedData['vaccine_center_id']);

            RegisteredEvent::dispatch($user, $registrationRecord);

            DB::commit();

            return redirect()->route('home')->with('status', 'Registered successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
//            return redirect()->back()->with('error', 'Registration failed. Please try again.');
        }
    }


}
