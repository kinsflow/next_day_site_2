<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $applicants = User::whereRoleId(2)->paginate();

        return view('view-students', ['applicants' => $applicants]);
    }

    public function create()
    {
        return view('create-account');
    }

    public function createStudentAccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        try {
            if ($validator->fails()) {
                return redirect()->back()->with('failure', $validator->errors()->first());
            }

            $request->merge([
                'password' => bcrypt('password'),
                'role_id' => 2
            ]);

            User::create($request->all());

            return redirect()->back()->with('success', 'Applicant Profiled Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('failure', $e->getMessage());
        }

    }

    public function edit(User $applicant_id)
    {
        return view('edit-applicant', ['applicant' => $applicant_id]);
    }

    public function update(User $applicant_id, Request $request)
    {
        try {
            $applicant_id->update($request->all());
            return redirect()->back()->with('success', 'Applicant Profile Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('failure', $e->getMessage());
        }
    }

    public function apply(User $applicant_id)
    {
        try {
            $applicant_id->application()->create();
            return redirect()->back()->with('success', 'Application Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('failure', $e->getMessage());
        }

    }

    public function delete(User $applicant_id)
    {
        try {
            $applicant_id->delete();
            return redirect()->back()->with('success', 'applicant record deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('failure', $e->getMessage());
        }
    }
}
