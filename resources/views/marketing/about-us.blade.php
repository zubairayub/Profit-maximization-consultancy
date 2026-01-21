<x-marketing-layout :title="'About Us — Profit Maximization Consultancy'">
    <section class="border-b border-pmc-silver/80 dark:border-white/10 bg-gradient-to-b from-pmc-navy-light via-pmc-blue-tint/20 to-white dark:from-black/10 dark:via-black/10 dark:to-black/10">
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <h1 class="pmc-fade-in-up text-3xl font-semibold text-pmc-charcoal dark:text-white">About Us</h1>
            <p class="pmc-fade-in-up pmc-delay-100 mt-3 max-w-3xl text-gray-700 dark:text-slate-200">
                Specialized cost reduction, profit recovery, and turnaround consulting for Global 500, Fortune, and Top-1000 organizations.
            </p>
        </div>
    </section>

    <!-- Executive Summary -->
    <section class="border-b border-pmc-silver/80 dark:border-white/10 bg-gradient-to-b from-white via-pmc-slate-light/50 to-white dark:from-transparent dark:via-transparent dark:to-transparent">
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <div class="pmc-fade-in-up pmc-hover-glow rounded-3xl border border-gray-200 dark:border-white/10 bg-white dark:bg-white/5 p-8 transition-all">
                <div class="inline-flex items-center gap-2 rounded-full border border-pmc-silver dark:border-white/10 bg-white dark:bg-white/5 px-4 py-2 text-xs text-pmc-steel dark:text-slate-200 mb-6">
                    <span class="h-2 w-2 rounded-full bg-pmc-emerald pmc-pulse"></span>
                    Executive Summary
                </div>
                <h2 class="text-2xl font-semibold text-pmc-charcoal dark:text-white mb-4">Bleeding of Profit</h2>
                <p class="text-gray-700 dark:text-slate-200 leading-relaxed mb-4">
                    Profit Maximization (Private) Limited is a specialized cost reduction, profit recovery, and turnaround consulting firm. We support Global, Fortune, and Top-1000 organizations in identifying and eliminating profit leakage arising from operational, financial, commercial, and manufacturing inefficiencies.
                </p>
                <p class="text-gray-700 dark:text-slate-200 leading-relaxed mb-4">
                    Every business transaction generates either positive or negative cash flow. Even minor inefficiencies—when embedded in processes—compound over time and materially erode net profitability. Our philosophy is straightforward: <span class="font-semibold text-pmc-charcoal dark:text-white">eliminating loss-making activities increases profit without disrupting core operations</span>.
                </p>
                <p class="text-gray-700 dark:text-slate-200 leading-relaxed">
                    We work closely with Boards, CEOs, and CFOs as an independent advisor to restore profitability, improve cash flow, and strengthen long-term financial sustainability.
                </p>
            </div>
        </div>
    </section>

    <!-- Core Objective -->
    <section class="border-b border-pmc-silver/80 dark:border-white/10 bg-gradient-to-b from-white via-pmc-slate-light/50 to-white dark:from-transparent dark:via-transparent dark:to-transparent">
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <div class="pmc-fade-in-up text-center mb-12">
                <h2 class="text-3xl font-semibold text-pmc-charcoal dark:text-white mb-4">Our Core Objective</h2>
                <p class="text-gray-700 dark:text-slate-200 max-w-3xl mx-auto">
                    Our objective is to maximize net profitability through strategic cost management and operational excellence.
                </p>
            </div>
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    ['title' => 'Intelligent Cost Reduction', 'icon' => '📊', 'desc' => 'Strategic cost management, not short-term cutting'],
                    ['title' => 'Structural Efficiency', 'icon' => '⚙️', 'desc' => 'Eliminate inefficiencies embedded in processes'],
                    ['title' => 'Cash Flow Recovery', 'icon' => '💰', 'desc' => 'Working capital and cash flow optimization'],
                    ['title' => 'Turnaround Strategies', 'icon' => '🔄', 'desc' => 'Realignment for sustainable profitability'],
                ] as $index => $item)
                    <div class="pmc-card-reveal pmc-hover-lift group rounded-3xl border border-gray-200 dark:border-white/10 bg-gradient-to-b from-gray-50 dark:from-white/10 to-transparent p-1 transition-all hover:border-pmc-blue/30 dark:hover:border-pmc-green/50" style="animation-delay: {{ ($index + 1) * 150 }}ms">
                        <div class="h-full rounded-[22px] bg-white dark:bg-white/5 p-6 text-center">
                            <div class="text-4xl mb-4">{{ $item['icon'] }}</div>
                            <div class="text-gray-900 dark:text-white font-semibold text-lg mb-2">{{ $item['title'] }}</div>
                            <div class="text-sm text-gray-600 dark:text-slate-300">{{ $item['desc'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Profit Maximization Through Strategic Cost Control -->
    <section class="border-b border-pmc-silver/80 dark:border-white/10 bg-gradient-to-b from-white via-pmc-slate-light/50 to-white dark:from-transparent dark:via-transparent dark:to-transparent">
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-2 lg:items-center">
                <div class="pmc-fade-in-up">
                    <h2 class="text-2xl font-semibold text-pmc-charcoal dark:text-white mb-4">Profit Maximization Through Strategic Cost Control</h2>
                    <p class="text-gray-700 dark:text-slate-200 leading-relaxed mb-6">
                        Profit maximization and cost control are inseparable. Rising operating costs, inflation, inefficient processes, and weak cost visibility gradually weaken margins and competitiveness.
                    </p>
                    <p class="text-gray-700 dark:text-slate-200 leading-relaxed mb-6">
                        Our approach emphasizes <span class="font-semibold text-pmc-charcoal dark:text-white">strategic cost management, not short-term cost cutting</span>. We analyze:
                    </p>
                    <ul class="space-y-3 text-gray-700 dark:text-slate-200">
                        <li class="flex gap-3">
                            <span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-pmc-emerald pmc-pulse flex-shrink-0"></span>
                            <span>Cost behavior and cost drivers</span>
                        </li>
                        <li class="flex gap-3">
                            <span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-pmc-emerald pmc-pulse flex-shrink-0"></span>
                            <span>Value-adding vs. value-destroying activities</span>
                        </li>
                        <li class="flex gap-3">
                            <span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-pmc-emerald pmc-pulse flex-shrink-0"></span>
                            <span>End-to-end value chain economics</span>
                        </li>
                    </ul>
                    <p class="text-gray-700 dark:text-slate-200 leading-relaxed mt-6">
                        This enables organizations to improve margins while preserving operational effectiveness.
                    </p>
                </div>
                <div class="pmc-fade-in-up pmc-delay-200">
                    <div class="pmc-hover-lift rounded-3xl border border-gray-200 dark:border-white/10 bg-gradient-to-b from-gray-50 dark:from-white/10 to-transparent p-1 transition-all hover:border-pmc-blue/30">
                        <div class="rounded-[22px] bg-white dark:bg-white/5 p-8">
                            <div class="text-sm font-semibold text-gray-900 dark:text-white mb-4">Our Methodologies</div>
                            <ul class="space-y-3 text-sm text-gray-700 dark:text-slate-200">
                                <li class="flex gap-2"><span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-pmc-blue pmc-pulse"></span> Value Chain Analysis</li>
                                <li class="flex gap-2"><span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-pmc-blue pmc-pulse"></span> Cost Driver Analysis</li>
                                <li class="flex gap-2"><span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-pmc-blue pmc-pulse"></span> Activity-Based Costing (ABC)</li>
                                <li class="flex gap-2"><span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-pmc-blue pmc-pulse"></span> Contribution and margin analysis</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How We Work -->
    <section class="border-b border-pmc-silver/80 dark:border-white/10 bg-gradient-to-b from-white via-pmc-slate-light/50 to-white dark:from-transparent dark:via-transparent dark:to-transparent">
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <div class="pmc-fade-in-up text-center mb-12">
                <h2 class="text-3xl font-semibold text-pmc-charcoal dark:text-white mb-4">How We Work</h2>
                <p class="text-gray-700 dark:text-slate-200 max-w-3xl mx-auto">
                    Our engagement model is designed for board-level execution and measurable financial outcomes.
                </p>
            </div>
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    ['title' => 'Hands-On Execution', 'desc' => 'Execution-focused engagement with direct implementation support'],
                    ['title' => 'Early Risk Identification', 'desc' => 'Proactive identification and corrective action'],
                    ['title' => 'Independent Advisory', 'desc' => 'Confidential advisory role maintaining objectivity'],
                    ['title' => 'Board Alignment', 'desc' => 'Alignment with board-approved objectives and KPIs'],
                ] as $index => $item)
                    <div class="pmc-card-reveal pmc-hover-lift group rounded-3xl border border-gray-200 dark:border-white/10 bg-gradient-to-b from-gray-50 dark:from-white/10 to-transparent p-1 transition-all hover:border-pmc-blue/30 dark:hover:border-pmc-green/50" style="animation-delay: {{ ($index + 1) * 150 }}ms">
                        <div class="h-full rounded-[22px] bg-white dark:bg-white/5 p-6">
                            <div class="text-gray-900 dark:text-white font-semibold text-lg mb-3">{{ $item['title'] }}</div>
                            <div class="text-sm text-gray-600 dark:text-slate-300 leading-relaxed">{{ $item['desc'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-8 pmc-fade-in-up pmc-delay-500">
                <div class="rounded-2xl border border-gray-200 dark:border-white/10 bg-gray-50 dark:bg-black/10 p-6 text-sm text-gray-700 dark:text-slate-200">
                    <div class="text-xs font-semibold text-gray-900 dark:text-white mb-2">Our Approach</div>
                    <p class="leading-relaxed">
                        We coordinate across the organization while maintaining independence and accountability. All engagements are aligned with measurable financial outcomes, ensuring cost discipline, margin recovery, and sustainable EBITDA improvement.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Profit Maximization -->
    <section class="border-b border-pmc-silver/80 dark:border-white/10 bg-gradient-to-b from-white via-pmc-slate-light/50 to-white dark:from-transparent dark:via-transparent dark:to-transparent">
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <div class="pmc-fade-in-up text-center mb-12">
                <h2 class="text-3xl font-semibold text-pmc-charcoal dark:text-white mb-4">Why Profit Maximization (Private) Limited</h2>
                <p class="text-gray-700 dark:text-slate-200 max-w-3xl mx-auto">
                    We act as a single point of responsibility for cost management and profit optimization across group companies, subsidiaries, and associated entities.
                </p>
            </div>
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ([
                    ['title' => 'Independent & Trusted', 'desc' => 'Independent advisor with board and C-suite advisory capability'],
                    ['title' => 'Enterprise-Wide Focus', 'desc' => 'Comprehensive cost and value focus across all operations'],
                    ['title' => 'Proven Frameworks', 'desc' => 'Proven cost management frameworks with measurable results'],
                    ['title' => 'Performance-Linked', 'desc' => 'Results-oriented approach aligned with financial impact'],
                    ['title' => 'Board-Level Advisory', 'desc' => 'Direct access to board and C-suite decision makers'],
                    ['title' => 'Group-Wide Coverage', 'desc' => 'Single point of responsibility across all entities'],
                ] as $index => $item)
                    <div class="pmc-card-reveal pmc-hover-lift group rounded-3xl border border-gray-200 dark:border-white/10 bg-gradient-to-b from-gray-50 dark:from-white/10 to-transparent p-1 transition-all hover:border-pmc-blue/30 dark:hover:border-pmc-green/50" style="animation-delay: {{ ($index + 1) * 150 }}ms">
                        <div class="h-full rounded-[22px] bg-white dark:bg-white/5 p-6">
                            <div class="text-gray-900 dark:text-white font-semibold text-lg mb-3">{{ $item['title'] }}</div>
                            <div class="text-sm text-gray-600 dark:text-slate-300 leading-relaxed">{{ $item['desc'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Industry Focus -->
    <section class="border-b border-pmc-silver/80 dark:border-white/10 bg-gradient-to-b from-white via-pmc-slate-light/50 to-white dark:from-transparent dark:via-transparent dark:to-transparent">
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <div class="pmc-fade-in-up text-center mb-12">
                <h2 class="text-3xl font-semibold text-pmc-charcoal dark:text-white mb-4">Industry Focus</h2>
                <p class="text-gray-700 dark:text-slate-200 max-w-3xl mx-auto">
                    We bring specialized expertise across key industries with proven methodologies for each sector.
                </p>
            </div>
            <div class="grid gap-8 lg:grid-cols-3">
                @foreach ([
                    [
                        'industry' => 'Manufacturing & Industrial',
                        'services' => [
                            'Cost diagnostics and efficiency improvement',
                            'Capacity utilization and fixed-cost absorption',
                            'Energy, labor, and overhead optimization',
                        ],
                    ],
                    [
                        'industry' => 'Textile & Apparel',
                        'services' => [
                            'Product and order-level profitability analysis',
                            'Wastage, yield, and process optimization',
                            'Margin recovery and working capital improvement',
                        ],
                    ],
                    [
                        'industry' => 'FMCG & Distribution',
                        'services' => [
                            'Supply chain and logistics optimization',
                            'Pricing, trade spend, and margin management',
                            'Inventory and receivables optimization',
                        ],
                    ],
                ] as $index => $industry)
                    <div class="pmc-card-reveal pmc-hover-lift group rounded-3xl border border-gray-200 dark:border-white/10 bg-gradient-to-b from-gray-50 dark:from-white/10 to-transparent p-1 transition-all hover:border-pmc-blue/30 dark:hover:border-pmc-green/50" style="animation-delay: {{ ($index + 1) * 200 }}ms">
                        <div class="h-full rounded-[22px] bg-white dark:bg-white/5 p-6">
                            <div class="text-gray-900 dark:text-white font-semibold text-xl mb-4">{{ $industry['industry'] }}</div>
                            <ul class="space-y-3">
                                @foreach ($industry['services'] as $service)
                                    <li class="flex gap-3 text-sm text-gray-700 dark:text-slate-200">
                                        <span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-pmc-emerald pmc-pulse flex-shrink-0"></span>
                                        <span>{{ $service }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Bank & Lender-Friendly -->
    <section class="border-b border-pmc-silver/80 dark:border-white/10 bg-gradient-to-b from-white via-pmc-slate-light/50 to-white dark:from-transparent dark:via-transparent dark:to-transparent">
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <div class="pmc-fade-in-up pmc-hover-glow rounded-3xl border border-gray-200 dark:border-white/10 bg-white dark:bg-white/5 p-8 transition-all">
                <div class="inline-flex items-center gap-2 rounded-full border border-pmc-silver dark:border-white/10 bg-white dark:bg-white/5 px-4 py-2 text-xs text-pmc-steel dark:text-slate-200 mb-6">
                    <span class="h-2 w-2 rounded-full bg-pmc-emerald pmc-pulse"></span>
                    Bank & Lender-Friendly Turnaround Profile
                </div>
                <h2 class="text-2xl font-semibold text-pmc-charcoal dark:text-white mb-4">Supporting Management & Lenders</h2>
                <p class="text-gray-700 dark:text-slate-200 leading-relaxed mb-6">
                    We support management and lenders by stabilizing cash flows, improving working capital efficiency, strengthening financial controls, and enhancing transparency and risk management.
                </p>
                <div class="grid gap-4 sm:grid-cols-2">
                    <div class="rounded-2xl border border-gray-200 dark:border-white/10 bg-gray-50 dark:bg-black/10 p-5">
                        <div class="text-sm font-semibold text-gray-900 dark:text-white mb-2">For Management</div>
                        <ul class="space-y-2 text-sm text-gray-700 dark:text-slate-200">
                            <li class="flex gap-2"><span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-pmc-blue pmc-pulse"></span> Cash-flow stabilization</li>
                            <li class="flex gap-2"><span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-pmc-blue pmc-pulse"></span> Cost structure realignment</li>
                            <li class="flex gap-2"><span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-pmc-blue pmc-pulse"></span> Performance improvement</li>
                        </ul>
                    </div>
                    <div class="rounded-2xl border border-gray-200 dark:border-white/10 bg-gray-50 dark:bg-black/10 p-5">
                        <div class="text-sm font-semibold text-gray-900 dark:text-white mb-2">For Lenders</div>
                        <ul class="space-y-2 text-sm text-gray-700 dark:text-slate-200">
                            <li class="flex gap-2"><span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-pmc-blue pmc-pulse"></span> Improved credit confidence</li>
                            <li class="flex gap-2"><span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-pmc-blue pmc-pulse"></span> Enhanced transparency</li>
                            <li class="flex gap-2"><span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-pmc-blue pmc-pulse"></span> Financial sustainability</li>
                        </ul>
                    </div>
                </div>
                <p class="text-gray-700 dark:text-slate-200 leading-relaxed mt-6">
                    Our engagements improve credit confidence and financial sustainability, making us a trusted partner for both management teams and financial institutions.
                </p>
            </div>
        </div>
    </section>

    <!-- Closing Statement -->
    <section>
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <div class="pmc-fade-in-up pmc-hover-glow rounded-3xl border border-gray-200 dark:border-white/10 bg-gradient-to-br from-pmc-blue/5 dark:from-pmc-green/10 via-white dark:via-white/5 to-transparent p-8 transition-all text-center">
                <h2 class="text-2xl font-semibold text-pmc-charcoal dark:text-white mb-4">Our Commitment</h2>
                <p class="text-gray-700 dark:text-slate-200 leading-relaxed max-w-3xl mx-auto">
                    Profit Maximization (Private) Limited partners with Boards and senior management to eliminate profit leakage, reduce costs, and execute sustainable turnaround strategies. Our focus is long-term value creation, financial discipline, and maximizing net profitability without operational disruption.
                </p>
                <div class="mt-8">
                    <a href="{{ route('contact') }}" class="pmc-btn-primary pmc-hover-lift inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-pmc-teal to-pmc-emerald px-6 py-3 text-sm font-semibold text-white dark:text-pmc-navy shadow-lg hover:shadow-xl hover:scale-105">
                        <span>Start Your Engagement</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-marketing-layout>
