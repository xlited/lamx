<?php

namespace Xlited\Lamx\Providers;

use Illuminate\Support\Facades\Blade;

class BladeDirectives
{
    public static function register(): void
    {
        Blade::directive('lamxScripts', function ($expression) {
            return <<<HTML
            <script>
                document.body.addEventListener('htmx:configRequest', function(evt) {
                    // Add csrf token to all htmx requests
                    evt.detail.headers['X-CSRF-TOKEN'] = document.head.querySelector('meta[name="csrf-token"]').content;
                });
                document.body.addEventListener('htmx:beforeSwap', function(evt) {
                    if (evt.detail.xhr.status === 500) {
                        evt.detail.shouldSwap = true;
                        evt.detail.etc.swapOverride = 'innerHTML';
                        evt.detail.target = htmx.find("#lamxErrorModal .modal-box");

                        htmx.find("#lamxErrorModal").showModal();
                    }
                });
            </script>
            HTML;
        });

        Blade::directive('lamxTemplates', function ($expression) {
            return <<<HTML
            <dialog id="lamxErrorModal" class="modal">
                <div class="modal-box w-11/12 max-w-5xl min-h-[50vh]"></div>
                <form method="dialog" class="modal-backdrop">
                    <button>close</button>
                </form>
            </dialog>
            HTML;
        });
    }
}
