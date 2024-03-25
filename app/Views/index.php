<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/index.css">
    <title>Mamah Galva Store</title>
</head>

<body>
    <div class="min-h-screen flex items-center justify-center">
        <header class="container px-8 py-16 md:px-24">
            <div class="md:text-center max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-5xl text-white font-bold tracking-wide">Welcome to Mamah Galva Store</h1>
                <p class="text-lg md:text-xl text-white mt-4">Discover amazing products at unbeatable prices.</p>
                <div class="flex flex-wrap items-center md:justify-center md:space-x-4 space-y-4 md:space-y-0 mt-6">
                    <button onclick="openModal('login')" class="w-full md:w-auto bg-blue-500 text-white font-semibold tracking-wide py-3 px-8 rounded-full hover:scale-105 ease-in-out duration-300">Login</button>
                    <button onclick="openModal('signUp')" class="w-full md:w-auto bg-gray-200 text-gray-900 font-semibold tracking-wide py-3 px-8 rounded-full hover:scale-105 ease-in-out duration-300">Sign Up</button>
                </div>
            </div>
        </header>

        <!-- Login Modal -->
        <div id="login" class="fixed top-0 left-0 bg-black backdrop-blur-md bg-opacity-50 w-screen h-screen flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
            <div class="bg-white rounded-xl shadow-md p-8 w-[90%] md:w-[70%] lg:w-[40%]">
                <div class="flex items-center justify-between">
                    <h1 class="flex items-center space-x-3 mb-2">
                        <svg class="w-7 h-7" width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 8L16 12M16 12L12 16M16 12H3M3.33782 7C5.06687 4.01099 8.29859 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C8.29859 22 5.06687 19.989 3.33782 17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="text-3xl font-bold tracking-wide">Login</span>
                    </h1>
                    <button onclick="switchModal('login', 'signUp')" class="group flex items-center space-x-2">
                        <svg class="w-4 h-4 fill-gray-400 group-hover:fill-blue-500 ease-in-out duration-300" width="800px" height="800px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <title>user-plus</title>
                            <path d="M13.5 16.324c3.757-0 6.802-3.046 6.802-6.802s-3.045-6.802-6.802-6.802-6.802 3.045-6.802 6.802c0 0 0 0 0 0.001v-0c0.005 3.755 3.048 6.798 6.802 6.802h0zM13.5 5.22c2.376 0 4.302 1.926 4.302 4.302s-1.926 4.302-4.302 4.302c-2.376 0-4.302-1.926-4.302-4.302v-0c0.003-2.375 1.928-4.3 4.302-4.303h0zM13.5 17.533c-6.195 0.026-11.372 4.351-12.705 10.144l-0.017 0.088c-0.018 0.080-0.029 0.172-0.029 0.266 0 0.596 0.417 1.094 0.975 1.219l0.008 0.002c0.081 0.019 0.174 0.029 0.269 0.029 0.596 0 1.094-0.418 1.218-0.976l0.002-0.008c1.074-4.761 5.267-8.264 10.279-8.264s9.206 3.504 10.266 8.195l0.013 0.070c0.127 0.566 0.625 0.982 1.221 0.982 0.69 0 1.25-0.559 1.25-1.25 0-0.095-0.011-0.187-0.031-0.276l0.002 0.008c-1.351-5.88-6.527-10.203-12.718-10.231h-0.003zM30 13.253h-2.252v-2.253c0-0.69-0.56-1.25-1.25-1.25s-1.25 0.56-1.25 1.25v0 2.253h-2.254c-0.69 0-1.25 0.56-1.25 1.25s0.56 1.25 1.25 1.25v0h2.254v2.253c0 0.69 0.56 1.25 1.25 1.25s1.25-0.56 1.25-1.25v0-2.253h2.252c0.69 0 1.25-0.56 1.25-1.25s-0.56-1.25-1.25-1.25v0z"></path>
                        </svg>
                        <span class="text-base text-gray-400 font-medium tracking-wide group-hover:text-blue-500 ease-in-out duration-300">Sign Up</span>
                    </button>
                </div>
                <hr class="mb-8">
                <form action="">
                    <div class="mb-5">
                        <label for="email" class="text-lg font-semibold tracking-wide">Email</label>
                        <input id="email" name="email" type="email" placeholder="someone@example.com" required
                                class="relative block w-full p-3 mt-2 rounded-md border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 focus:shadow-md text-sm md:text-base">
                    </div>
                    <div class="mb-6">
                        <label for="password" class="text-lg font-semibold tracking-wide">Password</label>
                        <input id="password" name="password" type="password" placeholder="********" required
                                class="relative block w-full p-3 mt-2 rounded-md border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 focus:shadow-md text-sm md:text-base">
                    </div>
                    <div class="flex items-center justify-end space-x-4">
                        <button onclick="closeModal('login')" class="bg-gray-200 text-gray-900 font-semibold tracking-wide py-3 px-8 rounded-full hover:bg-gray-300 ease-in-out duration-300">Close</button>
                        <button type="submit" class="bg-blue-500 text-white font-semibold tracking-wide py-3 px-8 rounded-full hover:bg-blue-600 ease-in-out duration-300">Login</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sign Up Modal -->
        <div id="signUp" class="fixed top-0 left-0 bg-black backdrop-blur-md bg-opacity-50 w-screen h-screen flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
            <div class="bg-white rounded-xl shadow-md p-8 w-[90%] md:w-[70%] lg:w-[40%]">
                <div class="flex items-center justify-between">
                    <h1 class="flex items-center space-x-3 mb-2">
                        <svg class="w-7 h-7" width="800px" height="800px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <title>user-plus</title>
                            <path d="M13.5 16.324c3.757-0 6.802-3.046 6.802-6.802s-3.045-6.802-6.802-6.802-6.802 3.045-6.802 6.802c0 0 0 0 0 0.001v-0c0.005 3.755 3.048 6.798 6.802 6.802h0zM13.5 5.22c2.376 0 4.302 1.926 4.302 4.302s-1.926 4.302-4.302 4.302c-2.376 0-4.302-1.926-4.302-4.302v-0c0.003-2.375 1.928-4.3 4.302-4.303h0zM13.5 17.533c-6.195 0.026-11.372 4.351-12.705 10.144l-0.017 0.088c-0.018 0.080-0.029 0.172-0.029 0.266 0 0.596 0.417 1.094 0.975 1.219l0.008 0.002c0.081 0.019 0.174 0.029 0.269 0.029 0.596 0 1.094-0.418 1.218-0.976l0.002-0.008c1.074-4.761 5.267-8.264 10.279-8.264s9.206 3.504 10.266 8.195l0.013 0.070c0.127 0.566 0.625 0.982 1.221 0.982 0.69 0 1.25-0.559 1.25-1.25 0-0.095-0.011-0.187-0.031-0.276l0.002 0.008c-1.351-5.88-6.527-10.203-12.718-10.231h-0.003zM30 13.253h-2.252v-2.253c0-0.69-0.56-1.25-1.25-1.25s-1.25 0.56-1.25 1.25v0 2.253h-2.254c-0.69 0-1.25 0.56-1.25 1.25s0.56 1.25 1.25 1.25v0h2.254v2.253c0 0.69 0.56 1.25 1.25 1.25s1.25-0.56 1.25-1.25v0-2.253h2.252c0.69 0 1.25-0.56 1.25-1.25s-0.56-1.25-1.25-1.25v0z"></path>
                        </svg>
                        <span class="text-3xl font-bold tracking-wide">Sign Up</span>
                    </h1>
                    <button onclick="switchModal('signUp', 'login')" class="group flex items-center space-x-2">
                        <svg class="w-4 h-4" width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 8L16 12M16 12L12 16M16 12H3M3.33782 7C5.06687 4.01099 8.29859 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C8.29859 22 5.06687 19.989 3.33782 17" class="stroke-gray-400 group-hover:stroke-blue-500 ease-in-out duration-300" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="text-base text-gray-400 font-medium tracking-wide group-hover:text-blue-500 ease-in-out duration-300">Login</span>
                    </button>
                </div>
                <hr class="mb-8">
                <form action="">
                    <div class="mb-6">
                        <label for="name" class="text-lg font-semibold tracking-wide">Name</label>
                        <input id="name" name="name" type="text" placeholder="John Doe" required
                                class="relative block w-full p-3 mt-2 rounded-md border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 focus:shadow-md text-sm md:text-base">
                    </div>
                    <div class="mb-5">
                        <label for="email" class="text-lg font-semibold tracking-wide">Email</label>
                        <input id="email" name="email" type="email" placeholder="someone@example.com" required
                                class="relative block w-full p-3 mt-2 rounded-md border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 focus:shadow-md text-sm md:text-base">
                    </div>
                    <div class="mb-6">
                        <label for="password" class="text-lg font-semibold tracking-wide">Password</label>
                        <input id="password" name="password" type="password" placeholder="********" required
                                class="relative block w-full p-3 mt-2 rounded-md border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 focus:shadow-md text-sm md:text-base">
                    </div>
                    <div class="flex items-center justify-end space-x-4">
                        <button onclick="closeModal('signUp')" class="bg-gray-200 text-gray-900 font-semibold tracking-wide py-3 px-8 rounded-full hover:bg-gray-300 ease-in-out duration-300">Close</button>
                        <button type="submit" class="bg-blue-500 text-white font-semibold tracking-wide py-3 px-8 rounded-full hover:bg-blue-600 ease-in-out duration-300">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="js/index.js"></script>
</body>
</html>