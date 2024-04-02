<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/output.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <title><?= $title; ?></title>
</head>

<body>
    <?php if ($title !== 'Online Store' && $title !== 'Register' && $title !== 'Login') : ?>
        <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-start">
                        <button data-drawer-target="sidebar" data-drawer-toggle="sidebar" aria-controls="sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 ease-in-out duration-300">
                            <span class="sr-only">Open sidebar</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                            </svg>
                        </button>
                        <a href="/home" class="flex ms-2 md:me-24">
                            <img src="" class="h-8 me-3" alt="" />
                            <span class="self-center text-xl font-semibold sm:text-2xl">OnlineStore</span>
                        </a>
                    </div>
                    <div class="flex items-center ms-3">
                        <div>
                            <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 ease-in-out duration-300" aria-expanded="false" data-dropdown-toggle="dropdown-user" data-dropdown-placement="bottom-start">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full" src="img/blank-avatar.webp" alt="User photo">
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow" id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm font-semibold text-myBlack tracking-wide truncate" role="none">
                                    Rafif Athallah
                                </p>
                                <p class="text-xs font-medium text-gray-500 tracking-wide truncate" role="none">
                                    rafifathallah@gmail.com
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-myBlack tracking-wide hover:bg-gray-100 ease-in-out duration-300" role="menuitem">Edit profil</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-myBlack tracking-wide hover:bg-gray-100 ease-in-out duration-300" role="menuitem">Ganti password</a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <a href="#" class="flex items-center space-x-2 px-4 py-2 text-sm text-red-500 font-semibold tracking-wide hover:bg-red-500 hover:text-white ease-in-out duration-300" role="menuitem">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.125 12C16.125 11.5858 15.7892 11.25 15.375 11.25L4.40244 11.25L6.36309 9.56944C6.67759 9.29988 6.71401 8.8264 6.44444 8.51191C6.17488 8.19741 5.7014 8.16099 5.38691 8.43056L1.88691 11.4306C1.72067 11.573 1.625 11.7811 1.625 12C1.625 12.2189 1.72067 12.427 1.88691 12.5694L5.38691 15.5694C5.7014 15.839 6.17488 15.8026 6.44444 15.4881C6.71401 15.1736 6.67759 14.7001 6.36309 14.4306L4.40244 12.75L15.375 12.75C15.7892 12.75 16.125 12.4142 16.125 12Z" fill="currentColor" />
                                        <path d="M9.375 8C9.375 8.70219 9.375 9.05329 9.54351 9.3055C9.61648 9.41471 9.71025 9.50848 9.81946 9.58145C10.0717 9.74996 10.4228 9.74996 11.125 9.74996L15.375 9.74996C16.6176 9.74996 17.625 10.7573 17.625 12C17.625 13.2426 16.6176 14.25 15.375 14.25L11.125 14.25C10.4228 14.25 10.0716 14.25 9.8194 14.4185C9.71023 14.4915 9.6165 14.5852 9.54355 14.6944C9.375 14.9466 9.375 15.2977 9.375 16C9.375 18.8284 9.375 20.2426 10.2537 21.1213C11.1324 22 12.5464 22 15.3748 22L16.3748 22C19.2032 22 20.6174 22 21.4961 21.1213C22.3748 20.2426 22.3748 18.8284 22.3748 16L22.3748 8C22.3748 5.17158 22.3748 3.75736 21.4961 2.87868C20.6174 2 19.2032 2 16.3748 2L15.3748 2C12.5464 2 11.1324 2 10.2537 2.87868C9.375 3.75736 9.375 5.17157 9.375 8Z" fill="currentColor" />
                                    </svg>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <aside id="sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0" aria-label="Sidebar">
            <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="/home" class="flex items-center p-2 rounded-lg hover:text-blue-700 hover:bg-gray-100 group ease-in-out duration-300 <?= ($title == 'Home') ? 'bg-gray-100 text-blue-700' : 'text-myBlack' ?>">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.5192 7.82274C2 8.77128 2 9.91549 2 12.2039V13.725C2 17.6258 2 19.5763 3.17157 20.7881C4.34315 22 6.22876 22 10 22H14C17.7712 22 19.6569 22 20.8284 20.7881C22 19.5763 22 17.6258 22 13.725V12.2039C22 9.91549 22 8.77128 21.4808 7.82274C20.9616 6.87421 20.0131 6.28551 18.116 5.10812L16.116 3.86687C14.1106 2.62229 13.1079 2 12 2C10.8921 2 9.88939 2.62229 7.88403 3.86687L5.88403 5.10813C3.98695 6.28551 3.0384 6.87421 2.5192 7.82274ZM9 17.25C8.58579 17.25 8.25 17.5858 8.25 18C8.25 18.4142 8.58579 18.75 9 18.75H15C15.4142 18.75 15.75 18.4142 15.75 18C15.75 17.5858 15.4142 17.25 15 17.25H9Z" fill="currentColor" />
                            </svg>
                            <span class="tracking-wide ms-3 whitespace-nowrap">Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="/cart" class="flex items-center p-2 rounded-lg hover:text-blue-700 hover:bg-gray-100 group ease-in-out duration-300 <?= ($title == 'Cart') ? 'bg-gray-100 text-blue-700' : 'text-myBlack' ?>">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.08416 2.7512C2.22155 2.36044 2.6497 2.15503 3.04047 2.29242L3.34187 2.39838C3.95839 2.61511 4.48203 2.79919 4.89411 3.00139C5.33474 3.21759 5.71259 3.48393 5.99677 3.89979C6.27875 4.31243 6.39517 4.76515 6.4489 5.26153C6.47295 5.48373 6.48564 5.72967 6.49233 6H17.1305C18.8155 6 20.3323 6 20.7762 6.57708C21.2202 7.15417 21.0466 8.02369 20.6995 9.76275L20.1997 12.1875C19.8846 13.7164 19.727 14.4808 19.1753 14.9304C18.6236 15.38 17.8431 15.38 16.2821 15.38H10.9792C8.19028 15.38 6.79583 15.38 5.92943 14.4662C5.06302 13.5523 4.99979 12.5816 4.99979 9.64L4.99979 7.03832C4.99979 6.29837 4.99877 5.80316 4.95761 5.42295C4.91828 5.0596 4.84858 4.87818 4.75832 4.74609C4.67026 4.61723 4.53659 4.4968 4.23336 4.34802C3.91052 4.18961 3.47177 4.03406 2.80416 3.79934L2.54295 3.7075C2.15218 3.57012 1.94678 3.14197 2.08416 2.7512Z" fill="currentColor" />
                                <path d="M7.5 18C8.32843 18 9 18.6716 9 19.5C9 20.3284 8.32843 21 7.5 21C6.67157 21 6 20.3284 6 19.5C6 18.6716 6.67157 18 7.5 18Z" fill="currentColor" />
                                <path d="M16.5 18.0001C17.3284 18.0001 18 18.6716 18 19.5001C18 20.3285 17.3284 21.0001 16.5 21.0001C15.6716 21.0001 15 20.3285 15 19.5001C15 18.6716 15.6716 18.0001 16.5 18.0001Z" fill="currentColor" />
                            </svg>
                            <span class="tracking-wide ms-3 whitespace-nowrap">Keranjang</span>
                        </a>
                    </li>
                    <li>
                        <a href="/transaction" class="flex items-center p-2 rounded-lg hover:text-blue-700 hover:bg-gray-100 group ease-in-out duration-300 <?= ($title == 'Transaction') ? 'bg-gray-100 text-blue-700' : 'text-myBlack' ?>">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M19.875 20.5917C19.2334 20.0473 18.2666 20.0473 17.625 20.5917C16.9834 21.1361 16.0166 21.1361 15.375 20.5917C14.7334 20.0473 13.7666 20.0473 13.125 20.5917C12.4834 21.1361 11.5166 21.1361 10.875 20.5917C10.2334 20.0473 9.26659 20.0473 8.625 20.5917C7.98341 21.1361 7.01659 21.1361 6.375 20.5917C5.73341 20.0473 4.76659 20.0473 4.125 20.5917C3.68909 20.9616 3 20.6662 3 20.1094V3.89059C3 3.33383 3.68909 3.03842 4.125 3.40832C4.76659 3.95274 5.73341 3.95274 6.375 3.40832C7.01659 2.86389 7.98341 2.86389 8.625 3.40832C9.26659 3.95274 10.2334 3.95274 10.875 3.40832C11.5166 2.86389 12.4834 2.86389 13.125 3.40832C13.7666 3.95274 14.7334 3.95274 15.375 3.40832C16.0166 2.86389 16.9834 2.86389 17.625 3.40832C18.2666 3.95274 19.2334 3.95274 19.875 3.40832C20.3109 3.03842 21 3.33383 21 3.89059V20.1094C21 20.6662 20.3109 20.9616 19.875 20.5917ZM6.75 12C6.75 11.5858 7.08579 11.25 7.5 11.25H16.5C16.9142 11.25 17.25 11.5858 17.25 12C17.25 12.4142 16.9142 12.75 16.5 12.75H7.5C7.08579 12.75 6.75 12.4142 6.75 12ZM7.5 7.75C7.08579 7.75 6.75 8.08579 6.75 8.5C6.75 8.91421 7.08579 9.25 7.5 9.25H16.5C16.9142 9.25 17.25 8.91421 17.25 8.5C17.25 8.08579 16.9142 7.75 16.5 7.75H7.5ZM6.75 15.5C6.75 15.0858 7.08579 14.75 7.5 14.75H16.5C16.9142 14.75 17.25 15.0858 17.25 15.5C17.25 15.9142 16.9142 16.25 16.5 16.25H7.5C7.08579 16.25 6.75 15.9142 6.75 15.5Z" fill="currentColor" />
                            </svg>
                            <span class="tracking-wide ms-3 whitespace-nowrap">Transaksi</span>
                        </a>
                    </li>
                </ul>
                <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200">
                    <li>
                        <a href="https://wa.me/6282110967112" target="_blank" class="flex items-center p-2 rounded-lg hover:text-emerald-500 hover:bg-gray-100 group ease-in-out duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0" fill="none" width="20" height="20" />
                                <g>
                                    <path d="M16.8 5.7C14.4 2 9.5.9 5.7 3.2 2 5.5.8 10.5 3.2 14.2l.2.3-.8 3 3-.8.3.2c1.3.7 2.7 1.1 4.1 1.1 1.5 0 3-.4 4.3-1.2 3.7-2.4 4.8-7.3 2.5-11.1zm-2.1 7.7c-.4.6-.9 1-1.6 1.1-.4 0-.9.2-2.9-.6-1.7-.8-3.1-2.1-4.1-3.6-.6-.7-.9-1.6-1-2.5 0-.8.3-1.5.8-2 .2-.2.4-.3.6-.3H7c.2 0 .4 0 .5.4.2.5.7 1.7.7 1.8.1.1.1.3 0 .4.1.2 0 .4-.1.5-.1.1-.2.3-.3.4-.2.1-.3.3-.2.5.4.6.9 1.2 1.4 1.7.6.5 1.2.9 1.9 1.2.2.1.4.1.5-.1s.6-.7.8-.9c.2-.2.3-.2.5-.1l1.6.8c.2.1.4.2.5.3.1.3.1.7-.1 1z" />
                                </g>
                            </svg>
                            <span class="tracking-wide ms-3 whitespace-nowrap">Kontak</span>
                        </a>
                    </li>
                    <li>
                        <a href="/about-us" class="flex items-center p-2 rounded-lg hover:text-blue-700 hover:bg-gray-100 group ease-in-out duration-300 <?= ($title == 'About Us') ? 'bg-gray-100 text-blue-700' : 'text-myBlack' ?>">
                            <svg class="w-5 h-5" viewBox="0 0 48 48" version="1" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 48 48">
                                <path fill="currentColor" d="M37,40H11l-6,6V12c0-3.3,2.7-6,6-6h26c3.3,0,6,2.7,6,6v22C43,37.3,40.3,40,37,40z" />
                                <g fill="#ffffff">
                                    <rect x="22" y="20" width="4" height="11" />
                                    <circle cx="24" cy="15" r="2" />
                                </g>
                            </svg>
                            <span class="tracking-wide ms-3 whitespace-nowrap">Tentang Kami</span>
                        </a>
                    </li>
                </ul>
                <div class="absolute bottom-2 left-0 px-4 py-2 w-full">
                    <p class="text-sm font-semibold tracking-wide">&copy; 2024 Rafif Athallah.</p>
                </div>
            </div>
        </aside>
    <?php endif; ?>