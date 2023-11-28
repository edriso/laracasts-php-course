<?php

$links = [
    ['name' => 'Home', 'href' => '/'],
    ['name' => 'Notes', 'href' => '/notes'],
    ['name' => 'About', 'href' => '/about'],
    ['name' => 'Contact', 'href' => '/contact'],
];

?>

<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                        alt="Your Company">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <?php foreach ($links as $link) : ?>
                        <a href="<?= $link['href'] ?>"
                            class="<?= urlIs($link['href']) ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> rounded-md px-3 py-2 text-sm font-medium"
                            aria-current="page"><?= $link['name'] ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <?php if ($_SESSION['user'] ?? false) : ?>
                            <button type="button"
                                class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="">
                            </button>
                            <?php else : ?>
                            <a href="/register"
                                class="<?= urlIs('/register') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> rounded-md px-3 py-2 text-sm font-medium"
                                aria-current="page">Register</a>
                            <a href="/login"
                                class="<?= urlIs('/login') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> rounded-md px-3 py-2 text-sm font-medium"
                                aria-current="page">Log in</a>
                            <?php endif; ?>
                        </div>

                        <div id="user-menu"
                            class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <form method="POST" action="/session">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="text-left w-full block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem" tabindex="-1">Log
                                    out</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button" id="mobile-menu-button"
                    class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <?php foreach ($links as $link) : ?>
            <a href="<?= $link['href'] ?>"
                class="<?= urlIs($link['href']) ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> block rounded-md px-3 py-2 text-base font-medium"
                aria-current="page"><?= $link['name'] ?></a>
            <?php endforeach; ?>
        </div>

        <div class="border-t border-gray-700 pb-3 pt-4">
            <?php if ($_SESSION['user'] ?? false) : ?>

            <div class="flex items-center px-5">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full"
                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="">
                </div>
                <div class="ml-3 text-sm font-medium leading-none text-gray-400"><?= $_SESSION['user']['email'] ?? '' ?>
                </div>
            </div>
            <div class="mt-3 space-y-1 px-2">
                <form method="POST" action="/session">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit"
                        class="text-left w-full block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white"
                        role="menuitem" tabindex="-1">Log out
                    </button>

                </form>
            </div>
            <?php else : ?>
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="/register"
                    class="<?= urlIs('/register') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> block rounded-md px-3 py-2 text-base font-medium"
                    aria-current="page">Register</a>
                <a href="/login"
                    class="<?= urlIs('/login') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> block rounded-md px-3 py-2 text-base font-medium"
                    aria-current="page">Log in</a>
            </div>
            <?php endif; ?>

        </div>
    </div>
</nav>