<x-larapattern-layout>

    <x-slot name="title">
        {{ $title ?? null }}
    </x-slot>

    <x-larapattern-datatables :buttons="$buttons" :title="$title" :fields="$fields" :options="$options" />

</x-larapattern-layout>
