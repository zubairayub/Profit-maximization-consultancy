<x-marketing-layout :title="'Services & Packages — Profit Maximization Consultancy'">
    <section class="border-b border-pmc-silver/80 dark:border-white/10 bg-gradient-to-b from-pmc-navy-light via-pmc-blue-tint/20 to-white dark:from-black/10 dark:via-black/10 dark:to-black/10">
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <h1 class="pmc-fade-in-up text-3xl font-semibold text-pmc-charcoal dark:text-white">Services & Packages</h1>
            <p class="pmc-fade-in-up pmc-delay-100 mt-3 max-w-3xl text-gray-700 dark:text-slate-200">
                Our retainers are structured around outcomes: visibility → optimization → enterprise-scale strategic finance.
                Fees are denominated in <span class="font-semibold text-gray-900 dark:text-white pmc-gradient-text">USD</span> and anchored to value creation, not hours.
            </p>
        </div>
    </section>

    <section class="border-b border-pmc-silver/80 dark:border-white/10 bg-gradient-to-b from-white via-pmc-slate-light/50 to-white dark:from-transparent dark:via-transparent dark:to-transparent">
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <div class="flex justify-center">
                <div class="w-full max-w-2xl">
                    @foreach ([
                        [
                            'tier' => 'Gold',
                            'range' => '$1,000,000 / year',
                            'bestFor' => 'Global 500, Fortune & Top-1000 organizations seeking cost reduction, profit recovery & turnaround consulting',
                            'roi' => 'Enterprise-wide cost reduction, profit recovery, EBITDA improvement, and turnaround advisory',
                            'services' => [
                                'Enterprise-wide cost diagnostics and profit leakage identification',
                                'Cost reduction and cost transformation strategies',
                                'Turnaround and restructuring advisory',
                                'Profit recovery and EBITDA improvement initiatives',
                                'Working capital and cash flow optimization',
                                'Financial and management performance analysis',
                                'Strategic cost management and value-chain analysis',
                                'KPI design, performance monitoring, and reporting',
                                'CFO-level strategic and financial advisory support',
                                'Value Chain Analysis & Cost Driver Analysis',
                                'Activity-Based Costing (ABC)',
                                'Contribution and margin analysis',
                                'Internal controls & governance strengthening',
                                'ERP and finance function optimization',
                            ],
                            'outcome' => [
                                'Elimination of profit leakage from operational, financial, commercial, and manufacturing inefficiencies',
                                'Intelligent cost reduction and structural inefficiency elimination',
                                'Cash-flow and working capital recovery',
                                'Turnaround and realignment strategies',
                                'Sustainable EBITDA improvement',
                                'Long-term financial sustainability',
                            ],
                            'justified' => [
                                'Retainer-based and performance-oriented consultancy aligned with financial impact',
                                'Independent advisor working closely with Boards, CEOs, and CFOs',
                                'Enterprise-wide cost and value focus',
                                'Proven cost management frameworks',
                                'Performance-linked, results-oriented approach',
                                'Payment: 50% advance (USD 500,000) + 50% quarterly/milestone-based',
                            ],
                            'successFee' => true,
                        ],
                    ] as $index => $pkg)
                    <div class="pmc-card-reveal pmc-hover-lift rounded-3xl border border-gray-200 dark:border-white/10 bg-gradient-to-b from-gray-50 dark:from-white/10 to-transparent p-1 transition-all hover:border-pmc-blue/30">
                        <div x-data="{ tab: 'services' }" class="rounded-[22px] bg-white dark:bg-white/5 p-7">
                            <div class="flex items-center justify-between">
                                <div class="text-sm font-semibold text-gray-900 dark:text-white">{{ $pkg['tier'] }} Package</div>
                                @if ($pkg['successFee'])
                                    <div class="pmc-pulse rounded-full bg-pmc-green/20 dark:bg-pmc-green/30 px-3 py-1 text-xs font-semibold text-pmc-green dark:text-pmc-green">Retainer-Based & Performance-Oriented</div>
                                @endif
                            </div>

                            <div class="mt-4">
                                <div class="text-xs text-gray-500 dark:text-slate-400">USD</div>
                                <div class="mt-1 text-xl font-semibold text-gray-900 dark:text-white pmc-gradient-text">{{ $pkg['range'] }}</div>
                            </div>

                            <div class="mt-5 text-sm text-gray-600 dark:text-slate-300">
                                <div class="text-xs font-semibold text-gray-700 dark:text-slate-200">Best for</div>
                                <div class="mt-1">{{ $pkg['bestFor'] }}</div>
                            </div>

                            <div class="mt-6 flex gap-2 rounded-2xl border border-gray-200 dark:border-white/10 bg-gray-50 dark:bg-black/10 p-2 text-xs font-semibold">
                                <button type="button" class="flex-1 rounded-xl px-3 py-2 transition-colors" :class="tab === 'services' ? 'bg-gray-100 dark:bg-white/10 text-gray-900 dark:text-white' : 'text-gray-600 dark:text-slate-300 hover:text-gray-900 dark:hover:text-white'" @click="tab = 'services'">
                                    Key Services
                                </button>
                                <button type="button" class="flex-1 rounded-xl px-3 py-2 transition-colors" :class="tab === 'outcome' ? 'bg-gray-100 dark:bg-white/10 text-gray-900 dark:text-white' : 'text-gray-600 dark:text-slate-300 hover:text-gray-900 dark:hover:text-white'" @click="tab = 'outcome'">
                                    Outcome
                                </button>
                            </div>

                            <div class="mt-5">
                                <ul x-show="tab === 'services'" x-transition class="space-y-2 text-sm text-gray-700 dark:text-slate-200">
                                    @foreach ($pkg['services'] as $s)
                                        <li class="flex gap-2">
                                            <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-pmc-blue"></span>
                                            <span>{{ $s }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                                <ul x-show="tab === 'outcome'" x-transition class="space-y-2 text-sm text-gray-700 dark:text-slate-200">
                                    @foreach ($pkg['outcome'] as $o)
                                        <li class="flex gap-2">
                                            <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-pmc-blue"></span>
                                            <span>✔ {{ $o }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="mt-6 rounded-2xl border border-gray-200 dark:border-white/10 bg-white dark:bg-white/5 p-5">
                                <div class="text-xs font-semibold text-gray-900 dark:text-white">Why this pricing is justified</div>
                                <ul class="mt-3 space-y-2 text-sm text-gray-700 dark:text-slate-200">
                                    @foreach ($pkg['justified'] as $j)
                                        <li class="flex gap-2">
                                            <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-gray-400 dark:bg-white/60"></span>
                                            <span>{{ $j }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="mt-6 rounded-2xl border border-gray-200 dark:border-white/10 bg-gray-50 dark:bg-black/10 p-5 text-sm text-gray-700 dark:text-slate-200">
                                <div class="text-xs font-semibold text-gray-900 dark:text-white">Typical ROI</div>
                                <div class="mt-1">{{ $pkg['roi'] }}</div>
                            </div>

                            <div class="mt-6">
                                <a href="{{ route('contact') }}" class="pmc-btn-primary pmc-hover-lift inline-flex w-full items-center justify-center rounded-xl bg-gradient-to-r from-pmc-blue to-blue-600 px-4 py-2.5 text-sm font-semibold text-white dark:text-pmc-navy shadow-lg transition-all hover:shadow-xl hover:scale-105">
                                    <span>Initiate Engagement Proposal</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-2 lg:items-start">
                <div>
                    <h2 class="pmc-fade-in-left text-2xl font-semibold text-gray-900 dark:text-white">Success-based fees</h2>
                    <p class="pmc-fade-in-left pmc-delay-100 mt-3 text-gray-700 dark:text-slate-200">
                        <span class="font-semibold text-gray-900 dark:text-white pmc-gradient-text">8% – 20%</span> of incremental profit improvement (mandatory for elite positioning).
                        This aligns incentives: executives get measurable outcomes; we get paid for value created.
                    </p>
                    <ul class="pmc-fade-in-left pmc-delay-200 mt-6 space-y-2 text-sm text-gray-700 dark:text-slate-200">
                        <li class="pmc-card-reveal flex gap-2" style="animation-delay: 300ms"><span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-pmc-blue pmc-pulse"></span> CEOs love alignment</li>
                        <li class="pmc-card-reveal flex gap-2" style="animation-delay: 400ms"><span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-pmc-blue pmc-pulse"></span> Positions us as partner, not vendor</li>
                        <li class="pmc-card-reveal flex gap-2" style="animation-delay: 500ms"><span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-pmc-blue pmc-pulse"></span> Reinforces board-level accountability</li>
                    </ul>
                </div>
                <div class="pmc-fade-in-right pmc-scale-in rounded-3xl border border-gray-200 dark:border-white/10 bg-gradient-to-b from-gray-50 dark:from-white/10 to-transparent p-1">
                    <div class="rounded-[22px] bg-white dark:bg-white/5 p-7">
                        <div class="text-sm font-semibold text-gray-900 dark:text-white">Example</div>
                        <div class="mt-3 text-gray-700 dark:text-slate-200">
                            Client improves profit by <span class="font-semibold text-gray-900 dark:text-white pmc-gradient-text">$5,000,000</span>
                            → Success fee = <span class="font-semibold text-gray-900 dark:text-white pmc-gradient-text">$400,000 – $1,000,000</span>
                        </div>
                        <div class="mt-5 rounded-2xl border border-gray-200 dark:border-white/10 bg-gray-50 dark:bg-black/10 p-5 text-sm text-gray-700 dark:text-slate-200 pmc-hover-glow">
                            Our standard model is: retainer + measurable impact + governance cadence.
                        </div>
                        <div class="mt-6">
                            <a href="{{ route('contact') }}" class="pmc-btn-primary pmc-hover-lift inline-flex w-full items-center justify-center rounded-xl bg-gradient-to-r from-pmc-blue to-blue-600 px-4 py-2.5 text-sm font-semibold text-white dark:text-pmc-navy shadow-lg transition-all hover:shadow-xl hover:scale-105">
                                <span>Request a confidential discussion</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-marketing-layout>

