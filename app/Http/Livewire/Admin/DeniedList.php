<?php

namespace App\Http\Livewire\Admin;

use App\Models\Document;
use App\Models\StudentApplication;
use Livewire\Component;
use App\Models\Student;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;


class DeniedList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    use Actions;

    protected function getTableQuery(): Builder
    {
        return StudentApplication::query()->where('status', 'declined')->orderBy('created_at', 'desc');
    }
    protected function getTableColumns(): array
    {

        return [
            TextColumn::make('fullname')->label('FULLNAME')->formatStateUsing(function ($record) {
                return $record->student->firstname . ' ' . $record->student->lastname;
            })->searchable(['firstname', 'lastname']),
            TextColumn::make('student.birthdate')->label('BIRTHDATE')->date()->searchable(),
            TextColumn::make('student.contact')->label('CONTACT')->searchable(),
            TextColumn::make('student.degree')->label('DEGREE')->searchable(),
            TextColumn::make('student.year')->label('YEAR LEVEL')->searchable(),
        ];

    }

    public function render()
    {
        return view('livewire.admin.denied-list');
    }
}
