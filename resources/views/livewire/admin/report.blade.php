<div x-data>
    <div class="flex justify-between items-center">
        <div class="w-64">
            <x-native-select label="Select Report" wire:model="reports">
                <option>Select An Option</option>
                <option value="active">Pending</option>
                <option value="approved">Approved</option>
                <option value="declined">Declined</option>
                <option value="passed">Passed</option>
            </x-native-select>
        </div>
        <div>
            <x-button label="PRINT REPORT" @click="printOut($refs.printContainer.outerHTML);" dark icon="printer" />
        </div>
    </div>
    <div class="mt-10" x-ref="printContainer">
        <table id="example" class="table-auto mt-3" style="width:100%">
            <thead class="font-normal">
                <tr>
                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">FULLNAME</th>
                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                        BIRTHDATE
                    </th>
                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                        CONTACT
                    </th>
                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                        DEGREE
                    </th>
                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                        YEAR LEVEL
                    </th>
                </tr>
            </thead>
            <tbody class="">
                @if ($reports)
                    @foreach ($datas as $report)
                        <tr>
                            <td class="border-2  text-gray-700  px-3 py-1">
                                {{ $report->student->firstname . ' ' . $report->student->lastname }}
                            </td>
                            <td class="border-2  text-gray-700  px-3 py-1">
                                {{ \Carbon\Carbon::parse($report->student->birthdate)->format('F d, Y') }}
                            </td>
                            <td class="border-2  text-gray-700  px-3 py-1">
                                {{ $report->student->contact }}
                            </td>
                            <td class="border-2  text-gray-700  px-3 py-1">
                                {{ $report->student->degree }}
                            </td>
                            <td class="border-2  text-gray-700  px-3 py-1">
                                {{ $report->student->year }}
                            </td>

                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
