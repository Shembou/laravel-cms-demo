<script lang="ts">
    import { theme, toggleTheme } from '@/stores/theme';
    let isMobileMenuOpen = $state(false);
    let { currentRoute }: { currentRoute: string } = $props();
    const isHome = $derived(() => (currentRoute == '/' ? true : false));
</script>

<header
    class="sticky top-0 {$theme === 'dark'
        ? 'bg-[#0A0A0F]/95'
        : 'bg-white/95'} backdrop-blur-sm border-b {$theme === 'dark'
        ? 'border-[#2A2350]'
        : 'border-gray-200'} z-50 transition-colors duration-300"
>
    <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a
            class="text-2xl font-bold pr-4 {$theme === 'dark'
                ? 'text-white'
                : 'text-gray-900'}"
            href="/"
        >
            Box<span class="text-[#A78BFA]">Flow</span>
        </a>

        <!-- Desktop Navigation -->
        <ul class="desktop-nav flex items-center space-x-6 md:space-x-8">
            <li>
                <a href={isHome() ? '#features' : '/#features'} class="nav-link"
                    >Dlaczego</a
                >
            </li>
            <li>
                <a href={isHome() ? '#pricing' : '/#pricing'} class="nav-link"
                    >Cennik</a
                >
            </li>
            <li>
                <a href={isHome() ? '#contact' : '/#contact'} class="nav-link"
                    >Kontakt</a
                >
            </li>
            <li>
                <button
                    onclick={toggleTheme}
                    class="theme-toggle p-2 rounded-lg hover:cursor-pointer {$theme ===
                    'dark'
                        ? 'bg-[#12121C] hover:bg-[#1A1A28]'
                        : 'bg-gray-100 hover:bg-gray-200'} transition-all duration-300"
                    aria-label="Toggle theme"
                >
                    {#if $theme === 'dark'}
                        <!-- Sun icon for light mode -->
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-yellow-400"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"
                            />
                        </svg>
                    {:else}
                        <!-- Moon icon for dark mode -->
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-purple-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
                            />
                        </svg>
                    {/if}
                </button>
            </li>
        </ul>

        <!-- Hamburger Menu Button -->
        <button
            class="hamburger-button hidden"
            onclick={() => (isMobileMenuOpen = !isMobileMenuOpen)}
            aria-label="Toggle menu"
            aria-expanded={isMobileMenuOpen}
        >
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
        </button>
    </nav>

    <!-- Mobile Menu -->
    <div class="mobile-menu {isMobileMenuOpen ? 'open' : ''}">
        <ul class="mobile-nav">
            <li>
                <a href={isHome() ? '#features' : '/#features'} class="nav-link"
                    >Dlaczego</a
                >
            </li>
            <li>
                <a href={isHome() ? '#pricing' : '/#pricing'} class="nav-link"
                    >Cennik</a
                >
            </li>
            <li>
                <a href={isHome() ? '#contact' : '/#contact'} class="nav-link"
                    >Kontakt</a
                >
            </li>

            <li>
                <button
                    onclick={toggleTheme}
                    class="theme-toggle p-2 rounded-lg hover:cursor-pointer {$theme ===
                    'dark'
                        ? 'bg-[#12121C] hover:bg-[#1A1A28]'
                        : 'bg-gray-100 hover:bg-gray-200'} transition-all duration-300"
                    aria-label="Toggle theme"
                >
                    {#if $theme === 'dark'}
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-yellow-400"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"
                            />
                        </svg>
                    {:else}
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-purple-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
                            />
                        </svg>
                    {/if}
                </button>
            </li>
        </ul>
    </div>
</header>

<style>
    .nav-link {
        position: relative;
        color: #c4c4e0;
        font-weight: 500;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 0;
        height: 2px;
        background: #8b5cf6;
        transition: 0.3s;
    }

    .nav-link:hover::after {
        width: 100%;
    }

    .nav-link:hover {
        color: #ffffff;
    }

    /* Light mode overrides */
    :global(.light) .nav-link {
        color: #6b7280;
    }

    :global(.light) .nav-link:hover {
        color: #1f2937;
    }

    :global(.light) .nav-link::after {
        background: #8b5cf6;
    }

    .theme-toggle {
        transition: all 0.3s ease;
    }

    .theme-toggle:hover {
        transform: scale(1.1);
    }

    /* Hamburger button */
    .hamburger-button {
        display: none;
        flex-direction: column;
        justify-content: space-between;
        width: 30px;
        height: 24px;
        background: none;
        border: none;
        cursor: pointer;
        padding: 0;
    }

    .hamburger-line {
        width: 100%;
        height: 3px;
        background-color: #8b5cf6;
        transition: all 0.3s ease;
        border-radius: 2px;
    }

    .hamburger-button:hover .hamburger-line {
        background-color: #a78bfa;
    }

    .hamburger-button[aria-expanded='true'] .hamburger-line:nth-child(1) {
        transform: rotate(45deg) translate(5px, 6px);
    }

    .hamburger-button[aria-expanded='true'] .hamburger-line:nth-child(2) {
        opacity: 0;
    }

    .hamburger-button[aria-expanded='true'] .hamburger-line:nth-child(3) {
        transform: rotate(-45deg) translate(7px, -6px);
    }

    /* Mobile menu */
    .mobile-menu {
        position: fixed;
        top: 80px;
        left: 0;
        right: 0;
        background: var(--bg-color, #ffffff);
        backdrop-filter: blur(10px);
        border-bottom: 1px solid var(--border-color, #e5e7eb);
        transform: translateX(-100%);
        transition: transform 0.3s ease;
        z-index: 40;
        max-height: calc(100vh - 80px);
        overflow-y: auto;
    }

    .mobile-menu.open {
        transform: translateX(0);
    }

    .mobile-nav {
        display: flex;
        flex-direction: column;
        padding: 2rem;
        gap: 1.5rem;
    }

    .mobile-nav .nav-link {
        font-size: 1.25rem;
        color: #111827;
    }

    :global(.dark) .mobile-menu {
        --bg-color: #0a0a0f;
        --border-color: #2a2350;
    }

    :global(.dark) .mobile-nav .nav-link {
        color: #ffffff;
    }

    /* Responsive styles */
    @media (max-width: 699px) {
        .desktop-nav {
            display: none;
        }

        .hamburger-button {
            display: flex;
        }
    }

    @media (min-width: 700px) {
        .mobile-menu {
            display: none;
        }
    }
</style>
