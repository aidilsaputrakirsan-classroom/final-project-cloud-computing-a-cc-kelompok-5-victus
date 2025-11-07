/* Comment actions: edit toggle and SweetAlert2 delete confirmation
   Placed under public/assets/js-user so it can be cached separately and reused.
   Depends on jQuery and optionally SweetAlert2 (Swal). If Swal is not loaded,
   falls back to window.confirm.
*/
(function (window, $) {
    "use strict";

    function init() {
        // toggle edit forms
        $(document).on("click", ".comment-edit-toggle", function () {
            var id = $(this).data("id");
            $("#comment-body-" + id).hide();
            $("#comment-edit-" + id).show();
        });

        $(document).on("click", ".comment-edit-cancel", function () {
            var id = $(this).data("id");
            $("#comment-edit-" + id).hide();
            $("#comment-body-" + id).show();
        });

        // delete confirmation using SweetAlert2 (load from public/assets/libs if needed)
        function ensureSwalLoaded(cb) {
            if (typeof Swal !== "undefined") {
                return cb();
            }
            // avoid inserting multiple script tags
            if (window._swalLoading) {
                // poll until available
                var intv = setInterval(function () {
                    if (typeof Swal !== "undefined") {
                        clearInterval(intv);
                        cb();
                    }
                }, 50);
                return;
            }
            window._swalLoading = true;
            var script = document.createElement("script");
            script.src = "/assets/libs/sweetalert2/sweetalert2.all.min.js";
            script.async = true;
            script.onload = function () {
                window._swalLoading = false;
                cb();
            };
            script.onerror = function () {
                window._swalLoading = false;
                cb(); // fallback will use confirm()
            };
            document.head.appendChild(script);
        }

        $(document).on("submit", ".comment-delete-form", function (e) {
            e.preventDefault();
            var form = this;

            ensureSwalLoaded(function () {
                if (typeof Swal === "undefined") {
                    if (confirm("Delete this comment?")) {
                        form.submit();
                    }
                    return;
                }

                Swal.fire({
                    title: "Delete comment?",
                    text: "This action cannot be undone.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel",
                }).then(function (result) {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    }

    // init when DOM ready
    if (typeof $ !== "undefined") {
        $(document).ready(init);
    } else if (
        document.readyState === "complete" ||
        document.readyState === "interactive"
    ) {
        // non-jQuery fallback (minimal)
        // No dynamic edit toggles without jQuery; delete fallback remains native confirm
        // Nothing to init here.
    }
})(window, window.jQuery);
