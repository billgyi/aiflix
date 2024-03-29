@extends('admin.components.main')
@section('content')
    <div class="text-[32px] w-full font-light text-white mx-0 md:lg:mx-6 ">
        <p class="mt-5 md:lg:mt-0 md:lg:mb-[52px]">
            Dashboard > User </p>

<<<<<<< HEAD
        <div class="mt-10 md:lg:mt-36 block md:lg:flex items-center w-full justify-between">
=======
        <div class="mt-36 flex items-center w-full justify-between">
>>>>>>> bf5f0379350532a86628efca4caaeb6356e17337

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

<<<<<<< HEAD
            <button id="addUser-open"
                class="mt-5 md:lg:mt-0 bg-custom-purple text-base text-custom-black font-semibold px-10 py-[14px] rounded-xl hover:bg-[#5d3bae] transition duration-200 flex items-center gap-3">
=======
            <button
                class="bg-custom-purple text-base text-custom-black font-semibold px-10 py-[14px] rounded-xl hover:bg-[#5d3bae] transition duration-200 flex items-center gap-3">
>>>>>>> bf5f0379350532a86628efca4caaeb6356e17337
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 1.5V16.5M16.5 9H1.5" stroke="black" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                Add User
            </button>
        </div>

<<<<<<< HEAD
        <div id="addUser" class="   hidden">
            <div class="  fixed right-12 my-5 w-3/4   md:lg:w-1/5 text-black rounded-lg bg-[#A6A5A5] z-50 px-7 py-[26px]">
                <h2 class="font-semibold text-[32px]">Add New Account</h2>

                <div class="block font-medium text-xl">

                    <div class="block">
                        <p>Expired Date</p>
                        <input type="date"
                            class="text-[#424242] w-full bg-transparent rounded-lg border-custom-purple mt-1">
                    </div>

                    <div class="block mt-5">
                        <p>Username</p>
                        <input type="text"
                            class=" text-[#424242] w-full bg-transparent rounded-lg border-custom-purple mt-1">
                    </div>

                    <div class="block mt-5">
                        <p>Password</p>
                        <input type="password"
                            class="text-[#424242] w-full bg-transparent rounded-lg border-custom-purple mt-1">
                    </div>

                    <div class="block mt-5">
                        <p>Username Instagram</p>
                        <input type="text"
                            class="text-[#424242] w-full bg-transparent rounded-lg border-custom-purple mt-1">
                    </div>

                    <button id="addUser-open"
                        class="mt-5 bg-custom-purple text-base text-custom-black font-semibold px-10 py-[14px] rounded-xl hover:bg-[#5d3bae] transition duration-200 flex items-center gap-3">

                        Add User
                    </button>
                </div>
            </div>
        </div>



        <div class="z-10 mt-[21px] relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class=" w-full text-base text-left rtl:text-right bg-custom-black">
=======


        <div class="mt-[21px] relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-base text-left rtl:text-right bg-custom-black">
>>>>>>> bf5f0379350532a86628efca4caaeb6356e17337
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
<<<<<<< HEAD
                                1 hours 56 minutes
=======
                                {{ $user->time_total_bot_used }}
>>>>>>> bf5f0379350532a86628efca4caaeb6356e17337
                            </td>
                            <td class="px-6 py-4">
                                {{ date('Y-m-d', strtotime($user->account_expired)) }}
                            </td>
                            <td class="px-6 py-4">
<<<<<<< HEAD
                                192.032.201.1
=======
                                192.168.10.1
>>>>>>> bf5f0379350532a86628efca4caaeb6356e17337
                            </td>
                            <td
                                class="px-6 py-4
                            @if ($user->status == 'Berjalan') text-green-500
<<<<<<< HEAD
                            @elseif ($user->status == 'Tidak Berjalan') text-yellow-500
=======
>>>>>>> bf5f0379350532a86628efca4caaeb6356e17337
                            @elseif($user->status == 'Expired')
                            text-red-500 @endif
                            ">
                                {{ $user->status }}
                            </td>
                            <td class="px-6 py-4">
