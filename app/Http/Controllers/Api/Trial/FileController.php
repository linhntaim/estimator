<?php

namespace App\Http\Controllers\Api\Trial;

use App\Http\Controllers\Api\FileController as BaseFileController;
use App\Models\File;
use App\Support\Exceptions\DatabaseException;
use App\Support\Exceptions\Exception;
use App\Support\Filesystem\Filers\Filer;
use App\Support\Http\Request;

class FileController extends BaseFileController
{
    protected function storeRules(Request $request): array
    {
        return [
            'file' => 'required|file',
        ];
    }

    /**
     * @throws DatabaseException
     * @throws Exception
     */
    protected function storeExecute(Request $request)
    {
        return $this->modelProvider()
            ->enablePublish($request->has('publish'))
            ->usePublic($request->has('public'))
            ->useInline($request->has('inline'))
            ->createWithFiler(
                Filer::from($request->file('file'))
            );
    }

    /**
     * @throws DatabaseException
     * @throws Exception
     */
    protected function showFile(Request $request, $id)
    {
        return with($this->modelProvider()->model($id), function (File $file) {
            return $file->responseFile();
        });
    }

    /**
     * @throws DatabaseException
     * @throws Exception
     */
    protected function showDownload(Request $request, $id)
    {
        return with($this->modelProvider()->model($id), function (File $file) {
            return $file->responseDownload();
        });
    }
}