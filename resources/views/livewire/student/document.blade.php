<div>
    <div class="bg-white rounded-2xl">
        <header class="p-7">
            <h1 class="text-2xl font-semibold text-gray-700">REQUIRED DOCUMENTS</h1>
        </header>
        <div class="div px-7 pb-7 pt-5">
            <div class="grid 2xl:grid-cols-3 grid-cols-1 gap-5 pb-10">
                <div class="flex border rounded-xl border-b-2 border-b-blue-600  pb-3 flex-col space-y-5">
                    <div class="border rounded-xl h-40 relative shadow p-4">
                        @if (auth()->user()->document->photo_path != null)
                            <img src="{{ Storage::url(auth()->user()->document->photo_path) }}"
                                class="absolute top-0 bottom-0 left-0 h-full w-full object-cover bg-gray-400 rounded-xl opacity-80"
                                alt="">
                        @else
                            <span class="text-gray-500 animate-pulse">No Upload...</span>
                        @endif
                    </div>
                    <div class="flex justify-between items-start px-4">
                        <div
                            class="flex space-x-1 items-center {{ $photo ? 'text-green-600 fill-green-600' : 'fill-gray-600 text-gray-700' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 ">
                                <path
                                    d="M21 15V18H24V20H21V23H19V20H16V18H19V15H21ZM21.0082 3C21.556 3 22 3.44495 22 3.9934L22.0007 13.3417C21.3749 13.1204 20.7015 13 20 13V5H4L4.001 19L13.2929 9.70715C13.6528 9.34604 14.22 9.31823 14.6123 9.62322L14.7065 9.70772L18.2521 13.2586C15.791 14.0069 14 16.2943 14 19C14 19.7015 14.1204 20.3749 14.3417 21.0007L2.9918 21C2.44405 21 2 20.5551 2 20.0066V3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082ZM8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7Z">
                                </path>
                            </svg>
                            <span class="uppercase font-semibold ">Photo</span>
                            <svg wire:loading wire:target="photo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                class="w-5 h-5 fill-green-800 animate-spin">
                                <path
                                    d="M12 2C12.5523 2 13 2.44772 13 3V6C13 6.55228 12.5523 7 12 7C11.4477 7 11 6.55228 11 6V3C11 2.44772 11.4477 2 12 2ZM12 17C12.5523 17 13 17.4477 13 18V21C13 21.5523 12.5523 22 12 22C11.4477 22 11 21.5523 11 21V18C11 17.4477 11.4477 17 12 17ZM22 12C22 12.5523 21.5523 13 21 13H18C17.4477 13 17 12.5523 17 12C17 11.4477 17.4477 11 18 11H21C21.5523 11 22 11.4477 22 12ZM7 12C7 12.5523 6.55228 13 6 13H3C2.44772 13 2 12.5523 2 12C2 11.4477 2.44772 11 3 11H6C6.55228 11 7 11.4477 7 12ZM19.0711 19.0711C18.6805 19.4616 18.0474 19.4616 17.6569 19.0711L15.5355 16.9497C15.145 16.5592 15.145 15.9261 15.5355 15.5355C15.9261 15.145 16.5592 15.145 16.9497 15.5355L19.0711 17.6569C19.4616 18.0474 19.4616 18.6805 19.0711 19.0711ZM8.46447 8.46447C8.07394 8.85499 7.44078 8.85499 7.05025 8.46447L4.92893 6.34315C4.53841 5.95262 4.53841 5.31946 4.92893 4.92893C5.31946 4.53841 5.95262 4.53841 6.34315 4.92893L8.46447 7.05025C8.85499 7.44078 8.85499 8.07394 8.46447 8.46447ZM4.92893 19.0711C4.53841 18.6805 4.53841 18.0474 4.92893 17.6569L7.05025 15.5355C7.44078 15.145 8.07394 15.145 8.46447 15.5355C8.85499 15.9261 8.85499 16.5592 8.46447 16.9497L6.34315 19.0711C5.95262 19.4616 5.31946 19.4616 4.92893 19.0711ZM15.5355 8.46447C15.145 8.07394 15.145 7.44078 15.5355 7.05025L17.6569 4.92893C18.0474 4.53841 18.6805 4.53841 19.0711 4.92893C19.4616 5.31946 19.4616 5.95262 19.0711 6.34315L16.9497 8.46447C16.5592 8.85499 15.9261 8.85499 15.5355 8.46447Z">
                                </path>
                            </svg>
                        </div>
                        @if ($photo)
                            <x-button class="font-semibold" sm label="Submit" wire:click="submitPhoto" right-icon="save"
                                dark rounded />
                        @else
                            <label
                                class="flex justify-center h-full px-4 py-1.5  transition bg-green-700 hover:bg-green-600 rounded-full appearance-none cursor-pointer hover:border-green-600 focus:outline-none">
                                <span class="flex items-center text-sm space-x-1 text-white">
                                    <span>Upload</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="h-4 w-4 fill-white">
                                        <path
                                            d="M12 12.5858L16.2426 16.8284L14.8284 18.2426L13 16.415V22H11V16.413L9.17157 18.2426L7.75736 16.8284L12 12.5858ZM12 2C15.5934 2 18.5544 4.70761 18.9541 8.19395C21.2858 8.83154 23 10.9656 23 13.5C23 16.3688 20.8036 18.7246 18.0006 18.9776L18.0009 16.9644C19.6966 16.7214 21 15.2629 21 13.5C21 11.567 19.433 10 17.5 10C17.2912 10 17.0867 10.0183 16.8887 10.054C16.9616 9.7142 17 9.36158 17 9C17 6.23858 14.7614 4 12 4C9.23858 4 7 6.23858 7 9C7 9.36158 7.03838 9.7142 7.11205 10.0533C6.91331 10.0183 6.70879 10 6.5 10C4.567 10 3 11.567 3 13.5C3 15.2003 4.21241 16.6174 5.81986 16.934L6.00005 16.9646L6.00039 18.9776C3.19696 18.7252 1 16.3692 1 13.5C1 10.9656 2.71424 8.83154 5.04648 8.19411C5.44561 4.70761 8.40661 2 12 2Z">
                                        </path>
                                    </svg>
                                </span>
                                <input type="file" wire:model="photo" name="file_upload" class="hidden">
                            </label>
                        @endif
                    </div>

                </div>
                <div class="flex border rounded-xl border-b-2 border-b-blue-600  pb-3 flex-col space-y-5">
                    <div class="border rounded-xl h-40 relative shadow p-4">
                        @if (auth()->user()->document->valid_id_path != null)
                            <img src="{{ Storage::url(auth()->user()->document->valid_id_path) }}"
                                class="absolute top-0 bottom-0 left-0 h-full w-full object-cover bg-gray-400 rounded-xl opacity-80"
                                alt="">
                        @else
                            <span class="text-gray-500 animate-pulse">No Upload...</span>
                        @endif
                    </div>
                    <div class="flex justify-between items-start px-4">
                        <div
                            class="flex space-x-1 items-center {{ $valid_id ? 'text-green-600 fill-green-600' : 'fill-gray-600 text-gray-700' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 ">
                                <path
                                    d="M21 15V18H24V20H21V23H19V20H16V18H19V15H21ZM21.0082 3C21.556 3 22 3.44495 22 3.9934L22.0007 13.3417C21.3749 13.1204 20.7015 13 20 13V5H4L4.001 19L13.2929 9.70715C13.6528 9.34604 14.22 9.31823 14.6123 9.62322L14.7065 9.70772L18.2521 13.2586C15.791 14.0069 14 16.2943 14 19C14 19.7015 14.1204 20.3749 14.3417 21.0007L2.9918 21C2.44405 21 2 20.5551 2 20.0066V3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082ZM8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7Z">
                                </path>
                            </svg>
                            <span class="uppercase font-semibold ">SCHOOL ID/ VALID ID</span>
                            <svg wire:loading wire:target="valid_id" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24" class="w-5 h-5 fill-green-800 animate-spin">
                                <path
                                    d="M12 2C12.5523 2 13 2.44772 13 3V6C13 6.55228 12.5523 7 12 7C11.4477 7 11 6.55228 11 6V3C11 2.44772 11.4477 2 12 2ZM12 17C12.5523 17 13 17.4477 13 18V21C13 21.5523 12.5523 22 12 22C11.4477 22 11 21.5523 11 21V18C11 17.4477 11.4477 17 12 17ZM22 12C22 12.5523 21.5523 13 21 13H18C17.4477 13 17 12.5523 17 12C17 11.4477 17.4477 11 18 11H21C21.5523 11 22 11.4477 22 12ZM7 12C7 12.5523 6.55228 13 6 13H3C2.44772 13 2 12.5523 2 12C2 11.4477 2.44772 11 3 11H6C6.55228 11 7 11.4477 7 12ZM19.0711 19.0711C18.6805 19.4616 18.0474 19.4616 17.6569 19.0711L15.5355 16.9497C15.145 16.5592 15.145 15.9261 15.5355 15.5355C15.9261 15.145 16.5592 15.145 16.9497 15.5355L19.0711 17.6569C19.4616 18.0474 19.4616 18.6805 19.0711 19.0711ZM8.46447 8.46447C8.07394 8.85499 7.44078 8.85499 7.05025 8.46447L4.92893 6.34315C4.53841 5.95262 4.53841 5.31946 4.92893 4.92893C5.31946 4.53841 5.95262 4.53841 6.34315 4.92893L8.46447 7.05025C8.85499 7.44078 8.85499 8.07394 8.46447 8.46447ZM4.92893 19.0711C4.53841 18.6805 4.53841 18.0474 4.92893 17.6569L7.05025 15.5355C7.44078 15.145 8.07394 15.145 8.46447 15.5355C8.85499 15.9261 8.85499 16.5592 8.46447 16.9497L6.34315 19.0711C5.95262 19.4616 5.31946 19.4616 4.92893 19.0711ZM15.5355 8.46447C15.145 8.07394 15.145 7.44078 15.5355 7.05025L17.6569 4.92893C18.0474 4.53841 18.6805 4.53841 19.0711 4.92893C19.4616 5.31946 19.4616 5.95262 19.0711 6.34315L16.9497 8.46447C16.5592 8.85499 15.9261 8.85499 15.5355 8.46447Z">
                                </path>
                            </svg>
                        </div>
                        @if ($valid_id)
                            <x-button class="font-semibold" sm label="Submit" wire:click="submitValidId"
                                right-icon="save" dark rounded />
                        @else
                            <label
                                class="flex justify-center h-full px-4 py-1.5  transition bg-green-700 hover:bg-green-600 rounded-full appearance-none cursor-pointer hover:border-green-600 focus:outline-none">
                                <span class="flex items-center text-sm space-x-1 text-white">
                                    <span>Upload</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="h-4 w-4 fill-white">
                                        <path
                                            d="M12 12.5858L16.2426 16.8284L14.8284 18.2426L13 16.415V22H11V16.413L9.17157 18.2426L7.75736 16.8284L12 12.5858ZM12 2C15.5934 2 18.5544 4.70761 18.9541 8.19395C21.2858 8.83154 23 10.9656 23 13.5C23 16.3688 20.8036 18.7246 18.0006 18.9776L18.0009 16.9644C19.6966 16.7214 21 15.2629 21 13.5C21 11.567 19.433 10 17.5 10C17.2912 10 17.0867 10.0183 16.8887 10.054C16.9616 9.7142 17 9.36158 17 9C17 6.23858 14.7614 4 12 4C9.23858 4 7 6.23858 7 9C7 9.36158 7.03838 9.7142 7.11205 10.0533C6.91331 10.0183 6.70879 10 6.5 10C4.567 10 3 11.567 3 13.5C3 15.2003 4.21241 16.6174 5.81986 16.934L6.00005 16.9646L6.00039 18.9776C3.19696 18.7252 1 16.3692 1 13.5C1 10.9656 2.71424 8.83154 5.04648 8.19411C5.44561 4.70761 8.40661 2 12 2Z">
                                        </path>
                                    </svg>
                                </span>
                                <input type="file" wire:model="valid_id" name="file_upload" class="hidden">
                            </label>
                        @endif
                    </div>

                </div>
                <div class="flex border rounded-xl border-b-2 border-b-blue-600  pb-3 flex-col space-y-5">
                    <div class="border rounded-xl h-40 relative shadow p-4">
                        @if (auth()->user()->document->document_path != null)

                            @php
                                $data = auth()->user()->document->document_path;
                                $ext = explode('.', $data);
                            @endphp
                            @if ($ext[1] == 'pdf')
                                <span class="text-gray-500">The submitted file is a PDF Format.</span>
                            @else
                                <img src="{{ Storage::url(auth()->user()->document->document_path) }}"
                                    class="absolute top-0 bottom-0 left-0 h-full w-full object-cover bg-gray-400 rounded-xl opacity-80"
                                    alt="">
                            @endif
                        @else
                            <span class="text-gray-500 animate-pulse">No Upload...</span>
                        @endif
                    </div>
                    <div class="flex justify-between items-start px-4">
                        <div
                            class="flex space-x-1 items-center {{ $document ? 'text-green-600 fill-green-600' : 'fill-gray-600 text-gray-700' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 ">
                                <path
                                    d="M21 15V18H24V20H21V23H19V20H16V18H19V15H21ZM21.0082 3C21.556 3 22 3.44495 22 3.9934L22.0007 13.3417C21.3749 13.1204 20.7015 13 20 13V5H4L4.001 19L13.2929 9.70715C13.6528 9.34604 14.22 9.31823 14.6123 9.62322L14.7065 9.70772L18.2521 13.2586C15.791 14.0069 14 16.2943 14 19C14 19.7015 14.1204 20.3749 14.3417 21.0007L2.9918 21C2.44405 21 2 20.5551 2 20.0066V3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082ZM8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7Z">
                                </path>
                            </svg>
                            <a href="{{ asset('storage/' . auth()->user()->document->document_path) }}" target="_blank">
                                <span class="uppercase font-semibold ">DOCUMENTS</span>
                            </a>
                            <svg wire:loading wire:target="document" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24" class="w-5 h-5 fill-green-800 animate-spin">
                                <path
                                    d="M12 2C12.5523 2 13 2.44772 13 3V6C13 6.55228 12.5523 7 12 7C11.4477 7 11 6.55228 11 6V3C11 2.44772 11.4477 2 12 2ZM12 17C12.5523 17 13 17.4477 13 18V21C13 21.5523 12.5523 22 12 22C11.4477 22 11 21.5523 11 21V18C11 17.4477 11.4477 17 12 17ZM22 12C22 12.5523 21.5523 13 21 13H18C17.4477 13 17 12.5523 17 12C17 11.4477 17.4477 11 18 11H21C21.5523 11 22 11.4477 22 12ZM7 12C7 12.5523 6.55228 13 6 13H3C2.44772 13 2 12.5523 2 12C2 11.4477 2.44772 11 3 11H6C6.55228 11 7 11.4477 7 12ZM19.0711 19.0711C18.6805 19.4616 18.0474 19.4616 17.6569 19.0711L15.5355 16.9497C15.145 16.5592 15.145 15.9261 15.5355 15.5355C15.9261 15.145 16.5592 15.145 16.9497 15.5355L19.0711 17.6569C19.4616 18.0474 19.4616 18.6805 19.0711 19.0711ZM8.46447 8.46447C8.07394 8.85499 7.44078 8.85499 7.05025 8.46447L4.92893 6.34315C4.53841 5.95262 4.53841 5.31946 4.92893 4.92893C5.31946 4.53841 5.95262 4.53841 6.34315 4.92893L8.46447 7.05025C8.85499 7.44078 8.85499 8.07394 8.46447 8.46447ZM4.92893 19.0711C4.53841 18.6805 4.53841 18.0474 4.92893 17.6569L7.05025 15.5355C7.44078 15.145 8.07394 15.145 8.46447 15.5355C8.85499 15.9261 8.85499 16.5592 8.46447 16.9497L6.34315 19.0711C5.95262 19.4616 5.31946 19.4616 4.92893 19.0711ZM15.5355 8.46447C15.145 8.07394 15.145 7.44078 15.5355 7.05025L17.6569 4.92893C18.0474 4.53841 18.6805 4.53841 19.0711 4.92893C19.4616 5.31946 19.4616 5.95262 19.0711 6.34315L16.9497 8.46447C16.5592 8.85499 15.9261 8.85499 15.5355 8.46447Z">
                                </path>
                            </svg>
                        </div>
                        @if ($document)
                            <x-button class="font-semibold" sm label="Submit" wire:click="submitDocument"
                                right-icon="save" dark rounded />
                        @else
                            <label
                                class="flex justify-center h-full px-4 py-1.5  transition bg-green-700 hover:bg-green-600 rounded-full appearance-none cursor-pointer hover:border-green-600 focus:outline-none">
                                <span class="flex items-center text-sm space-x-1 text-white">
                                    <span>Upload</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="h-4 w-4 fill-white">
                                        <path
                                            d="M12 12.5858L16.2426 16.8284L14.8284 18.2426L13 16.415V22H11V16.413L9.17157 18.2426L7.75736 16.8284L12 12.5858ZM12 2C15.5934 2 18.5544 4.70761 18.9541 8.19395C21.2858 8.83154 23 10.9656 23 13.5C23 16.3688 20.8036 18.7246 18.0006 18.9776L18.0009 16.9644C19.6966 16.7214 21 15.2629 21 13.5C21 11.567 19.433 10 17.5 10C17.2912 10 17.0867 10.0183 16.8887 10.054C16.9616 9.7142 17 9.36158 17 9C17 6.23858 14.7614 4 12 4C9.23858 4 7 6.23858 7 9C7 9.36158 7.03838 9.7142 7.11205 10.0533C6.91331 10.0183 6.70879 10 6.5 10C4.567 10 3 11.567 3 13.5C3 15.2003 4.21241 16.6174 5.81986 16.934L6.00005 16.9646L6.00039 18.9776C3.19696 18.7252 1 16.3692 1 13.5C1 10.9656 2.71424 8.83154 5.04648 8.19411C5.44561 4.70761 8.40661 2 12 2Z">
                                        </path>
                                    </svg>
                                </span>
                                <input type="file" wire:model="document" name="file_upload" class="hidden">
                            </label>
                        @endif
                    </div>

                </div>
                {{-- <div class="flex border rounded-xl border-b-2 border-b-blue-600  pb-3 flex-col space-y-5">
                    <div class="border rounded-xl h-40 shadow relative p-4">
                        <img src="https://media.istockphoto.com/id/1159467141/vector/square09stampsred.jpg?s=612x612&w=0&k=20&c=14XWbsG2Hp9yvhTAWivNkrTjX9q9lbsM33OYkE9RT5k="
                            alt="" class="absolute top-0 h-full w-full left-0 object-cover opacity-50">
                    </div>
                    <div class="flex justify-between items-start px-4">
                        <div class="flex space-x-1 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 fill-gray-600">
                                <path
                                    d="M21 15V18H24V20H21V23H19V20H16V18H19V15H21ZM21.0082 3C21.556 3 22 3.44495 22 3.9934L22.0007 13.3417C21.3749 13.1204 20.7015 13 20 13V5H4L4.001 19L13.2929 9.70715C13.6528 9.34604 14.22 9.31823 14.6123 9.62322L14.7065 9.70772L18.2521 13.2586C15.791 14.0069 14 16.2943 14 19C14 19.7015 14.1204 20.3749 14.3417 21.0007L2.9918 21C2.44405 21 2 20.5551 2 20.0066V3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082ZM8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7Z">
                                </path>
                            </svg>
                            <span class="uppercase font-semibold text-gray-700">SCHOOL ID/ VALID ID</span>
                        </div>
                        <label
                            class="flex justify-center h-full px-4 py-1.5  transition bg-green-700 hover:bg-green-600 rounded-full appearance-none cursor-pointer hover:border-green-600 focus:outline-none">
                            <span class="flex items-center text-sm space-x-1 text-white">
                                <span>Upload</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4 fill-white">
                                    <path
                                        d="M12 12.5858L16.2426 16.8284L14.8284 18.2426L13 16.415V22H11V16.413L9.17157 18.2426L7.75736 16.8284L12 12.5858ZM12 2C15.5934 2 18.5544 4.70761 18.9541 8.19395C21.2858 8.83154 23 10.9656 23 13.5C23 16.3688 20.8036 18.7246 18.0006 18.9776L18.0009 16.9644C19.6966 16.7214 21 15.2629 21 13.5C21 11.567 19.433 10 17.5 10C17.2912 10 17.0867 10.0183 16.8887 10.054C16.9616 9.7142 17 9.36158 17 9C17 6.23858 14.7614 4 12 4C9.23858 4 7 6.23858 7 9C7 9.36158 7.03838 9.7142 7.11205 10.0533C6.91331 10.0183 6.70879 10 6.5 10C4.567 10 3 11.567 3 13.5C3 15.2003 4.21241 16.6174 5.81986 16.934L6.00005 16.9646L6.00039 18.9776C3.19696 18.7252 1 16.3692 1 13.5C1 10.9656 2.71424 8.83154 5.04648 8.19411C5.44561 4.70761 8.40661 2 12 2Z">
                                    </path>
                                </svg>
                            </span>
                            <input type="file" wire:model="image" name="file_upload" class="hidden">
                        </label>
                    </div>
                </div>
                <div class="flex border rounded-xl border-b-2 border-b-blue-600  pb-3 flex-col space-y-5">
                    <div class="border rounded-xl h-40 shadow p-4">
                        <span class="text-gray-500 animate-pulse">No Upload...</span>
                    </div>
                    <div class="flex justify-between items-start px-4">
                        <div class="flex space-x-1 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 fill-gray-600">
                                <path
                                    d="M21 15V18H24V20H21V23H19V20H16V18H19V15H21ZM21.0082 3C21.556 3 22 3.44495 22 3.9934L22.0007 13.3417C21.3749 13.1204 20.7015 13 20 13V5H4L4.001 19L13.2929 9.70715C13.6528 9.34604 14.22 9.31823 14.6123 9.62322L14.7065 9.70772L18.2521 13.2586C15.791 14.0069 14 16.2943 14 19C14 19.7015 14.1204 20.3749 14.3417 21.0007L2.9918 21C2.44405 21 2 20.5551 2 20.0066V3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082ZM8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7Z">
                                </path>
                            </svg>
                            <span class="uppercase font-semibold text-gray-700">DOCUMENTS</span>
                        </div>
                        <label
                            class="flex justify-center h-full px-4 py-1.5  transition bg-green-700 hover:bg-green-600 rounded-full appearance-none cursor-pointer hover:border-green-600 focus:outline-none">
                            <span class="flex items-center text-sm space-x-1 text-white">
                                <span>Upload</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4 fill-white">
                                    <path
                                        d="M12 12.5858L16.2426 16.8284L14.8284 18.2426L13 16.415V22H11V16.413L9.17157 18.2426L7.75736 16.8284L12 12.5858ZM12 2C15.5934 2 18.5544 4.70761 18.9541 8.19395C21.2858 8.83154 23 10.9656 23 13.5C23 16.3688 20.8036 18.7246 18.0006 18.9776L18.0009 16.9644C19.6966 16.7214 21 15.2629 21 13.5C21 11.567 19.433 10 17.5 10C17.2912 10 17.0867 10.0183 16.8887 10.054C16.9616 9.7142 17 9.36158 17 9C17 6.23858 14.7614 4 12 4C9.23858 4 7 6.23858 7 9C7 9.36158 7.03838 9.7142 7.11205 10.0533C6.91331 10.0183 6.70879 10 6.5 10C4.567 10 3 11.567 3 13.5C3 15.2003 4.21241 16.6174 5.81986 16.934L6.00005 16.9646L6.00039 18.9776C3.19696 18.7252 1 16.3692 1 13.5C1 10.9656 2.71424 8.83154 5.04648 8.19411C5.44561 4.70761 8.40661 2 12 2Z">
                                    </path>
                                </svg>
                            </span>
                            <input type="file" wire:model="image" name="file_upload" class="hidden">
                        </label>
                    </div>
                </div> --}}
            </div>
        </div>

    </div>
</div>
