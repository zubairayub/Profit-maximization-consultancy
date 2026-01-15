<x-marketing-layout :title="'Leadership — Profit Maximization Consultancy'">
    <section class="border-b border-pmc-silver/80 dark:border-white/10 bg-gradient-to-b from-pmc-navy-light via-pmc-blue-tint/20 to-white dark:from-black/10 dark:via-black/10 dark:to-black/10">
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <h1 class="pmc-fade-in-up text-3xl font-semibold text-pmc-charcoal dark:text-white">Leadership</h1>
            <p class="pmc-fade-in-up pmc-delay-100 mt-3 max-w-3xl text-gray-700 dark:text-slate-200">
                We combine accounting, finance, tax, and strategy into one board-level discipline:
                <span class="font-semibold text-gray-900 dark:text-white pmc-gradient-text">maximizing sustainable profits</span> with governance-grade execution.
            </p>
        </div>
    </section>

    <section class="border-b border-pmc-silver/80 dark:border-white/10 bg-gradient-to-b from-white via-pmc-slate-light/50 to-white dark:from-transparent dark:via-transparent dark:to-transparent">
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ([
                    [
                        'name' => 'Syed Aamir',
                        'title' => 'Chairman & Chief Executive Officer',
                        'qualifications' => 'Chartered Management Accountant – England & Wales FCMA (UK) | CFA (Canada) | MBA (USA) | MFBA (UK) | FCMA (Pakistan) | LLB | M.A. (Economics)',
                        'image' => asset('storage/app/public/team1.jpeg'),
                    ],
                    [
                        'name' => 'Aleena Kamal Khan',
                        'title' => 'Chartered Accountant',
                        'qualifications' => 'Chartered Accountant (CA) – Pakistan | Chartered Accountant – Institute of Chartered Accountants in England and Wales (UK) | Associate Chartered Accountant (ACA) | Fellow Chartered Accountant (FCA)',
                        'image' => asset('storage/app/public/team1.jpeg'),
                    ],
                    [
                        'name' => 'Engineer Syed Ishaque',
                        'title' => 'Regional Director Middle East',
                        'qualifications' => 'Civil Engineer | More than 3 decades of experience in international market',
                        'image' => asset('storage/app/public/team1.jpeg'),
                    ],
                    [
                        'name' => 'Engineer Asim Mahmood Shah',
                        'title' => 'Regional Director USA',
                        'qualifications' => 'Mechanical Engineer from Michigan State University | More than 3 decades of experience in US market',
                        'image' => asset('storage/app/public/team1.jpeg'),
                    ],
                    [
                        'name' => 'Syed Abdullah',
                        'title' => 'Director Marketing',
                        'qualifications' => 'MBA from International University',
                        'image' => asset('storage/app/public/team1.jpeg'),
                    ],
                ] as $index => $member)
                    <div class="pmc-card-reveal pmc-hover-lift group rounded-3xl border border-gray-200 dark:border-white/10 bg-gradient-to-b from-gray-50 dark:from-white/10 to-transparent p-1 transition-all hover:border-pmc-blue/30 dark:hover:border-pmc-green/50" style="animation-delay: {{ ($index + 1) * 150 }}ms">
                        <div class="h-full rounded-[22px] bg-white dark:bg-white/5 p-7">
                            <div class="flex flex-col items-center text-center">
                                <div class="pmc-hover-scale pmc-glow overflow-hidden rounded-2xl bg-gradient-to-br from-pmc-blue to-blue-600 dark:from-pmc-green dark:to-pmc-green/80 h-24 w-24 transition-all hover:scale-110 mb-4">
                                    <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}" class="h-full w-full object-cover">
                                </div>
                                <div class="w-full">
                                    <div class="text-gray-900 dark:text-white font-semibold text-lg">{{ $member['name'] }}</div>
                                    <div class="text-sm text-gray-600 dark:text-slate-300 mt-1 font-medium">{{ $member['title'] }}</div>
                                </div>
                            </div>
                            <div class="mt-6 rounded-2xl border border-gray-200 dark:border-white/10 bg-gray-50 dark:bg-black/10 p-5 text-sm text-gray-700 dark:text-slate-200 opacity-90 transition-all group-hover:opacity-100 group-hover:border-pmc-blue/30 dark:group-hover:border-pmc-green/50">
                                <div class="text-xs font-semibold text-gray-900 dark:text-white mb-2">Qualifications & Experience</div>
                                <div class="text-xs leading-relaxed">{{ $member['qualifications'] }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section>
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <div class="pmc-fade-in-up pmc-hover-glow rounded-3xl border border-gray-200 dark:border-white/10 bg-white dark:bg-white/5 p-8 transition-all">
                <div class="text-sm font-semibold text-gray-900 dark:text-white">Registered Address</div>
                <div class="mt-2 text-gray-700 dark:text-slate-200">
                    C 199/13, Block 14, Gulistan-e-johar, Karachi, Pakistan
                </div>
            </div>
        </div>
    </section>
</x-marketing-layout>

