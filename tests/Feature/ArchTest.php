<?php

arch('the codebase does not reference env variables outside of config files.')
    ->expect('env')
    ->not->toBeUsed();
arch('Check basic PHP code quality')
    ->preset()
    ->php();

arch('Check basid security in code')
    ->preset()
    ->security();

arch('Models must extend eloquent model')
    ->expect('App\Models')
    ->toBeClasses()
    ->toExtend('Illuminate\Database\Eloquent\Model');

arch('http layer must not leak outside its namespace')
    ->expect('App\Http')
    ->toOnlyBeUsedIn('App\Http')
    ->ignoring('App\Http\Resources\PaginationResource');

arch('Api controllers must be invokable')
    ->expect('App\Http\Controllers\Api')
    ->toBeInvokable()
    ->ignoring('App\Http\Controllers\Api\ApiBaseController');

arch('Api controllers must extend api base controller')
    ->expect('App\Http\Controllers\Api')
    ->toBeClasses()
    ->toExtend('App\Http\Controllers\Api\ApiBaseController');

arch('Controllers must have controller suffix')
    ->expect('App\Http\Controllers')
    ->toHaveSuffix('Controller');

arch('requests must have request suffix')
    ->expect('App\Http\Requests')
    ->toHaveSuffix('Request');

arch('requests must extend form request')
    ->expect('App\Http\Requests')
    ->toBeClasses()
    ->toExtend('Illuminate\Foundation\Http\FormRequest');

arch('requests must implement data transfer object interface')
    ->expect('App\Http\Requests')
    ->toBeClasses()
    ->toImplement('App\Contracts\Requests\HasDataTransferObjectInterface');

arch('requests must have authorize, rules, toDto methods')
    ->expect('App\Http\Requests')
    ->toBeClasses()
    ->toHaveMethods(['authorize', 'rules', 'toDto']);

arch('resources must have resource suffix')
    ->expect('App\Http\Resources')
    ->toHaveSuffix('Resource');

arch('resources must extend json resource')
    ->expect('App\Http\Resources')
    ->toBeClasses()
    ->toExtend('Illuminate\Http\Resources\Json\JsonResource');

arch('resources must have toArray method')
    ->expect('App\Http\Resources')
    ->toBeClasses()
    ->toHaveMethod('toArray');

arch('DTOs must be readonly')
    ->expect('App\DataTransferObjects')
    ->toBeClasses()
    ->toBeReadonly();

arch('DTOs must have dto suffix')
    ->expect('App\DataTransferObjects')
    ->toHaveSuffix('Dto');

arch('Traits must be actual traits')
    ->expect('App\Traits')
    ->toBeTraits();

arch('Enums must be actual enums')
    ->expect('App\Enums')
    ->toBeEnums();

arch('Enums must have enum suffix')
    ->expect('App\Enums')
    ->toHaveSuffix('Enum');

arch('Contracts must be actual contracts')
    ->expect('App\Contracts')
    ->toBeInterfaces();

arch('Contracts must have interface suffix')
    ->expect('App\Contracts')
    ->toHaveSuffix('Interface');

arch('Actions must have handle method')
    ->expect('App\Actions')
    ->toBeClasses()
    ->toHaveMethod('handle');

arch('Actions must have action suffix')
    ->expect('App\Actions')
    ->toHaveSuffix('Action');

arch('Services must not depend on models directly')
    ->expect('App\Services')
    ->toBeClasses()
    ->not->toContain('App\Models');

arch('Notifications must have notification suffix')
    ->expect('App\Notifications')
    ->toHaveSuffix('Notification');

arch('Providers must have provider suffix')
    ->expect('App\Providers')
    ->toHaveSuffix('Provider');

arch('Listeners must have listener suffix')
    ->expect('App\Listeners')
    ->toHaveSuffix('Listener');

arch('Listeners must have handle method')
    ->expect('App\Listeners')
    ->toHaveMethod('handle');

arch('Commands must have handle method')
    ->expect('App\Console\Commands')
    ->toHaveMethod('handle');

arch('Commands must have command suffix')
    ->expect('App\Commands')
    ->toHaveSuffix('Command');

arch('Jobs must have handle method')
    ->expect('App\Jobs')
    ->toHaveMethod('handle');

arch('States must have status suffix')
    ->expect('App\Models\States')
    ->toHaveSuffix('Status');

arch('Helpers must have helper suffix')
    ->expect('App\Support\Helpers')
    ->toHaveSuffix('Helper');
