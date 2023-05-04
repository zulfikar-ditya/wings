<x-main title="Report">
    <div class="container mx-auto mt-20">

        <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Report</h5>

            <form action="{{ route('report.detail') }}" method="post">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                    {{-- <div class="mb-2">
                        <x-label name="user_id" label="User" />
                        <input id="user_id" class="">
                    </div>

                    <div class="mb-2">
                        <x-label name="product_id" label="Product" />
                        <select id="countries" class="form-select">

                        </select>
                    </div> --}}

                    <div class="mb-2">
                        <x-label name="from_date" label="From Date" />
                        <x-input type="date" name="from_date" />
                    </div>

                    <div class="mb-2">
                        <x-label name="to_date" label="To Date" />
                        <x-input type="date" name="to_date" />
                    </div>

                </div>

                <div class="mt-10">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">View Report</button>
                </div>
            </form>
        </div>

    </div>

    {{-- <x-slot name="script">
        <script>
            document.addEventListener("DOMContentLoaded", function() {

                $(document).ready(function() {
                    new TomSelect('#user_id', {
                        valueField: 'id',
                        labelField: 'user',
                        searchField: 'user',

                        // fetch remote data
                        load: function(query, callback) {

                            var url = '{{ route('select.user') }}?search=' + encodeURIComponent(query);
                            fetch(url)
                                .then(response => response.json())
                                .then(json => {
                                    callback(json.data);
                                }).catch(() => {
                                    callback();
                                });

                        },
                    });
                });
            });
        </script>
    </x-slot> --}}
</x-main>
