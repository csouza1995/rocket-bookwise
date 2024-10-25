<div class="mx-auto w-1/2" x-data="{ type: 'login' }">
    <!-- message -->
    <?php if ($message) : ?>
        <div class="bg-green-700 text-white p-4 rounded-md mb-5" x-data="{ show: true }" x-show="show">
            <?= $message ?>

            <button x-on:click="show = false"
                class="right-0 top-0 text-white hover:bg-green-800 rounded-md float-right">
                <i class='bx bx-x'></i>
            </button>
        </div>
    <?php endif; ?>

    <!-- login -->
    <div class="w-full mt-10" x-show="type === 'login'">
        <h1 class="text-2xl font-bold text-gray-300 mb-5 text-center">
            Login
        </h1>

        <form class=" space-y-6" method="POST" action="/login">
            <div class="space-y-2">
                <label class="text-gray-300 font-bold" for="email">E-mail</label>

                <input
                    type="text"
                    placeholder="E-mail"
                    class="w-full p-2 rounded-md text-sm focus:outline-none text-gray-900"
                    name="email"
                    value="<?= $_REQUEST['email'] ?>">
            </div>

            <div class="space-y-2">
                <label class="text-gray-300 font-bold" for="password">Password</label>

                <input
                    type="password"
                    placeholder="Password"
                    class="w-full p-2 rounded-md text-sm focus:outline-none text-gray-900"
                    name="password">
            </div>

            <button type="submit"
                class="text-white py-2 px-4 rounded-md hover:bg-gray-700 bg-gray-500 w-full">
                Login
            </button>
        </form>

        <!-- go to register -->
        <div class="mt-10 text-center">
            <button x-on:click="type = 'register'"
                type="button"
                class="text-white py-2 px-4 rounded-md hover:underline bg-gray-800">
                Sign up
            </button>
        </div>
    </div>

    <!-- register -->
    <div class="w-full  mt-10" x-show="type === 'register'">
        <h1 class="text-2xl font-bold text-gray-300 mb-5 text-center">
            Register
        </h1>

        <form class=" space-y-6" method="POST" action="/register">

            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-2">
                    <label class="text-gray-300 font-bold" for="name">Name</label>

                    <input
                        type="text"
                        placeholder="Name"
                        class="w-full p-2 rounded-md text-sm focus:outline-none text-gray-900"
                        name="name"
                        value="<?= $_REQUEST['name'] ?>">
                </div>

                <div class="space-y-2">
                    <label class="text-gray-300 font-bold" for="name">Surname</label>

                    <input
                        type="text"
                        placeholder="Surname"
                        class="w-full p-2 rounded-md text-sm focus:outline-none text-gray-900"
                        name="surname"
                        value="<?= $_REQUEST['surname'] ?>">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-gray-300 font-bold" for="email">E-mail</label>

                <input
                    type="text"
                    placeholder="E-mail"
                    class="w-full p-2 rounded-md text-sm focus:outline-none text-gray-900"
                    name="email"
                    value="<?= $_REQUEST['email'] ?>">
            </div>

            <div class="space-y-2">
                <label class="text-gray-300 font-bold" for="validate_email">Validate E-mail</label>

                <input
                    type="text"
                    placeholder="Validate E-mail"
                    class="w-full p-2 rounded-md text-sm focus:outline-none text-gray-900"
                    name="validate_email"
                    value="<?= $_REQUEST['validate_email'] ?>">
            </div>

            <div class="space-y-2">
                <label class="text-gray-300 font-bold" for="password">Password</label>

                <input
                    type="password"
                    placeholder="Password"
                    class="w-full p-2 rounded-md text-sm focus:outline-none text-gray-900"
                    name="password">
            </div>

            <div class="flex space-x-4">
                <button type="reset"
                    class="text-white py-2 px-4 rounded-md hover:bg-gray-700 bg-gray-500 w-full">
                    Reset
                </button>

                <button type="submit"
                    class="text-white py-2 px-4 rounded-md hover:bg-gray-700 bg-gray-500 w-full">
                    Register
                </button>
            </div>
        </form>

        <!-- go to login -->
        <div class="mt-10 text-center">
            <button x-on:click="type = 'login'"
                type="button"
                class="text-white py-2 px-4 rounded-md hover:underline bg-gray-800">
                Already have an account? Login
            </button>
        </div>
    </div>

</div>