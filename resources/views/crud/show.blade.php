@extends('layouts.master')


@section('main')
    <div class="container bg-white h-64 flex flex-row rounded-xl">
        <div class="row bg-red-500 w-fit h-64 rounded-xl">
            <img src="https://picsum.photos/200"
                alt="image profile" class="h-64 w-96 rounded-xl">
        </div>

        <div class="row m-5">
            <div class="flex flex-row">
                <h1>Name :</h2>
                    <p class="px-3 text-blue-500 font-bold">{{ $crud->name }}</p>
            </div>

            <div class="flex flex-row mt-3">
                <h1>Email :</h2>
                    <p class="px-3 text-blue-500 font-bold">{{ $crud->email }}</p>
            </div>

            <div class="flex flex-row mt-3">
                <h1>Address :</h2>
                    <p class="px-3 text-blue-500 font-bold">{{ $crud->address }}</p>
            </div>

            <div class="flex flex-row mt-3">
                <h1>Phone Number :</h2>
                    <p class="px-3 text-blue-500 font-bold">{{ $crud->phoneNumber }}</p>
            </div>

            <div class="flex flex-row mt-3">
                <h1>Gender :</h2>
                    <p class="px-3 text-blue-500 font-bold">{{ $crud->gender }}</p>
            </div>

            <div class="flex flex-row mt-3">
                {{-- delete --}}
                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                    class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                    type="button">
                    <i class="fa-solid fa-trash"></i>
                </button>

                <div id="popup-modal" tabindex="-1"
                    class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                data-modal-hide="popup-modal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-6 text-center">
                                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you
                                    sure you want to delete this product?</h3>
                                <form action="{{ route('destroy',$crud) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('edit', $crud->id) }}"
                                        class="ml-2 block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2text-sm px-3 py-2 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                    <button data-modal-hide="popup-modal" type="submit"
                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                        Yes, I'm sure
                                    </button>
                                    <button data-modal-hide="popup-modal" type="button"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                        cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- update --}}
                <a href="{{ route('edit', $crud->id) }}"
                    class="ml-2 block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2text-sm px-3 py-2 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><i
                    class="fa-solid fa-pen-to-square"></i></a>

                    <a href="{{ route('index') }}"
                        class="ml-2 block text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-3 py-2text-sm px-3 py-2 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                        <i class="fa-solid fa-circle-left"></i></a>
                        
            </div>

        </div>
    </div>
@endsection
