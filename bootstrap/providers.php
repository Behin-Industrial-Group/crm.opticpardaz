<?php

use Behin\PMCaseNumbering\PackageServiceProvider;
use Behin\Sms\SmsProvider;
use BehinFileControl\BehinFileControlProvider;
use BehinInit\BehinInitProvider;
use BehinLogging\ServiceProvider;
use BehinProcessMaker\BehinProcessMakerProvider;
use BehinProcessMakerAdmin\BehinProcessMakerAdminProvider;
use BehinUserRoles\UserRolesServiceProvider;
use FileService\FileServiceProvider;
use TodoList\TodoListProvider;
use UserProfile\UserProfileProvider;

return [
    App\Providers\AppServiceProvider::class,
    BehinInitProvider::class,
    UserRolesServiceProvider::class,
    UserProfileProvider::class,
    BehinProcessMakerProvider::class,
    BehinFileControlProvider::class,
    ServiceProvider::class,
    BehinProcessMakerAdminProvider::class,
    SmsProvider::class,
    PackageServiceProvider::class,
    TodoListProvider::class,
    FileServiceProvider::class,
    Behin\SimpleWorkflow\SimpleWorkflowProvider::class,
    MyFormBuilder\FormBuilderServiceProvider::class,
];
