@section('title', 'PASSERS')
<x-student-layout>
    <div>
        <div class="mt-20 bg-white p-5 rounded-xl shadow-md">
            <h1 class="mb-5 font-bold"> LIST OF PASSERS</h1>
            <table id="example" class="table-auto mt-3" style="width:100%">
                <thead class="font-normal">
                    <tr>

                        <th class="border border-gray-400  text-left px-2 text-sm font-bold text-gray-700 py-2">
                            FIRSTNAME
                        </th>
                        <th class="border border-gray-400  text-left px-2 text-sm font-bold text-gray-700 py-2">
                            MIDDLE INITIAL
                        </th>
                        <th class="border border-gray-400  text-left px-2 text-sm font-bold text-gray-700 py-2">
                            LASTNAME
                        </th>

                    </tr>
                </thead>
                <tbody class="">
                    @forelse (\App\Models\Passer::whereHas('student', function ($record) {
                        $record->whereHas('student_applicants', function ($applicants) {
                            return $applicants->where('status', 'passed')->where('category_id', \App\Models\Category::where('is_default', 1)->first()->id);
                        });
                    }) as $item)
                        <tr>
                            <td class="border border-gray-400  text-gray-700  px-3 py-1">
                                {{ $item->student->firstname }}
                            </td>
                            <td class="border border-gray-400  text-gray-700  px-3 py-1">
                                {{ $item->student->middlename }}
                            </td>
                            <td class="border border-gray-400  text-gray-700  px-3 py-1">
                                {{ $item->student->lastname }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="border border-gray-400  text-gray-700  px-3 py-1 text-center">
                                <span>No Passers Available...</span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-student-layout>
