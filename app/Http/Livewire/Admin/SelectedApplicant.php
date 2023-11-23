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

class SelectedApplicant extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    use Actions;
    public $document_modal = false;
    public $user_id;

    public $photo, $grade, $document;

    protected function getTableQuery(): Builder
    {
        return StudentApplication::query()->whereIn('status', ['active', 'approved'])->orderBy('created_at', 'desc');
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

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\ViewAction::make()->label('View Records')->button()->color('success')->form(
                function ($record) {
                    return [
                        Fieldset::make('PERSONAL INFORMATION')
                            ->schema([
                                TextInput::make('firstname')->label('First Name')->required()->placeholder($record->student->firstname),
                                TextInput::make('middlename')->label('Middle Name')->placeholder($record->student->middlename),
                                TextInput::make('lastname')->label('Last Name')->required()->placeholder($record->student->lastname),
                                DatePicker::make('birthdate')->label('Birthdate')->placeholder(\Carbon\Carbon::parse($record->student->birthdate)->format('F m, Y')),
                                TextInput::make('birthplace')->label('Birthplace')->required()->placeholder($record->student->birthplace),
                                TextInput::make('contact')->label('Contact')->required()->placeholder($record->student->contact),
                                TextInput::make('email')->label('Email')->email()->required()->placeholder($record->student->email),
                                TextInput::make('social_media_account')->label('Social Media Account')->required()->placeholder($record->student->social_media_account),
                                Select::make('status')->placeholder($record->student->civil_status)
                                    ->options([
                                        'Single' => 'Single',
                                        'Married' => 'Married',
                                        'Widowed' => 'Widowed',
                                        'Separated' => 'Separated',
                                    ]),
                                Select::make('gender')->placeholder($record->student->gender)
                                    ->options([
                                        'Male' => 'Male',
                                        'Female' => 'Female',
                                    ]),
                                Select::make('parent_status')->label('Parent Status')->required()->placeholder($record->student->parent_status)
                                    ->options([
                                        'Living Together' => 'Living Together',
                                        'Solo Parent' => 'Solo Parent',
                                        'Separated' => 'Separated',
                                    ]),

                            ])
                            ->columns(3),
                        Fieldset::make('ADDRESS INFORMATION')
                            ->schema([
                                TextInput::make('province')->label('Province')->required()->placeholder($record->student->province),
                                TextInput::make('city')->label('City')->required()->placeholder($record->student->city),
                                TextInput::make('barangay')->label('Barangay')->required()->placeholder($record->student->barangay),

                            ])
                            ->columns(3),
                        Fieldset::make('FATHER INFORMATION')
                            ->schema([
                                TextInput::make('father_firstname')->label('First Name')->required()->placeholder($record->student->father_firstname),
                                TextInput::make('father_middlename')->label('Middle Name')->placeholder($record->student->father_middlename),
                                TextInput::make('father_lastname')->label('Last Name')->required()->placeholder($record->student->father_lastname),
                                TextInput::make('father_contact')->label('Contact')->required()->placeholder($record->student->father_contact),

                            ])
                            ->columns(3),
                        Fieldset::make('MOTHER INFORMATION')
                            ->schema([
                                TextInput::make('mother_firstname')->label('First Name')->required()->placeholder($record->student->mother_firstname),
                                TextInput::make('mother_middlename')->label('Middle Name')->placeholder($record->student->mother_middlename),
                                TextInput::make('mother_lastname')->label('Last Name')->required()->placeholder($record->student->mother_lastname),
                                TextInput::make('mother_contact')->label('Contact')->required()->placeholder($record->student->mother_contact),

                            ])
                            ->columns(3),
                        Fieldset::make('EDUCATIONAL STATUS')
                            ->schema([
                                TextInput::make('degree')->label('Degree')->required()->placeholder($record->student->degree),
                                TextInput::make('year')->label('Year')->required()->placeholder($record->student->year),
                            ])
                            ->columns(3),

                    ];
                }
            )->modalWidth('6xl')->modalHeading('Student Details'),
            Action::make('view_documents')->label('View Documents')->button()->color('warning')->action(
                function ($record) {
                    $this->photo = $record->student->user->document->photo_path;
                    $this->grade = $record->student->user->document->valid_id_path;
                    $this->document = $record->student->user->document->document_path;
                    $this->user_id = $record->student->user->id;

                    $this->document_modal = true;
                }
            ),
            Tables\Actions\ActionGroup::make([
                Action::make('approve_for_examination')->icon('heroicon-o-thumb-up')->color('success')->action(
                    function ($record) {
                        return $record->update([
                            'status' => 'approved',
                        ]);
                        $this->dialog()->success(
                            $title = 'Submit Successfully',
                            $description = 'Your data has been submitted',
                        );
                    }
                )->visible(
                        function ($record) {
                            return $record->status == 'active';
                        }
                    ),
                Action::make('Add Score')->icon('heroicon-o-external-link')->visible(
                    function ($record) {
                        return $record->score == null;
                    }
                )->action(
                        function ($record, $data) {
                            $record->update([
                                'score' => $data['score'],
                            ]);
                        }
                    )->form(
                        function ($record) {
                            return [
                                TextInput::make('score')->required()->numeric()
                            ];
                        }
                    )->modalWidth('xl'),
                Action::make('decline_applicant')->visible(
                    function ($record) {
                        return $record->status == 'active';
                    }
                )->color('danger')->label('Decline')->icon('heroicon-o-thumb-down')->action(
                        function ($record, $data) {
                            $record->update([
                                'status' => 'declined',
                                'decline_note' => $data['note'],
                            ]);
                        }
                    )->form([
                            Textarea::make('note')->required()
                        ])->modalHeading('Decline Note'),
            ]),
        ];


    }

    public function downloadAll()
    {
        $data = Document::where('user_id', $this->user_id)->first();
        // return Storage::download($data->valid_id_path);


    }
    public function render()
    {
        return view('livewire.admin.selected-applicant');
    }


}
