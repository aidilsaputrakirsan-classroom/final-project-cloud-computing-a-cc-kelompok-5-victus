/* logout-confirm.js
 * Simple confirmation dialog when user attempts to log out.
 * Uses native window.confirm to avoid touching dropdown internals.
 */
(function () {
    function onSubmit(e) {
        // Prevent the default submit — we'll show SweetAlert and submit programmatically if confirmed
        e.preventDefault();
        e.stopImmediatePropagation();

        var form = e.target;
    var title = 'Logout';
    var text = 'Are you sure you want to log out?';

        // Use SweetAlert2 if available, otherwise fall back to native confirm
        if (window.Swal || window.Sweetalert2 || window.SweetAlert) {
            var swal = window.Swal || window.Sweetalert2 || window.SweetAlert;
            try {
                // Use tosca primary color used elsewhere (#21a9cc) and a neutral cancel color
                swal.fire({
                    title: title,
                    text: text,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, log out',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true,
                    confirmButtonColor: '#21a9cc',
                    cancelButtonColor: '#6b7280'
                }).then(function (result) {
                    if (result && result.isConfirmed) {
                        // Submit the form without re-triggering the handler
                        form.removeEventListener('submit', onSubmit, true);
                        form.submit();
                    }
                });
            } catch (err) {
                // Fallback to native confirm on any error
                if (window.confirm(text)) {
                    form.removeEventListener('submit', onSubmit, true);
                    form.submit();
                }
            }
        } else {
            if (window.confirm(text)) {
                form.removeEventListener('submit', onSubmit, true);
                form.submit();
            }
        }

        return false;
    }

    function init() {
        // Select forms explicitly marked for logout confirmation
        var forms = document.querySelectorAll('form[data-logout-form]');
        if (!forms || !forms.length) return;
        Array.prototype.forEach.call(forms, function (f) {
            // Make sure we don't attach multiple handlers
            f.removeEventListener('submit', onSubmit, true);
            f.addEventListener('submit', onSubmit, true);
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
