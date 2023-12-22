<?php

namespace App\Http\Controllers\Api;

use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Util\EmailUtil;
use App\Http\Controllers\Util\FormatPhoneNumberUtil;
use App\Http\Controllers\Util\PasswordGeneratorUtil;

class CandidateApiController extends Controller
{

    public function candidateList(Request $request)
    {

        if (!auth('sanctum')->check()) {
            return response([
                'status' => 'error',
                'message' => 'Unauthorized'
            ]);

        } else {

            $candidates = Candidate::query()
                ->where('deleted_at', null)
                ->latest()
                ->get();

            return json_encode($candidates);
        }

    }

    public function candidateDetails(Request $request)
    {

        if (!auth('sanctum')->check()) {
            return response([
                'status' => 'error',
                'message' => 'Unauthorized'
            ]);

        } else {

            $candidate = Candidate::query()
                ->where('id', $request->id)
                ->where('deleted_at', null)
                ->first();

            return json_encode($candidate);
        }

    }

    public function createCandidateDetails(Request $request)
    {

        if (!auth('sanctum')->check()) {
            return response([
                'status' => 'error',
                'message' => 'Unauthorized'
            ]);

        } else {

            
            

            $has_disability = false;
            if($request->has_disability == "true" || $request->has_disability == 1){
                $has_disability = true;
            }

            $enabled = false;
            if($request->enabled == "true" || $request->enabled == 1){
                $enabled = true;
            }

            $image_path = null;
            if ($request->hasFile('image')) {
                $path = $request->file('image')->storePublicly('uploads/images', 'linode');
                Storage::disk('linode')->setVisibility('uploads/images', 'public');
                $image_path = $path;
            }

            $candidate_object = new Candidate();
            $candidate_created = $candidate_object->create([
                'first_name' => ($request->first_name == '') ? null : $request->first_name,
                'middle_name' => ($request->middle_name == '') ? null : $request->middle_name,
                'last_name' => ($request->last_name == '') ? null : $request->last_name,
                'date_of_birth' => ($request->date_of_birth == '') ? null : $request->date_of_birth,
                'gender' => ($request->gender == '') ? null : $request->gender,
                'nationality' => ($request->nationality == '') ? null : $request->nationality,
                'division' => ($request->division == '') ? null : $request->division,
                'location' => ($request->location == '') ? null : $request->location,
                'sub_location' => ($request->sub_location == '') ? null : $request->sub_location,
                'village' => ($request->village == '') ? null : $request->village,
                'profession' => ($request->profession == '') ? null : $request->profession,
                'national_id_no' => ($request->national_id_no == '') ? null : $request->national_id_no,
                'passport_no' => ($request->passport_no == '') ? null : $request->passport_no,
                'driver_license_no' => ($request->driver_license_no == '') ? null : $request->driver_license_no,
                'phone_number' =>  ($request->phone_number == '') ? null : $request->phone_number,
                'email' => ($request->email == '') ? null : $request->email,
                'role' => 'candidate',
                'enabled' => $enabled,
                'has_disability' => $has_disability,
                'image' => $image_path,
                'password' => bcrypt($request->password == '' ? null : $request->password),
            ]);

            if ($candidate_created) {

//                $email_util = new EmailUtil();
//                $email_util->candidateWelcomeEmail($candidate_created->first_name, $candidate_created->email, $business->name, $password, $pin);

                $json_array = array(
                    'status' => 'success',
                    'message' => 'Candidate details created',
                );

                $response = $json_array;
                return json_encode($response);

            } else {

                $json_array = array(
                    'status' => 'error',
                    'message' => 'Failed to create candidate',
                );

                $response = $json_array;
                return json_encode($response);
            }
        }

    }

