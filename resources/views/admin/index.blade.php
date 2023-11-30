@section('title', 'Dashboard')
<x-admin-layout>
    <div>
        <div class="grid grid-cols-4 gap-5">
            <div class="border-2 cursor-pointer border-main bg-gray-100 rounded-xl relative overflow-hidden group p-6">
                <div class="flex justify-end">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6 fill-gray-500 ">
                        <path
                            d="M3 21C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H10.4142L12.4142 5H20C20.5523 5 21 5.44772 21 6V9H19V7H11.5858L9.58579 5H4V16.998L5.5 11H22.5L20.1894 20.2425C20.0781 20.6877 19.6781 21 19.2192 21H3ZM19.9384 13H7.06155L5.56155 19H18.4384L19.9384 13Z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-main text-3xl">
                        @if (\App\Models\Category::count() > 0)
                            {{ \App\Models\Document::whereHas('user', function ($k) {
                                $k->whereHas('student', function ($f) {
                                    $f->whereHas('student_applicants', function ($record) {
                                        $record->where('category_id', \App\Models\Category::where('is_default', 1)->first()->id);
                                    });
                                });
                            })->count() }}
                        @endif
                    </p>
                    <p class="mt-1 text-gray-500">Total Documents</p>
                </div>
                <div class="absolute -bottom-5 -right-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        class="h-20 opacity-10 group-hover:opacity-50 fill-main">
                        <path
                            d="M3 21C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H10.4142L12.4142 5H20C20.5523 5 21 5.44772 21 6V9H4V18.996L6 11H22.5L20.1894 20.2425C20.0781 20.6877 19.6781 21 19.2192 21H3Z">
                        </path>
                    </svg>
                </div>
            </div>
            <div class="border-2 cursor-pointer border-main bg-gray-100 rounded-xl relative overflow-hidden group p-6">
                <div class="flex justify-end">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6 fill-gray-500 ">
                        <path
                            d="M21.0082 3C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082ZM20 5H4V19H20V5ZM18 15V17H6V15H18ZM12 7V13H6V7H12ZM18 11V13H14V11H18ZM10 9H8V11H10V9ZM18 7V9H14V7H18Z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-main text-3xl">
                        @if (App\Models\Category::count() > 0)
                            {{ \App\Models\Student::whereHas('student_applicants', function ($record) {
                                $record->where('category_id', \App\Models\Category::where('is_default', 1)->first()->id);
                            })->count() }}
                        @endif
                    </p>
                    <p class="mt-1 text-gray-500">Total Students</p>
                </div>
                <div class="absolute -bottom-5 -right-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        class="h-20 opacity-10 group-hover:opacity-50 fill-main">
                        <path
                            d="M2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM6 15V17H18V15H6ZM6 7V13H12V7H6ZM14 7V9H18V7H14ZM14 11V13H18V11H14ZM8 9H10V11H8V9Z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="mt-10">
            <div>
                <livewire:admin.applicant-list />
            </div>
        </div>
    </div>
</x-admin-layout>
