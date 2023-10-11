<?php

namespace App\Http\Livewire\Student;

use App\Models\Document;
use App\Models\Student;
use Livewire\Component;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use WireUi\Traits\Actions;


class Profile extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    public $firstname, $middlename, $lastname, $email, $date_of_birth, $place_of_birth, $contact, $social_account, $status, $gender, $parent_status;
    public $province, $city, $barangay;
    public $father_firstname, $father_middlename, $father_lastname, $father_contact;
    public $mother_firstname, $mother_middlename, $mother_lastname, $mother_contact;
    public $degree, $year;

    use Actions;

    protected function getFormSchema(): array
    {
        return [

            Fieldset::make('PERSONAL INFORMATION')
                ->schema([
                    TextInput::make('firstname')->label('First Name')->required(),
                    TextInput::make('middlename')->label('Middle Name'),
                    TextInput::make('lastname')->label('Last Name')->required(),
                    DatePicker::make('date_of_birth')->label('Birthdate')->required(),
                    TextInput::make('place_of_birth')->label('Birthplace')->required(),
                    TextInput::make('contact')->label('Contact')->required(),
                    TextInput::make('email')->label('Email')->email()->required(),
                    TextInput::make('social_account')->label('Social Media Account')->required(),
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

    public function render()
    {
        return view('livewire.student.profile');
    }

    public function submitForm()
    {
        $this->validate([
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'date_of_birth' => 'required',
            'place_of_birth' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'social_account' => 'required',
            'status' => 'required',
            'gender' => 'required',
            'parent_status' => 'required',
            'province' => 'required',
            'city' => 'required',
            'barangay' => 'required',
            'father_firstname' => 'required',
            'father_middlename' => 'required',
            'father_lastname' => 'required',
            'father_contact' => 'required',
            'mother_firstname' => 'required',
            'mother_middlename' => 'required',
            'mother_lastname' => 'required',
            'mother_contact' => 'required',
            'degree' => 'required',
            'year' => 'required',
        ]);

        Student::create([
            'user_id' => auth()->user()->id,
            'firstname' => $this->firstname,

            'middlename' => $this->middlename,
            'lastname' => $this->lastname,
            'birthdate' => $this->date_of_birth,
            'birthplace' => $this->place_of_birth,
            'contact' => $this->contact,
            'email' => $this->email,
            'social_media_account' => $this->social_account,
            'civil_status' => $this->status,
            'gender' => $this->gender,
            'parent_status' => $this->parent_status,
            'province' => $this->province,
            'city' => $this->city,
            'barangay' => $this->barangay,
            'father_firstname' => $this->father_firstname,
            'father_middlename' => $this->father_middlename,
            'father_lastname' => $this->father_lastname,
            'father_contact' => $this->father_contact,
            'mother_firstname' => $this->mother_firstname,
            'mother_middlename' => $this->mother_middlename,
            'mother_lastname' => $this->mother_lastname,
            'mother_contact' => $this->mother_contact,
            'degree' => $this->degree,
            'year' => $this->year,
        ]);

        Document::create([
            'user_id' => auth()->user()->id,
        ]);



    }

    public function submitApplication()
    {

        $if_not_null = Document::where('user_id', auth()->user()->id)->where(function ($query) {
            $query->whereNotNull('photo_path')
                ->whereNotNull('valid_id_path')
                ->whereNotNull('document_path');
        })->get();

        if ($if_not_null->count() > 0) {
            $data = Student::where('user_id', auth()->user()->id)->first();
            $data->update([
                'status' => 'pending',
            ]);
            $this->dialog()->success(
                $title = 'Submit Successfully',
                $description = 'Your data has been submitted',
            );
        } else {
            $data = Student::where('user_id', auth()->user()->id)->first();

            $this->dialog()->error(
                $title = 'Submit not Applicable',
                $description = 'Please upload the requirements first.',
            );




        }


    }
}