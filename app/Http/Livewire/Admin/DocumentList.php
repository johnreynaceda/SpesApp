<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Document;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ViewColumn;

class DocumentList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Document::query()->whereHas('user', function ($record) {
            $record->whereHas('student', function ($k) {
                $k->where('status', 'approved');
            });
        });
    }

    protected function getTableColumns(): array
    {

        return [
            TextColumn::make('fullname')->label('FULLNAME')->formatStateUsing(function ($record) {
                return $record->user->student->firstname . ' ' . $record->user->student->lastname;
            })->searchable(['firstname', 'lastname']),
            ViewColumn::make('photo')->label('PHOTO')->view('admin.filament.photo'),
            ViewColumn::make('valid_id')->label('SCHOOL ID/VALID ID')->view('admin.filament.valid-id'),
            ViewColumn::make('document')->label('DOCUMENT')->view('admin.filament.document')

        ];

    }

    public function render()
    {
        return view('livewire.admin.document-list');
    }
}