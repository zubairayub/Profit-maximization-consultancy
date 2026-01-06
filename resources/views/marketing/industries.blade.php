<x-marketing-layout :title="'Industries — Profit Maximization Consultancy'">
    <section class="border-b border-white/10 bg-black/10">
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <h1 class="pmc-fade-in-up text-3xl font-semibold text-white">Industries We Serve</h1>
            <p class="pmc-fade-in-up pmc-delay-100 mt-3 max-w-3xl text-slate-200">
                We specialize in sectors where margin discipline, working capital rigor, and operational efficiency directly determine enterprise valuation.
            </p>
        </div>
    </section>

    <section>
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ([
                    ['Manufacturing', 'Yield drift, overhead absorption, and process variance', 'Cost-to-serve clarity + control loops to protect margin.'],
                    ['Textile & Apparel', 'Volatility in input costs and pricing pressure', 'Margin model + working capital discipline across cycles.'],
                    ['FMCG', 'Complex mix, trade spend leakage, and channel efficiency', 'Profitability segmentation + KPI governance for scale.'],
                    ['Trading & Distribution', 'Inventory drag and fragmented profitability', 'Cash conversion acceleration + pricing discipline.'],
                    ['Services', 'Utilization, scope creep, and weak KPI accountability', 'Board-ready dashboards + operating cadence.'],
                ] as $index => [$name, $challenge, $solution])
                    <div class="pmc-card-reveal pmc-hover-lift group relative overflow-hidden rounded-3xl border border-white/10 bg-gradient-to-b from-white/10 to-transparent p-1 transition-all hover:border-pmc-teal/30" style="animation-delay: {{ ($index + 1) * 150 }}ms">
                        <div class="relative h-full rounded-[22px] bg-white/5 p-7">
                            <div class="text-lg font-semibold text-white pmc-gradient-text">{{ $name }}</div>
                            <div class="mt-3 text-sm text-slate-300">
                                <div class="text-xs font-semibold text-slate-200">Typical challenges</div>
                                <div class="mt-1">{{ $challenge }}</div>
                            </div>
                            <div class="mt-5 rounded-2xl border border-white/10 bg-black/10 p-5 text-sm text-slate-200 pmc-hover-glow">
                                <div class="text-xs font-semibold text-white">How we solve</div>
                                <div class="mt-1">{{ $solution }}</div>
                                <div class="mt-3 text-xs text-slate-400">Example metric: <span class="pmc-gradient-text font-semibold">2–5% leakage</span> surfaced early; <span class="pmc-gradient-text font-semibold">5–10% EBITDA</span> uplift potential.</div>
                            </div>
                            <div class="mt-6">
                                <a href="{{ route('contact') }}" class="pmc-hover-scale inline-flex items-center text-sm font-semibold text-pmc-emerald transition-all hover:text-white">
                                    Initiate a confidential discussion →
                                </a>
                            </div>
                        </div>
                        <div class="pointer-events-none absolute inset-0 opacity-0 transition-all duration-300 group-hover:opacity-100">
                            <div class="absolute inset-0 bg-gradient-to-br from-pmc-teal/15 via-transparent to-pmc-emerald/10"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-marketing-layout>

