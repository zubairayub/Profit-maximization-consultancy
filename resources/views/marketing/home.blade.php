<x-marketing-layout :title="'Profit Maximization Consultancy — Turning Financial Insight into Profitable Action'">
    <section class="relative overflow-hidden">
        <div class="mx-auto max-w-7xl px-4 pt-16 pb-14 sm:px-6 lg:px-8 lg:pt-24">
            <div class="grid gap-8 lg:grid-cols-2 lg:items-start lg:gap-12">
                <div class="max-w-3xl">
                    <div class="pmc-fade-in inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-2 text-xs text-slate-200 pmc-hover-glow">
                        <span class="h-2 w-2 rounded-full bg-pmc-emerald pmc-pulse"></span>
                        Boardroom-level profit advisory for elite enterprises
                    </div>

                    <h1 class="pmc-fade-in-up pmc-delay-100 mt-6 text-4xl font-semibold tracking-tight text-white sm:text-5xl">
                        Maximizing Sustainable Profit Growth for Elite Enterprises
                    </h1>

                    <p class="pmc-fade-in-up pmc-delay-200 mt-5 text-lg text-slate-200">
                        <span class="font-semibold text-white pmc-gradient-text">Turning Financial Insight into Profitable Action.</span>
                        We operate as strategic advisors to CEOs, CFOs, and boards—aligning governance, performance, and execution to unlock measurable profit impact.
                    </p>

                    <div class="pmc-fade-in-up pmc-delay-300 mt-8 flex flex-col gap-3 sm:flex-row sm:items-center">
                        <a href="{{ route('contact') }}" class="pmc-btn-primary pmc-hover-lift inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-pmc-teal to-pmc-emerald px-5 py-3 text-sm font-semibold text-pmc-navy shadow-lg hover:shadow-xl hover:scale-105">
                            <span>Schedule a Strategic Dialogue</span>
                        </a>
                        <a href="{{ route('services') }}" class="pmc-hover-lift inline-flex items-center justify-center rounded-xl border border-white/10 bg-white/5 px-5 py-3 text-sm font-medium text-white transition-all hover:bg-white/10 hover:border-white/20">
                            Explore Packages
                        </a>
                    </div>

                    <div class="pmc-fade-in-up pmc-delay-400 mt-10 rounded-2xl border border-white/10 bg-white/5 p-6 text-sm text-slate-200 pmc-hover-glow">
                        <div class="text-white font-semibold">Limited engagements. Non-negotiable ROI discipline.</div>
                        <div class="mt-2">
                            "We work with a limited number of clients. If we don't see at least a 5–10x return on our fees, we usually don't take the engagement."
                        </div>
                    </div>
                </div>

                <div class="pointer-events-none hidden lg:block">
                    <div class="pmc-fade-in-right pmc-delay-200 pmc-float h-[420px] w-full max-w-xl rounded-3xl border border-white/10 bg-gradient-to-br from-white/10 via-white/5 to-transparent p-1">
                        <div class="h-full rounded-[22px] bg-gradient-to-br from-pmc-teal/15 via-white/5 to-pmc-emerald/10 p-6 pmc-shimmer">
                            <div class="flex items-center justify-between text-xs text-slate-200">
                                <span class="font-semibold text-white">Executive Performance Console</span>
                                <span class="rounded-full bg-white/10 px-3 py-1 pmc-pulse">Board-ready</span>
                            </div>
                            <div class="mt-6 grid grid-cols-2 gap-4 text-sm">
                                <div class="pmc-card-reveal rounded-2xl border border-white/10 bg-white/5 p-4 pmc-hover-scale transition-all hover:border-pmc-teal/30">
                                    <div class="text-slate-300">Margin Signal</div>
                                    <div class="mt-2 text-2xl font-semibold text-white">↑ 5–10%</div>
                                    <div class="mt-1 text-xs text-slate-400">EBITDA improvement potential</div>
                                </div>
                                <div class="pmc-card-reveal pmc-delay-100 rounded-2xl border border-white/10 bg-white/5 p-4 pmc-hover-scale transition-all hover:border-pmc-emerald/30">
                                    <div class="text-slate-300">Leakage Found</div>
                                    <div class="mt-2 text-2xl font-semibold text-white">2–5%</div>
                                    <div class="mt-1 text-xs text-slate-400">Typical in first 60 days</div>
                                </div>
                                <div class="pmc-card-reveal pmc-delay-200 col-span-2 rounded-2xl border border-white/10 bg-white/5 p-4 pmc-hover-scale transition-all hover:border-pmc-teal/30">
                                    <div class="flex items-center justify-between">
                                        <div class="text-slate-300">Value Creation Alignment</div>
                                        <div class="text-xs text-slate-400">Success-based fees</div>
                                    </div>
                                    <div class="mt-3 h-2 overflow-hidden rounded-full bg-white/10">
                                        <div class="h-full w-2/3 rounded-full bg-gradient-to-r from-pmc-teal to-pmc-emerald transition-all duration-1000 ease-out"></div>
                                    </div>
                                    <div class="mt-2 text-xs text-slate-400">8%–20% of incremental profit improvement</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="border-t border-white/10 bg-black/10">
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-2 lg:items-start">
                <div>
                    <h2 class="pmc-fade-in-left text-2xl font-semibold text-white">The problem is rarely "finance."</h2>
                    <p class="pmc-fade-in-left pmc-delay-100 mt-3 text-slate-200">
                        In elite organizations, profit erosion is usually hidden in execution detail—fragmented visibility, margin drift, and decision cycles that don't match the market.
                    </p>
                    <div class="mt-7 grid gap-4 sm:grid-cols-2">
                        @foreach ([
                            ['Rising costs', 'Structural cost inflation, weak control loops, and silent spend creep.'],
                            ['Margin pressure', 'Pricing drift, product mix dilution, and unmanaged leakage.'],
                            ['Poor financial visibility', 'MIS that informs late, not early; dashboards without decisions.'],
                            ['Inefficient processes', 'Process friction that compounds across scale and geography.'],
                        ] as $index => [$title, $desc])
                            <div class="pmc-card-reveal pmc-hover-lift rounded-2xl border border-white/10 bg-white/5 p-5 transition-all hover:border-pmc-teal/30" style="animation-delay: {{ ($index + 1) * 100 }}ms">
                                <div class="text-white font-semibold">{{ $title }}</div>
                                <div class="mt-2 text-sm text-slate-300">{{ $desc }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="pmc-fade-in-right pmc-scale-in rounded-3xl border border-white/10 bg-gradient-to-b from-white/10 to-transparent p-1">
                    <div class="rounded-[22px] bg-white/5 p-8">
                        <div class="text-sm font-semibold text-white">Value delivered (typical)</div>

                        <div class="mt-6 grid gap-4">
                            <div x-data="pmcCounter({ to: 5, suffix: '%', label: 'Profit leakage identified in first 60 days (typical range: 2–5%)' })" x-init="init()" class="pmc-card-reveal pmc-hover-glow rounded-2xl border border-white/10 bg-white/5 p-5 transition-all hover:border-pmc-emerald/30">
                                <div class="text-3xl font-semibold text-white"><span x-text="value"></span></div>
                                <div class="mt-1 text-sm text-slate-300" x-text="label"></div>
                            </div>
                            <div x-data="pmcCounter({ to: 10, suffix: '%', label: 'EBITDA improvement potential (typical range: 5–10%)' })" x-init="init()" class="pmc-card-reveal pmc-delay-100 pmc-hover-glow rounded-2xl border border-white/10 bg-white/5 p-5 transition-all hover:border-pmc-emerald/30">
                                <div class="text-3xl font-semibold text-white"><span x-text="value"></span></div>
                                <div class="mt-1 text-sm text-slate-300" x-text="label"></div>
                            </div>
                            <div x-data="pmcCounter({ to: 10, suffix: 'x', label: 'Return expectation on our fees before we accept an engagement' })" x-init="init()" class="pmc-card-reveal pmc-delay-200 pmc-hover-glow rounded-2xl border border-white/10 bg-white/5 p-5 transition-all hover:border-pmc-emerald/30">
                                <div class="text-3xl font-semibold text-white"><span x-text="value"></span></div>
                                <div class="mt-1 text-sm text-slate-300" x-text="label"></div>
                            </div>
                        </div>

                        <div class="mt-6 text-xs text-slate-400">
                            Pricing is value-led (USD), with alignment through a mandatory success fee on select tiers.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="border-t border-white/10">
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <div class="flex items-end justify-between gap-6">
                <div>
                    <h2 class="pmc-fade-in-left text-2xl font-semibold text-white">Service packages</h2>
                    <p class="pmc-fade-in-left pmc-delay-100 mt-2 text-slate-200">A structured path from visibility to optimization to enterprise-scale CFO advisory.</p>
                </div>
                <a class="pmc-fade-in-right pmc-hover-scale hidden text-sm font-medium text-slate-200 transition-all hover:text-white md:inline-flex" href="{{ route('services') }}">
                    View full breakdown →
                </a>
            </div>

            <div class="mt-10 grid gap-6 lg:grid-cols-3">
                @foreach ([
                    [
                        'name' => 'Silver',
                        'price' => '$7,500 – $12,000 / month',
                        'bestFor' => 'Companies needing better control, reporting, cost visibility',
                        'roi' => 'Identifies 2–5% profit leakage in first 60 days',
                        'badge' => null,
                    ],
                    [
                        'name' => 'Gold',
                        'price' => '$18,000 – $30,000 / month',
                        'bestFor' => 'Growth-focused companies aiming to improve margins',
                        'roi' => '5–10% EBITDA improvement, pays back within 90 days',
                        'badge' => 'Success-Based Fees',
                    ],
                    [
                        'name' => 'Platinum',
                        'price' => '$40,000 – $75,000 / month',
                        'bestFor' => 'Large corporations, groups & listed companies',
                        'roi' => 'Enterprise governance + board-level cadence',
                        'badge' => 'Success-Based Fees',
                    ],
                ] as $index => $p)
                    <div class="pmc-card-reveal pmc-hover-lift group relative rounded-3xl border border-white/10 bg-gradient-to-b from-white/10 to-transparent p-1 transition-all hover:border-pmc-teal/30" style="animation-delay: {{ ($index + 1) * 150 }}ms">
                        <div class="rounded-[22px] bg-white/5 p-7">
                            <div class="flex items-center justify-between">
                                <div class="text-sm font-semibold text-white">{{ $p['name'] }} Package</div>
                                @if ($p['badge'])
                                    <div class="pmc-pulse rounded-full bg-pmc-emerald/15 px-3 py-1 text-xs font-semibold text-pmc-emerald">{{ $p['badge'] }}</div>
                                @endif
                            </div>

                            <div class="mt-4 text-slate-200">
                                <div class="text-xs text-slate-400">USD</div>
                                <div class="mt-1 text-xl font-semibold text-white pmc-gradient-text">{{ $p['price'] }}</div>
                            </div>

                            <div class="mt-5 text-sm text-slate-300">
                                <div class="text-xs font-semibold text-slate-200">Best for</div>
                                <div class="mt-1">{{ $p['bestFor'] }}</div>
                            </div>

                            <div class="mt-5 rounded-2xl border border-white/10 bg-black/10 p-4 text-sm text-slate-200">
                                <div class="text-xs font-semibold text-white">Typical ROI</div>
                                <div class="mt-1">{{ $p['roi'] }}</div>
                            </div>

                            <div class="mt-6 flex items-center gap-3">
                                <a href="{{ route('services') }}" class="pmc-hover-scale inline-flex flex-1 items-center justify-center rounded-xl border border-white/10 bg-white/5 px-4 py-2 text-sm font-medium text-white transition-all hover:bg-white/10 hover:border-white/20">
                                    Compare details
                                </a>
                                <a href="{{ route('contact') }}" class="pmc-btn-primary pmc-hover-lift inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-pmc-teal to-pmc-emerald px-4 py-2 text-sm font-semibold text-pmc-navy shadow-lg transition-all hover:shadow-xl hover:scale-105">
                                    <span>Engage</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</x-marketing-layout>

