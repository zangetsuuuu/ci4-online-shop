<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/output.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
    <title><?= $title; ?></title>
</head>

<body>
    <?php if ($title !== 'Online Store' && $title !== 'Sign Up' && $title !== 'Login'): ?>
        <header class="fixed top-0 left-0 bg-white w-full shadow-lg">
            <div class="container mx-auto px-6 lg:px-0 py-3 md:py-4">
                <nav class="flex items-center justify-between">
                    <a href="/home" class="text-lg md:text-xl font-bold tracking-wide">MamahGalvaStore</a>

                    <!-- Hamburger menu -->
                    <div class="block md:hidden">
                        <label for="menu-toggle" class="hamburger cursor-pointer">
                            <input type="checkbox" id="menu-toggle" class="hidden">
                            <svg viewBox="0 0 32 32" class="w-9 h-9">
                                <path class="line line-top-bottom" d="M27 10 13 10C10.8 10 9 8.2 9 6 9 3.5 10.8 2 13 2 15.2 2 17 3.8 17 6L17 26C17 28.2 18.8 30 21 30 23.2 30 25 28.2 25 26 25 23.8 23.2 22 21 22L7 22"></path>
                                <path class="line" d="M7 16 27 16"></path>
                            </svg>
                        </label>
                    </div>

                    <!-- Navbar expand -->
                    <div class="hidden md:block">
                        <ul class="flex items-center justify-center space-x-10">
                            <li>
                                <a href="/home" class="group flex items-center justify-center space-x-2 nav-link <?= ($title == 'Homepage') ? 'active' : '' ?>">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19 9L19 17C19 18.8856 19 19.8284 18.4142 20.4142C17.8284 21 16.8856 21 15 21L14 21L10 21L9 21C7.11438 21 6.17157 21 5.58579 20.4142C5 19.8284 5 18.8856 5 17L5 9" class="<?= ($title == 'Homepage') ? 'stroke-newBlack' : '' ?> stroke-gray-400 group-hover:stroke-newBlack ease-in-out duration-300" stroke-width="2" stroke-linejoin="round"/>
                                        <path d="M3 11L7.5 7L10.6713 4.18109C11.429 3.50752 12.571 3.50752 13.3287 4.18109L16.5 7L21 11" class="<?= ($title == 'Homepage') ? 'stroke-newBlack' : '' ?> stroke-gray-400 group-hover:stroke-newBlack ease-in-out duration-300" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10 21V17C10 15.8954 10.8954 15 12 15V15C13.1046 15 14 15.8954 14 17V21" class="<?= ($title == 'Homepage') ? 'stroke-newBlack' : '' ?> stroke-gray-400 group-hover:stroke-newBlack ease-in-out duration-300" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span>Beranda</span>
                                </a>
                            </li>
                            <li>
                                <a href="/cart" class="group flex items-center justify-center space-x-2 nav-link <?= ($title == 'Cart') ? 'active' : '' ?>">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1 1C0.447715 1 0 1.44772 0 2C0 2.55228 0.447715 3 1 3H3.20647L5.98522 14.9089C6.39883 16.6816 7.95486 17.9464 9.76471 17.9983V18H17.5874C19.5362 18 21.2014 16.5956 21.5301 14.6747L22.7857 7.33734C22.9947 6.11571 22.0537 5 20.8143 5H5.72686L4.97384 1.77277C4.86824 1.32018 4.46475 1 4 1H1ZM6.19353 7L7.9329 14.4545C8.14411 15.3596 8.95109 16 9.88058 16H17.5874C18.5618 16 19.3944 15.2978 19.5588 14.3373L20.8143 7H6.19353Z" class="<?= ($title == 'Cart') ? 'fill-newBlack' : '' ?> fill-gray-400 group-hover:fill-newBlack ease-in-out duration-300"/>
                                        <path d="M8 23C9.10457 23 10 22.1046 10 21C10 19.8954 9.10457 19 8 19C6.89543 19 6 19.8954 6 21C6 22.1046 6.89543 23 8 23Z" class="<?= ($title == 'Cart') ? 'fill-newBlack' : '' ?> fill-gray-400 group-hover:fill-newBlack ease-in-out duration-300"/>
                                        <path d="M19 23C20.1046 23 21 22.1046 21 21C21 19.8954 20.1046 19 19 19C17.8954 19 17 19.8954 17 21C17 22.1046 17.8954 23 19 23Z" class="<?= ($title == 'Cart') ? 'fill-newBlack' : '' ?> fill-gray-400 group-hover:fill-newBlack ease-in-out duration-300"/>
                                    </svg>
                                    <span>Keranjang</span>
                                </a>
                            </li>
                            <li>
                                <a href="/account" class="group flex items-center justify-center space-x-2 nav-link <?= ($title == 'Account') ? 'active' : '' ?>">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 20V19C5 16.2386 7.23858 14 10 14H14C16.7614 14 19 16.2386 19 19V20M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" class="<?= ($title == 'Account') ? 'stroke-newBlack' : '' ?> stroke-gray-400 group-hover:stroke-newBlack ease-in-out duration-300" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span>Akun</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Offcanvas navbar Start -->
                    <div id="offcanvas-menu" class="absolute top-full left-0 w-full bg-white opacity-0 border-t border-gray-400 z-50 hidden overflow-hidden shadow-lg transition-opacity duration-300">
                        <ul class="block my-4">
                            <li>
                                <a href="/home" class="group flex items-center justify-center space-x-2 my-6 nav-link <?= ($title == 'Homepage') ? 'active' : '' ?>">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19 9L19 17C19 18.8856 19 19.8284 18.4142 20.4142C17.8284 21 16.8856 21 15 21L14 21L10 21L9 21C7.11438 21 6.17157 21 5.58579 20.4142C5 19.8284 5 18.8856 5 17L5 9" class="<?= ($title == 'Homepage') ? 'stroke-newBlack' : '' ?> stroke-gray-400 group-hover:stroke-newBlack ease-in-out duration-300" stroke-width="2" stroke-linejoin="round"/>
                                        <path d="M3 11L7.5 7L10.6713 4.18109C11.429 3.50752 12.571 3.50752 13.3287 4.18109L16.5 7L21 11" class="<?= ($title == 'Homepage') ? 'stroke-newBlack' : '' ?> stroke-gray-400 group-hover:stroke-newBlack ease-in-out duration-300" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10 21V17C10 15.8954 10.8954 15 12 15V15C13.1046 15 14 15.8954 14 17V21" class="<?= ($title == 'Homepage') ? 'stroke-newBlack' : '' ?> stroke-gray-400 group-hover:stroke-newBlack ease-in-out duration-300" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span>Beranda</span>
                                </a>
                            </li>
                            <li>
                                <a href="/cart" class="group flex items-center justify-center space-x-2 my-6 nav-link <?= ($title == 'Cart') ? 'active' : '' ?>">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1 1C0.447715 1 0 1.44772 0 2C0 2.55228 0.447715 3 1 3H3.20647L5.98522 14.9089C6.39883 16.6816 7.95486 17.9464 9.76471 17.9983V18H17.5874C19.5362 18 21.2014 16.5956 21.5301 14.6747L22.7857 7.33734C22.9947 6.11571 22.0537 5 20.8143 5H5.72686L4.97384 1.77277C4.86824 1.32018 4.46475 1 4 1H1ZM6.19353 7L7.9329 14.4545C8.14411 15.3596 8.95109 16 9.88058 16H17.5874C18.5618 16 19.3944 15.2978 19.5588 14.3373L20.8143 7H6.19353Z" class="<?= ($title == 'Cart') ? 'fill-newBlack' : '' ?> fill-gray-400 group-hover:fill-newBlack ease-in-out duration-300"/>
                                        <path d="M8 23C9.10457 23 10 22.1046 10 21C10 19.8954 9.10457 19 8 19C6.89543 19 6 19.8954 6 21C6 22.1046 6.89543 23 8 23Z" class="<?= ($title == 'Cart') ? 'fill-newBlack' : '' ?> fill-gray-400 group-hover:fill-newBlack ease-in-out duration-300"/>
                                        <path d="M19 23C20.1046 23 21 22.1046 21 21C21 19.8954 20.1046 19 19 19C17.8954 19 17 19.8954 17 21C17 22.1046 17.8954 23 19 23Z" class="<?= ($title == 'Cart') ? 'fill-newBlack' : '' ?> fill-gray-400 group-hover:fill-newBlack ease-in-out duration-300"/>
                                    </svg>
                                    <span>Keranjang</span>
                                </a>
                            </li>
                            <li>
                                <a href="/account" class="group flex items-center justify-center space-x-2 my-6 nav-link <?= ($title == 'Account') ? 'active' : '' ?>">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 20V19C5 16.2386 7.23858 14 10 14H14C16.7614 14 19 16.2386 19 19V20M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" class="<?= ($title == 'Account') ? 'stroke-newBlack' : '' ?> stroke-gray-400 group-hover:stroke-newBlack ease-in-out duration-300" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span>Akun</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
    <?php endif; ?>
