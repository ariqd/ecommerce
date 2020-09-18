<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{  @$edit ? 'Edit Kategori': 'Buat Kategori Baru' }}  
            </h2>
            <a href="{{ route('categories.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-200 active:bg-gray-400 focus:outline-none focus:border-gray-400 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <form method="POST" action="{{ @$edit ? route('categories.update',$category->id) : route('categories.store') }}">
                    @csrf
                    {{  @$edit ? method_field('PUT') : '' }}

                    <div>
                        <x-jet-label value="Nama Kategori" />
                        <x-jet-input class="block mt-1 w-full" type="text" name="name" :value="@$edit ? $category->name : old('name')" required autofocus />
                    </div>

                    {{-- <div class="mt-4">
                        <x-jet-label value="Parent" />

                        <div class="inline-block relative w-full mt-1">
                            <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                <option class="py-4">Really long option that will likely overlap the chevron </option>
                                <option class="py-4">Option 2</option>
                                <option class="py-4">Option 3</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                            </div>
                        </div>
                        <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div> --}}

                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="ml-4">
                            {{  @$edit ? 'Edit Kategori': 'Buat Kategori Baru' }}  
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>