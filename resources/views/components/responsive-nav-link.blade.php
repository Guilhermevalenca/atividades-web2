@props(['active'])

@php
$classes = ($active ?? false)
            ? 'tw-block tw-w-full tw-ps-3 tw-pe-4 tw-py-2 tw-border-l-4 tw-border-indigo-400 tw-dark:tw-border-indigo-600 tw-text-start tw-text-base tw-font-medium tw-text-indigo-700 tw-dark:tw-text-indigo-300 tw-bg-indigo-50 tw-dark:tw-bg-indigo-900/50 tw-focus:tw-outline-none tw-focus:tw-text-indigo-800 tw-dark:tw-focus:tw-text-indigo-200 tw-focus:tw-bg-indigo-100 tw-dark:tw-focus:tw-bg-indigo-900 tw-focus:tw-border-indigo-700 tw-dark:tw-focus:tw-border-indigo-300 tw-transition tw-duration-150 tw-ease-in-out'
            : 'tw-block tw-w-full tw-ps-3 tw-pe-4 tw-py-2 tw-border-l-4 tw-border-transparent tw-text-start tw-text-base tw-font-medium tw-text-gray-600 tw-dark:tw-text-gray-400 tw-hover:tw-text-gray-800 tw-dark:tw-hover:tw-text-gray-200 tw-hover:tw-bg-gray-50 tw-dark:tw-hover:tw-bg-gray-700 tw-hover:tw-border-gray-300 tw-dark:tw-hover:tw-border-gray-600 tw-focus:tw-outline-none tw-focus:tw-text-gray-800 tw-dark:tw-focus:tw-text-gray-200 tw-focus:tw-bg-gray-50 tw-dark:tw-focus:tw-bg-gray-700 tw-focus:tw-border-gray-300 tw-dark:tw-focus:tw-border-gray-600 tw-transition tw-duration-150 tw-ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