    public function editCandidateDetails(Request $request)
    {

        if (!auth('sanctum')->check()) {
            return response([
                'status' => 'error',
                'message' => 'Unauthorized'
            ]);

        } else {

            $candidate_id = $request->id;
            $phone_number = ($request->phone_number);

            $candidate = Candidate::query()
                ->where('id', $candidate_id)
                ->where('deleted_at', null)
                ->first();

            if(!$candidate){

                $json_array = array(
                    'status' => 'error',
                    'message' => 'Candidate does not exist',
                );

                $response = $json_array;
                return json_encode($response);
            }

            $email = $request->email;
            if ($email != '') {
                $email_check = Candidate::query()->where('email', $request->email)->first();
                if ($email_check) {

                    if ($email_check->id != $candidate_id) {

                        $json_array = array(
                            'status' => 'error',
                            'message' => "Email address already exist",
                        );

                        $response = $json_array;
                        return json_encode($response);
                    }

                }
            }

            $has_disability = false;
            if($request->has_disability == "true" || $request->has_disability == 1){
                $has_disability = true;
            }

            $enabled = false;
            if($request->enabled == "true" || $request->enabled == 1){
                $enabled = true;
            }

            $image_path = $candidate->getRawOriginal('profile_image');
            if ($request->hasFile('image')) {
                $path = $request->file('image')->storePublicly('uploads/images', 'linode');
                Storage::disk('linode')->setVisibility('uploads/images', 'public');
                $image_path = $path;
            }

            $update = Candidate::query()
                ->where('id', $request->id)
                ->update([
                    'first_name' => ($request->first_name == '') ? null : $request->first_name,
                    'middle_name' => ($request->middle_name == '') ? null : $request->middle_name,
                    'last_name' => ($request->last_name == '') ? null : $request->last_name,
                    'date_of_birth' => ($request->date_of_birth == '') ? null : $request->date_of_birth,
                    'gender' => ($request->gender == '') ? null : $request->gender,
                    'nationality' => ($request->nationality == '') ? null : $request->nationality,
                    'division' => ($request->division == '') ? null : $request->division,
                    'location' => ($request->location == '') ? null : $request->location,
                    'sub_location' => ($request->sub_location == '') ? null : $request->sub_location,
                    'village' => ($request->village == '') ? null : $request->village,
                    'profession' => ($request->profession == '') ? null : $request->profession,
                    'national_id_no' => ($request->national_id_no == '') ? null : $request->national_id_no,
                    'passport_no' => ($request->passport_no == '') ? null : $request->passport_no,
                    'driver_license_no' => ($request->driver_license_no == '') ? null : $request->driver_license_no,
                    'phone_number' => $phone_number,
                    'email' => $email,
                    'role' => 'candidate',
                    'enabled' => $enabled,
                    'has_disability' => $has_disability,
                    'image' => $image_path,
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

            if ($update) {

                $json_array = array(
                    'status' => 'success',
                    'message' => 'Candidate details updated',
                );

                $response = $json_array;
                return json_encode($response);

            } else {

                $json_array = array(
                    'status' => 'error',
                    'message' => 'Failed to update candidate details',
                );

                $response = $json_array;
                return json_encode($response);
            }

        }

    }

    public function deleteCandidateDetails(Request $request)
    {

        if (!auth('sanctum')->check()) {
            return response([
                'status' => 'error',
                'message' => 'Unauthorized'
            ]);

        } else {

            $update = Candidate::query()
                ->where('id', $request->id)
                ->update([
                    'updated_at' => date('Y-m-d H:i:s'),
                    'deleted_at' => date('Y-m-d H:i:s'),
                ]);

            if ($update) {

                // TODO - Redirect route after delete
                $json_array = array(
                    'status' => 'success',
                    'message' => 'Candidate details deleted',
                );

                $response = $json_array;
                return json_encode($response);

            } else {

                $json_array = array(
                    'status' => 'error',
                    'message' => 'Failed to delete candidate details',
                );

                $response = $json_array;
                return json_encode($response);
            }
        }

    }

    public function resetCandidatePassword(Request $request)
    {

        if (!auth('sanctum')->check()) {
            return response([
                'status' => 'error',
                'message' => 'Unauthorized'
            ]);

        } else {


            $candidate_id = $request->id;
            $update = Candidate::query()
                ->where('id', $candidate_id)
                ->update([
                    'password' => bcrypt($request->password),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

            if ($update) {

                $candidate = Candidate::query()
                    ->where('id', $candidate_id)
                    ->where('deleted_at', null)
                    ->first();

                if($candidate){

                  
                }

                $json_array = array(
                    'status' => 'success',
                );

                $response = $json_array;
                return json_encode($response);

            } else {

                $json_array = array(
                    'status' => 'error',
                );

                $response = $json_array;
                return json_encode($response);
            }

        }

    }

}
