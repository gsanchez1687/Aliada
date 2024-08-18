<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\AmenityController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\GoogleDriveController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TypePropertyController;
use App\Http\Controllers\ApprovalStateController;
use App\Http\Controllers\ImagePropertyController;
use App\Http\Controllers\LabelCategoryController;
use App\Http\Controllers\SubscriptionTypeController;
use App\Http\Controllers\TransactionStatusController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', [UserController::class, 'myUser']);

// Routes OrganizationController
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/organizations', [OrganizationController::class, 'index']);
    Route::post('/organizations', [OrganizationController::class, 'store']);
    Route::get('/organizations/{organization}', [OrganizationController::class, 'show']);
    Route::post('/organizations/{organization}', [OrganizationController::class, 'update']);
    Route::delete('/organizations/{organization}', [OrganizationController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/states', [StateController::class, 'index']);
    Route::post('/states', [StateController::class, 'store']);
    Route::get('/states/{id}', [StateController::class, 'show']);
    Route::post('/states/{id}',  [StateController::class, 'update']);
    Route::delete('/states/{id}', [StateController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/amenities', [AmenityController::class, 'index']);
    Route::post('/amenities', [AmenityController::class, 'store']);
    Route::get('/amenities/{id}', [AmenityController::class, 'show']);
    Route::post('/amenities/{id}', [AmenityController::class, 'update']);
    Route::delete('/amenities/{id}', [AmenityController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->group(function () {
Route::get('/municipalities', [MunicipalityController::class, 'index']);
Route::post('/municipalities', [MunicipalityController::class, 'store']);
Route::get('/municipalities/states-by-id/{state_id}', [MunicipalityController::class,'getMunicipalitiesByStateId']);
Route::get('/municipalities/{id}', [MunicipalityController::class, 'show']);
Route::post('/municipalities/{id}', [MunicipalityController::class, 'update']);
Route::delete('/municipalities/{id}', [MunicipalityController::class, 'destroy']);
});


// Routes PropertyController
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/properties', [PropertyController::class, 'store']);
    Route::post('/properties/{property}', [PropertyController::class, 'update']);
    Route::delete('/properties/{property}', [PropertyController::class, 'destroy']);
    Route::get('/properties', [PropertyController::class, 'index']);
    Route::get('/properties/all-properties-by-user-id/{page}', [PropertyController::class, 'allPropertiesByUserId']);
    Route::get('/properties/get-team-properties', [PropertyController::class, 'propertyTeam']); 
    Route::get('/properties/all-properties-pending', [PropertyController::class, 'allPropertiesPending']);   
});
Route::get('/properties/{slug}', [PropertyController::class, 'show']);
Route::get('/all-properties/{page}', [PropertyController::class, 'allProperties']);
Route::get('/properties/home/sales', [PropertyController::class, 'getHomePropertySales']);
Route::get('/properties/home/rent', [PropertyController::class, 'getHomePropertyRent']);
Route::get('/properties/image/get-image', [PropertyController::class, 'getImage']);
Route::post('/properties/change-status-property/{id}/{status}', [PropertyController::class, 'changeStatuysProperty']);
Route::get('/properties/status-property/{property_id}', [PropertyController::class, 'getPropertiesByStatus']);

// Routes TypePropertyController
Route::get('/type-properties', [TypePropertyController::class, 'index']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/type-properties', [TypePropertyController::class, 'store']);
    Route::get('/type-properties/{typeProperty}', [TypePropertyController::class, 'show']);
    Route::post('/type-properties/{typeProperty}', [TypePropertyController::class, 'update']);
    Route::delete('/type-properties/{typeProperty}', [TypePropertyController::class, 'destroy']);
});

//Routes Typologies
Route::get('/property/typologies-by-id/{idProperty}', [PropertyController::class,'getTypologyByPropertyId']);

// Routes CategoryController
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::get('/categories/{category}', [CategoryController::class, 'show']);
    Route::post('/categories/{category}', [CategoryController::class, 'update']);
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);
});

// Routes ImagePropertyController
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/image-properties', [ImagePropertyController::class, 'index']);
    Route::post('/image-properties', [ImagePropertyController::class, 'store']);
    Route::get('/image-properties/{imageProperty}', [ImagePropertyController::class, 'show']);
    Route::post('/image-properties/{imageProperty}', [ImagePropertyController::class, 'update']);
    Route::delete('/image-properties/{imageProperty}', [ImagePropertyController::class]);    
});

// Routes ApprovalController
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/approvals', [ApprovalController::class, 'index']);
    Route::post('/approvals', [ApprovalController::class, 'store']);
    Route::get('/approvals/{approval}', [ApprovalController::class, 'show']);
    Route::post('/approvals/{approval}', [ApprovalController::class, 'update']);
    Route::delete('/approvals/{approval}', [ApprovalController::class, 'destroy']);
});

