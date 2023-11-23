<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Passer;
use App\Models\StudentApplication;
use Livewire\Component;
use App\Models\Student;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use WireUi\Traits\Actions;


class PassersList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    use Actions;
    public function render()
    {
        return view('livewire.admin.passers-list');
    }

    protected function getTableQuery(): Builder
    {
        return Passer::query()->whereHas('student', function ($record) {
            $record->whereHas('student_applicants', function ($applicants) {
                return $applicants->where('status', 'passed')->where('category_id', Category::where('is_default', 1)->first()->id);
            });
        });
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
            Action::make('Generate_passer')->color('success')->label('Generate Passer')->button()->icon('heroicon-o-document-text')->action(
                function ($record, $data) {
                    $data = StudentApplication::orderBy('score', 'desc')
                        ->take(80)
                        ->get();

                    foreach ($data as $key => $value) {
                        Passer::create([
                            'student_id' => $value->student_id,
                        ]);

                        StudentApplication::where('student_id', $value->student_id)->where('category_id', Category::where('is_default', 1)->first()->id)->first()->update([
                            'status' => 'passed'
                        ]);
                    }

                    $this->dialog()->success(
                        $title = 'Generate Successfully',
                        $description = 'List of Passers has been generated',
                    );
                }
            )

        ];
    }
}
