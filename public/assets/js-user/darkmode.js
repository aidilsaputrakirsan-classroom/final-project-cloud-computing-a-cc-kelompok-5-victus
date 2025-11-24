// Dark mode toggle script
(function () {
  const STORAGE_KEY = 'travesta_dark_mode';
  const toggleId = 'dark-mode-toggle';

  function applyMode(isDark) {
    if (isDark) {
      document.documentElement.classList.add('dark-mode');
      document.body.classList.add('dark-mode');
      // Tell Bootstrap to use its dark theme variables
      try { document.documentElement.setAttribute('data-bs-theme', 'dark'); } catch(e) {}
      const btn = document.getElementById(toggleId);
      if (btn) btn.setAttribute('aria-pressed', 'true');
    } else {
      document.documentElement.classList.remove('dark-mode');
      document.body.classList.remove('dark-mode');
      try { document.documentElement.setAttribute('data-bs-theme', 'light'); } catch(e) {}
      const btn = document.getElementById(toggleId);
      if (btn) btn.setAttribute('aria-pressed', 'false');
    }
  }

  function load() {
    const stored = localStorage.getItem(STORAGE_KEY);
    if (stored !== null) {
      applyMode(stored === '1');
    } else {
      // respect prefers-color-scheme if available
      const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
      applyMode(prefersDark);
    }
  }

  function toggle() {
    const isDark = document.documentElement.classList.contains('dark-mode');
    const next = !isDark;
    localStorage.setItem(STORAGE_KEY, next ? '1' : '0');
    applyMode(next);
  }

  document.addEventListener('DOMContentLoaded', function () {
    load();
    const btn = document.getElementById(toggleId);
    if (btn) btn.addEventListener('click', toggle);
  });
})();
