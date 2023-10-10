<div>
    <div class="bg-white rounded-2xl">
        @if (auth()->user()->student != null)
            <div class="p-7">
                <header class="p-7 border-b flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-semibold text-gay-700">SPES FORM</h1>

                    </div>
                    <div class="flex space-x-2 items-center">
                        @if (auth()->user()->student->status != 'approved')
                            <x-button label="SUMBIT FORM" wire:click="submitApplication" right-icon="external-link" md
                                rounded dark class="font-semibold" />
                            <x-button label="EDIT FORM" right-icon="pencil-alt" md rounded positive
                                class="font-semibold" />
                        @endif

                    </div>
                </header>
                <div class="div px-7 pb-7 pt-5">
                    <div class="grid grid-cols-3 gap-5">
                        <div>
                            <span class="text-sm text-gray-500">Firstname</span>
                            <h1 class="font-semibold uppercase">{{ auth()->user()->student->firstname }}</h1>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Middlename</span>
                            <h1 class="font-semibold uppercase">{{ auth()->user()->student->middlename }}</h1>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Lastname</span>
                            <h1 class="font-semibold uppercase">{{ auth()->user()->student->lastname }}</h1>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Bithdate</span>
                            <h1 class="font-semibold uppercase">
                                {{ \Carbon\Carbon::parse(auth()->user()->student->birthdate)->format('F d, Y') }}</h1>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Birthplace</span>
                            <h1 class="font-semibold uppercase">{{ auth()->user()->student->birthplace }}</h1>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Contact</span>
                            <h1 class="font-semibold uppercase">{{ auth()->user()->student->contact }}</h1>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Email</span>
                            <h1 class="font-semibold uppercase">{{ auth()->user()->student->email }}</h1>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Social Media Account</span>
                            <h1 class="font-semibold uppercase">{{ auth()->user()->student->social_media_account }}</h1>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Civil Status</span>
                            <h1 class="font-semibold uppercase">{{ auth()->user()->student->civil_status }}</h1>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Gender</span>
                            <h1 class="font-semibold uppercase">{{ auth()->user()->student->gender }}</h1>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Parent Status</span>
                            <h1 class="font-semibold uppercase">{{ auth()->user()->student->parent_status }}</h1>
                        </div>
                        <div class="col-span-3">
                            <span class="font-bold text-xl text-blue-500">PERMANENT ADDRESS</span>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Province</span>
                            <h1 class="font-semibold uppercase">{{ auth()->user()->student->province }}</h1>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">City</span>
                            <h1 class="font-semibold uppercase">{{ auth()->user()->student->city }}</h1>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Barangay</span>
                            <h1 class="font-semibold uppercase">{{ auth()->user()->student->barangay }}</h1>
                        </div>
                        <div class="col-span-3">
                            <span class="font-bold text-xl text-blue-500">FATHER INFORMATION</span>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Firstname</span>
                            <h1 class="font-semibold uppercase">{{ auth()->user()->student->father_firstname }}</h1>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Middlename</span>
                            <h1 class="font-semibold uppercase">{{ auth()->user()->student->father_middlename }}</h1>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Lastname</span>
                            <h1 class="font-semibold uppercase">{{ auth()->user()->student->father_lastname }}</h1>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Phone Number</span>
                            <h1 class="font-semibold uppercase">{{ auth()->user()->student->father_contact }}</h1>
                        </div>
                        <div class="col-span-3">
                            <span class="font-bold text-xl text-blue-500">MOTHER INFORMATION</span>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Firstname</span>
                            <h1 class="font-semibold uppercase">{{ auth()->user()->student->mother_firstname }}</h1>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Middlename</span>
                            <h1 class="font-semibold uppercase">{{ auth()->user()->student->mother_middlename }}</h1>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Lastname</span>
                            <h1 class="font-semibold uppercase">{{ auth()->user()->student->mother_lastname }}</h1>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Phone Number</span>
                            <h1 class="font-semibold uppercase">{{ auth()->user()->student->mother_contact }}</h1>
                        </div>
                        <div class="col-span-3">
                            <span class="font-bold text-xl text-blue-500">EDUCATIONAL INFORMATION</span>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Degree</span>
                            <h1 class="font-semibold uppercase">{{ auth()->user()->student->degree }}</h1>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Year</span>
                            <h1 class="font-semibold uppercase">{{ auth()->user()->student->year }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <header class="p-7">
                <h1 class="text-2xl font-semibold text-gay-700">SPES APPLICATION FORM</h1>
                <span class="text-sm text-gray-500">Please Fill Out Completely</span>
            </header>
            <div class="div px-7 pb-7 pt-5">
                {{ $this->form }}
                <div class="mt-10 flex space-x-1 items-center">
                    <x-button label="Submit Form" rounded positive class="font-semibold" icon="save" lg
                        wire:click="submitForm" spinner="submitForm" />
                    <x-button label="Cancel" rounded negative class="font-semibold" flat lg />
                </div>
            </div>
        @endif

    </div>
</div>
