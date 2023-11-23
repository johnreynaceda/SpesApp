<div>
    <div class="">
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <dl class="rounded-lg bg-white border shadow-lg sm:grid sm:grid-cols-3">
                    <div class="flex flex-col border-b border-gray-100 p-6 text-center sm:border-0 sm:border-r">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-green-500">
                            Approved
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-gray-700">
                            {{ \App\Models\StudentApplication::where('category_id', \App\Models\Category::where('is_default', 1)->first()->id)->where('status', 'approved')->count() }}
                        </dd>
                    </div>
                    <div
                        class="flex flex-col border-t border-b border-gray-100 p-6 text-center sm:border-0 sm:border-l sm:border-r">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-red-500">
                            Disapproved
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-gray-700">
                            {{ \App\Models\StudentApplication::where('category_id', \App\Models\Category::where('is_default', 1)->first()->id)->where('status', 'declined')->count() }}
                        </dd>
                    </div>
                    <div class="flex flex-col border-t border-gray-100 p-6 text-center sm:border-0 sm:border-l">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-yellow-500">
                            Active
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-gray-700">
                            {{ \App\Models\StudentApplication::where('category_id', \App\Models\Category::where('is_default', 1)->first()->id)->where('status', 'active')->count() }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
    <div class="mt-10">
        {{-- {{ $this->table ?? '' }} --}}
    </div>

    <x-modal blur wire:model.defer="view_modal" max-width="7xl">
        <div class="bg-white">
            <div class="div px-7 pb-7 pt-5">
                <div class="grid grid-cols-3 gap-5">
                    <div>
                        <span class="text-sm text-gray-500">Firstname</span>
                        <h1 class="font-semibold uppercase">{{ $applicant_data->firstname ?? '' }}</h1>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Middlename</span>
                        <h1 class="font-semibold uppercase">{{ $applicant_data->middlename ?? '' }}</h1>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Lastname</span>
                        <h1 class="font-semibold uppercase">{{ $applicant_data->lastname ?? '' }}</h1>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Bithdate</span>
                        <h1 class="font-semibold uppercase">
                            {{ \Carbon\Carbon::parse($applicant_data->birthdate ?? '')->format('F d, Y') }}</h1>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Birthplace</span>
                        <h1 class="font-semibold uppercase">{{ $applicant_data->birthplace ?? '' }}</h1>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Contact</span>
                        <h1 class="font-semibold uppercase">{{ $applicant_data->contact ?? '' }}</h1>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Email</span>
                        <h1 class="font-semibold uppercase">{{ $applicant_data->email ?? '' }}</h1>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Social Media Account</span>
                        <h1 class="font-semibold uppercase">{{ $applicant_data->social_media_account ?? '' }}</h1>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Civil Status</span>
                        <h1 class="font-semibold uppercase">{{ $applicant_data->civil_status ?? '' }}</h1>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Gender</span>
                        <h1 class="font-semibold uppercase">{{ $applicant_data->gender ?? '' }}</h1>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Parent Status</span>
                        <h1 class="font-semibold uppercase">{{ $applicant_data->parent_status ?? '' }}</h1>
                    </div>
                    <div class="col-span-3">
                        <span class="font-bold text-xl text-blue-500">PERMANENT ADDRESS</span>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Province</span>
                        <h1 class="font-semibold uppercase">{{ $applicant_data->province ?? '' }}</h1>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">City</span>
                        <h1 class="font-semibold uppercase">{{ $applicant_data->city ?? '' }}</h1>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Barangay</span>
                        <h1 class="font-semibold uppercase">{{ $applicant_data->barangay ?? '' }}</h1>
                    </div>
                    <div class="col-span-3">
                        <span class="font-bold text-xl text-blue-500">FATHER INFORMATION</span>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Firstname</span>
                        <h1 class="font-semibold uppercase">{{ $applicant_data->father_firstname ?? '' }}</h1>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Middlename</span>
                        <h1 class="font-semibold uppercase">{{ $applicant_data->father_middlename ?? '' }}</h1>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Lastname</span>
                        <h1 class="font-semibold uppercase">{{ $applicant_data->father_lastname ?? '' }}</h1>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Phone Number</span>
                        <h1 class="font-semibold uppercase">{{ $applicant_data->father_contact ?? '' }}</h1>
                    </div>
                    <div class="col-span-3">
                        <span class="font-bold text-xl text-blue-500">MOTHER INFORMATION</span>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Firstname</span>
                        <h1 class="font-semibold uppercase">{{ $applicant_data->mother_firstname ?? '' }}</h1>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Middlename</span>
                        <h1 class="font-semibold uppercase">{{ $applicant_data->mother_middlename ?? '' }}</h1>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Lastname</span>
                        <h1 class="font-semibold uppercase">{{ $applicant_data->mother_lastname ?? '' }}</h1>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Phone Number</span>
                        <h1 class="font-semibold uppercase">{{ $applicant_data->mother_contact ?? '' }}</h1>
                    </div>
                    <div class="col-span-3">
                        <span class="font-bold text-xl text-blue-500">EDUCATIONAL INFORMATION</span>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Degree</span>
                        <h1 class="font-semibold uppercase">{{ $applicant_data->degree ?? '' }}</h1>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Year</span>
                        <h1 class="font-semibold uppercase">{{ $applicant_data->year ?? '' }}</h1>
                    </div>
                </div>

                <div class="mt-10">
                    <header class="font-bold text-xl text-blue-500">UPLOADED DOCUMENTS</header>
                    <div class="mt-2">
                        <div class="flex space-x-3 items-center">
                            <a href="{{ Storage::url($applicant_documents->photo_path ?? '') }}" target="_blank"
                                class="underline text-green-500 font-medium hover:text-green-800">
                                PHOTO
                            </a>
                            <a href="{{ Storage::url($applicant_documents->valid_id_path ?? '') }}" target="_blank"
                                class="underline text-green-500 font-medium hover:text-green-800">
                                SCHOOL ID/ VALID ID
                            </a>
                            <a href="{{ Storage::url($applicant_documents->document_path ?? '') }}" target="_blank"
                                class="underline text-green-500 font-medium hover:text-green-800">
                                DOCUMENTS
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-modal>
</div>
