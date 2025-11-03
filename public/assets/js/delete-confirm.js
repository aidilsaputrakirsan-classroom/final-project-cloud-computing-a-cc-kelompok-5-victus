(function () {
  const placeholder = document.getElementById('delete-alert-placeholder');

  function showDeleteConfirm(form, name, type) {
    if (!placeholder) return;

    // clear existing
    placeholder.innerHTML = '';

    const id = 'delete-alert';
    const title = type ? `Delete ${type}` : 'Delete';
    const html = `
                    <div id="${id}" class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-danger/25 border border-danger rounded-md p-4 mb-4" role="alert">
                      <div class="flex items-center gap-3">
                        <div class="flex-grow">
                          <div class="text-sm text-danger font-medium">${title}</div>
                          <div class="text-sm text-default-800">Are you sure you want to delete <strong>${escapeHtml(name)}</strong>? This action cannot be undone.</div>
                        </div>
                        <div class="flex items-center gap-6">
                          <button id="confirm-delete" class="inline-block py-2 px-3 bg-danger text-white rounded">Delete</button>
                          <button id="cancel-delete" class="inline-block py-2 px-3 bg-gray-200 text-default-800 rounded">Cancel</button>
                        </div>
                      </div>
                    </div>
                  `;

    placeholder.insertAdjacentHTML('afterbegin', html);

    const confirm = document.getElementById('confirm-delete');
    const cancel = document.getElementById('cancel-delete');

    confirm.addEventListener('click', function () {
      form.submit();
    });

    cancel.addEventListener('click', function () {
      const el = document.getElementById(id);
      if (el) el.remove();
    });
  }

  function escapeHtml(unsafe) {
    return String(unsafe)
      .replaceAll('&', '&amp;')
      .replaceAll('<', '&lt;')
      .replaceAll('>', '&gt;')
      .replaceAll('"', '&quot;')
      .replaceAll("'", '&#039;');
  }

  document.addEventListener('click', function (e) {
    if (e.target && e.target.matches('.btn-delete')) {
      const btn = e.target;
      const form = btn.closest('.delete-form');
      const name = btn.getAttribute('data-name') || 'this item';
      const type = btn.getAttribute('data-type') || '';
      if (form) {
        showDeleteConfirm(form, name, type);
      }
    }
  });
})();
