@extends('admin.components.main')
@section('content')
    <div class="text-[32px] w-full font-light text-white mx-0 md:lg:mx-6 ">
        <p class="mt-5 md:lg:mt-0 md:lg:mb-[52px]">
            Dashboard > User </p>

        <div class="mt-36 flex items-center w-full justify-between">

            <div
                class="flex text-[#696969] items-center  w-[300px] h-[50px] rounded-xl bg-transparent   border border-custom-purple pl-7 pr-2 relative">
                <input class=" font-semibold focus:border-transparent focus:ring-0 bg-transparent border-none" type="search"
                    placeholder="Search">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </button>
            </div>

            <button
                class="bg-custom-purple text-base text-custom-black font-semibold px-10 py-[14px] rounded-xl hover:bg-[#5d3bae] transition duration-200 flex items-center gap-3">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 1.5V16.5M16.5 9H1.5" stroke="black" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                Add User
            </button>
        </div>



        <div class="mt-[21px] relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-base text-left rtl:text-right bg-custom-black">
                <thead class="text-base text-gray-700  bg-custom-black dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-1" type="checkbox"
                                    class="w-4 h-4 text-blue-600  border-[#696969]  focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 bg-custom-black">
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class=" py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Account
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Active Bot
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Expired Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            IP Address
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Set
                        </th>
                    </tr>
                </thead>
                <tbody class="font-semibold text-white ">
                    @foreach ($users as $user)
                        <tr class=" bg-custom-black ">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox"
                                        class="w-4 h-4 text-blue-600  border-[#696969]  focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 bg-custom-black">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row" class=" py-4 ">
                                {{ $user->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->time_total_bot_used }}
                            </td>
                            <td class="px-6 py-4">
                                {{ date('Y-m-d', strtotime($user->account_expired)) }}
                            </td>
                            <td class="px-6 py-4">
                                192.168.10.1
                            </td>
                            <td
                                class="px-6 py-4
                            @if ($user->status == 'Berjalan') text-green-500
                            @elseif($user->status == 'Expired')
                            text-red-500 @endif
                            ">
                                {{ $user->status }}
                            </td>
                            <td class="px-6 py-4">
                                <button class="rounded-full border w-8 h-8 items-center">...</button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
@endsection
