<x-blade.section name="meta::title" content="Two Factor Authentication" />
<x-blade.section name="page::title" content="Manage 2 Factor Auth" />

<x-blade.extends name="layouts.app" section="content">

    @if (session('status') == 'two-factor-authentication-enabled')
        <p class="text-green-700 selection:bg-green-100">Two factor authentication has been enabled!</p>
    @endif
    
    @if (auth()->user()->twoFactorAuthEnabled())
    
        @if (session()->has('success'))
            <p class="text-green-700 selection:bg-green-100">{{ session('success') }}<p>
        @endif

        @if (!auth()->user()->twoFactorAuthConfirmed())

            <form action="{{ route('two-factor.confirm') }}" method="post" class="mb-5 space-y-4">
                
                <p>Before we fully enable 2FA, please confirm setup is complete by entering a one-time password from your authenticator application</p>

                <x-blade.csrf />
            
                <div>
                    <x-inputs.label class="inline-block" for="code">One time password</x-inputs.label>
                    <x-input-groups.password name="code" class="block" id="code" required />
                    <x-validation.error-inline name="code" />
                </div>
        
                <div class="flex items-center space-x-2.5">
                    <button type="submit" class="link">Confirm</button>
                </div>
                
            </form>

            <hr class="my-5 border-gray-300">
            
        @endif

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