/**
 * profile-edit.js
 * Client-side validation for admin profile edit form.
 * - Form must have id="profile-edit-form"
 * - Error container must have id="client-validation-errors"
 */
(function () {
  'use strict';

  function init() {
    var f = document.getElementById('profile-edit-form');
    if (!f) return;

    f.addEventListener('submit', function (e) {
      var nameEl = f.querySelector('[name="name"]');
      var emailEl = f.querySelector('[name="email"]');
      var pwdEl = f.querySelector('[name="password"]');
      var pwdConfEl = f.querySelector('[name="password_confirmation"]');
      var name = nameEl ? nameEl.value.trim() : '';
      var email = emailEl ? emailEl.value.trim() : '';
      var password = pwdEl ? pwdEl.value : '';
      var passwordConf = pwdConfEl ? pwdConfEl.value : '';

      var errors = [];
      if (!name) errors.push('Name is required.');
      if (!email) errors.push('Email is required.');

      // Password is required on every update per configuration
      if (!password) errors.push('Password is required.');
      if (!passwordConf) errors.push('Confirm password is required.');
      if (password && password.length > 0 && password.length < 6) errors.push('Password must be at least 6 characters.');
      if (password && passwordConf && password !== passwordConf) errors.push('Password and confirmation do not match.');

      if (errors.length) {
        e.preventDefault();
        var el = document.getElementById('client-validation-errors');
        if (el) {
          el.innerHTML = '<strong class="block">Please fix the following errors:</strong><ul class="mt-2 list-disc list-inside text-sm"><li>' + errors.join('</li><li>') + '</li></ul>';
          el.classList.remove('hidden');
          // focus first invalid field
          if (!name) nameEl && nameEl.focus();
          else if (!email) emailEl && emailEl.focus();
          else if (password && !passwordConf) pwdConfEl && pwdConfEl.focus();
          else if (passwordConf && !password) pwdEl && pwdEl.focus();
          try { el.scrollIntoView({ behavior: 'smooth', block: 'center' }); } catch (e) { /* ignore */ }
        }
      }
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
