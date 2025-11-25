(function () {
  'use strict';

  function fallbackCopyTextToClipboard(text) {
    var textArea = document.createElement('textarea');
    textArea.value = text;
    // Avoid scrolling to bottom
    textArea.style.top = '0';
    textArea.style.left = '0';
    textArea.style.position = 'fixed';
    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();

    try {
      var successful = document.execCommand('copy');
      document.body.removeChild(textArea);
      return successful;
    } catch (err) {
      document.body.removeChild(textArea);
      return false;
    }
  }

  function copyText(text) {
    if (!navigator.clipboard) {
      return Promise.resolve(fallbackCopyTextToClipboard(text));
    }
    return navigator.clipboard.writeText(text).then(function () { return true; }).catch(function () { return fallbackCopyTextToClipboard(text); });
  }

  function openWindow(url) {
    window.open(url, '_blank', 'noopener,noreferrer');
  }

  function makeShareText(title, url) {
    return title ? title + ' - ' + url : url;
  }

  document.addEventListener('DOMContentLoaded', function () {
    var shareButtons = document.querySelectorAll('[data-share]');
    if (!shareButtons.length) return;

    shareButtons.forEach(function (btn) {
      btn.addEventListener('click', function (e) {
        e.preventDefault();
        var type = btn.getAttribute('data-share');
        var url = btn.getAttribute('data-url') || window.location.href;
        var title = btn.getAttribute('data-title') || document.title;
        var text = makeShareText(title, url);

        if (type === 'copy') {
          // Copy without blocking popups: toggle button icon to a temporary 'copied' state
          var originalHtml = btn.innerHTML;
          copyText(url).then(function (ok) {
            if (ok) {
              // show a check state on the button
              try {
                btn.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
                btn.classList.add('share-copied');
              } catch (e) {
                // fallback: set text
                btn.innerText = 'Copied';
              }

              // revert after 2 seconds
              setTimeout(function () {
                try {
                  btn.innerHTML = originalHtml;
                  btn.classList.remove('share-copied');
                } catch (e) {
                  btn.innerText = '';
                }
              }, 2000);
            } else {
              // silent failure: do nothing (no popup)
            }
          });
          return;
        }

        if (type === 'whatsapp') {
          var wa = 'https://wa.me/?text=' + encodeURIComponent(text);
          openWindow(wa);
          return;
        }

        if (type === 'facebook') {
          var fb = 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(url);
          openWindow(fb);
          return;
        }

        if (type === 'instagram') {
          // Web sharing to Instagram is not directly supported via URL.
          // Use the Web Share API if available (mobile), otherwise copy link and prompt user to paste in Instagram.
          if (navigator.share) {
            navigator.share({ title: title, text: title, url: url }).catch(function (err) {
              // If user cancels or error, silently ignore
            });
            return;
          }

          // Try opening Instagram app via intent on Android (best-effort)
          var intentUrl = 'intent://send?text=' + encodeURIComponent(text) + '#Intent;package=com.instagram.android;scheme=instagram;end';
          try {
            openWindow(intentUrl);
            // Fallback: copy link and notify
            setTimeout(function () {
              copyText(url).then(function () { alert('Instagram web sharing is limited — link copied to clipboard. Paste it in Instagram.'); });
            }, 500);
          } catch (err) {
            copyText(url).then(function () { alert('Instagram sharing not available — link copied to clipboard.'); });
          }
          return;
        }

        // default: try Web Share API
        if (navigator.share) {
          navigator.share({ title: title, text: title, url: url }).catch(function () {});
          return;
        }

        // fallback: copy
        copyText(url).then(function () { alert('Link copied to clipboard'); });
      });
    });
  });
})();
