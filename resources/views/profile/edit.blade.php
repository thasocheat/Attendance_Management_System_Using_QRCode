<x-app-layout>
    <div class="animate__animated p-6" :class="[$store.app.animation]">
        <!-- start main content section -->
        <div>
            <ul class="flex space-x-2 rtl:space-x-reverse">
                <li>
                    <a href="javascript:;" class="text-primary hover:underline">Users</a>
                </li>
                <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                    <span>Account Settings</span>
                </li>
            </ul>
            <div class="pt-5">
                <div class="mb-5 flex items-center justify-between">
                    <h5 class="text-lg font-semibold dark:text-white-light">Settings</h5>
                </div>
                <div x-data="{tab: 'home'}">
                    <ul class="mb-5 overflow-y-auto whitespace-nowrap border-b border-[#ebedf2] font-semibold dark:border-[#191e3a] sm:flex">
                        <li class="inline-block">
                            <a href="javascript:;" class="flex gap-2 border-b border-transparent p-4 hover:border-primary hover:text-primary !border-primary text-primary" :class="{'!border-primary text-primary' : tab == 'home'}" @click="tab='home'">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                    <path opacity="0.5" d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z" stroke="currentColor" stroke-width="1.5"></path>
                                    <path d="M12 15L12 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                </svg>
                                Home
                            </a>
                        </li>
                    </ul>
                    <template x-if="tab === 'home'">
                        <div>
                            <form class="mb-5 rounded-md border border-[#ebedf2] bg-white p-4 dark:border-[#191e3a] dark:bg-[#0e1726]">
                                <h6 class="mb-5 text-lg font-bold">General Information</h6>
                                <div class="flex flex-col sm:flex-row">
                                    <div class="mb-5 w-full sm:w-2/12 ltr:sm:mr-4 rtl:sm:ml-4">
                                        <img src="assets/images/profile-34.jpeg" alt="image" class="mx-auto h-20 w-20 rounded-full object-cover md:h-32 md:w-32">
                                    </div>
                                    <div class="grid flex-1 grid-cols-1 gap-5 sm:grid-cols-2">
                                        <div>
                                            <label for="name">Full Name</label>
                                            <input id="name" type="text" placeholder="StarCode Kh" class="form-input">
                                        </div>
                                        <div>
                                            <label for="profession">Profession</label>
                                            <input id="profession" type="text" placeholder="Web Developer" class="form-input">
                                        </div>
                                        <div>
                                            <label for="country">Country</label>
                                            <select id="country" class="form-select text-white-dark">
                                                <option>All Countries</option>
                                                <option selected="">United States</option>
                                                <option>India</option>
                                                <option>Japan</option>
                                                <option>China</option>
                                                <option>Brazil</option>
                                                <option>Norway</option>
                                                <option>Canada</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="address">Address</label>
                                            <input id="address" type="text" placeholder="New York" class="form-input">
                                        </div>
                                        <div>
                                            <label for="location">Location</label>
                                            <input id="location" type="text" placeholder="Location" class="form-input">
                                        </div>
                                        <div>
                                            <label for="phone">Phone</label>
                                            <input id="phone" type="text" placeholder="+1 (530) 555-12121" class="form-input">
                                        </div>
                                        <div>
                                            <label for="email">Email</label>
                                            <input id="email" type="email" placeholder="starcodekh@gmail.com" class="form-input">
                                        </div>
                                        <div>
                                            <label for="web">Website</label>
                                            <input id="web" type="text" placeholder="Enter URL" class="form-input">
                                        </div>
                                        <div>
                                            <label class="inline-flex cursor-pointer">
                                                <input type="checkbox" class="form-checkbox">
                                                <span class="relative text-white-dark checked:bg-none">Make this my default address</span>
                                            </label>
                                        </div>
                                        <div class="mt-3 sm:col-span-2">
                                            <button type="button" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <form class="rounded-md border border-[#ebedf2] bg-white p-4 dark:border-[#191e3a] dark:bg-[#0e1726]">
                                <h6 class="mb-5 text-lg font-bold">Social</h6>
                                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                                    <div class="flex">
                                        <div class="flex items-center justify-center rounded bg-[#eee] px-3 font-semibold ltr:mr-2 rtl:ml-2 dark:bg-[#1b2e4b]">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                                <rect x="2" y="9" width="4" height="12"></rect>
                                                <circle cx="4" cy="4" r="2"></circle>
                                            </svg>
                                        </div>
                                        <input type="text" placeholder="starcodekh_turner" class="form-input">
                                    </div>
                                    <div class="flex">
                                        <div class="flex items-center justify-center rounded bg-[#eee] px-3 font-semibold ltr:mr-2 rtl:ml-2 dark:bg-[#1b2e4b]">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                            </svg>
                                        </div>
                                        <input type="text" placeholder="starcodekh_turner" class="form-input">
                                    </div>
                                    <div class="flex">
                                        <div class="flex items-center justify-center rounded bg-[#eee] px-3 font-semibold ltr:mr-2 rtl:ml-2 dark:bg-[#1b2e4b]">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                            </svg>
                                        </div>
                                        <input type="text" placeholder="starcodekh_turner" class="form-input">
                                    </div>
                                    <div class="flex">
                                        <div class="flex items-center justify-center rounded bg-[#eee] px-3 font-semibold ltr:mr-2 rtl:ml-2 dark:bg-[#1b2e4b]">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                                <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                            </svg>
                                        </div>
                                        <input type="text" placeholder="starcodekh_turner" class="form-input">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </template>
                </div>
            </div>
        </div>
        <!-- end main content section -->

    </div>
</x-app-layout>





{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
