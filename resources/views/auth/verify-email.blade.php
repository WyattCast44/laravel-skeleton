<x-blade.section name="meta::title" content="Comfirm Email Address" />

<div>

    @if (session('resent'))
        <p class="selection:bg-green-100 text-green-700">A fresh verification link has been sent to your email address.</p>
    @endif

    <p>
        Before proceeding, please check your email for a verification link. If you did not receive the email, <button wire:click="resend" class="link">click here to request another</button>.
    </p>

</div>