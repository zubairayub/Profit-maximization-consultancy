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
    <body class="min-h-screen bg-pmc-navy text-slate-100 antialiased selection:bg-pmc-emerald selection:text-pmc-navy">
        <div class="relative overflow-hidden">
            <div class="pointer-events-none absolute inset-0 pmc-grid opacity-70"></div>
            <div class="pointer-events-none absolute -top-40 left-1/2 h-[520px] w-[920px] -translate-x-1/2 rounded-full bg-gradient-to-r from-pmc-teal/25 via-pmc-emerald/10 to-transparent blur-3xl"></div>
            <div class="pointer-events-none absolute -bottom-40 right-0 h-[520px] w-[520px] rounded-full bg-gradient-to-tr from-pmc-emerald/10 via-pmc-teal/10 to-transparent blur-3xl"></div>

            <header x-data="{ open:false }" class="relative z-10 border-b border-white/10 bg-pmc-navy/70 backdrop-blur">
                <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
                    <a href="{{ route('home') }}" class="group inline-flex items-center gap-3">
                        <span class="grid h-10 w-10 place-items-center rounded-xl bg-gradient-to-br from-pmc-teal to-pmc-emerald text-sm font-semibold text-pmc-navy shadow-[0_0_0_1px_rgba(255,255,255,0.08)]">
                            PM
                        </span>
                        <span class="leading-tight">
                            <span class="block text-sm font-semibold tracking-wide text-white">Profit Maximization Consultancy</span>
                            <span class="block text-xs text-slate-300">Turning Financial Insight into Profitable Action</span>
                        </span>
                    </a>

                    <nav class="hidden items-center gap-7 text-sm text-slate-200 md:flex">
                        <a class="hover:text-white" href="{{ route('services') }}">Services</a>
                        <a class="hover:text-white" href="{{ route('methodology') }}">Methodology</a>
                        <a class="hover:text-white" href="{{ route('industries') }}">Industries</a>
                        <a class="hover:text-white" href="{{ route('about') }}">Leadership</a>
                        <a class="hover:text-white" href="{{ route('contact') }}">Engagement</a>
                    </nav>

                    <div class="hidden items-center gap-3 md:flex">
                        @auth
                            <a href="{{ route('dashboard') }}" class="rounded-xl border border-white/10 bg-white/5 px-4 py-2 text-sm font-medium text-white hover:bg-white/10">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="rounded-xl border border-white/10 bg-white/5 px-4 py-2 text-sm font-medium text-white hover:bg-white/10">Client Login</a>
                        @endauth
                        <a href="{{ route('contact') }}" class="rounded-xl bg-gradient-to-r from-pmc-teal to-pmc-emerald px-4 py-2 text-sm font-semibold text-pmc-navy shadow hover:opacity-95">
                            Schedule a Strategic Dialogue
                        </a>
                    </div>

                    <button type="button" class="inline-flex items-center justify-center rounded-xl border border-white/10 bg-white/5 p-2 text-white hover:bg-white/10 md:hidden" @click="open = !open" aria-label="Open menu">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <div x-show="open" x-transition class="md:hidden">
                    <div class="mx-auto max-w-7xl space-y-1 px-4 pb-4 text-sm text-slate-200 sm:px-6 lg:px-8">
                        <a class="block rounded-lg px-3 py-2 hover:bg-white/5 hover:text-white" href="{{ route('services') }}">Services</a>
                        <a class="block rounded-lg px-3 py-2 hover:bg-white/5 hover:text-white" href="{{ route('methodology') }}">Methodology</a>
                        <a class="block rounded-lg px-3 py-2 hover:bg-white/5 hover:text-white" href="{{ route('industries') }}">Industries</a>
                        <a class="block rounded-lg px-3 py-2 hover:bg-white/5 hover:text-white" href="{{ route('about') }}">Leadership</a>
                        <a class="block rounded-lg px-3 py-2 hover:bg-white/5 hover:text-white" href="{{ route('contact') }}">Engagement</a>
                        <div class="mt-3 flex gap-2">
                            @auth
                                <a href="{{ route('dashboard') }}" class="flex-1 rounded-xl border border-white/10 bg-white/5 px-4 py-2 text-center font-medium text-white hover:bg-white/10">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="flex-1 rounded-xl border border-white/10 bg-white/5 px-4 py-2 text-center font-medium text-white hover:bg-white/10">Client Login</a>
                            @endauth
                            <a href="{{ route('contact') }}" class="flex-1 rounded-xl bg-gradient-to-r from-pmc-teal to-pmc-emerald px-4 py-2 text-center font-semibold text-pmc-navy shadow hover:opacity-95">Strategic Dialogue</a>
                        </div>
                    </div>
                </div>
            </header>

            <main class="relative z-10">
                {{ $slot }}
            </main>

            <footer class="relative z-10 border-t border-white/10 bg-pmc-navy/70 backdrop-blur">
                <div class="mx-auto grid max-w-7xl gap-8 px-4 py-12 text-sm text-slate-300 sm:px-6 lg:px-8 md:grid-cols-3">
                    <div>
                        <div class="text-white font-semibold">Profit Maximization Consultancy Private Limited</div>
                        <div class="mt-3 text-slate-300/90">
                            C 199/13, Block 14, Gulistan-e-johar, Karachi, Pakistan
                        </div>
                        <div class="mt-4 text-xs text-slate-400">
                            We work with a limited number of clients. If we don't see at least a 5–10x return on our fees, we usually don't take the engagement.
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="text-white font-semibold">Pages</div>
                        <a class="block hover:text-white" href="{{ route('services') }}">Services & Packages</a>
                        <a class="block hover:text-white" href="{{ route('methodology') }}">Methodology</a>
                        <a class="block hover:text-white" href="{{ route('industries') }}">Industries</a>
                        <a class="block hover:text-white" href="{{ route('about') }}">Leadership</a>
                        <a class="block hover:text-white" href="{{ route('contact') }}">Contact & Engagement</a>
                    </div>
                    <div class="space-y-2">
                        <div class="text-white font-semibold">Secure Access</div>
                        @auth
                            <a class="block hover:text-white" href="{{ route('dashboard') }}">Dashboard</a>
                        @else
                            <a class="block hover:text-white" href="{{ route('login') }}">Client Login</a>
                        @endauth
                        <div class="pt-3 text-xs text-slate-400">
                            Confidential by design. Secure portals, controlled access, and board-ready reporting.
                        </div>
                    </div>
                </div>
                <div class="border-t border-white/10 py-6 text-center text-xs text-slate-400">
                    © {{ date('Y') }} Profit Maximization Consultancy Private Limited. All rights reserved.
                </div>
            </footer>
        </div>
    </body>
</html>

