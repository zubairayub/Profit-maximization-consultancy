<button 
    x-data="pmcTheme()"
    @click="toggle()"
    type="button"
    class="inline-flex items-center justify-center rounded-xl border border-pmc-silver dark:border-white/10 bg-white dark:bg-white/5 p-2 text-pmc-steel dark:text-white hover:bg-pmc-slate-light dark:hover:bg-white/10 transition-colors shadow-sm hover:shadow-md"
    aria-label="Toggle theme"
    title="Toggle theme"
>
    <!-- Sun icon (light mode) -->
    <svg x-show="theme === 'dark'" x-transition class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
    </svg>
    
    <!-- Moon icon (dark mode) -->
    <svg x-show="theme === 'light'" x-transition class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
    </svg>
</button>
