<div>
    {{-- Project form goes here --}}
    <!--
  This example requires Tailwind CSS v2.0+

  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
    <form action="#" class="relative">
        <div
            class="overflow-hidden border border-gray-300 rounded-lg shadow-sm focus-within:border-indigo-500 focus-within:ring-1 focus-within:ring-indigo-500">
            <label for="title" class="sr-only">Title</label>
            <input type="text" name="title" id="title"
                class="block w-full border-0 pt-2.5 text-lg font-medium placeholder-gray-500 focus:ring-0"
                placeholder="Title">
            <label for="description" class="sr-only">Description</label>
            <textarea rows="2" name="description" id="description"
                class="block w-full py-0 placeholder-gray-500 border-0 resize-none focus:ring-0 sm:text-sm"
                placeholder="Write a description..."></textarea>

            <!-- Spacer element to match the height of the toolbar -->
            <div aria-hidden="true">
                <div class="py-2">
                    <div class="h-9"></div>
                </div>
                <div class="h-px"></div>
                <div class="py-2">
                    <div class="py-px">
                        <div class="h-9"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 inset-x-px">
            <!-- Actions: These are just examples to demonstrate the concept, replace/wire these up however makes sense for your project. -->
            <div class="flex justify-end px-2 py-2 space-x-2 flex-nowrap sm:px-3">
                <div class="flex-shrink-0">
                    <label id="listbox-label" class="sr-only"> Assign </label>
                    <div class="relative" x-data="{ open: false, selectedIndex: 0, activeIndex: 0 }">
                        <button x-on:click="open = ! open" type="button"
                            class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 rounded-full whitespace-nowrap bg-gray-50 hover:bg-gray-100 sm:px-3"
                            aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                            <!--
                Placeholder icon, show/hide based on listbox state.

                Heroicon name: solid/user-circle
              -->
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-300 sm:-ml-1" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                    clip-rule="evenodd" />
                            </svg>

                            <!-- Selected user avatar, show/hide based on listbox state. -->
                            <img src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="" class="flex-shrink-0 w-5 h-5 rounded-full">

                            <!-- Selected: "text-gray-900" -->
                            <span class="hidden truncate sm:ml-2 sm:block"> Assign </span>
                        </button>

                        <!--
              Select popover, show/hide based on select state.

              Entering: ""
                From: ""
                To: ""
              Leaving: "transition ease-in duration-100"
                From: "opacity-100"
                To: "opacity-0"
            -->
                        <ul x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="absolute right-0 z-10 py-3 mt-1 overflow-auto text-base bg-white rounded-lg shadow w-52 max-h-56 ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                            tabindex="-1" role="listbox" aria-labelledby="listbox-label"
                            aria-activedescendant="listbox-option-0" x-show="open" @click.outside="open = false">
                            <!--
                Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

                Highlighted: "bg-gray-100", Not Highlighted: "bg-white"
              -->
                            <li x-state:on="Highlighted" x-state:off="Not Highlighted"
                                class="relative px-3 py-2 bg-white cursor-default select-none"
                                x-description="Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation."
                                id="listbox-option-0" role="option" @click="choose(0)" @mouseenter="activeIndex = 0"
                                @mouseleave="activeIndex = null"
                                :class="{ 'bg-gray-100': activeIndex === 0, 'bg-white': !(activeIndex === 0) }">
                                <div class="flex items-center">
                                    <!-- Heroicon name: solid/user-circle -->
                                    <svg class="flex-shrink-0 w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="block ml-3 font-medium truncate"> Unassigned </span>
                                </div>
                            </li>

                            <!--
                Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

                Highlighted: "bg-gray-100", Not Highlighted: "bg-white"
              -->
                            <li class="relative px-3 py-2 bg-white cursor-default select-none" id="listbox-option-1"
                                role="option">
                                <div class="flex items-center">
                                    <img src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="" class="flex-shrink-0 w-5 h-5 rounded-full">
                                    <span class="block ml-3 font-medium truncate"> Wade Cooper </span>
                                </div>
                            </li>

                            <!-- More items... -->
                        </ul>
                    </div>
                </div>

                <div class="flex-shrink-0">
                    <label id="listbox-label" class="sr-only"> Add a label </label>
                    <div class="relative" x-data="{ open: false }">
                        <button type="button" x-on:click="open = ! open"
                            class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 rounded-full whitespace-nowrap bg-gray-50 hover:bg-gray-100 sm:px-3"
                            aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                            <!--
                Heroicon name: solid/tag

                Selected: "text-gray-300", Default: "text-gray-500"
              -->
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-300 sm:-ml-1" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z"
                                    clip-rule="evenodd" />
                            </svg>
                            <!-- Selected: "text-gray-900" -->
                            <span class="hidden truncate sm:ml-2 sm:block"> Label </span>
                        </button>

                        <!--
              Select popover, show/hide based on select state.

              Entering: ""
                From: ""
                To: ""
              Leaving: "transition ease-in duration-100"
                From: "opacity-100"
                To: "opacity-0"
            -->
                        <ul x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="absolute right-0 z-10 py-3 mt-1 overflow-auto text-base bg-white rounded-lg shadow w-52 max-h-56 ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                            tabindex="-1" role="listbox" aria-labelledby="listbox-label"
                            aria-activedescendant="listbox-option-0" x-show="open" @click.outside="open = false">
                            <!--
                Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

                Highlighted: "bg-gray-100", Not Highlighted: "bg-white"
              -->
                            <li class="relative px-3 py-2 bg-white cursor-default select-none" id="listbox-option-0"
                                role="option">
                                <div class="flex items-center">
                                    <span class="block font-medium truncate"> Unlabelled </span>
                                </div>
                            </li>

                            <!--
                Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

                Highlighted: "bg-gray-100", Not Highlighted: "bg-white"
              -->
                            <li class="relative px-3 py-2 bg-white cursor-default select-none" id="listbox-option-1"
                                role="option">
                                <div class="flex items-center">
                                    <span class="block font-medium truncate"> Engineering </span>
                                </div>
                            </li>

                            <!-- More items... -->
                        </ul>
                    </div>
                </div>

                <div class="flex-shrink-0">
                    <label id="listbox-label" class="sr-only"> Add a due date </label>
                    <div class="relative" x-data="{ open: false }">
                        <button type="button" x-on:click="open = ! open"
                            class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 rounded-full whitespace-nowrap bg-gray-50 hover:bg-gray-100 sm:px-3"
                            aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                            <!--
                Heroicon name: solid/calendar

                Selected: "text-gray-300", Default: "text-gray-500"
              -->
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-300 sm:-ml-1" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <!-- Selected: "text-gray-900" -->
                            <span class="hidden truncate sm:ml-2 sm:block"> Due date </span>
                        </button>

                        <!--
              Select popover, show/hide based on select state.

              Entering: ""
                From: ""
                To: ""
              Leaving: "transition ease-in duration-100"
                From: "opacity-100"
                To: "opacity-0"
            -->
                        <ul x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="absolute right-0 z-10 py-3 mt-1 overflow-auto text-base bg-white rounded-lg shadow w-52 max-h-56 ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                            tabindex="-1" role="listbox" aria-labelledby="listbox-label"
                            aria-activedescendant="listbox-option-0" x-show="open" @click.outside="open = false">
                            <!--
                Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

                Highlighted: "bg-gray-100", Not Highlighted: "bg-white"
              -->
                            <li class="relative px-3 py-2 bg-white cursor-default select-none" id="listbox-option-0"
                                role="option">
                                <div class="flex items-center">
                                    <span class="block font-medium truncate"> No due date </span>
                                </div>
                            </li>

                            <!--
                Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

                Highlighted: "bg-gray-100", Not Highlighted: "bg-white"
              -->
                            <li class="relative px-3 py-2 bg-white cursor-default select-none" id="listbox-option-1"
                                role="option">
                                <div class="flex items-center">
                                    <span class="block font-medium truncate"> Today </span>
                                </div>
                            </li>

                            <!-- More items... -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between px-2 py-2 space-x-3 border-t border-gray-200 sm:px-3">
                <div class="flex">
                    <button type="button"
                        class="inline-flex items-center px-3 py-2 -my-2 -ml-2 text-left text-gray-400 rounded-full group">
                        <!-- Heroicon name: solid/paper-clip -->
                        <svg class="w-5 h-5 mr-2 -ml-1 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm italic text-gray-500 group-hover:text-gray-600">Attach a file</span>
                    </button>
                </div>
                <div class="flex-shrink-0">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Create</button>
                </div>
            </div>
        </div>
    </form>

</div>
