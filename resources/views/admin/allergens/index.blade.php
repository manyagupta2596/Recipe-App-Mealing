@extends('admin.layout')

@section('title', 'Allergens')

@section('admin.content')
<div class="w-full p-4 bg-white border-b border-gray-200 rounded-t-md dark:bg-gray-700">
    <p class="font-bold dark:text-gray-200">
        All Allergens
    </p>
</div>
<div class="p-4">
    <table class="w-full dark:text-gray-200">
        <thead>
            <tr class="hidden lg:table-row border-b">
                <th class="text-left px-4 py-2 w-1/3">
                    Name
                </th>
                <th class="text-left px-4 py-2 w-1/3">
                    Icon
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allergens as $allergen)
                @if ($loop->odd)
                    <tr class="hover:bg-green-700 hover:bg-opacity-10">
                @else
                    <tr class="bg-green-700 bg-opacity-5 hover:bg-opacity-10">
                @endif
                    <td class="block lg:table-cell px-4 py-2">
                        <a href="{{ route('admin.allergens.edit', $allergen) }}" class="hover:text-yellow-600 dark:text-gray-200 dark:hover:text-yellow-600">
                            {{ $allergen->name }}
                        </a>
                    </td>
                    <td class="block lg:table-cell px-4 py-2 space-x-2">
                        <span class="allergen-level-no">
                            <i class="{{ $allergen->icon }}" title="May Contain {{ $allergen->name }}"></i>
                        </span>
                        <span class="allergen-level-may">
                            <i class="{{ $allergen->icon }}" title="May Contain {{ $allergen->name }}"></i>
                        </span>
                        <span class="allergen-level-yes">
                            <i class="{{ $allergen->icon }}" title="May Contain {{ $allergen->name }}"></i>
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection