<x-marketing-layout :title="'Strategic Dialogue — Profit Maximization Consultancy'">
    <section class="border-b border-white/10 bg-black/10">
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <h1 class="pmc-fade-in-up text-3xl font-semibold text-white">Strategic Dialogue Initiation</h1>
            <p class="pmc-fade-in-up pmc-delay-100 mt-3 max-w-3xl text-slate-200">
                This is not a contact form. It's a confidential entry point to assess fit, impact potential, and engagement structure.
            </p>
        </div>
    </section>

    <section class="border-b border-white/10">
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <div x-data="pmcContact()" class="grid gap-10 lg:grid-cols-2 lg:items-start">
                <div class="pmc-fade-in-left pmc-scale-in rounded-3xl border border-white/10 bg-gradient-to-b from-white/10 to-transparent p-1">
                    <div class="rounded-[22px] bg-white/5 p-7">
                        <div class="text-sm font-semibold text-white">Step 1 — Engagement interest</div>
                        <div class="mt-3">
                            <label class="text-xs font-semibold text-slate-200">I’m interested in</label>
                            <select x-model="interest" class="mt-2 w-full rounded-xl border-white/10 bg-pmc-navy/60 text-slate-100 focus:border-pmc-teal focus:ring-pmc-teal">
                                <option value="" disabled>Select…</option>
                                <option>Silver</option>
                                <option>Gold</option>
                                <option>Platinum</option>
                                <option>Project</option>
                            </select>
                        </div>

                        <div class="mt-6 text-sm font-semibold text-white">Step 2 — Company size</div>
                        <div class="mt-3">
                            <label class="text-xs font-semibold text-slate-200">My company size is</label>
                            <select x-model="size" class="mt-2 w-full rounded-xl border-white/10 bg-pmc-navy/60 text-slate-100 focus:border-pmc-teal focus:ring-pmc-teal">
                                <option value="" disabled>Select…</option>
                                <option>&gt;$50M Revenue</option>
                                <option>&gt;$100M Revenue</option>
                                <option>&gt;$1B Revenue</option>
                            </select>
                        </div>

                        <div x-show="ready" x-transition class="mt-8 border-t border-white/10 pt-6">
                            <div class="text-sm font-semibold text-white">Confidential request</div>
                            <p class="mt-2 text-sm text-slate-200">
                                Submit your context. We will respond only if we believe we can deliver a 5–10x return on fees.
                            </p>

                            <form class="mt-6 space-y-4" method="POST" action="{{ route('contact.submit') }}">
                                @csrf
                                <input type="hidden" name="interest" :value="interest">
                                <input type="hidden" name="company_size" :value="size">
                                <div class="grid gap-4 sm:grid-cols-2">
                                    <div>
                                        <label class="text-xs font-semibold text-slate-200">Name</label>
                                        <input class="mt-2 w-full rounded-xl border-white/10 bg-pmc-navy/60 text-slate-100 focus:border-pmc-teal focus:ring-pmc-teal" type="text" name="name" required>
                                    </div>
                                    <div>
                                        <label class="text-xs font-semibold text-slate-200">Title</label>
                                        <input class="mt-2 w-full rounded-xl border-white/10 bg-pmc-navy/60 text-slate-100 focus:border-pmc-teal focus:ring-pmc-teal" type="text" name="title" required>
                                    </div>
                                </div>
                                <div class="grid gap-4 sm:grid-cols-2">
                                    <div>
                                        <label class="text-xs font-semibold text-slate-200">Company</label>
                                        <input class="mt-2 w-full rounded-xl border-white/10 bg-pmc-navy/60 text-slate-100 focus:border-pmc-teal focus:ring-pmc-teal" type="text" name="company" required>
                                    </div>
                                    <div>
                                        <label class="text-xs font-semibold text-slate-200">Email</label>
                                        <input class="mt-2 w-full rounded-xl border-white/10 bg-pmc-navy/60 text-slate-100 focus:border-pmc-teal focus:ring-pmc-teal" type="email" name="email" required>
                                    </div>
                                </div>
                                <div>
                                    <label class="text-xs font-semibold text-slate-200">Phone</label>
                                    <input class="mt-2 w-full rounded-xl border-white/10 bg-pmc-navy/60 text-slate-100 focus:border-pmc-teal focus:ring-pmc-teal" type="text" name="phone">
                                </div>
                                <div>
                                    <label class="text-xs font-semibold text-slate-200">Brief challenge</label>
                                    <textarea class="mt-2 w-full rounded-xl border-white/10 bg-pmc-navy/60 text-slate-100 focus:border-pmc-teal focus:ring-pmc-teal" rows="4" name="challenge" required></textarea>
                                </div>

                                <div class="pt-2">
                                    <button type="submit" class="pmc-btn-primary pmc-hover-lift inline-flex w-full items-center justify-center rounded-xl bg-gradient-to-r from-pmc-teal to-pmc-emerald px-4 py-2.5 text-sm font-semibold text-pmc-navy shadow-lg transition-all hover:shadow-xl hover:scale-105">
                                        <span>Submit to Request a Confidential Discussion</span>
                                    </button>
                                </div>
                            </form>

                            @if (session('status'))
                                <div class="mt-4 rounded-2xl border border-white/10 bg-pmc-emerald/10 p-4 text-sm text-slate-100">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="pmc-fade-in-right pmc-delay-200 pmc-hover-glow rounded-3xl border border-white/10 bg-white/5 p-7 transition-all">
                        <div class="text-sm font-semibold text-white">Key clauses (executive summary)</div>
                        <div class="mt-4 space-y-3 text-sm text-slate-200">
                            <details class="pmc-card-reveal pmc-hover-scale rounded-2xl border border-white/10 bg-black/10 p-4 transition-all hover:border-pmc-teal/30" style="animation-delay: 300ms">
                                <summary class="cursor-pointer font-semibold text-white">Fee Structure Clause</summary>
                                <div class="mt-2">Fees based on strategic nature of services and expected value creation, not time spent.</div>
                            </details>
                            <details class="pmc-card-reveal pmc-hover-scale rounded-2xl border border-white/10 bg-black/10 p-4 transition-all hover:border-pmc-teal/30" style="animation-delay: 400ms">
                                <summary class="cursor-pointer font-semibold text-white">Success Fee Clause</summary>
                                <div class="mt-2">Percentage of incremental profit improvement attributable to engagement.</div>
                            </details>
                            <details class="pmc-card-reveal pmc-hover-scale rounded-2xl border border-white/10 bg-black/10 p-4 transition-all hover:border-pmc-teal/30" style="animation-delay: 500ms">
                                <summary class="cursor-pointer font-semibold text-white">Confidentiality Clause</summary>
                                <div class="mt-2">All client data treated as strictly confidential.</div>
                            </details>
                            <details class="pmc-card-reveal pmc-hover-scale rounded-2xl border border-white/10 bg-black/10 p-4 transition-all hover:border-pmc-teal/30" style="animation-delay: 600ms">
                                <summary class="cursor-pointer font-semibold text-white">Independence Clause</summary>
                                <div class="mt-2">Acts as independent advisor, does not assume management responsibility.</div>
                            </details>
                            <details class="pmc-card-reveal pmc-hover-scale rounded-2xl border border-white/10 bg-black/10 p-4 transition-all hover:border-pmc-teal/30" style="animation-delay: 700ms">
                                <summary class="cursor-pointer font-semibold text-white">Payment Terms</summary>
                                <div class="mt-2">Monthly retainer invoiced in advance. 50% advance for projects (except success fee). Client bears travel/expenses.</div>
                            </details>
                        </div>
                    </div>

                    <div class="pmc-fade-in-right pmc-delay-400 pmc-hover-lift rounded-3xl border border-white/10 bg-gradient-to-b from-white/10 to-transparent p-1 transition-all hover:border-pmc-emerald/30">
                        <div class="rounded-[22px] bg-white/5 p-7">
                            <div class="text-sm font-semibold text-white">Preferred structures</div>
                            <div class="mt-3 text-sm text-slate-200">
                                Retainer + governance cadence + measurable impact, with success fee alignment (<span class="pmc-gradient-text font-semibold">8%–20%</span> of incremental profit improvement).
                            </div>
                            <div class="mt-6">
                                <a href="{{ route('services') }}" class="pmc-hover-scale inline-flex items-center text-sm font-semibold text-pmc-emerald transition-all hover:text-white">
                                    Review packages and project pricing →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('pmcContact', () => ({
                interest: '',
                size: '',
                get ready() {
                    return Boolean(this.interest && this.size);
                },
            }));
        });
    </script>
</x-marketing-layout>