<<<<<<< HEAD
                                <button id="setUser-open" class="rounded-full border w-8 h-8 items-center">...</button>
                            </td>
                        </tr>

                        <div id="setUser" class="hidden  ">
                            <div
                                class="  fixed right-12 my-5 w-2/3  md:lg:w-[37%] text-black rounded-lg bg-[#A6A5A5] z-50 px-7 py-[26px]">
                                <h2 class="font-semibold text-[32px]">Detail Account</h2>

                                <div class="overflow- md:lg:grid md:lg:grid-cols-2 gap-10 justify-between">
                                    <div class="block">
                                        <div class="block font-medium text-xl">

                                            <div class="block">
                                                <p>Account Name</p>
                                                <input type="text"
                                                    class="text-[#424242] w-full bg-transparent rounded-lg border-custom-purple mt-1">
                                            </div>

                                            <div class="block mt-5">
                                                <p>Username</p>
                                                <input type="text"
                                                    class=" text-[#424242] w-full bg-transparent rounded-lg border-custom-purple mt-1">
                                            </div>

                                            <div class="block mt-5">
                                                <p>Password</p>
                                                <input type="password"
                                                    class="text-[#424242] w-full bg-transparent rounded-lg border-custom-purple mt-1">
                                            </div>

                                            <div class="block mt-5">
                                                <p> Instagram Username</p>
                                                <input type="text"
                                                    class="text-[#424242] w-full bg-transparent rounded-lg border-custom-purple mt-1">
                                            </div>


                                        </div>
                                    </div>
                                    <div class="block font-medium text-xl">

                                        <div class="block">
                                            <p>Total Bot Berjalan</p>
                                            <input type="date"
                                                class="text-[#424242] w-full bg-transparent rounded-lg border-custom-purple mt-1">
                                        </div>

                                        <div class="block mt-5">
                                            <p>Expired Date</p>
                                            <input type="text"
                                                class=" text-[#424242] w-full bg-transparent rounded-lg border-custom-purple mt-1">
                                        </div>

                                        <div class="block mt-5">
                                            <p>Action</p>
                                            <input type="text"
                                                class="h-[133px] text-[#424242] w-full bg-transparent rounded-lg border-custom-purple mt-1" />
                                        </div>

                                    </div>
                                </div>
                                <div class=" flex justify-end space-x-5">

                                    <button id=""
                                        class=" mt-5 bg-custom-purple text-base text-custom-black font-semibold px-4 py-[14px] rounded-xl hover:bg-[#5d3bae] transition duration-200 flex items-center gap-3">
                                        <svg width="19" height="22" viewBox="0 0 19 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.99 7.75052L11.644 16.7505M6.856 16.7505L6.51 7.75052M16.478 4.54052C16.82 4.59252 17.16 4.64752 17.5 4.70652M16.478 4.54052L15.41 18.4235C15.3664 18.9887 15.1111 19.5167 14.695 19.9018C14.279 20.2868 13.7329 20.5007 13.166 20.5005H5.334C4.7671 20.5007 4.22102 20.2868 3.80498 19.9018C3.38894 19.5167 3.13359 18.9887 3.09 18.4235L2.022 4.54052M16.478 4.54052C15.3239 4.36604 14.1638 4.23362 13 4.14352M2.022 4.54052C1.68 4.59152 1.34 4.64652 1 4.70552M2.022 4.54052C3.17613 4.36604 4.33623 4.23362 5.5 4.14352M13 4.14352V3.22752C13 2.04752 12.09 1.06352 10.91 1.02652C9.80362 0.99116 8.69638 0.99116 7.59 1.02652C6.41 1.06352 5.5 2.04852 5.5 3.22752V4.14352M13 4.14352C10.5037 3.9506 7.99628 3.9506 5.5 4.14352"
                                                stroke="#222222" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                    <button id=""
                                        class=" mt-5 bg-custom-purple text-base text-custom-black font-semibold px-4 py-[14px] rounded-xl hover:bg-[#5d3bae] transition duration-200 flex items-center gap-3">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1 3.25C1 2.65326 1.23705 2.08097 1.65901 1.65901C2.08097 1.23705 2.65326 1 3.25 1H12.25C12.8467 1 13.419 1.23705 13.841 1.65901C14.2629 2.08097 14.5 2.65326 14.5 3.25V12.25C14.5 12.8467 14.2629 13.419 13.841 13.841C13.419 14.2629 12.8467 14.5 12.25 14.5H3.25C2.65326 14.5 2.08097 14.2629 1.65901 13.841C1.23705 13.419 1 12.8467 1 12.25V3.25Z"
                                                fill="black" stroke="black" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                    <button id=""
                                        class=" mt-5 bg-custom-purple text-base text-custom-black font-semibold px-6 py-[14px] rounded-xl hover:bg-[#5d3bae] transition duration-200 flex items-center gap-3">
                                        Turn On
                                    </button>

                                    <button id=""
                                        class=" mt-5 bg-custom-purple text-base text-custom-black font-semibold px-16 py-[14px] rounded-xl hover:bg-[#5d3bae] transition duration-200 flex items-center gap-3">
                                        Save
                                    </button>


                                </div>
                            </div>
=======
                                <button class="rounded-full border w-8 h-8 items-center">...</button>
                            </td>
                        </tr>
>>>>>>> bf5f0379350532a86628efca4caaeb6356e17337
                    @endforeach

                </tbody>
            </table>
<<<<<<< HEAD


=======
>>>>>>> bf5f0379350532a86628efca4caaeb6356e17337
        </div>

    </div>
@endsection
