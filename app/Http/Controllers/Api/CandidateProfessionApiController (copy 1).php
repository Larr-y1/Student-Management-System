<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\CandidateProfession;
use Illuminate\Http\Request;

class CandidateProfessionApiController extends Controller
{   


//Adding Candidates Professional details
    
public function createCandidateProfessionDetails(Request $request)
{        

        $candidate_profession_object = new CandidateProfession();
        $candidate_profession_created = $candidate_profession_object->create([
            'candidate_id' => $request->candidate_id,
            'institution' => $request->institution,
            'certification' => $request->certification,
            'professional_level' => $request->professional_level,
            'date_of_award' => $request->date_of_award,
            'membership_no' => $$request->membership_no,
        ]);

        if ($candidate_profession_created) {

            $json_array = array(
                'status' => 'success',
                'message' => 'Candidate profession details added successfully'
            );

            $response = $json_array;
            return json_encode($response);

        } else {

            $json_array = array(
                'status' => 'error',
                'message' => 'Error adding Candidate profession details',
            );

            $response = $json_array;
            return json_encode($response);
        }
    }
    //Edit Candidate details
    public function editCandidateProfessionDetails(Request $request)
    {

        if (!auth('sanctum')->check()) {
            return response([
                'status' => 'error',
                'message' => 'Unauthorized'
            ]);

        } else {

           

            $update = CandidateProfession::query()
                ->where('id', $request->id)
                ->update([
                    'candidate_id' => $request->candidate_id,
                    'institution' => $request->institution,
                    'certification' => $request->certification,
                    'professional_level' => $request->professional_level,
                    'date_of_award' => $request->date_of_award,
                    'membership_no' => $$request->membership_no,
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

            if ($update) {

                $json_array = array(
                    'status' => 'success',
                    'message' => "Candidate profession details updated",
                );

                $response = $json_array;
                return json_encode($response);

            } else {

                $json_array = array(
                    'status' => 'error',
                    'message' => "Failed to update candidate profession details",
                );

                $response = $json_array;
                return json_encode($response);
            }
        }

    }

    // Delete Candidate details
    public function deleteCandidateProfessionDetails(Request $request)
    {

        if (!auth('sanctum')->check()) {
            return response([
                'status' => 'error',
                'message' => 'Unauthorized'
            ]);

        } else {

            $update = CandidateProfession::query()
                ->where('id', $request->id)
                ->update([
                    'updated_at' => date('Y-m-d H:i:s'),
                    'deleted_at' => date('Y-m-d H:i:s'),
                ]);

            if ($update) {

        
                
                $json_array = array(
                    'status' => 'success',
                    'message' => "candidate profession details deleted",
                );

                $response = $json_array;
                return json_encode($response);

            } else {

                $json_array = array(
                    'status' => 'error',
                    'message' => 'Error deleting candidate profession details',
                );

                $response = $json_array;
                return json_encode($response);
            }
        }

    }

    //Candidate List
    public function candidateProfessionDetails(Request $request)
    {

        if (!auth('sanctum')->check()) {
            return response([
                'status' => 'error',
                'message' => 'Unauthorized'
            ]);

        } else {

            $candidate_profession = CandidateProfession::query()
                ->where('candidate_id', $request->candidate_id)
                ->where('deleted_at', null)
                ->orderBy('first_name', 'ASC')
                ->get();

            return json_encode($candidate_profession);
        }


    }


    public function candidateProfessionList(Request $request)
    {

        if (!auth('sanctum')->check()) {
            return response([
                'status' => 'error',
                'message' => 'Unauthorized'
            ]);

        } else {

            $candidate_profession = CandidateProfession::query()
                ->where('deleted_at', null)
                ->latest()
                ->get();

            return json_encode($candidate_profession);
        }

    }

    
}