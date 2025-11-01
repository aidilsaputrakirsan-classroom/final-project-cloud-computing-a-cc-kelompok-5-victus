<!-- Plugin Js (Mandatory in All Pages) -->
<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/preline/preline.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/iconify-icon/iconify-icon.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

<!-- App Js (Mandatory in All Pages) -->
<script src="{{ asset('assets/js/app.js') }}"></script>

<script>
	(function(){
		// Keep sidebar always shown on desktop. Remove collapse/toggle behaviors.
		const sidebar = document.getElementById('app-menu');
		const main = document.getElementById('main-wrapper');

		function adjustMainPadding(){
			if(!main || !sidebar) return;
			if(window.innerWidth >= 1024){
				// Desktop: always reserve sidebar width for content
				const w = sidebar.offsetWidth || 240;
				main.style.paddingLeft = w + 'px';
				// ensure collapsed classes are not applied
				sidebar.classList.remove('collapsed');
				document.body.classList.remove('sidenav-collapsed');
			} else {
				// Mobile: no left padding, overlay will cover
				main.style.paddingLeft = '0';
			}
		}

		window.addEventListener('resize', function(){
			// adjust immediately on resize to avoid delayed shifts
			adjustMainPadding();
		});

		document.addEventListener('DOMContentLoaded', function(){
			// Ensure sidebar is visible and layout is correct on load (no delayed adjustments)
			adjustMainPadding();
		});
	})();
</script>
