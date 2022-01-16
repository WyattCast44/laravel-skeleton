<x-blade.section name="meta::title" content="Two Factor Authentication" />
<x-blade.section name="page::title" content="Manage 2 Factor Auth" />

<x-blade.extends name="layouts.app" section="content">

    @if (session('status') == 'two-factor-authentication-enabled')
        <p class="selection:bg-green-100 text-green-700">Two factor authentication has been enabled!</p>
    @endif
    
    @if (auth()->user()->twoFactorAuthEnabled())

        <div class="flex items-center w-32 h-32">
            {!! request()->user()->twoFactorQrCodeSvg() !!}
        </div>

        <div class="px-3 pb-3">
            <p class="text-lg font-semibold">Recovery Codes</p>
            <ul class="text-gray-600 list-disc list-inside">
                @foreach ((array) request()->user()->recoveryCodes() as $code)
                    <li><span class="select-all">{{ $code }}</span></li>
                @endforeach
            </ul>
        </div>

        <form action="{{ url('user/two-factor-authentication') }}" method="post">
                    
            <x-blade.csrf />

            <x-blade.method name="delete" />
            
            <button type="submit" class="link">
                Disable two factor authentication
            </button>

        </form>
        
    @else
    
        <form action="{{ url('user/two-factor-authentication') }}" method="post">
                    
            <x-blade.csrf />
            
            <button type="submit" class="link">
                Enable two factor authentication
            </button>

        </form>

    @endif

</x-blade.extends>