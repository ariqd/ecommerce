<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Kategori
            </h2>
            <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" href="{{ route('categories.create') }}">
                Tambah Kategori
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="text-left px-4 py-2">Nama Kategori</th>
                            <th class="text-left px-4 py-2">Slug</th>
                            <th class="text-left px-4 py-2">Created / Updated</th>
                            <th class="text-left px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            @php
                                if ($loop->iteration % 2 == 0) {
                                    $bg = 'bg-gray-100';
                                } else {
                                    $bg = '';
                                }
                            @endphp
                            <tr class="{{ $bg }}">
                                <td class="border border-gray-200 px-4 py-2">{{ $category->name }}</td>
                                <td class="border border-gray-200 px-4 py-2">{{ $category->slug }}</td>
                                <td class="border border-gray-200 px-4 py-2">{{ $category->created_at }} / {{ $category->updated_at }}</td>
                                <td class="border border-gray-200 px-4 py-2">
                                    <a class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" href="{{ route('categories.create') }}">
                                        Edit
                                    </a>
                                    <button onclick="document.getElementById('formDelete').submit()" class="btnDelete ml-2 inline-flex items-center px-2 py-1 bg-gray-300 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-200 active:bg-gray-400 focus:outline-none focus:border-gray-400 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                        Hapus
                                    </button>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="post" id="formDelete"
                                            class="hidden">
                                            {!! csrf_field() !!}
                                            {!! method_field('delete') !!}
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">
                                    <div class="text-center">
                                        No data
                                    </div>
                                </td>
                            </tr>       
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>