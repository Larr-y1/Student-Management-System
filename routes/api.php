<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CandidateReferenceApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['prefix' => 'v1',], function () {


    /**
     *  Candidate Routes
     */

     Route::post('candidate-create', [\App\Http\Controllers\Api\CandidateApiController::class, 'createCandidateDetails']);
     Route::post('candidate-edit', [\App\Http\Controllers\Api\CandidateApiController::class, 'editCandidateDetails']);
     Route::post('candidate-delete', [\App\Http\Controllers\Api\CandidateApiController::class, 'deleteCandidateDetails']);
     Route::get('candidate-details', [\App\Http\Controllers\Api\CandidateApiController::class, 'candidateDetails']);
     Route::post('candidate-list', [\App\Http\Controllers\Api\CandidateApiController::class, 'candidateList']);
     Route::post('candidate-filter', [\App\Http\Controllers\Api\CandidateApiController::class, 'candidateFilter']);
     Route::post('candidate-reset-password', [\App\Http\Controllers\Api\CandidateApiController::class, 'resetCandidatePassword']);
 
     /**
      * 
     
     *  Candidate Profession Routes
     */
    Route::post('candidate-profession-create', [\App\Http\Controllers\Api\CandidateProfessionApiController::class, 'createCandidateProfessionDetails']);
    Route::post('candidate-profession-edit', [\App\Http\Controllers\Api\CandidateProfessionApiController::class, 'editCandidateProfessionDetails']);
    Route::post('candidate-profession-delete', [\App\Http\Controllers\Api\CandidateProfessionApiController::class, 'deleteCandidateProfessionDetails']);
    Route::get('candidate-profession-details', [\App\Http\Controllers\Api\CandidateProfessionApiController::class, 'candidateProfessionDetails']);
    Route::get('candidate-profession-list', [\App\Http\Controllers\Api\CandidateProfessionApiController::class, 'candidateProfessionList']);
    
     /**
     *  Candidate Reference Routes
     * 
     */
    Route::post('candidate-reference-create', [CandidateReferenceApiController::class, 'createCandidateReferenceDetails']);
    Route::post('candidate-reference-edit', [\App\Http\Controllers\Api\CandidateReferenceApiController::class, 'editCandidateReferenceDetails']);
    Route::post('candidate-reference-delete', [\App\Http\Controllers\Api\CandidateReferenceApiController::class, 'deleteCandidateReferenceDetails']);
    Route::get('candidate-reference-details', [\App\Http\Controllers\Api\CandidateReferenceApiController::class, 'candidateReferencedDetails']);   
    Route::get('candidate-reference-list', [\App\Http\Controllers\Api\CandidateReferenceApiController::class, 'candidateReferenceList']);   

});
