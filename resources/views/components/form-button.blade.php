<button {{ $attributes->merge([
    'class' => 'relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded leading-5 hover:text-gray-400 hover:bg-black focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-white active:text-red-700 transition ease-in-out duration-150 dark:bg-white dark:border-gray-600 dark:active:bg-gray-700 dark:focus:border-blue-800',
    'type' => 'submit'
]) }}>
    {{$slot}}
</button>
