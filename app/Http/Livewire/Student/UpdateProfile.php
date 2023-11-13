<?php

namespace App\Http\Livewire\Student;

use App\Models\Document;
use App\Models\Passer;
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

class UpdateProfile extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    public $update_modal = false;

    public $firstname, $middlename, $lastname, $email, $date_of_birth, $place_of_birth, $contact, $social_account, $status, $gender, $parent_status;
    public $province, $city, $barangay;
    public $father_firstname, $father_middlename, $father_lastname, $father_contact;
    public $mother_firstname, $mother_middlename, $mother_lastname, $mother_contact;
    public $degree, $year;

    use Actions;
    public function render()
    {
        return view('livewire.student.update-profile');
    }

    protected function getFormSchema(): array
    {
        return [

            Fieldset::make('PERSONAL INFORMATION')
                ->schema([
                    TextInput::make('firstname')->placeholder(auth()->user()->student->firstname)->label('First Name')->required(),
                    TextInput::make('middlename')->placeholder(auth()->user()->student->middlename)->label('Middle Name'),
                    TextInput::make('lastname')->placeholder(auth()->user()->student->lastname)->label('Last Name')->required(),
                    DatePicker::make('date_of_birth')->placeholder(\Carbon\Carbon::parse(auth()->user()->student->birthdate)->format('F d, Y'))->label('Birthdate')->required(),
                    TextInput::make('place_of_birth')->placeholder(auth()->user()->student->birthplace)->label('Birthplace')->required(),
                    TextInput::make('contact')->label('Contact')->placeholder(auth()->user()->student->contact)->required(),
                    TextInput::make('email')->label('Email')->email()->required()->placeholder(auth()->user()->email),
                    TextInput::make('social_account')->label('Social Media Account')->placeholder(auth()->user()->student->social_media_account)->required(),
                    Select::make('status')->placeholder(auth()->user()->student->civil_status)
                        ->options([
                            'Single' => 'Single',
                            'Married' => 'Married',
                            'Widowed' => 'Widowed',
                            'Separated' => 'Separated',
                        ]),
                    Select::make('gender')->placeholder(auth()->user()->student->gender)
                        ->options([
                            'Male' => 'Male',
                            'Female' => 'Female',
                        ]),
                    Select::make('parent_status')->label('Parent Status')->required()->placeholder(auth()->user()->student->parent_status)
                        ->options([
                            'Living Together' => 'Living Together',
                            'Solo Parent' => 'Solo Parent',
                            'Separated' => 'Separated',
                        ]),

                ])
                ->columns(3),
            Fieldset::make('ADDRESS INFORMATION')
                ->schema([
                    TextInput::make('province')->label('Province')->required()->placeholder(auth()->user()->student->province),
                    TextInput::make('city')->label('City')->required()->placeholder(auth()->user()->student->city),
                    TextInput::make('barangay')->label('Barangay')->required()->placeholder(auth()->user()->student->barangay),

                ])
                ->columns(3),
            Fieldset::make('FATHER INFORMATION')
                ->schema([
                    TextInput::make('father_firstname')->label('First Name')->required()->placeholder(auth()->user()->student->father_firstname),
                    TextInput::make('father_middlename')->label('Middle Name')->placeholder(auth()->user()->student->father_middlename),
                    TextInput::make('father_lastname')->label('Last Name')->placeholder(auth()->user()->student->father_lastname)->required(),
                    TextInput::make('father_contact')->label('Contact')->required()->placeholder(auth()->user()->student->father_contact),

                ])
                ->columns(3),
            Fieldset::make('MOTHER INFORMATION')
                ->schema([
                    TextInput::make('mother_firstname')->label('First Name')->required()->placeholder(auth()->user()->student->mother_middlename),
                    TextInput::make('mother_middlename')->label('Middle Name')->placeholder(auth()->user()->student->mother_middlename),
                    TextInput::make('mother_lastname')->label('Last Name')->required()->placeholder(auth()->user()->student->mother_middlename),
                    TextInput::make('mother_contact')->label('Contact')->placeholder(auth()->user()->student->mother_middlename)->required(),

                ])
                ->columns(3),
            Fieldset::make('EDUCATIONAL STATUS')
                ->schema([
                    TextInput::make('degree')->label('Degree')->required()->placeholder(auth()->user()->student->degree),
                    TextInput::make('year')->label('Year Level')->required()->placeholder(auth()->user()->student->year),
                ])
                ->columns(3),

        ];
    }

    public function submitUpdate()
    {
        auth()->user()->student->update([
            'firstname' => $this->firstname != null ? $this->firstname : auth()->user()->student->firstname,
            'middlename' => $this->middlename != null ? $this->middlename : auth()->user()->student->middlename,
            'lastname' => $this->lastname != null ? $this->lastname : auth()->user()->student->lastname,
            'birthdate' => $this->date_of_birth != null ? $this->date_of_birth : auth()->user()->student->birthdate,
            'birthplace' => $this->place_of_birth != null ? $this->place_of_birth : auth()->user()->student->birthplace,
            'contact' => $this->contact != null ? $this->contact : auth()->user()->student->contact,
            'email' => $this->email != null ? $this->email : auth()->user()->email,
            'social_media_account' => $this->social_account != null ? $this->social_account : auth()->user()->student->social_media_account,
            'civil_status' => $this->status != null ? $this->status : auth()->user()->student->civil_status,
            'gender' => $this->gender != null ? $this->gender : auth()->user()->student->gender,
            'parent_status' => $this->parent_status != null ? $this->parent_status : auth()->user()->student->parent_status,
            'province' => $this->province != null ? $this->province : auth()->user()->student->province,
            'city' => $this->city != null ? $this->city : auth()->user()->student->city,
            'barangay' => $this->barangay != null ? $this->barangay : auth()->user()->student->barangay,
            'father_firstname' => $this->father_firstname != null ? $this->father_firstname : auth()->user()->student->father_firstname,
            'father_middlename' => $this->father_middlename != null ? $this->father_middlename : auth()->user()->student->father_middlename,
            'father_lastname' => $this->father_lastname != null ? $this->father_lastname : auth()->user()->student->father_lastname,
            'father_contact' => $this->father_contact != null ? $this->father_contact : auth()->user()->student->father_contact,
            'mother_firstname' => $this->mother_firstname != null ? $this->mother_firstname : auth()->user()->student->mother_firstname,
            'mother_middlename' => $this->mother_middlename != null ? $this->mother_middlename : auth()->user()->student->mother_middlename,
            'mother_lastname' => $this->mother_lastname != null ? $this->mother_lastname : auth()->user()->student->mother_lastname,
            'mother_contact' => $this->mother_contact != null ? $this->mother_contact : auth()->user()->student->mother_contact,
            'degree' => $this->degree != null ? $this->degree : auth()->user()->student->degree,
            'year' => $this->year != null ? $this->year : auth()->user()->student->year,
        ]);
        $this->update_modal = false;
        $this->emit('update');
        $this->dialog()->success(
            $title = 'Submit Successfully',
            $description = 'Your data has been submitted',
        );
    }
}
