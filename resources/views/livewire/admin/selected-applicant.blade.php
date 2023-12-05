<div>
    {{ $this->table }}

    <x-modal wire:model.defer="document_modal" align="center">

        <x-card title="Uploaded Documents">
            <div class="flex flex-col space-y-5">
                <div>
                    <h1>Photo</h1>
                    @if ($photo)
                        @php
                            $data = explode('.', $photo);

                        @endphp
                        @if ($data[1] == 'png' || $data[1] == 'jpg')
                            <a href="{{ Storage::url($photo) }}" target="_blank" class="group">
                                <img src="{{ Storage::url($photo) }}" class=" group-hover:scale-95 h-40 object-cover w-40"
                                    alt="">
                            </a>
                        @else
                            <a href="{{ Storage::url($photo) }}" class="hover:text-green-600" target="_blank">
                                <p class="truncate">
                                    {{ $photo }}
                                </p>
                            </a>
                        @endif


                    @endif


                </div>
                <div>
                    <h1>Grade</h1>
                    @if ($grade)
                        @php
                            $data = explode('.', $grade);

                        @endphp
                        @if ($data[1] == 'png' || $data[1] == 'jpg')
                            <a href="{{ Storage::url($grade) }}" target="_blank">
                                <img src="{{ Storage::url($grade) }}"
                                    class=" group-hover:scale-95 h-40 object-cover w-40" alt="">
                            </a>
                        @else
                            <a href="{{ Storage::url($grade) }}" class="hover:text-green-600" target="_blank">
                                <p class="truncate">
                                    {{ $grade }}
                                </p>
                            </a>
                        @endif

                    @endif
                </div>
                <div>
                    <h1>Document</h1>
                    @if ($document)
                        @php
                            $data = explode('.', $document);

                        @endphp
                        @if ($data[1] == 'png' || $data[1] == 'jpg')
                            <a href="{{ Storage::url($document) }}" target="_blank">
                                <img src="{{ Storage::url($document) }}"
                                    class=" group-hover:scale-95 h-40 object-cover w-40" alt="">
                            </a>
                        @else
                            <a href="{{ Storage::url($document) }}" class="hover:text-green-600" target="_blank">
                                <p class="truncate">
                                    {{ $document }}
                                </p>
                            </a>
                        @endif

                    @endif
                </div>
            </div>

            <x-slot name="footer">

                <div class="flex justify-end gap-x-4">
                    {{-- <x-button label="Download Uploads" dark wire:click="downloadAll" /> --}}

                    <x-button flat label="Cancel" x-on:click="close" />



                </div>

            </x-slot>

        </x-card>

    </x-modal>
</div>
