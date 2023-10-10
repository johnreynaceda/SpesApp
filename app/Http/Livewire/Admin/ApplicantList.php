<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Student;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;

class ApplicantList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    protected function getTableQuery(): Builder
    {
        return Student::query()->where('status', 'pending');
    }

    protected function getTableColumns(): array
    {

        return [
            TextColumn::make('fullname')->label('FULLNAME')->formatStateUsing(function ($record) {
                return $record->firstname . ' ' . $record->lastname;
            })->searchable(['firstname', 'lastname']),
            TextColumn::make('birthdate')->label('BIRTHDATE')->date()->searchable(),
            TextColumn::make('contact')->label('CONTACT')->searchable(),
            TextColumn::make('degree')->label('DEGREE')->searchable(),
            TextColumn::make('year')->label('YEAR')->searchable(),
        ];

    }

    protected function getTableActions(): array
    {
        return [
            Action::make('approve')->color('success')->button()->icon('heroicon-o-thumb-up')->action(
                function ($record) {
                    $record->update([
                        'status' => 'approved',
                    ]);
                }
            ),
            Action::make('disapprove')->color('danger')->button()->icon('heroicon-o-thumb-down'),
        ];
    }

    public function render()
    {
        return view('livewire.admin.applicant-list', [
            'approved' => Student::where('status', 'approved')->count(),
            'disapproved' => Student::where('status', 'disapproved')->count(),
            'pending' => Student::where('status', 'pending')->count(),
        ]);
    }
}