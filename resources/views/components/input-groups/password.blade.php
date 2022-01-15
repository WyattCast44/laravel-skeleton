<div class="flex items-center" x-data="{ type: 'password', 'message': 'Show/hide password'}">

    <x-inputs.text {{ $attributes->merge(['class' => 'border-r-0 rounded-r-none']) }} x-bind:type="type"  />
    
    <button 
        type="button" 
        x-tooltip.delay.450="message"
        x-on:click="(type=='password') ? type='text' : type='password'"
        class="flex items-center justify-center border p-2.5 rounded-sm focus:outline-none focus:ring focus:ring-offset-1 focus:ring-gray-300 border-gray-600 focus:border-gray-700 hover:bg-gray-100 rounded-r-sm">
        
        <span x-show="type=='password'">
            @svg('eye', 'w-5 h-5')
        </span>
        
        <span x-show="type=='text'" x-cloak>
            @svg('eye-off', 'w-5 h-5')
        </span>

    </button>
    
</div>