<?php

Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');

//Done Update 1.1.1
Route::get('/transactions','Admin\TransactionController@index');
Route::get('/deposits','Admin\DepositController@index');
Route::post('/deposit/accept/{id}', 'Admin\DepositController@deposit_accept');
Route::post('/deposit/cancel/{id}', 'Admin\DepositController@deposit_cancel');
Route::get('/withdraws','Admin\WithdrawController@index');
Route::post('/withdraw/complete/{id}', 'Admin\WithdrawController@withdraw_complete');
Route::post('/withdraw/cancel/{id}', 'Admin\WithdrawController@withdraw_cancel');
Route::get('/notifications', 'Admin\AlartController@index');
Route::get('/notifications/{id}', 'Admin\AlartController@show');
Route::get('/notifications-top', 'Admin\AlartController@notifications_top');
Route::get('/complains', 'Admin\ComplainController@index');
Route::post('/complain/solved/{id}', 'Admin\ComplainController@complain_solved');
Route::get('/balance-transfers', 'Admin\BalanceTransferController@index');
Route::get('/gateways', 'Admin\GatewayController@index');
Route::get('/gateway/{id}', 'Admin\GatewayController@gateway_edit');
Route::put('/gateway', 'Admin\GatewayController@gateway_update');
Route::get('/setting', 'Admin\SettingController@setting');
Route::post('/setting', 'Admin\SettingController@setting_update');
Route::get('/club', 'Admin\ClubController@index');
Route::get('/club/create', 'Admin\ClubController@create');
Route::post('/club', 'Admin\ClubController@store');
Route::get('/club/{id}', 'Admin\ClubController@show');
Route::get('/club/{id}/edit', 'Admin\ClubController@edit');
Route::put('/club/{id}', 'Admin\ClubController@update');
Route::resource('auto-questions','Admin\AutoQuestionController');
Route::get('/backup', 'Admin\BackupController@index');
Route::get('/backup/generate', 'Admin\BackupController@generate_backup');
Route::get('/backup/download/{file_name}', 'Admin\BackupController@download_backup');
Route::get('/backup/delete/{file_name}', 'Admin\BackupController@delete_backup');
Route::resource('roles','Admin\RoleController');
Route::resource('users','Admin\UserController');
Route::resource('admins','Admin\AdminController');
Route::get('/database/close-matchs','Admin\DatabaseController@match_close_index');
Route::post('/database/match-to-live/{id}','Admin\DatabaseController@match_to_live');
Route::post('/database/match-to-upcoming/{id}','Admin\DatabaseController@match_to_upcoming');
Route::get('/database/close-questions','Admin\DatabaseController@question_close_index');
Route::post('/database/question-to-live/{id}','Admin\DatabaseController@question_to_live');
Route::post('/database/question-to-upcoming/{id}','Admin\DatabaseController@question_to_upcoming');
Route::get('/database/close-options','Admin\DatabaseController@option_close_index');
Route::post('/database/option-to-live/{id}','Admin\DatabaseController@option_to_live');
Route::post('/database/option-to-upcoming/{id}','Admin\DatabaseController@option_to_upcoming');
Route::get('/betting','Admin\BetController@index');
Route::get('/all-bets','Admin\BetController@betting_index');
Route::post('/betting/refund','Admin\BetController@refundBet');

Route::get('/profile', 'Admin\ProfileController@profile')->name('admin.profile');
Route::post('/profile', 'Admin\ProfileController@updateProfile')->name('admin.update.profile');
Route::get('/change-password', 'Admin\ProfileController@changePassword')->name('admin.password');
Route::post('/change-password', 'Admin\ProfileController@updatePassword')->name('admin.update.password');

// Match
Route::get('/matchs', 'Admin\MatchController@index');
Route::post('/matchs', 'Admin\MatchController@store');
Route::get('/matchs/{id}', 'Admin\MatchController@edit');
Route::put('/matchs/{id}', 'Admin\MatchController@update');
Route::put('/matchs/close-match/{id}', 'Admin\MatchController@closeMatch');
Route::get('/hidden-live-matchs', 'Admin\MatchController@hiddenLiveMatch');
Route::get('/hidden-upcoming-matchs', 'Admin\MatchController@hiddenUpcomingMatch');
Route::put('/matchs/add-to-panel/{id}', 'Admin\MatchController@addToPanel');
Route::put('/matchs/hide-from-panel/{id}', 'Admin\MatchController@hideFromPanel');
Route::put('/matchs/area-hide/{id}', 'Admin\MatchController@areaHide');
Route::put('/matchs/area-show/{id}', 'Admin\MatchController@areaShow');
Route::put('/matchs/hide-match-question/{id}', 'Admin\MatchController@hideMatchQuestion');
Route::put('/matchs/show-match-question/{id}', 'Admin\MatchController@showMatchQuestion');
Route::put('/matchs/hide/{id}', 'Admin\MatchController@matchHide');
Route::put('/matchs/show/{id}', 'Admin\MatchController@matchShow');
Route::put('/matchs/active/{id}', 'Admin\MatchController@matchActive');
Route::put('/matchs/deactive/{id}', 'Admin\MatchController@matchDeactive');
Route::get('/upcoming-matchs', 'Admin\MatchController@upcomingMatch');
Route::put('/matchs/to-live/{id}', 'Admin\MatchController@toLive');

//Question
Route::post('/questions', 'Admin\QuestionController@store');
Route::get('/questions/{id}', 'Admin\QuestionController@edit');
Route::put('/questions/{id}', 'Admin\QuestionController@update');
Route::put('/questions/close/{id}', 'Admin\QuestionController@closeQuestion');
Route::put('/questions/active/{id}', 'Admin\QuestionController@questionActive');
Route::put('/questions/deactive/{id}', 'Admin\QuestionController@questionDeactive');
Route::put('/questions/hide/{id}', 'Admin\QuestionController@questionHide');
Route::put('/questions/show/{id}', 'Admin\QuestionController@questionShow');
Route::put('/questions/area-hide/{id}', 'Admin\QuestionController@areaHide');
Route::put('/questions/area-show/{id}', 'Admin\QuestionController@areaShow');
Route::put('/questions/restart/{id}', 'Admin\QuestionController@questionRestart');

// Option
Route::post('/options', 'Admin\OptionController@store');
Route::get('/options/{id}', 'Admin\OptionController@edit');
Route::put('/options/{id}', 'Admin\OptionController@update');
Route::put('/options/run/{id}', 'Admin\OptionController@optionRun');
Route::put('/options/stop/{id}', 'Admin\OptionController@optionStop');
Route::put('/options/show/{id}', 'Admin\OptionController@optionShow');
Route::put('/options/hide/{id}', 'Admin\OptionController@optionHide');
Route::put('/options/close/{id}', 'Admin\OptionController@optionClose');
Route::put('/options/win/{id}', 'Admin\OptionController@optionWin');

// Delete Data
Route::get('/match-data-delete', 'Admin\DeleteDataController@match_data_delete');