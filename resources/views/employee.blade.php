<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap"
            rel="stylesheet"
        />

        @vite('resources/css/app.css')
        <title>Add Employee</title>
        <!-- <script defer src="{{ asset('js/overview_employee.js') }}"></script> -->
        <link rel="stylesheet" href="{{ asset('css/form_styles.css') }}" />
    </head>
    <body class="bg-bg grid place-items-center min-h-screen">
        <main class="w-full max-w-[70rem] bg-white p-12 rounded-xl">
            <h1 class="text-title text-dark font-semibold mb-8">Employees</h1>
            <div class="grid gap-3">
                <!-- TABLE COLUMN HEADING -->
                @if(count($employees) != 0)
                <div
                    class="grid grid-cols-[3rem_10rem_15rem_5rem_1fr_12rem] text-body text-dark gap-2"
                >
                    <div
                        class="bg-table rounded-md p-4 text-dark font-semibold"
                    >
                        No.
                    </div>
                    <div
                        class="bg-table rounded-md p-4 text-dark font-semibold"
                    >
                        Name
                    </div>
                    <div
                        class="bg-table rounded-md p-4 text-dark font-semibold"
                    >
                        Email
                    </div>
                    <div
                        class="bg-table rounded-md p-4 text-dark font-semibold"
                    >
                        Age
                    </div>
                    <div
                        class="bg-table rounded-md p-4 text-dark font-semibold"
                    >
                        Address
                    </div>
                    <div
                        class="bg-table rounded-md p-4 text-dark font-semibold"
                    >
                        Actions
                    </div>
                </div>
                @else
                <div class="text-secondary">
                    No Employees Added Yet, Click to button below to add
                </div>
                @endif @foreach ($employees as $employee)
                <form
                    class="grid grid-cols-[3rem_10rem_15rem_5rem_1fr_12rem] gap-2 userId__{{ $loop->iteration}}"
                    action="{{ route('process-form') }}"
                    method="POST"
                >
                    @csrf
                    <input
                        class="text-dark font-semibold px-4 flex items-center border-[1px] py-3 rounded-md truncate"
                        value="{{ $loop->iteration}}"
                    />
                    <input
                        type="hidden"
                        value="{{ $employee->id }}"
                        name="id"
                    />

                    <div
                        class="text-dark font-semibold px-4 flex id__{{ $loop->iteration }} items-center border-[1px]  py-3 rounded-md"
                    >
                        <p class="truncate">
                            {{ $employee->name}}
                        </p>
                    </div>
                    <div
                        class="text-dark font-semibold px-4 flex id__{{ $loop->iteration }} items-center border-[1px]  py-3 rounded-md"
                    >
                        <p class="truncate">
                            {{ $employee->email}}
                        </p>
                    </div>
                    <div
                        class="text-dark font-semibold px-4 flex id__{{ $loop->iteration }} items-center border-[1px]  py-3 rounded-md truncate"
                    >
                        {{ $employee->age}}
                    </div>
                    <div
                        class="text-dark font-semibold px-4 flex justify-between items-center relative border-[1px] id__{{ $loop->iteration }} py-3 rounded-md truncate gap-4 "
                    >
                        <p class="max-w-[14rem] truncate">
                            {{ $employee->address}}
                        </p>
                    </div>
                    <div class="grid grid-cols-2 gap-2 mx-2 my-2">
                        <button
                            class="px-4 py-2 bg-danger text-white font-semibold rounded-md delete-button delete-btn"
                            type="submit"
                            name="action"
                            value="delete"
                        >
                            Delete
                        </button>

                        <button
                            class="px-4 py-2 bg-accent text-white font-semibold rounded-md edit-button"
                            type="submit"
                            name="action"
                            value="edit"
                        >
                            Edit
                        </button>
                    </div>
                </form>
                @endforeach
                <!--  -->
                <div
                    class="border-t border-neutral-100 border-[1px] my-4"
                ></div>
                <form action="{{ route('create_employee') }}" method="GET">
                    <button
                        class="px-6 py-3 bg-accent text-white text-body w-fit rounded-md font-semibold"
                    >
                        + Add New
                    </button>
                </form>
            </div>
        </main>
    </body>
</html>
