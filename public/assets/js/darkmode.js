(function(){
  const KEY = 'dark-mode-enabled';
  const TOGGLE_ID = 'dark-mode-toggle';

  function prefersDark() {
    return window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
  }

  function isDark() {
    return document.documentElement.hasAttribute('data-theme');
  }

  function applyTheme(dark) {
    if (dark) document.documentElement.setAttribute('data-theme','dark');
    else document.documentElement.removeAttribute('data-theme');

    // Update icon visibility inside the toggle (use Tailwind's `hidden` class)
    const btn = document.getElementById(TOGGLE_ID);
    if (!btn) return;
    const sun = btn.querySelector('.dm-sun');
    const moon = btn.querySelector('.dm-moon');
    if (sun) sun.classList.toggle('hidden', !dark);
    if (moon) moon.classList.toggle('hidden', dark);
    // Accessibility: indicate pressed state
    btn.setAttribute('aria-pressed', String(dark));
  }

  // Initialize theme from localStorage > system preference
  try {
    const saved = localStorage.getItem(KEY);
    const active = saved === null ? prefersDark() : (saved === 'true');
    applyTheme(active);
  } catch (e) {
    // ignore storage errors
    applyTheme(prefersDark());
  }

  // Wire up toggle
  document.addEventListener('DOMContentLoaded', function(){
    const btn = document.getElementById(TOGGLE_ID);
    if (!btn) return;
    btn.addEventListener('click', function(e){
      const next = !isDark();
      applyTheme(next);
      try { localStorage.setItem(KEY, next); } catch (err) {}
    });
  });
})();
