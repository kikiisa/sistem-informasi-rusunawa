<div class="relative group">
    <!-- Main Card Container -->
    <div class="card relative bg-white/95 dark:bg-gray-800/95 
                border border-gray-200/80 dark:border-gray-700/80 rounded-2xl 
                shadow-lg hover:shadow-2xl hover:shadow-purple-500/20
                transition-all duration-300 ease-out transform hover:-translate-y-2 hover:scale-[1.02] 
                backdrop-blur-md overflow-hidden
                hover:bg-gradient-to-br hover:from-purple-50/50 hover:via-blue-50/30 hover:to-indigo-50/50
                dark:hover:from-purple-900/20 dark:hover:via-blue-900/20 dark:hover:to-indigo-900/20"
        
        <!-- Gradient Top Border -->
        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-purple-600 via-blue-600 to-indigo-700"></div>
        
        <!-- Decorative Corner Element -->
        <div class="absolute top-4 right-4 w-10 h-10 bg-gradient-to-br from-purple-500/20 to-blue-500/20 dark:from-purple-400/30 dark:to-blue-400/30 
                    rounded-xl opacity-60 group-hover:opacity-100 group-hover:scale-110 transition-all duration-300"></div>
        
        <a href="#" class="block p-6 space-y-5"> 
            <!-- Room Number Header -->
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-purple-600 to-indigo-700 rounded-xl flex items-center justify-center 
                                shadow-lg group-hover:shadow-xl group-hover:scale-110 transition-all duration-300">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 21l4-4 4 4"/>
                        </svg>
                    </div>
                    <h5 class="text-2xl font-bold text-gray-800 dark:text-gray-100 tracking-tight">
                        <span class="bg-gradient-to-r from-purple-700 via-blue-700 to-indigo-800 dark:from-purple-400 dark:via-blue-400 dark:to-indigo-300 
                                     bg-clip-text">
                            No : {{ $item->no_kamar }}
                        </span>
                    </h5>
                </div>
                
                <!-- Status Badge -->
                <div class="flex-shrink-0">
                    @if ($item->status == 'tersedia')
                        <span class="inline-flex items-center px-3 py-2 rounded-xl text-sm font-semibold 
                                     bg-emerald-50 dark:bg-emerald-900/30
                                     text-emerald-700 dark:text-emerald-300 
                                     border border-emerald-200 dark:border-emerald-700
                                     shadow-sm hover:shadow-md transition-shadow duration-300">
                            <div class="w-2 h-2 bg-emerald-500 rounded-full mr-2 animate-pulse"></div>
                            Tersedia
                        </span>
                    @else
                        <span class="inline-flex items-center px-3 py-2 rounded-xl text-sm font-semibold 
                                     bg-red-50 dark:bg-red-900/30
                                     text-red-700 dark:text-red-300 
                                     border border-red-200 dark:border-red-700
                                     shadow-sm">
                            <div class="w-2 h-2 bg-red-500 rounded-full mr-2"></div>
                            Tidak Tersedia
                        </span>
                    @endif
                </div>
            </div>
            
            <!-- Room Description -->
            <div class="relative">
                <div class="absolute -left-1 top-1 w-1 h-full bg-gradient-to-b from-purple-500 to-blue-600 rounded-full opacity-40"></div>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed pl-5 text-base font-medium">
                    {{ $item->keterangan }}
                </p>
            </div>
            
            <!-- Action Button -->
            <div class="p-4">
                <a href="{{ route('detail', $item->uuid) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-purple-600 to-blue-600 rounded-lg 
                             focus:ring-blue-300 dark:focus:ring-blue-800 
                            transition-colors duration-300 shadow-md hover:shadow-lg">
                    Lihat Detail
                </a>
            </div>
        </a>
        
        <!-- Hover Overlay Effect -->
        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none rounded-2xl
                    bg-gradient-to-br from-purple-500/5 via-blue-500/5 to-indigo-500/5"></div>
    </div>
    
    <!-- Enhanced Shadow -->
    <div class="absolute inset-0 -z-10 transform translate-y-1 translate-x-1 
                bg-gradient-to-br from-purple-200/40 to-blue-200/40 dark:from-purple-800/20 dark:to-blue-800/20
                rounded-2xl opacity-0 group-hover:opacity-100 transition-all duration-300 blur-sm scale-95 group-hover:scale-100"></div>
</div>

<style>
/* Minimal CSS overrides - mostly using Tailwind classes */
.card {
    position: relative;
}

/* Subtle shimmer effect on hover */
.card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    pointer-events: none;
    z-index: 1;
}

.card:hover::before {
    left: 100%;
}

/* Ensure content stays above shimmer */
.card > a {
    position: relative;
    z-index: 2;
}

/* Responsive text sizing */
@media (max-width: 640px) {
    .card h5 {
        font-size: 1.25rem;
    }
}
</style>