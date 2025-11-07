/**
 * profile-delete.js
 * Handles delete account button on profile edit page.
 * Depends on SweetAlert2 being loaded globally as `Swal`.
 */
(function(){
  'use strict';

  function init(){
    var btn = document.getElementById('btn-delete-profile');
    if(!btn) return;

    btn.addEventListener('click', function(){
      // Prefer SweetAlert2 if available
      if(typeof Swal !== 'undefined'){
        Swal.fire({
          title: 'Delete your account?',
          text: 'This action cannot be undone. All your data will be removed.',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Yes, delete it'
        }).then(function(result){
          if(result && result.isConfirmed){
            var form = document.getElementById('delete-profile-form');
            if(form) form.submit();
          }
        });
        return;
      }

      // Fallback
      if(window.confirm('Are you sure you want to delete your account? This action cannot be undone.')){
        var form = document.getElementById('delete-profile-form');
        if(form) form.submit();
      }
    });
  }

  if(document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init);
  else init();
})();
