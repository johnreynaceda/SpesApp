<div>
    <div class="">
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <dl class="rounded-lg bg-white border shadow-lg sm:grid sm:grid-cols-3">
                    <div class="flex flex-col border-b border-gray-100 p-6 text-center sm:border-0 sm:border-r">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-green-500">
                            Approved
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-gray-700">{{ $approved }}</dd>
                    </div>
                    <div
                        class="flex flex-col border-t border-b border-gray-100 p-6 text-center sm:border-0 sm:border-l sm:border-r">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-red-500">
                            Disapproved
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-gray-700">{{ $disapproved }}</dd>
                    </div>
                    <div class="flex flex-col border-t border-gray-100 p-6 text-center sm:border-0 sm:border-l">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-yellow-500">
                            Pending
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-gray-700">{{ $pending }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
    <div class="mt-10">
        {{ $this->table }}
    </div>
</div>
