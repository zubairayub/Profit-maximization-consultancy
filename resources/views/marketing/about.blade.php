<x-marketing-layout :title="'Leadership — Profit Maximization Consultancy'">
    <section class="border-b border-white/10 bg-black/10">
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <h1 class="pmc-fade-in-up text-3xl font-semibold text-white">Leadership</h1>
            <p class="pmc-fade-in-up pmc-delay-100 mt-3 max-w-3xl text-slate-200">
                We combine accounting, finance, tax, and strategy into one board-level discipline:
                <span class="font-semibold text-white pmc-gradient-text">maximizing sustainable profits</span> with governance-grade execution.
            </p>
        </div>
    </section>

    <section class="border-b border-white/10">
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ([
                    ['Syed Aamir', 'Chairman & Chief Executive Officer', 'Profit is not a metric. It is an operating system.'],
                    ['Aleena Kamaal Khan', 'Chief Operation Officer', 'Discipline is the highest form of strategy.'],
                    ['Engineer Syed Ishaque', 'Regional Director Middle East', 'Board-ready insight must translate into action.'],
                    ['Engineer Asim Mahmood Shah', 'Regional Director USA', 'Value creation is engineered—measured, governed, delivered.'],
                    ['Syed Abdullah', 'Director Marketing', 'Positioning is a strategic asset when it is credible.'],
                ] as $index => [$name, $title, $quote])
                    @php
                        $initials = collect(explode(' ', $name))->map(fn ($p) => mb_substr($p, 0, 1))->take(2)->join('');
                    @endphp
                    <div class="pmc-card-reveal pmc-hover-lift group rounded-3xl border border-white/10 bg-gradient-to-b from-white/10 to-transparent p-1 transition-all hover:border-pmc-emerald/30" style="animation-delay: {{ ($index + 1) * 150 }}ms">
                        <div class="h-full rounded-[22px] bg-white/5 p-7">
                            <div class="flex items-center gap-4">
                                <div class="pmc-hover-scale pmc-glow grid h-14 w-14 place-items-center rounded-2xl bg-gradient-to-br from-pmc-teal to-pmc-emerald text-lg font-semibold text-pmc-navy transition-all hover:scale-110">
                                    {{ $initials }}
                                </div>
                                <div>
                                    <div class="text-white font-semibold">{{ $name }}</div>
                                    <div class="text-sm text-slate-300">{{ $title }}</div>
                                </div>
                            </div>
                            <div class="mt-6 rounded-2xl border border-white/10 bg-black/10 p-5 text-sm text-slate-200 opacity-90 transition-all group-hover:opacity-100 group-hover:border-pmc-teal/30">
                                <div class="text-xs font-semibold text-white">Philosophy on Profit Maximization</div>
                                <div class="mt-2">"{{ $quote }}"</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section>
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <div class="pmc-fade-in-up pmc-hover-glow rounded-3xl border border-white/10 bg-white/5 p-8 transition-all">
                <div class="text-sm font-semibold text-white">Registered Address</div>
                <div class="mt-2 text-slate-200">
                    C 199/13, Block 14, Gulistan-e-johar, Karachi, Pakistan
                </div>
            </div>
        </div>
    </section>
</x-marketing-layout>

