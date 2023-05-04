<x-blank-page title="Login">
    <div class="flex items-center justify-center min-h-screen">

        <div class="w-full md:w-4/12 lg:w-3/12 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-7 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">Login</h5>

            <form action="{{ route('authenticate') }}" method="post">
                @csrf

                <div class="flex flex-col w-full">
                    <div class="mb-2">
                        <x-label name="user" label="User" />
                        <x-input type="text" placeholder="Username" value="{{ old('user') }}" name="user" required />
                        <x-input-error name="user" />

                    </div>

                    <div class="mb-2">
                        <x-label name="password" label="Password" />
                        <x-input type="password" placeholder="Password" name="password" required />
                        <x-input-error name="password" />
                    </div>
                </div>

                <div class="mt-7">
                    <button type="submi" type="button" class="w-full focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Login</button>
                </div>
            </form>
        </div>

    </div>

</x-blank-page>
