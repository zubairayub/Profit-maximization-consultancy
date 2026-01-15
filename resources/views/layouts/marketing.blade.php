<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'Profit Maximization Consultancy') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-pmc-cream dark:bg-pmc-navy text-pmc-charcoal dark:text-pmc-white antialiased selection:bg-pmc-blue selection:text-white dark:selection:bg-pmc-green dark:selection:text-pmc-navy transition-colors duration-200">
        <div class="relative overflow-hidden">
            <div class="pointer-events-none absolute inset-0 pmc-grid opacity-20 dark:opacity-70"></div>
            <div class="pointer-events-none absolute -top-40 left-1/2 h-[520px] w-[920px] -translate-x-1/2 rounded-full bg-gradient-to-r from-pmc-teal/8 dark:from-pmc-blue/20 via-pmc-emerald/4 dark:via-pmc-green/15 to-transparent blur-3xl"></div>
            <div class="pointer-events-none absolute -bottom-40 right-0 h-[520px] w-[520px] rounded-full bg-gradient-to-tr from-pmc-emerald/4 dark:from-pmc-green/15 via-pmc-teal/4 dark:via-pmc-blue/20 to-transparent blur-3xl"></div>

            <header x-data="{ open:false }" class="relative z-10 border-b border-pmc-silver dark:border-pmc-white/20 bg-pmc-cream dark:bg-pmc-navy backdrop-blur shadow-sm dark:shadow-none">
                <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-2 sm:px-6 lg:px-8">
                    <a href="{{ route('home') }}" class="group inline-flex items-center">
                        <img src="{{ asset('storage/logot.png') }}" alt="Profit Maximization Consultancy Logo" class="h-14 w-auto object-contain transition-transform duration-300 group-hover:scale-105 sm:h-16" />
                    </a>

                    <nav class="hidden items-center gap-7 text-sm text-pmc-steel dark:text-pmc-white/80 md:flex">
                        <a class="hover:text-pmc-charcoal dark:hover:text-pmc-white hover:border-b-2 hover:border-pmc-blue/40 dark:hover:border-pmc-green transition-all font-medium pb-1" href="{{ route('services') }}">Services</a>
                        <a class="hover:text-pmc-charcoal dark:hover:text-pmc-white hover:border-b-2 hover:border-pmc-blue/40 dark:hover:border-pmc-green transition-all font-medium pb-1" href="{{ route('methodology') }}">Methodology</a>
                        <a class="hover:text-pmc-charcoal dark:hover:text-pmc-white hover:border-b-2 hover:border-pmc-blue/40 dark:hover:border-pmc-green transition-all font-medium pb-1" href="{{ route('industries') }}">Industries</a>
                        <a class="hover:text-pmc-charcoal dark:hover:text-pmc-white hover:border-b-2 hover:border-pmc-blue/40 dark:hover:border-pmc-green transition-all font-medium pb-1" href="{{ route('about') }}">Leadership</a>
                        <a class="hover:text-pmc-charcoal dark:hover:text-pmc-white hover:border-b-2 hover:border-pmc-blue/40 dark:hover:border-pmc-green transition-all font-medium pb-1" href="{{ route('faq') }}">FAQ</a>
                        <a class="hover:text-pmc-charcoal dark:hover:text-pmc-white hover:border-b-2 hover:border-pmc-blue/40 dark:hover:border-pmc-green transition-all font-medium pb-1" href="{{ route('contact') }}">Engagement</a>
                    </nav>

                    <div class="hidden items-center gap-3 md:flex">
                        <x-theme-toggle />
                        @auth
                            <a href="{{ route('dashboard') }}" class="rounded-xl border border-pmc-silver dark:border-pmc-white/20 bg-white dark:bg-pmc-white/10 px-4 py-2 text-sm font-medium text-pmc-steel dark:text-pmc-white hover:bg-pmc-slate-light dark:hover:bg-pmc-green/20 hover:border-pmc-blue/30 dark:hover:border-pmc-green/50 transition-all shadow-sm hover:shadow-md">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="rounded-xl border border-pmc-silver dark:border-pmc-white/20 bg-white dark:bg-pmc-white/10 px-4 py-2 text-sm font-medium text-pmc-steel dark:text-pmc-white hover:bg-pmc-slate-light dark:hover:bg-pmc-green/20 hover:border-pmc-blue/30 dark:hover:border-pmc-green/50 transition-all shadow-sm hover:shadow-md">Client Login</a>
                        @endauth
                        <a href="{{ route('contact') }}" class="rounded-xl bg-gradient-to-r from-pmc-blue to-blue-600 dark:from-pmc-green dark:to-pmc-green/80 px-4 py-2 text-sm font-semibold text-white dark:text-pmc-navy shadow-lg hover:shadow-xl hover:opacity-95 transition-all">
                            Schedule a Strategic Dialogue
                        </a>
                    </div>

                    <div class="flex items-center gap-2 md:hidden">
                        <x-theme-toggle />
                        <button type="button" class="inline-flex items-center justify-center rounded-xl border border-pmc-silver dark:border-pmc-white/20 bg-white dark:bg-pmc-white/10 p-2 text-pmc-steel dark:text-pmc-white hover:bg-pmc-slate-light dark:hover:bg-pmc-green/20 transition-colors shadow-sm" @click="open = !open" aria-label="Open menu">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    </div>
                </div>

                <div x-show="open" x-transition class="md:hidden">
                    <div class="mx-auto max-w-7xl space-y-1 px-4 pb-4 text-sm text-pmc-steel dark:text-pmc-white/80 sm:px-6 lg:px-8">
                        <a class="block rounded-lg px-3 py-2 hover:bg-pmc-slate-light dark:hover:bg-pmc-green/20 hover:text-pmc-charcoal dark:hover:text-pmc-white transition-colors font-medium" href="{{ route('services') }}">Services</a>
                        <a class="block rounded-lg px-3 py-2 hover:bg-pmc-slate-light dark:hover:bg-pmc-green/20 hover:text-pmc-charcoal dark:hover:text-pmc-white transition-colors font-medium" href="{{ route('methodology') }}">Methodology</a>
                        <a class="block rounded-lg px-3 py-2 hover:bg-pmc-slate-light dark:hover:bg-pmc-green/20 hover:text-pmc-charcoal dark:hover:text-pmc-white transition-colors font-medium" href="{{ route('industries') }}">Industries</a>
                        <a class="block rounded-lg px-3 py-2 hover:bg-pmc-slate-light dark:hover:bg-pmc-green/20 hover:text-pmc-charcoal dark:hover:text-pmc-white transition-colors font-medium" href="{{ route('about') }}">Leadership</a>
                        <a class="block rounded-lg px-3 py-2 hover:bg-pmc-slate-light dark:hover:bg-pmc-green/20 hover:text-pmc-charcoal dark:hover:text-pmc-white transition-colors font-medium" href="{{ route('faq') }}">FAQ</a>
                        <a class="block rounded-lg px-3 py-2 hover:bg-pmc-slate-light dark:hover:bg-pmc-green/20 hover:text-pmc-charcoal dark:hover:text-pmc-white transition-colors font-medium" href="{{ route('contact') }}">Engagement</a>
                        <div class="mt-3 flex gap-2">
                            @auth
                                <a href="{{ route('dashboard') }}" class="flex-1 rounded-xl border border-pmc-silver dark:border-pmc-white/20 bg-white dark:bg-pmc-white/10 px-4 py-2 text-center font-medium text-pmc-steel dark:text-pmc-white hover:bg-pmc-slate-light dark:hover:bg-pmc-green/20 transition-colors shadow-sm">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="flex-1 rounded-xl border border-pmc-silver dark:border-pmc-white/20 bg-white dark:bg-pmc-white/10 px-4 py-2 text-center font-medium text-pmc-steel dark:text-pmc-white hover:bg-pmc-slate-light dark:hover:bg-pmc-green/20 transition-colors shadow-sm">Client Login</a>
                            @endauth
                            <a href="{{ route('contact') }}" class="flex-1 rounded-xl bg-gradient-to-r from-pmc-teal to-pmc-emerald dark:from-pmc-green dark:to-pmc-green/80 px-4 py-2 text-center font-semibold text-white dark:text-pmc-navy shadow-lg hover:shadow-xl hover:opacity-95 transition-all">Strategic Dialogue</a>
                        </div>
                    </div>
                </div>
            </header>

            <main class="relative z-10">
                {{ $slot }}
            </main>

            <footer class="relative z-10 border-t border-pmc-silver dark:border-pmc-white/20 bg-pmc-cream dark:bg-pmc-navy backdrop-blur shadow-sm dark:shadow-none">
                <div class="mx-auto grid max-w-7xl gap-8 px-4 py-12 text-sm text-pmc-steel dark:text-pmc-white/80 sm:px-6 lg:px-8 md:grid-cols-3">
                    <div>
                        <div class="text-pmc-charcoal dark:text-pmc-white font-semibold">Profit Maximization Consultancy Private Limited</div>
                        <div class="mt-3 text-pmc-steel dark:text-pmc-white/70">
                            C 199/13, Block 14, Gulistan-e-johar, Karachi, Pakistan
                        </div>
                        <div class="mt-4 text-xs text-pmc-steel/80 dark:text-pmc-white/60">
                            We work with a limited number of clients. If we don't see at least a 5–10x return on our fees, we usually don't take the engagement.
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="text-pmc-charcoal dark:text-pmc-white font-semibold">Pages</div>
                        <a class="block hover:text-pmc-charcoal dark:hover:text-pmc-white dark:hover:text-pmc-green transition-colors" href="{{ route('services') }}">Services & Packages</a>
                        <a class="block hover:text-pmc-charcoal dark:hover:text-pmc-white dark:hover:text-pmc-green transition-colors" href="{{ route('methodology') }}">Methodology</a>
                        <a class="block hover:text-pmc-charcoal dark:hover:text-pmc-white dark:hover:text-pmc-green transition-colors" href="{{ route('industries') }}">Industries</a>
                        <a class="block hover:text-pmc-charcoal dark:hover:text-pmc-white dark:hover:text-pmc-green transition-colors" href="{{ route('about') }}">Leadership</a>
                        <a class="block hover:text-pmc-charcoal dark:hover:text-pmc-white dark:hover:text-pmc-green transition-colors" href="{{ route('faq') }}">FAQ</a>
                        <a class="block hover:text-pmc-charcoal dark:hover:text-pmc-white dark:hover:text-pmc-green transition-colors" href="{{ route('contact') }}">Contact & Engagement</a>
                    </div>
                    <div class="space-y-2">
                        <div class="text-pmc-charcoal dark:text-pmc-white font-semibold">Secure Access</div>
                        @auth
                            <a class="block hover:text-pmc-charcoal dark:hover:text-pmc-white dark:hover:text-pmc-green transition-colors" href="{{ route('dashboard') }}">Dashboard</a>
                        @else
                            <a class="block hover:text-pmc-charcoal dark:hover:text-pmc-white dark:hover:text-pmc-green transition-colors" href="{{ route('login') }}">Client Login</a>
                        @endauth
                        <div class="pt-3 text-xs text-pmc-steel/80 dark:text-pmc-white/60">
                            Confidential by design. Secure portals, controlled access, and board-ready reporting.
                        </div>
                    </div>
                </div>
                <div class="border-t border-pmc-silver dark:border-pmc-white/20 py-6 text-center text-xs text-pmc-steel/80 dark:text-pmc-white/60">
                    © {{ date('Y') }} Profit Maximization Consultancy Private Limited. All rights reserved.
                </div>
            </footer>
        </div>
    </body>
</html>

