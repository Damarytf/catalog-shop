@props(['product'])

<div class="group bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col h-full transform hover:-translate-y-1.5">
    <a href="{{ route('catalog.show', $product->slug) }}" class="block relative aspect-[4/3] overflow-hidden bg-gray-50">
        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-500 ease-out">
        
        <div class="absolute top-3 left-3 flex flex-col gap-1.5">
            @if($product->isOnSale())
                <span class="bg-rose-500 text-white text-[10px] uppercase tracking-wider font-black px-2.5 py-1 rounded-lg shadow-sm">
                    Sale
                </span>
            @endif
            @if($product->is_featured)
                <span class="bg-gradient-to-r from-amber-400 to-orange-400 text-amber-950 text-[10px] uppercase tracking-wider font-black px-2.5 py-1 rounded-lg shadow-sm">
                    Featured
                </span>
            @endif
        </div>
        
        @if(!$product->isAvailable())
            <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-[2px] flex items-center justify-center">
                <span class="bg-white/90 text-slate-900 text-xs font-bold px-4 py-1.5 rounded-full shadow-md">Sold Out</span>
            </div>
        @endif
    </a>
    
    <div class="p-5 flex flex-col flex-grow">
        <div class="text-[11px] font-bold text-indigo-600 mb-1.5 uppercase tracking-wider">
            {{ $product->category->name ?? 'Kategori' }}
        </div>
        
        <a href="{{ route('catalog.show', $product->slug) }}" class="block mb-3">
            <h3 class="font-bold text-gray-900 leading-snug line-clamp-2 text-base group-hover:text-indigo-600 transition-colors duration-200">
                {{ $product->name }}
            </h3>
        </a>
        
        <div class="mt-auto pt-4 flex items-center justify-between border-t border-gray-50">
            <div>
                @if($product->isOnSale())
                    <div class="text-xs text-gray-400 line-through mb-0.5">{{ $product->formatted_price }}</div>
                    <div class="text-lg font-extrabold text-rose-600 tracking-tight">{{ $product->formatted_effective_price }}</div>
                @else
                    <div class="text-lg font-extrabold text-slate-900 tracking-tight">{{ $product->formatted_price }}</div>
                @endif
            </div>
            
            @if($product->isAvailable())
                <button 
                    @click.prevent="$store.cart.add({{ json_encode(['id' => $product->id, 'name' => $product->name, 'price' => (float)$product->price, 'sale_price' => (float)$product->sale_price, 'image_url' => $product->image_url]) }})"
                    class="w-10 h-10 rounded-xl bg-gray-50 text-slate-700 flex items-center justify-center hover:bg-indigo-600 hover:text-white transition-all duration-300 focus:outline-none"
                    title="Tambah ke Keranjang"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </button>
            @endif
        </div>
    </div>
</div>