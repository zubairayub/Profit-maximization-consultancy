<x-marketing-layout :title="'Frequently Asked Questions — Profit Maximization Consultancy'">
    <section class="border-b border-pmc-silver/80 dark:border-white/10 bg-gradient-to-b from-pmc-navy-light via-pmc-blue-tint/20 to-white dark:from-black/10 dark:via-black/10 dark:to-black/10">
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <h1 class="pmc-fade-in-up text-3xl font-semibold text-pmc-charcoal dark:text-white">Frequently Asked Questions</h1>
            <p class="pmc-fade-in-up pmc-delay-100 mt-3 max-w-3xl text-gray-700 dark:text-slate-200">
                Common questions about our cost reduction, profit recovery, and turnaround consulting services.
            </p>
        </div>
    </section>

    <section class="border-b border-pmc-silver/80 dark:border-white/10 bg-gradient-to-b from-white via-pmc-slate-light/50 to-white dark:from-transparent dark:via-transparent dark:to-transparent">
        <div class="mx-auto max-w-4xl px-4 py-14 sm:px-6 lg:px-8">
            <div x-data="{ activeFaq: null }" class="space-y-4">
                @foreach ([
                    [
                        'question' => 'What is Profit Maximization Consultancy and what services do you provide?',
                        'answer' => 'Profit Maximization (Private) Limited is a specialized cost reduction, profit recovery, and turnaround consulting firm. We support Global 500, Fortune, and Top-1000 organizations in identifying and eliminating profit leakage arising from operational, financial, commercial, and manufacturing inefficiencies. Our services include enterprise-wide cost diagnostics, profit leakage identification, cost reduction and transformation strategies, turnaround and restructuring advisory, profit recovery and EBITDA improvement initiatives, working capital and cash flow optimization, strategic cost management, KPI design and monitoring, and CFO-level strategic advisory support.',
                    ],
                    [
                        'question' => 'What is your pricing structure?',
                        'answer' => 'Our Gold Package is priced at USD $1,000,000 per annum. Payment terms include 50% advance payment (USD $500,000) upon signing the agreement, with the remaining 50% payable quarterly or per agreed milestones. All travel, on-site, and operational expenses are borne by the client. Optional performance incentives may be agreed separately and documented in writing.',
                    ],
                    [
                        'question' => 'What kind of ROI can we expect from your services?',
                        'answer' => 'We work with a limited number of clients and typically only accept engagements where we see at least a 5–10x return on our fees. Typical outcomes include identifying 2–5% profit leakage in the first 60 days, achieving 5–10% EBITDA improvement potential, and delivering sustainable profit growth. Our success-based fee structure (8–20% of incremental profit improvement) ensures alignment with your financial outcomes.',
                    ],
                    [
                        'question' => 'How does your engagement model work?',
                        'answer' => 'We act as independent advisors working closely with Boards, CEOs, and CFOs. Our methodology follows a structured approach: Diagnose (rapid financial health check and baseline establishment), Analyze (profitability and cost structure analysis), Optimize (pricing, margin optimization, and governance design), Implement (controls, SOPs, and execution cadence), and Monitor (continuous performance monitoring and board-ready reporting). We coordinate across the organization while maintaining independence and accountability.',
                    ],
                    [
                        'question' => 'What industries do you serve?',
                        'answer' => 'We serve Global 500, Fortune, and Top-1000 organizations across various industries including Manufacturing & Industrial (cost diagnostics, capacity utilization, energy optimization), Textile & Apparel (product profitability analysis, wastage optimization, margin recovery), and FMCG & Distribution (supply chain optimization, pricing management, inventory optimization). Our services extend to any organization facing profit erosion, margin pressure, or turnaround needs.',
                    ],
                    [
                        'question' => 'Why should we choose Profit Maximization Consultancy over other consulting firms?',
                        'answer' => 'We differentiate ourselves through our independent and trusted advisor role, enterprise-wide cost and value focus, proven cost management frameworks, performance-linked and results-oriented approach, and board and C-suite advisory capability. We act as a single point of responsibility for cost management and profit optimization across group companies, subsidiaries, and associated entities. Unlike traditional consultancies, we align our compensation with measurable financial outcomes.',
                    ],
                    [
                        'question' => 'What is profit leakage and how do you identify it?',
                        'answer' => 'Profit leakage refers to revenue or cost inefficiencies that erode net profitability—often hidden in operational processes, fragmented visibility, margin drift, and decision cycles. We conduct enterprise-wide diagnostics using proven methodologies including Value Chain Analysis, Cost Driver Analysis, Activity-Based Costing (ABC), and contribution and margin analysis. We identify negative contribution activities, structural inefficiencies, inflation-driven cost distortions, and outdated processes that impact competitiveness and profitability.',
                    ],
                    [
                        'question' => 'Do you guarantee specific financial results?',
                        'answer' => 'While we do not guarantee specific financial outcomes (as results depend on management decisions and external factors), we only accept engagements where we see clear potential for 5–10x return on our fees. Our success-based fee structure (8–20% of incremental profit improvement) ensures we are aligned with delivering measurable value. All recommendations are advisory in nature, and final implementation decisions remain the responsibility of the client\'s management.',
                    ],
                    [
                        'question' => 'How long does a typical engagement last?',
                        'answer' => 'Our standard engagement is structured as an annual retainer (one year term), which may be renewed upon mutual written consent. However, the timeline can vary based on the scope of work. We focus on early risk identification and corrective action, with structured deliverables throughout the engagement including monthly management reports, quarterly board-level performance reports, and continuous monitoring.',
                    ],
                    [
                        'question' => 'What is your approach to turnaround and restructuring advisory?',
                        'answer' => 'For organizations facing margin pressure or financial stress, we provide structured turnaround advisory focused on cash-flow stabilization, cost structure realignment, operational and financial restructuring, performance improvement initiatives, and KPI and accountability frameworks. We also support management and lenders by stabilizing cash flows, improving working capital efficiency, strengthening financial controls, and enhancing transparency and risk management—improving credit confidence and financial sustainability.',
                    ],
                    [
                        'question' => 'How do you ensure confidentiality and data security?',
                        'answer' => 'Both parties agree to maintain strict confidentiality of all non-public, financial, operational, commercial, and strategic information exchanged during the engagement. Confidential information is not disclosed to any third party without prior written consent, except as required by law. This obligation survives the termination or expiry of the agreement. All engagements are conducted with the highest level of discretion and board-level confidentiality.',
                    ],
                    [
                        'question' => 'What happens if we need to terminate the engagement?',
                        'answer' => 'Either party may terminate the agreement by providing 30 days written notice. In case of termination, fees already paid are non-refundable, and outstanding fees up to the effective termination date become immediately payable. We ensure a smooth transition and handover of all advisory materials and recommendations within the notice period.',
                    ],
                    [
                        'question' => 'Can your services extend to group companies and subsidiaries?',
                        'answer' => 'Yes, our services may extend to the client\'s group companies, subsidiaries, associated companies, and sister concerns, as mutually agreed. We act as a single point of responsibility for cost management and profit optimization across the entire organization structure, ensuring consistent methodology and governance.',
                    ],
                    [
                        'question' => 'What is the typical timeframe to see results?',
                        'answer' => 'We typically identify 2–5% profit leakage within the first 60 days of engagement. EBITDA improvement potential (5–10%) is usually visible within 90 days, with sustainable gains materializing over the course of the engagement. Our approach emphasizes early wins while building the foundation for long-term financial sustainability.',
                    ],
                    [
                        'question' => 'How do you measure success and performance improvements?',
                        'answer' => 'We design custom KPI frameworks aligned with your strategic objectives, including board-level performance metrics, margin improvement indicators, cost reduction targets, cash flow metrics, and working capital efficiency measures. We provide continuous performance monitoring, variance analysis, and board-ready reporting to ensure accountability and track progress against agreed targets. Our success-based fees (8–20% of incremental profit improvement) are directly tied to measurable financial outcomes.',
                    ],
                ] as $index => $faq)
                    <div x-data="{ open: {{ $index === 0 ? 'true' : 'false' }} }" class="pmc-card-reveal rounded-2xl border border-gray-200 dark:border-white/10 bg-white dark:bg-white/5 overflow-hidden transition-all hover:border-pmc-blue/30 dark:hover:border-pmc-green/50 shadow-sm" style="animation-delay: {{ ($index + 1) * 100 }}ms">
                        <button @click="open = !open" class="w-full px-6 py-5 text-left flex items-center justify-between gap-4 hover:bg-gray-50 dark:hover:bg-white/5 transition-colors">
                            <span class="font-semibold text-gray-900 dark:text-white pr-8">{{ $faq['question'] }}</span>
                            <svg class="shrink-0 h-5 w-5 text-gray-500 dark:text-slate-400 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2" class="px-6 pb-5 text-sm text-gray-700 dark:text-slate-200 leading-relaxed">
                            <div class="pt-2 border-t border-gray-200 dark:border-white/10">
                                {{ $faq['answer'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="border-b border-pmc-silver/80 dark:border-white/10 bg-gradient-to-b from-pmc-blue-tint/30 via-white to-pmc-slate-light dark:from-black/10 dark:via-black/10 dark:to-black/10">
        <div class="mx-auto max-w-4xl px-4 py-14 sm:px-6 lg:px-8">
            <div class="pmc-fade-in-up pmc-hover-glow rounded-3xl border border-gray-200 dark:border-white/10 bg-gradient-to-br from-white dark:from-white/10 to-gray-50 dark:to-black/10 p-8 text-center">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Still have questions?</h2>
                <p class="mt-3 text-gray-700 dark:text-slate-200">
                    Schedule a confidential strategic dialogue to discuss your specific requirements and assess engagement fit.
                </p>
                <div class="mt-6">
                    <a href="{{ route('contact') }}" class="pmc-btn-primary pmc-hover-lift inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-pmc-blue to-blue-600 dark:from-pmc-green dark:to-pmc-green/80 px-6 py-3 text-sm font-semibold text-white dark:text-pmc-navy shadow-lg transition-all hover:shadow-xl hover:scale-105">
                        <span>Initiate Strategic Dialogue</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-marketing-layout>
