<?php

namespace App\Http\Livewire\Admin;

use App\Models\Passer;
use Livewire\Component;
use App\Models\Student;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;

class PassersList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    public function render()
    {
        return view('livewire.admin.passers-list');
    }

    protected function getTableQuery(): Builder
    {
        return Passer::query();
    }

    protected function getTableColumns(): array
    {

        return [
            TextColumn::make('fullname')->label('FULLNAME')->formatStateUsing(function ($record) {
                return $record->student->firstname . ' ' . $record->student->lastname;
            })->searchable(['firstname', 'lastname']),

        ];

    }

    protected function getTableHeaderActions(): array
    {
        return [
            Action::make('add Passer')->color('success')->label('Add Passer')->button()->icon('heroicon-o-document-text')->action(
                function ($record, $data) {
                    foreach ($data['student_id'] as $key => $value) {
                        Passer::create([
                            'student_id' => $value
                        ]);
                    }
                }
            )->form(function () {

                return [

                    Select::make('student_id')
                        ->multiple()
                        ->options(
                            Student::whereNotIn('id', Passer::pluck('student_id')->toArray())->where('status', 'approved')->get()->mapWithKeys(
                                function ($student) {
                                    return [
                                        $student->id => $student->firstname . ' ' . $student->lastname,
                                    ];
                                }
                            )
                        )

                ];
            }),

        ];
    }
}