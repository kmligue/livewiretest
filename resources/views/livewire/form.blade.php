<div>
    <div class="container mx-auto py-20">

        @if ($marriage_date_error != '')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ $marriage_date_error }}</span>
            </div>
        @endif

        @if ($page == 1)
            <div class="grid grid-cols-2 gap-4">
                <div class="mb-3">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" wire:model="first_name" id="first_name" name="first_name" class="mt-1 p-2 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                </div>
                <div class="mb-3">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" wire:model="last_name" id="last_name" name="last_name" class="mt-1 p-2 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                </div>
                <div class="mb-3 col-span-2">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" wire:model="address" id="address" name="address" class="mt-1 p-2 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                </div>
                <div class="mb-3">
                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                    <input type="text" wire:model="city" id="city" name="city" class="mt-1 p-2 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                </div>
                <div class="mb-3">
                    <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                    <input type="text" wire:model="country" id="country" name="country" class="mt-1 p-2 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                </div>
            </div>

            <label for="dob" class="block text-sm font-medium text-gray-700">Date of Birth</label>
            <div class="grid grid-cols-3 gap-4">
                <div class="mb-3">
                    <label for="dob_month" class="block text-sm font-medium text-gray-700">Month</label>
                    <select class="mt-1 p-2 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md" wire:model="dob_month" id="dob_month" name="dob_month" wire:change="validateMarriageDate">
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="dob_day" class="block text-sm font-medium text-gray-700">Day</label>
                    <select class="mt-1 p-2 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md" wire:model="dob_day" id="dob_day" name="dob_day" wire:change="validateMarriageDate">
                        @for ($i = 1; $i <= 31; $i++)
                            <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="mb-3">
                    <label for="dob_year" class="block text-sm font-medium text-gray-700">Year</label>
                    <select class="mt-1 p-2 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md" wire:model="dob_year" id="dob_year" name="dob_year" wire:change="validateMarriageDate">
                        @for ($i = date('Y'); $i >= 1900; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>

            <div class="mt-5 text-right">
                <button type="button" wire:click="next" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                    Next
                </button>
            </div>
        @elseif ($page == 2)
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">Are you married?</label>
                        <label>
                            <input type="radio" wire:model.live="is_married" value="yes" class="mr-2" wire:click="validateMarriageDate"> Yes
                        </label>
                        <br>
                        <label>
                            <input type="radio" wire:model.live="is_married" value="no" class="mr-2" wire:click="resetMarriageData"> No
                        </label>
                    </div>

                    @if ($is_married == 'yes')
                        <label for="dob" class="block text-sm font-medium text-gray-700">Date of Marriage</label>
                        <div class="grid grid-cols-3 gap-4">
                            <div class="mb-3">
                                <label for="marriage_date_month" class="block text-sm font-medium text-gray-700">Month</label>
                                <select class="mt-1 p-2 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md" wire:model="marriage_date_month" id="marriage_date_month" name="marriage_date_month" wire:change="validateMarriageDate">
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="marriage_date_day" class="block text-sm font-medium text-gray-700">Day</label>
                                <select class="mt-1 p-2 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md" wire:model="marriage_date_day" id="marriage_date_day" name="marriage_date_day" wire:change="validateMarriageDate">
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="marriage_date_year" class="block text-sm font-medium text-gray-700">Year</label>
                                <select class="mt-1 p-2 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md" wire:model="marriage_date_year" wire:change="validateMarriageDate">
                                    @for ($i = date('Y'); $i >= 1900; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    @endif
                </div>

                <div>
                    @if ($is_married == 'yes')
                        <div class="mb-3">
                            <label for="marriage_country" class="block text-sm font-medium text-gray-700">Country of Marriage</label>
                            <input type="text" wire:model.live="marriage_country" class="mt-1 p-2 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                        </div>

                        @if ($marriage_country == '')
                            <div class="mb-3">
                                <label for="widowed" class="block text-sm font-medium text-gray-700">Are you widowed?</label>
                                <label>
                                    <input type="radio" wire:model="widowed" value="yes" class="mr-2"> Yes
                                </label>
                                <br>
                                <label>
                                    <input type="radio" wire:model="widowed" value="no" class="mr-2"> No
                                </label>
                            </div>

                            <div class="mb-3">
                                <label for="married_in_past" class="block text-sm font-medium text-gray-700">Have you ever been married in the past?</label>
                                <label>
                                    <input type="radio" wire:model="married_in_past" value="yes" class="mr-2"> Yes
                                </label>
                                <br>
                                <label>
                                    <input type="radio" wire:model="married_in_past" value="no" class="mr-2"> No
                                </label>
                            </div>
                        @endif
                    @endif
                </div>
            </div>

            <div class="mt-5 text-right">
                <button type="button" wire:click="previous" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                    Previous
                </button>
                <button type="button" wire:click="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150 disabled:opacity-75" {{ $disable_submit ? 'disabled' : '' }}>
                    Submit
                </button>
            </div>
        @else
            <div>
                <p class="text-2xl font-bold">Thank you for submitting the form!</p>

                <div class="mt-10">
                    <table class="table-auto w-full">
                        <tbody>
                            <tr>
                                <td class="border p-2">
                                    <strong>First Name:</strong>
                                    {{ $first_name }}
                                </td>
                                <td class="border p-2">
                                    <strong>Last Name:</strong>
                                    {{ $last_name }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border p-2">
                                    <strong>Address:</strong>
                                    {{ $address }}
                                </td>
                                <td class="border p-2">
                                    <strong>City:</strong>
                                    {{ $city }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border p-2">
                                    <strong>Country:</strong>
                                    {{ $country }}
                                </td>
                                <td class="border p-2">
                                    <strong>Date of Birth:</strong>
                                    {{ date('F d, Y', strtotime($dob_year . '-' . $dob_month . '-' . $dob_day)) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border p-2">
                                    <strong>Are you married?:</strong>
                                    {{ $is_married }}
                                </td>
                                <td class="border p-2">
                                    <strong>Date of Marriage:</strong>

                                    @if ($is_married == 'yes')
                                        {{ date('F d, Y', strtotime($marriage_date_year . '-' . $marriage_date_month . '-' . $marriage_date_day)) }}
                                    @endif
                                </td>
                            </tr>
                            @if ($is_married == 'yes')
                                <tr>
                                    <td class="border p-2">
                                        <strong>Country of Marriage:</strong>
                                        {{ $marriage_country }}
                                    </td>
                                    <td class="border p-2">
                                        @if ($marriage_country == '')
                                            <strong>Are you widowed?:</strong>
                                            {{ $widowed }}
                                        @endif
                                    </td>
                                </tr>
                                @if ($marriage_country == '')
                                    <tr>
                                        <td class="border p-2">
                                            <strong>Have you ever been married in the past?:</strong>
                                            {{ $married_in_past }}
                                        </td>
                                        <td class="border p-2">

                                        </td>
                                    </tr>
                                @endif
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>
