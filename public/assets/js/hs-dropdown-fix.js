/*
 * hs-dropdown-fix.js
 * Defensive helper for Preline HSDropdown issues in topbar.
 * Extracted from inline footer Blade script to public asset.
 */
(function () {
    // Ensure Preline dropdowns in the topbar can be opened repeatedly.
    // Defensive: if an instance gets into a stuck state (animationInProcess or inconsistent classes)
    // we try to re-init or reset it so clicks continue to work.
    function findDropdownInstanceByEl(el) {
        if (!window.$hsDropdownCollection || !Array.isArray(window.$hsDropdownCollection)) return null;
        for (var i = 0; i < window.$hsDropdownCollection.length; i++) {
            var it = window.$hsDropdownCollection[i];
            if (it && it.element && it.element.el === el) return it.element;
        }
        return null;
    }

    document.addEventListener('click', function (ev) {
        try {
            var toggle = ev.target.closest && ev.target.closest('.hs-dropdown-toggle');
            if (!toggle) return;
            var container = toggle.closest && toggle.closest('.hs-dropdown');
            if (!container) return;

            var inst = findDropdownInstanceByEl(container);

            // If instance not found, try to (re)initialize Preline dropdowns
            if (!inst && window.HSDropdown && typeof window.HSDropdown.autoInit === 'function') {
                try { window.HSDropdown.autoInit(); } catch (e) { /* ignore */ }
                inst = findDropdownInstanceByEl(container);
            }

            if (!inst) return;

            // If animation was left in-progress, reset the flag
            if (inst.animationInProcess) inst.animationInProcess = false;

            // If DOM classes are inconsistent, force-clear internal state
            if (!inst.el.classList.contains('open') && !inst.menu.classList.contains('hidden')) {
                try { inst.forceClearState(); } catch (e) { /* ignore */ }
            }

            // After the normal Preline handler runs, ensure the menu opened; if not, open programmatically.
            setTimeout(function () {
                try {
                    if (!inst.el.classList.contains('open') && inst.menu.classList.contains('hidden')) {
                        try { inst.open(); } catch (e) { /* ignore */ }
                    }
                } catch (e) { /* ignore */ }
            }, 10);
        } catch (e) {
            // Defensive: don't break other scripts
            console && console.error && console.error('Dropdown helper error', e);
        }
    }, true);
})();
