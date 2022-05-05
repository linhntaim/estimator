<?php

namespace App\Exports;

use App\Http\Resources\TrialUserExportResource;
use App\Models\UserProvider;
use App\Support\Exports\ModelCsvExport;

class TrialUserCsvExport extends ModelCsvExport
{
    public const NAME = 'trial_users';

    protected function modelProviderClass(): string
    {
        return UserProvider::class;
    }

    protected function modelResourceClass(): string
    {
        return TrialUserExportResource::class;
    }

    protected function headers(): array
    {
        return [
            'ID',
            'Name',
            'Email',
        ];
    }
}
