@extends('admin.components.main')
@section('content')
    <div class="text-[32px] w-full  font-light text-white mx-0 md:lg:mx-6 ">
        <p class="mt-5 md:lg:mt-0 md:lg:mb-[52px]">
            Dashboard </p>

        <div
            class=" grid-cols-2 w-full  grid mt-10 md:lg:mt-0 md:lg:grid md:lg:grid-cols-2 h-screen md:lg:gap-x-5 md:lg:gap-y-5">

            <div class=" mx-auto rounded-md w-[100%]   md:lg:h-[500px] bg-custom-black">
                <div class="mt-10 flex  items-center justify-center gap-10">
                    <div class="bg-[#18A900] w-[23px] h-[23px] rounded-full"></div>
                    <div>
                        <p class="text-center ">User Active</p>
                    </div>
                </div>

                <p class="text-center font-bold text-[128px] md:lg:mt-24 mt-5 ">25</p>

            </div>
            <div class=" mx-auto rounded-md w-[100%]  md:lg:h-[500px] bg-custom-black">
                <div class="mt-10 flex  items-center justify-center gap-10">
                    <div class="bg-[#18A900] w-[23px] h-[23px] rounded-full"></div>
                    <div>
                        <p class="text-center ">Dummy Active</p>
                    </div>
                </div>

                <p class="text-center font-bold text-[128px] md:lg:mt-24 mt-5 ">25</p>

            </div>
            <div class=" mx-auto rounded-md w-[100%]  md:lg:h-[500px] bg-custom-black">
                <div class="mt-10 flex  items-center justify-center gap-10">
                    <div class="bg-[#C70202] w-[23px] h-[23px] rounded-full"></div>
                    <div>
                        <p class="text-center ">User Un-Active</p>
                    </div>
                </div>

                <p class="text-center font-bold text-[128px] md:lg:mt-24 mt-5 ">25</p>
            </div>
            <div class=" mx-auto rounded-md w-[100%]  md:lg:h-[500px] bg-custom-black">
                <div class="mt-10 flex  items-center justify-center gap-10">
                    <div class="bg-[#C70202] w-[23px] h-[23px] rounded-full"></div>
                    <div>
                        <p class="text-center ">Dummmy Un-Active</p>
                    </div>
                </div>

                <p class="text-center font-bold text-[128px] md:lg:mt-24 mt-5 ">25</p>
            </div>

        </div>
    </div>
@endsection
