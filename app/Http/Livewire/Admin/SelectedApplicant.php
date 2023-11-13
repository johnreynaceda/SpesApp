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
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;

class SelectedApplicant extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Student::query()->where('status', 'approved');
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
            TextColumn::make('year')->label('YEAR LEVEL')->searchable(),
        ];

    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\ViewAction::make()->label('View Records')->button()->color('success')->form(
                function ($record) {
                    return [
                        Fieldset::make('PERSONAL INFORMATION')
                            ->schema([
                                TextInput::make('firstname')->label('First Name')->required(),
                                TextInput::make('middlename')->label('Middle Name'),
                                TextInput::make('lastname')->label('Last Name')->required(),
                                DatePicker::make('birthdate')->label('Birthdate')->required(),
                                TextInput::make('birthplace')->label('Birthplace')->required(),
                                TextInput::make('contact')->label('Contact')->required(),
                                TextInput::make('email')->label('Email')->email()->required(),
                                TextInput::make('social_media_account')->label('Social Media Account')->required(),
                                Select::make('status')
                                    ->options([
                                        'Single' => 'Single',
                                        'Married' => 'Married',
                                        'Widowed' => 'Widowed',
                                        'Separated' => 'Separated',
                                    ]),
                                Select::make('gender')
                                    ->options([
                                        'Male' => 'Male',
                                        'Female' => 'Female',
                                    ]),
                                Select::make('parent_status')->label('Parent Status')->required()
                                    ->options([
                                        'Living Together' => 'Living Together',
                                        'Solo Parent' => 'Solo Parent',
                                        'Separated' => 'Separated',
                                    ]),

                            ])
                            ->columns(3),
                        Fieldset::make('ADDRESS INFORMATION')
                            ->schema([
                                TextInput::make('province')->label('Province')->required(),
                                TextInput::make('city')->label('City')->required(),
                                TextInput::make('barangay')->label('Barangay')->required(),

                            ])
                            ->columns(3),
                        Fieldset::make('FATHER INFORMATION')
                            ->schema([
                                TextInput::make('father_firstname')->label('First Name')->required(),
                                TextInput::make('father_middlename')->label('Middle Name'),
                                TextInput::make('father_lastname')->label('Last Name')->required(),
                                TextInput::make('father_contact')->label('Contact')->required(),

                            ])
                            ->columns(3),
                        Fieldset::make('MOTHER INFORMATION')
                            ->schema([
                                TextInput::make('mother_firstname')->label('First Name')->required(),
                                TextInput::make('mother_middlename')->label('Middle Name'),
                                TextInput::make('mother_lastname')->label('Last Name')->required(),
                                TextInput::make('mother_contact')->label('Contact')->required(),

                            ])
                            ->columns(3),
                        Fieldset::make('EDUCATIONAL STATUS')
                            ->schema([
                                TextInput::make('degree')->label('Degree')->required(),
                                TextInput::make('year')->label('Year')->required(),
                            ])
                            ->columns(3),

                    ];
                }
            )->modalWidth('6xl')->modalHeading('Student Details')


        ];
    }
    public function render()
    {
        return view('livewire.admin.selected-applicant');
    }
}