// Routes ApprovalStateController
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/approval-states', [ApprovalStateController::class, 'index']);
    Route::post('/approval-states', [ApprovalStateController::class, 'store']);
    Route::get('/approval-states/{approvalState}', [ApprovalStateController::class, 'show']);
    Route::post('/approval-states/{approvalState}', [ApprovalStateController::class, 'update']);
    Route::delete('/approval-states/{approvalState}', [ApprovalStateController::class, 'destroy']);
});

// Routes AmenityController
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/properties/{property_id}/amenities', [AmenityController::class, 'index']);
    Route::post('/properties/{property_id}/amenities', [AmenityController::class, 'store']);
    Route::get('/properties/{property_id}/amenities/{amenity_id}', [AmenityController::class, 'show']);
    Route::post('/properties/{property_id}/amenities/{amenity_id}', [AmenityController::class, 'update']);
    Route::delete('/properties/{property_id}/amenities/{amenity_id}', [AmenityController::class, 'destroy']);
});

// Routes ViewController
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/views', [ViewController::class, 'getAllViews']);
    Route::get('/properties/{property_id}/views', [ViewController::class, 'index']);
    Route::post('/properties/{property_id}/views', [ViewController::class, 'store']);
    Route::get('/properties/{property_id}/views/{id}', [ViewController::class, 'show']);
    Route::post('/properties/{property_id}/views/{id}', [ViewController::class, 'update']);
    Route::delete('/properties/{property_id}/views/{id}', [ViewController::class, 'destroy']);
});

// Routes TransactionStatusController
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/transaction-statuses', [TransactionStatusController::class, 'index']);
    Route::post('/transaction-statuses', [TransactionStatusController::class, 'store']);
    Route::get('/transaction-statuses/{transactionStatus}', [TransactionStatusController::class, 'show']);
    Route::post('/transaction-statuses/{transactionStatus}', [TransactionStatusController::class, 'update']);
    Route::delete('/transaction-statuses/{transactionStatus}', [TransactionStatusController::class, 'destroy']);
});

//ROUTE USER
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/getRoles', [UserController::class, 'getRoles']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/all-users', [UserController::class, 'allUsers']);
});

//ROUTE ALIADOS PARA EL REGISTRO DE USUARIOAS
Route::post('/create-user-aliado', [UserController::class, 'createUserAliado']);

//ROUTE ALIADOS PARA EL REGISTRO DE USUARIOAS
Route::get('/aliados', [UserController::class, 'getAliados']);

// Routes TransactionController
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/transactions', [TransactionController::class, 'index']);
    Route::post('/transactions', [TransactionController::class, 'store']);
    Route::get('/{transaction}', [TransactionController::class, 'show']);
    Route::post('/{transaction}', [TransactionController::class, 'update']);
    Route::delete('/{transaction}', [TransactionController::class, 'destroy']);
});

// Routes SubscriptionTypeController
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/subscription-types', [SubscriptionTypeController::class, 'index']);
    Route::post('/subscription-types', [SubscriptionTypeController::class, 'store']);
    Route::get('/{subscriptionType}', [SubscriptionTypeController::class, 'show']);
    Route::post('/{subscriptionType}', [SubscriptionTypeController::class, 'update']);
    Route::delete('/{subscriptionType}', [SubscriptionTypeController::class, 'destroy']);
});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('label-categories', [LabelCategoryController::class, 'index']);
    Route::post('label-categories', [LabelCategoryController::class, 'store']);
    Route::get('label-categories/{id}', [LabelCategoryController::class, 'show']);
    Route::post('label-categories/{id}', [LabelCategoryController::class, 'update']);
    Route::delete('label-categories/{id}', [LabelCategoryController::class, 'destroy']);
    Route::get('category-labels/{categoryId}', [LabelCategoryController::class, 'getCategoryLabels']);
});
// Routes SubscriptionController
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/subscriptions', [SubscriptionController::class, 'index']);
    Route::post('/subscriptions', [SubscriptionController::class, 'store']);
    Route::get('/subscriptions/{subscription}', [SubscriptionController::class, 'show']);
    Route::post('/subscriptions/{subscription}', [SubscriptionController::class, 'update']);
    Route::delete('/subscriptions/{subscription}', [SubscriptionController::class, 'destroy']);
});

//Routes user
Route::post('/create-user-team-leader', [UserController::class, 'createUserTeamLeader']);


Route::post('/upload-file', [GoogleDriveController::class, 'uploadFile']);
Route::get('/get-file/{fileId}', [GoogleDriveController::class, 'getFile']);