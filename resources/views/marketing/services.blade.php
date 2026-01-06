<x-marketing-layout :title="'Services & Packages — Profit Maximization Consultancy'">
    <section class="border-b border-white/10 bg-black/10">
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <h1 class="pmc-fade-in-up text-3xl font-semibold text-white">Services & Packages</h1>
            <p class="pmc-fade-in-up pmc-delay-100 mt-3 max-w-3xl text-slate-200">
                Our retainers are structured around outcomes: visibility → optimization → enterprise-scale strategic finance.
                Fees are denominated in <span class="font-semibold text-white pmc-gradient-text">USD</span> and anchored to value creation, not hours.
            </p>
        </div>
    </section>

    <section class="border-b border-white/10">
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <div class="grid gap-6 lg:grid-cols-3">
                @foreach ([
                    [
                        'tier' => 'Silver',
                        'range' => '$7,500 – $12,000 / month',
                        'bestFor' => 'Companies needing better control, reporting, cost visibility',
                        'roi' => 'Identifies 2–5% profit leakage in first 60 days',
                        'services' => [
                            'Financial Health Check (One-time)',
                            'Review of Financial Statements & MIS',
                            'Cost Structure Analysis',
                            'Budget vs Actual Variance Analysis',
                            'Cash Flow & Working Capital Review',
                            'Basic Tax & Compliance Review',
                            'Monthly Management Report (Executive Summary)',
                        ],
                        'outcome' => [
                            'Improved financial transparency',
                            'Identification of cost leakages',
                            'Better decision-making data',
                        ],
                        'justified' => [
                            'Structured executive reporting and control loops',
                            'Rapid leakage identification and remediation plan',
                            'Decision-ready visibility, not raw data',
                        ],
                        'successFee' => false,
                    ],
                    [
                        'tier' => 'Gold',
                        'range' => '$18,000 – $30,000 / month',
                        'bestFor' => 'Growth-focused companies aiming to improve margins',
                        'roi' => '5–10% EBITDA improvement, pays back within 90 days',
                        'services' => [
                            'Includes Silver Package +',
                            'Detailed Profitability Analysis (Product/Customer/Department-wise)',
                            'Pricing & Margin Optimization',
                            'Cost Reduction & Process Efficiency Audit',
                            'Budgeting & Forecasting Model',
                            'Internal Controls & SOP Review',
                            'Tax Optimization Strategies',
                            'Quarterly Board-Level Performance Report',
                            'KPI Design & Monitoring Dashboard',
                        ],
                        'outcome' => [
                            'Margin improvement',
                            'Reduced operational inefficiencies',
                            'Structured financial discipline',
                        ],
                        'justified' => [
                            'Profitability segmentation and pricing leverage',
                            'Board-level cadence and KPI governance',
                            'Alignment through success-based fees',
                        ],
                        'successFee' => true,
                    ],
                    [
                        'tier' => 'Platinum',
                        'range' => '$40,000 – $75,000 / month',
                        'bestFor' => 'Large corporations, groups & listed companies',
                        'roi' => 'Enterprise-level governance & strategic finance leadership',
                        'services' => [
                            'Includes Gold Package +',
                            'Virtual / Fractional CFO Services',
                            'Strategic Financial Planning & Modeling',
                            'ERP / SAP Finance Optimization',
                            'Business Process Re-Engineering (BPR)',
                            'Risk Management & Internal Audit Oversight',
                            'Expansion, Restructuring & Turnaround Advisory',
                            'M&A / Due Diligence Financial Support',
                            'Monthly Board Presentations & Strategy Reviews',
                        ],
                        'outcome' => [
                            'Sustainable profit growth',
                            'Strategic financial leadership',
                            'Enterprise-level governance & control',
                        ],
                        'justified' => [
                            'Comparable market: below McKinsey/BCG, above Big-4 advisory retainers',
                            'CFO-grade operating model and execution governance',
                            'Alignment through success-based fees',
                        ],
                        'successFee' => true,
                    ],
                ] as $index => $pkg)
                    <div class="pmc-card-reveal pmc-hover-lift rounded-3xl border border-white/10 bg-gradient-to-b from-white/10 to-transparent p-1 transition-all hover:border-pmc-teal/30" style="animation-delay: {{ ($index + 1) * 150 }}ms">
                        <div x-data="{ tab: 'services' }" class="rounded-[22px] bg-white/5 p-7">
                            <div class="flex items-center justify-between">
                                <div class="text-sm font-semibold text-white">{{ $pkg['tier'] }} Package</div>
                                @if ($pkg['successFee'])
                                    <div class="pmc-pulse rounded-full bg-pmc-emerald/15 px-3 py-1 text-xs font-semibold text-pmc-emerald">Success-Based Fees</div>
                                @endif
                            </div>

                            <div class="mt-4">
                                <div class="text-xs text-slate-400">USD</div>
                                <div class="mt-1 text-xl font-semibold text-white pmc-gradient-text">{{ $pkg['range'] }}</div>
                            </div>

                            <div class="mt-5 text-sm text-slate-300">
                                <div class="text-xs font-semibold text-slate-200">Best for</div>
                                <div class="mt-1">{{ $pkg['bestFor'] }}</div>
                            </div>

                            <div class="mt-6 flex gap-2 rounded-2xl border border-white/10 bg-black/10 p-2 text-xs font-semibold">
                                <button type="button" class="flex-1 rounded-xl px-3 py-2" :class="tab === 'services' ? 'bg-white/10 text-white' : 'text-slate-300 hover:text-white'" @click="tab = 'services'">
                                    Key Services
                                </button>
                                <button type="button" class="flex-1 rounded-xl px-3 py-2" :class="tab === 'outcome' ? 'bg-white/10 text-white' : 'text-slate-300 hover:text-white'" @click="tab = 'outcome'">
                                    Outcome
                                </button>
                            </div>

                            <div class="mt-5">
                                <ul x-show="tab === 'services'" x-transition class="space-y-2 text-sm text-slate-200">
                                    @foreach ($pkg['services'] as $s)
                                        <li class="flex gap-2">
                                            <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-pmc-teal"></span>
                                            <span>{{ $s }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                                <ul x-show="tab === 'outcome'" x-transition class="space-y-2 text-sm text-slate-200">
                                    @foreach ($pkg['outcome'] as $o)
                                        <li class="flex gap-2">
                                            <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-pmc-emerald"></span>
                                            <span>✔ {{ $o }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="mt-6 rounded-2xl border border-white/10 bg-white/5 p-5">
                                <div class="text-xs font-semibold text-white">Why this pricing is justified</div>
                                <ul class="mt-3 space-y-2 text-sm text-slate-200">
                                    @foreach ($pkg['justified'] as $j)
                                        <li class="flex gap-2">
                                            <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-white/60"></span>
                                            <span>{{ $j }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="mt-6 rounded-2xl border border-white/10 bg-black/10 p-5 text-sm text-slate-200">
                                <div class="text-xs font-semibold text-white">Typical ROI</div>
                                <div class="mt-1">{{ $pkg['roi'] }}</div>
                            </div>

                            <div class="mt-6">
                                <a href="{{ route('contact') }}" class="pmc-btn-primary pmc-hover-lift inline-flex w-full items-center justify-center rounded-xl bg-gradient-to-r from-pmc-teal to-pmc-emerald px-4 py-2.5 text-sm font-semibold text-pmc-navy shadow-lg transition-all hover:shadow-xl hover:scale-105">
                                    <span>Initiate Engagement Proposal</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="border-b border-white/10 bg-black/10">
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <h2 class="pmc-fade-in-left text-2xl font-semibold text-white">High-value project pricing (USD)</h2>
            <p class="pmc-fade-in-left pmc-delay-100 mt-2 text-slate-200">Discrete strategic projects for enterprise profit impact.</p>

            <div class="pmc-fade-in-up pmc-delay-200 mt-8 overflow-hidden rounded-3xl border border-white/10 bg-white/5">
                <div class="grid grid-cols-1 divide-y divide-white/10">
                    @foreach ([
                        ['Enterprise Profit Diagnostic', '$25,000 – $50,000'],
                        ['Cost Transformation Program', '$50,000 – $150,000'],
                        ['SAP / ERP Optimization', '$75,000 – $250,000'],
                        ['Financial Due Diligence', '$60,000 – $200,000'],
                        ['Turnaround Advisory', '$100,000 – $500,000'],
                        ['Business Valuation (Group)', '$50,000 – $150,000'],
                    ] as $index => [$name, $range])
                        <div class="pmc-card-reveal pmc-hover-glow flex flex-col gap-2 p-5 transition-all hover:bg-white/5 sm:flex-row sm:items-center sm:justify-between" style="animation-delay: {{ ($index + 1) * 100 }}ms">
                            <div class="font-medium text-white">{{ $name }}</div>
                            <div class="text-slate-200 pmc-gradient-text">{{ $range }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-4 text-xs text-slate-400">
                Fees are based on strategic value creation, not time spent. Success fee may apply.
            </div>
        </div>
    </section>

    <section>
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-2 lg:items-start">
                <div>
                    <h2 class="pmc-fade-in-left text-2xl font-semibold text-white">Success-based fees</h2>
                    <p class="pmc-fade-in-left pmc-delay-100 mt-3 text-slate-200">
                        <span class="font-semibold text-white pmc-gradient-text">8% – 20%</span> of incremental profit improvement (mandatory for elite positioning).
                        This aligns incentives: executives get measurable outcomes; we get paid for value created.
                    </p>
                    <ul class="pmc-fade-in-left pmc-delay-200 mt-6 space-y-2 text-sm text-slate-200">
                        <li class="pmc-card-reveal flex gap-2" style="animation-delay: 300ms"><span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-pmc-emerald pmc-pulse"></span> CEOs love alignment</li>
                        <li class="pmc-card-reveal flex gap-2" style="animation-delay: 400ms"><span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-pmc-emerald pmc-pulse"></span> Positions us as partner, not vendor</li>
                        <li class="pmc-card-reveal flex gap-2" style="animation-delay: 500ms"><span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-pmc-emerald pmc-pulse"></span> Reinforces board-level accountability</li>
                    </ul>
                </div>
                <div class="pmc-fade-in-right pmc-scale-in rounded-3xl border border-white/10 bg-gradient-to-b from-white/10 to-transparent p-1">
                    <div class="rounded-[22px] bg-white/5 p-7">
                        <div class="text-sm font-semibold text-white">Example</div>
                        <div class="mt-3 text-slate-200">
                            Client improves profit by <span class="font-semibold text-white pmc-gradient-text">$5,000,000</span>
                            → Success fee = <span class="font-semibold text-white pmc-gradient-text">$400,000 – $1,000,000</span>
                        </div>
                        <div class="mt-5 rounded-2xl border border-white/10 bg-black/10 p-5 text-sm text-slate-200 pmc-hover-glow">
                            Our standard model is: retainer + measurable impact + governance cadence.
                        </div>
                        <div class="mt-6">
                            <a href="{{ route('contact') }}" class="pmc-btn-primary pmc-hover-lift inline-flex w-full items-center justify-center rounded-xl bg-gradient-to-r from-pmc-teal to-pmc-emerald px-4 py-2.5 text-sm font-semibold text-pmc-navy shadow-lg transition-all hover:shadow-xl hover:scale-105">
                                <span>Request a confidential discussion</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-marketing-layout>

