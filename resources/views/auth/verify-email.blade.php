<x-blade.section name="meta::title" content="Comfirm Email Address" />
<x-blade.section name="page::title" content="Comfirm Email Address" />

<div>

    @if (session('resent'))
        <p class="text-green-700 selection:bg-green-100">A fresh verification link has been sent to your email address.</p>
    @endif

    <p>
        Before proceeding, please check your email for a verification link. If you did not receive the email, <button wire:click="resend" class="link">click here to request another</button>.
    </p>

</div>