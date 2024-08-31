@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'tw-border-gray-300 tw-dark:tw-border-gray-700 tw-dark:tw-bg-gray-900 tw-dark:tw-text-gray-300 tw-focus:border-indigo-500 tw-dark:tw-focus:tw-border-indigo-600 tw-focus:tw-ring-indigo-500 tw-dark:tw-focus:tw-ring-indigo-600 tw-rounded-md shadow-sm']) !!}>
