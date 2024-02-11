<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DatabaseController;

Route::get('/',[PageController::class, 'ViewLoginPageController']);

Route::post('/handle-login',[LoginController::class, 'HandleLoginContoller']);

Route::get('/view-home-page',[PageController::class, 'ViewHomePageController']);

Route::get('/handle-logout',[LoginController::class, 'HandleLogoutContoller']);

Route::get('/view-staff-management-index',[PageController::class, 'ViewStaffManagementIndexController']);

Route::post('/insert-staff-data',[DatabaseController::class, 'InsertStaffData']);

Route::get('/delete-staff-data/{auto_id}',[DatabaseController::class, 'DeleteStaffData']);

Route::get('/view-staff-management-edit/{auto_id}',[PageController::class, 'ViewStaffManagementEditController']);

Route::get('/view-settings-index',[PageController::class, 'ViewSettingsPageContoller']);

Route::get('/view-user-accounts-index',[PageController::class, 'ViewUserAccountsIndexContoller']);

Route::get('/delete-user-account/{auto_id}',[DatabaseController::class, 'DeleteUserAccount']);

Route::post('/insert-user-accounts',[DatabaseController::class, 'InsertUserAccount']);

Route::get('/accept-request/{auto_id}',[DatabaseController::class, 'AcceptRequest']);

Route::get('/decline-request/{auto_id}',[DatabaseController::class, 'DeclineRequest']);

Route::post('/filter-search-leave-history-controller',[PageController::class, 'FilterSearchLeaveHistoryController']);

Route::get('/view-home-page-of-staff-account',[PageController::class, 'ViewHomePageOfStaffAccountController']);

Route::post('/insert-leave-data-of-staff-account',[DatabaseController::class, 'InsertLeaveDataOfStaffAccount']);

Route::get('/delete-leave-pending-request-in-staff-account/{auto_id}',[DatabaseController::class, 'DeleteLeavePendingRequestInStaffAccount']);

Route::post('/add-leave-type',[DatabaseController::class, 'AddLeaveType']);

?>
