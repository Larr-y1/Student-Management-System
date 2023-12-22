<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CandidateReference;
use Illuminate\Http\Request;

class CandidateReferenceApiController extends Controller
{   

    //Candidates references details
    public function createCandidateReferenceDetails(Request $request)
    {        

            $candidate_reference_object = new CandidateReference();
            $candidate_reference_created = $candidate_reference_object->create([
                'candidate_id' => $request->candidate_id,
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'email' => $request->email,                
                'organization' => $request->organization,
            ]);

            if ($candidate_reference_created) {

                $json_array = array(
                    'status' => 'success',
                    'message' => 'Candidate reference details added successfully'
                );

                $response = $json_array;
                return json_encode($response);

            } else {

                $json_array = array(
                    'status' => 'error',
                    'message' => 'Error adding candidate reference details',
                );

                $response = $json_array;
                return json_encode($response);
            }
        }


    //Edit Candidate details
    public function editCandidateReferenceDetails(Request $request)
    {

        if (!auth('sanctum')->check()) {
            return response([
                'status' => 'error',
                'message' => 'Unauthorized'
            ]);

        } else {

           

            $update = CandidateReference::query()
                ->where('id', $request->id)
                ->update([
                    'candidate_id' => $request->candidate_id,
                    'name' => $request->name,
                    'phone_number' => $request->phone_number,
                    'email' => $request->email,                
                    'organization' => $request->organization,
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

            if ($update) {

                $json_array = array(
                    'status' => 'success',
                    'message' => "Candidate reference details updated",
                );

                $response = $json_array;
                return json_encode($response);

            } else {

                $json_array = array(
                    'status' => 'error',
                    'message' => "Failed to update candidate reference details",
                );

                $response = $json_array;
                return json_encode($response);
            }
        }

    }

    // Delete Candidate details
    public function deleteCandidateReferenceDetails(Request $request)
    {

        if (!auth('sanctum')->check()) {
            return response([
                'status' => 'error',
                'message' => 'Unauthorized'
            ]);

        } else {

            $update = CandidateReference::query()
                ->where('id', $request->id)
                ->update([
                    'updated_at' => date('Y-m-d H:i:s'),
                    'deleted_at' => date('Y-m-d H:i:s'),
                ]);

            if ($update) {

        
                
                $json_array = array(
                    'status' => 'success',
                    'message' => "candidate reference details deleted",
                );

                $response = $json_array;
                return json_encode($response);

            } else {

                $json_array = array(
                    'status' => 'error',
                    'message' => 'Error deleting candidate reference details',
                );

                $response = $json_array;
                return json_encode($response);
            }
        }

    }

    //Candidate List
    public function candidateReferencedDetails(Request $request)
    {

        if (!auth('sanctum')->check()) {
            return response([
                'status' => 'error',
                'message' => 'Unauthorized'
            ]);

        } else {

            $candidate_reference = CandidateReference::query()
                ->where('candidate_id', $request->candidate_id)
                ->where('deleted_at', null)
                ->orderBy('first_name', 'ASC')
                ->get();

            return json_encode($candidate_reference);
        }


    }


    public function candidateReferenceList(Request $request)
    {

        if (!auth('sanctum')->check()) {
            return response([
                'status' => 'error',
                'message' => 'Unauthorized'
            ]);

        } else {

            $candidate_refernce = CandidateReference::query()
                ->where('deleted_at', null)
                ->latest()
                ->get();

            return json_encode($candidate_refernce);
        }

    }

    

}
