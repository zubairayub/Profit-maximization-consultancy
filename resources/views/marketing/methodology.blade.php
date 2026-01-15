<x-marketing-layout :title="'Methodology — Profit Maximization Consultancy'">
    <section class="border-b border-pmc-silver/80 dark:border-white/10 bg-gradient-to-b from-pmc-navy-light via-pmc-blue-tint/20 to-white dark:from-black/10 dark:via-black/10 dark:to-black/10">
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <h1 class="pmc-fade-in-up text-3xl font-semibold text-pmc-charcoal dark:text-white">Methodology</h1>
            <p class="pmc-fade-in-up pmc-delay-100 mt-3 max-w-3xl text-gray-700 dark:text-slate-200">
                Diagnose → Analyze → Optimize → Implement → Monitor. A board-ready delivery system designed to convert insight into durable profit action.
            </p>
        </div>
    </section>

    <section>
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <div x-data="pmcTimeline()" x-init="init()" class="relative">
                <div class="pointer-events-none absolute left-4 top-0 h-full w-px bg-gray-200 dark:bg-white/10 md:left-1/2"></div>

                @foreach ([
                    ['Diagnose', 'Rapid financial health check, data readiness, and visibility gaps. Establish the baseline and decision-critical questions.'],
                    ['Analyze', 'Profitability and cost structure analysis across products, customers, departments, and geographies. Identify leakage and margin drift.'],
                    ['Optimize', 'Pricing and margin optimization, cost transformation levers, and governance design. Build the board-level KPI model.'],
                    ['Implement', 'Controls, SOPs, execution cadence, and stakeholder alignment. Turn recommendations into operating behavior.'],
                    ['Monitor', 'Continuous performance monitoring, variance signals, and board-ready reporting. Sustain gains and prevent regression.'],
                ] as $i => [$title, $desc])
                    <div class="pmc-card-reveal relative grid gap-4 py-8 md:grid-cols-2 md:gap-10" style="animation-delay: {{ ($i + 1) * 200 }}ms">
                        <div class="{{ $i % 2 === 0 ? 'md:pr-12 md:text-right' : 'md:col-start-2 md:pl-12' }}">
                            <div class="inline-flex items-center gap-3">
                                <div class="pmc-hover-scale grid h-10 w-10 place-items-center rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-white/5 text-xs font-semibold text-gray-900 dark:text-white transition-all hover:border-pmc-blue/30">
                                    {{ $i + 1 }}
                                </div>
                                <div class="text-xl font-semibold text-gray-900 dark:text-white">{{ $title }}</div>
                            </div>
                            <div class="mt-3 text-gray-700 dark:text-slate-200">{{ $desc }}</div>
                        </div>
                        <div class="{{ $i % 2 === 0 ? 'md:col-start-2' : 'md:col-start-1 md:row-start-1 md:pr-12 md:text-right' }}">
                            <div class="pmc-hover-lift rounded-3xl border border-gray-200 dark:border-white/10 bg-gradient-to-b from-gray-50 dark:from-white/10 to-transparent p-1 transition-all hover:border-pmc-blue/30">
                                <div class="rounded-[22px] bg-white dark:bg-white/5 p-6 text-sm text-gray-700 dark:text-slate-200">
                                    <div class="text-xs font-semibold text-gray-900 dark:text-white">Deliverables</div>
                                    <ul class="mt-3 space-y-2">
                                        <li class="flex gap-2"><span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-pmc-blue pmc-pulse"></span> Executive summary (decision-ready)</li>
                                        <li class="flex gap-2"><span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-pmc-blue pmc-pulse"></span> Board-level KPI & performance narrative</li>
                                        <li class="flex gap-2"><span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-white/60"></span> Action plan with owners, cadence, and controls</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="absolute left-4 top-10 md:left-1/2 md:-translate-x-1/2">
                            <div class="pmc-pulse h-4 w-4 rounded-full border border-white/20 bg-gradient-to-br from-pmc-blue to-blue-600 shadow pmc-glow"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('pmcTimeline', () => ({
                init() {
                    // Placeholder hook for scroll-triggered enhancements (kept minimal intentionally).
                },
            }));
        });
    </script>
</x-marketing-layout>

