<?php

namespace App\Filament\Resources;

use Filament\Facades\Filament;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\BaseFileUpload;
use Awcodes\Curator\Components\Forms\Uploader;
use App\Filament\Resources\MediaResource\Pages;
use League\Flysystem\UnableToCheckFileExistence;
use App\Filament\Resources\MediaResource\RelationManagers;
use App\Models\Media;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use function Awcodes\Curator\is_media_resizable;

class MediaResource extends \Awcodes\Curator\Resources\MediaResource
{
    public static function getAdditionalInformationFormSchema(): array
    {
        return collect(parent::getAdditionalInformationFormSchema())
            ->prepend(Forms\Components\Toggle::make('hero'))
            ->toArray();
    }

    public static function table(Table $table): Table
    {
        $table = parent::table($table);


        $table->actions([
            ...$table->getActions(),
            // toggle hero
            Tables\Actions\Action::make('hero')
                ->label('Use as hero image')
                ->visible(fn (Media $media) => !$media->hero)
                ->action(fn (Media $media) => $media->update(['hero' => !$media->hero]))
        ]);

        return $table;
    }

    public static function getUploaderField(): Uploader
    {
        return Uploader::make('file')
            ->acceptedFileTypes(config('curator.accepted_file_types'))
            ->directory(config('curator.directory'))
            ->saveUploadedFileUsing(function (BaseFileUpload $component, TemporaryUploadedFile $file) {

                try {
                    if (! $file->exists()) {
                        return null;
                    }
                } catch (UnableToCheckFileExistence $exception) {
                    return null;
                }

                $filename = $component->getUploadedFileNameForStorage($file);

                $extension = $file->getClientOriginalExtension();

                $storeMethod = $component->getVisibility() === 'public' ? 'storePubliclyAs' : 'storeAs';

//                if (is_media_resizable($file->getMimeType())) {
//                    if (in_array(config('livewire.temporary_file_upload.disk'), config('curator.cloud_disks')) && config('livewire.temporary_file_upload.directory') !== null) {
//                        $content = $file->get();
//                    } else {
//                        $content = $file->getRealPath();
//                    }
//
//                    $image = Image::make($content);
//                    $image->orientate();
//                    $width = $image->getWidth();
//                    $height = $image->getHeight();
//                    $exif = $image->exif();
//                }

                if (Storage::disk($component->getDiskName())->exists(ltrim($component->getDirectory() . '/' . $filename . '.' . $extension, '/'))) {
                    $filename = $filename . '-' . time();
                }

                $path = $file->{$storeMethod}(
                    $component->getDirectory(),
                    $filename . '.' . $extension,
                    $component->getDiskName()
                );

                $data = [
                    'disk' => $component->getDiskName(),
                    'directory' => $component->getDirectory(),
                    'visibility' => $component->getVisibility(),
                    'name' => $filename,
                    'path' => $path,
                    'exif' => $exif ?? null,
                    'width' => $width ?? null,
                    'height' => $height ?? null,
                    'size' => $file->getSize(),
                    'type' => $file->getMimeType(),
                    'ext' => $extension,
                ];

                if (config('curator.is_tenant_aware') && Filament::hasTenancy()) {
                    $data[config('curator.tenant_ownership_relationship_name') . '_id'] = Filament::getTenant()->id;
                }

                return $data;
            })
            ->directory(config('curator.directory'))
            ->disk(config('curator.disk'))
            ->hiddenLabel()
            ->minSize(config('curator.min_size'))
            ->maxFiles(1)
            ->maxSize(config('curator.max_size'))
            ->panelAspectRatio('24:9')
            ->pathGenerator(config('curator.path_generator'))
            ->preserveFilenames(config('curator.should_preserve_filenames'))
            ->visibility(config('curator.visibility'))
            ->storeFileNamesIn('originalFilename');
    }

}
