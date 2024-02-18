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
        <link
            href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
            rel="stylesheet"
        />

        @vite('resources/css/app.css')
        <title>Add Employee</title>
        <script defer src="{{ asset('js/create_employee.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('css/form_styles.css') }}" />
    </head>
    <body
        style="font-family: 'Inter'; font-weight: 500"
        class="grid place-items-center bg-bg min-h-screen px-8"
    >
        <div>
            <form action="{{ route('get_all_employee') }}">
                <button
                    class="flex items-center justify-center w-fit gap-2 text-secondary mb-4 hover:text-dark"
                >
                    <i class="bx bxs-chevron-left"></i>
                    <p>Back</p>
                </button>
            </form>
            <!-- ====== CARD ========= -->
            <form
                class="bg-white p-12 rounded-lg` max-w-[40rem] w-full rounded-xl shadow-xl shadow-secondary/20 form-card"
                method="POST"
                action="{{ route('update-employee') }}"
            >
                @csrf @method("POST")
                <h1 class="font-[600] text-title text-dark mb-2">
                    Edit Employee
                </h1>
                <p class="text-body text-secondary mb-10">
                    Fill the following data below
                </p>

                <!-- ====== INPUT CONTAINER ========= -->
                <div class="grid gap-4 grid-cols-2">
                    <input
                        type="text"
                        value="{{ $employeeId }}"
                        name="id"
                        class="hidden"
                    />
                    <!-- === FIRST NAME === -->
                    <div class="flex flex-col w-full gap-2 text-start">
                        <div class="flex items-center justify-between">
                            <label
                                for="firstName"
                                class="text-body block text-dark font-[500]"
                                >First Name</label
                            >
                            @error("firstName")
                            <p class="text-danger text-small">{{ $message }}</p>
                            @enderror
                        </div>
                        <input
                            value="{{ $employee->firstName }}"
                            type="text"
                            name="firstName"
                            class="@error('firstName') border-danger outline-none @enderror border-[1px] border-secondary/50 rounded-md px-5 py-3 text-body"
                            placeholder="Alexander"
                        />
                        <p class="text-small text-secondary">
                            Must be 5 - 20 Characters
                        </p>
                    </div>

                    <!-- === LAST NAME === -->
                    <div class="flex flex-col w-full gap-2 text-start">
                        <div class="flex items-center justify-between">
                            <label
                                for="lastName"
                                class="text-body block text-dark font-[500]"
                                >Last Name</label
                            >
                            @error("lastName")
                            <p class="text-danger text-small">{{ $message }}</p>
                            @enderror
                        </div>
                        <input
                            value="{{ $employee->lastName }}"
                            type="text"
                            name="lastName"
                            class="@error('lastName') border-danger outline-none @enderror border-[1px] border-secondary/50 rounded-md px-5 py-3 text-body"
                            placeholder="Runard"
                        />
                    </div>

                    <!-- === EMAIl === -->
                    <div
                        class="flex flex-col w-full gap-2 text-start col-span-2"
                    >
                        <div class="flex items-center justify-between">
                            <label
                                for="email"
                                class="text-body block text-dark font-[500]"
                                >Email</label
                            >
                            @error("email")
                            <p class="text-danger text-small">{{ $message }}</p>
                            @enderror
                        </div>
                        <input
                            value="{{ $employee->email }}"
                            type="text"
                            name="email"
                            class="@error('email') border-danger outline-none @enderror border-[1px] border-secondary/50 rounded-md px-5 py-3 text-body"
                            placeholder="Alexander@example.com"
                        />
                    </div>

                    <!-- === AGE === -->
                    <div class="flex flex-col w-full gap-2 text-start">
                        <div class="flex items-center justify-between">
                            <label
                                for="age"
                                class="text-body block text-dark font-[500]"
                                >Age</label
                            >
                            @error("age")
                            <p class="text-danger text-small">{{ $message }}</p>
                            @enderror
                        </div>
                        <input
                            value="{{ $employee->age }}"
                            type="text"
                            name="age"
                            class="@error('age') border-danger outline-none @enderror border-[1px] border-secondary/50 rounded-md px-5 py-3 text-body"
                            placeholder="21"
                        />
                        <p class="text-small text-secondary">
                            Must be 20+ years old
                        </p>
                    </div>

                    <!-- === PHONE NUMBER === -->
                    <div class="flex flex-col w-full gap-2 text-start">
                        <div class="flex items-center justify-between">
                            <label
                                for="phone"
                                class="text-body block text-dark font-[500]"
                                >Phone Number</label
                            >
                            @error("phone")
                            <p class="text-danger text-small">{{ $message }}</p>
                            @enderror
                        </div>
                        <input
                            value="{{ $employee->phone }}"
                            type="text"
                            name="phone"
                            class="@error('phone') border-danger outline-none @enderror border-[1px] border-secondary/50 rounded-md px-5 py-3 text-body"
                            placeholder="0888 8888"
                        />
                        <p class="text-small text-secondary">
                            Must start with 08
                        </p>
                    </div>

                    <!-- === ADDRESS === -->
                    <div
                        class="flex flex-col w-full gap-2 text-start col-span-2"
                    >
                        <div class="flex items-center justify-between">
                            <label
                                for="address"
                                class="text-body block text-dark font-[500]"
                                >Address</label
                            >
                            @error("address")
                            <p class="text-danger text-small">{{ $message }}</p>
                            @enderror
                        </div>
                        <textarea
                            class="@error('address') border-danger outline-none @enderror border-[1px] border-secondary/50 rounded-md resize-none text-body p-5"
                            name="address"
                            >{{ $employee->address }}</textarea
                        >
                        <p class="text-small text-secondary">
                            Must be your real address (10 - 40 Characters)
                        </p>
                    </div>
                </div>
                <!-- ===== SUBMIT ====== -->
                <div
                    class="flex justify-end gap-4 mt-10 pt-10 border-t border-secondary/20"
                >
                    <button
                        class="px-12 py-3 bg-accent rounded-xl text-body text-white submit-button"
                    >
                        Edit
                    </button>
                </div>
            </form>
        </div>
    </body>
</html>
