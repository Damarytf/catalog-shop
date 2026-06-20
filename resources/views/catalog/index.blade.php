@extends('layouts.app')

@section('content')
<div class="relative bg-linear-to-br from-primary-950 via-primary-900 to-indigo-950 py-20 sm:py-28 overflow-hidden border-b border-white/5">
    <div class="absolute inset-0 opacity-30 mix-blend-overlay bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] bg-size-[16px_16px]"></div>
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-primary-500/30 rounded-full blur-[128px] animate-pulse"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-indigo-500/20 rounded-full blur-[128px]"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h1 class="text-4xl sm:text-6xl font-black text-white tracking-tight mb-6 bg-clip-text bg-linear-to-r from-white via-slate-200 to-primary-200">
            Katalog Produk Digital
        </h1>
        <p class="text-base sm:text-xl text-primary-200/80 max-w-2xl mx-auto font-light leading-relaxed">
            {{ \App\Models\Setting::get('store_tagline', 'Temukan berbagai produk digital premium untuk mendukung bisnis dan produktivitas Anda.') }}
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="flex flex-col lg:flex-row gap-10">
        
        <aside class="w-full lg:w-1/4 shrink-0">
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 sticky top-24 transition-all hover:shadow-md">
                <h2 class="text-sm font-bold uppercase tracking-wider text-gray-400 mb-5 flex items-center gap-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-primary-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                    </svg>
                    Filter Kategori
                </h2>
                
                <div class="space-y-1.5">
                    <a href="{{ route('catalog.index') }}" class="flex items-center justify-between px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ !request('category') ? 'bg-primary-600 text-white shadow-md shadow-primary-600/10' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                        <span>Semua Kategori</span>
                        @if(!request('category'))
                            <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                        @endif
                    </a>
                    
                    @foreach($categories as $cat)
                        <a href="{{ route('catalog.index', ['category' => $cat->slug]) }}" class="flex items-center justify-between px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request('category') === $cat->slug ? 'bg-primary-600 text-white shadow-md shadow-primary-600/10' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <span>{{ $cat->name }}</span>
                            @if(request('category') === $cat->slug)
                                <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>
        </aside>

        <div class="flex-1">
            <div class="mb-10">
                <form action="{{ route('catalog.index') }}" method="GET" class="relative group">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari produk digital premium..." class="w-full pl-14 pr-24 py-4 bg-white border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 shadow-sm outline-none transition-all duration-300 text-gray-800 placeholder-gray-400 group-hover:border-gray-300">
                    
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary-500 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </div>

                    <button type="submit" class="absolute right-3 top-2.5 bottom-2.5 px-5 bg-gray-900 text-white text-xs font-semibold rounded-xl hover:bg-primary-600 active:scale-95 transition-all shadow-sm">
                        Cari
                    </button>
                </form>
            </div>

            @if($products->isEmpty())
                <div class="bg-white rounded-3xl border border-dashed border-gray-200 p-16 text-center max-w-xl mx-auto my-4 shadow-sm">
                    <div class="w-20 h-20 bg-gray-50 border border-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-inner">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" class="w-10 h-10 text-gray-400">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Produk Tidak Ditemukan</h3>
                    <p class="text-sm text-gray-500 max-w-xs mx-auto leading-relaxed">Kami tidak dapat menemukan apa yang anda cari. Coba masukkan kata kunci lain atau bersihkan filter.</p>
                    <a href="{{ route('catalog.index') }}" class="mt-6 inline-flex items-center justify-center px-5 py-2.5 bg-primary-50 text-primary-700 text-sm font-semibold rounded-xl hover:bg-primary-100 active:scale-98 transition-all">
                        Reset Pencarian
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 animate-fade-in">
                    @foreach($products as $product)
                        <div class="transform hover:-translate-y-1 transition-all duration-300">
                            <x-product-card :product="$product" />
                        </div>
                    @endforeach
                </div>
                
                <div class="mt-14 border-t border-gray-100 pt-6">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection