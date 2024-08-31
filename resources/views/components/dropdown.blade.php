@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'tw-py-1 tw-bg-white tw-dark:tw-bg-gray-700'])

@php
$alignmentClasses = match ($align) {
    'left' => 'tw-ltr:tw-origin-top-left tw-rtl:tw-origin-top-right tw-start-0',
    'top' => 'tw-origin-top',
    default => 'tw-ltr:tw-origin-top-right tw-rtl:tw-origin-top-left tw-end-0',
};

$width = match ($width) {
    '48' => '48',
    default => $width,
};
@endphp

<div class="tw-relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open"
            x-transition:enter="tw-transition tw-ease-out tw-duration-200"
            x-transition:enter-start="tw-opacity-0 tw-scale-95"
            x-transition:enter-end="tw-opacity-100 tw-scale-100"
            x-transition:leave="tw-transition tw-ease-in tw-duration-75"
            x-transition:leave-start="tw-opacity-100 tw-scale-100"
            x-transition:leave-end="tw-opacity-0 tw-scale-95"
            class="tw-absolute tw-z-50 tw-mt-2 tw-{{ $width }} tw-rounded-md tw-shadow-lg {{ $alignmentClasses }}"
            style="display: none;"
            @click="open = false">
        <div class="tw-rounded-md tw-ring-1 tw-ring-black tw-ring-opacity-5 {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>
