<?php

namespace App\Http\Controllers;

use App\Events\RegisteredEvent;
use App\Http\Requests\RegisterRequest;
use App\Services\RegisterationService;
use App\Services\VaccineCenterService;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class RegisterationController extends Controller
{
    public function __construct(public RegisterationService $registeration, public VaccineCenterService $vaccineCenter)
    {

    }

    public function index(): view
    {
        $centers = $this->vaccineCenter->getVaccineCenters();
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

            return redirect()->route('home')->with('status', 'Your registration has been completed successfully! We will email you about the schedule, sortly.');

        } catch (\Exception $e) {
            DB::rollBack();

            logger()->error('Registration failed', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);

            return redirect()->back()->with('error', 'Registration failed. Please try again.');
        }
    }


}
