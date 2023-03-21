<x-auth-layout title="{{ __('Welcome to Photi!') }}">
    <x-section title="{{ __('Install the app') }}">
        <p>{{ __('To install Photi, click the button below and follow the instructions on screen.') }}</p>
        <x-button id="installPWA" primary disabled>{{ __('Install') }}</x-button>
    </x-section>

    <script>
        (function() {
            let deferredPrompt,
                button = document.getElementById('installPWA');

            function navigateHome() {
                window.location.replace("{{ route('home') }}");
            }

            if (window.matchMedia('(display-mode: standalone)').matches) {
                navigateHome();
            }

            window.addEventListener('beforeinstallprompt', (e) => {
                e.preventDefault();
                deferredPrompt = e;
                button.disabled = false;
            });

            if (deferredPrompt !== undefined) {
                navigateHome();
            } else {
                button.innerText = "{{ __('Already Installed') }}";
            }

            button
                .addEventListener('click', async () => {
                    if (deferredPrompt !== null) {
                        deferredPrompt.prompt();
                        const {
                            outcome
                        } = await deferredPrompt.userChoice;
                        if (outcome === 'accepted') {
                            deferredPrompt = null;
                            navigateHome();
                        }
                    }
                })
        })();
    </script>
</x-auth-layout>
