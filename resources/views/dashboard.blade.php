<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome, ') }} {{ Auth::user()->name }}!
        </h2>
    </x-slot>

    <div>
        <img class="object-cover" src="https://www.gse.harvard.edu/sites/default/files//content-images/1500x750-harvard-yard.jpg">
    </div>
</x-app-layout>
