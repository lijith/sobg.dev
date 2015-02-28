function getInternetExplorerVersion() {
	var rv = -1;
	if (navigator.appName === 'Microsoft Internet Explorer') {
		var ua = navigator.userAgent;
		var re = new RegExp('MSIE ([0-9]{1,}[\.0-9]{0,})');
		if (re.exec(ua) !== null) {
			rv = parseFloat(RegExp.$1);
		}
	}
	return rv;
}

function showLoadingBar() {
	var readyStateTimer;
	readyStateTimer = setInterval(function() {
		var readyState = document.readyState;

		if (document.getElementById('page_loading_bar') !== null) {
			var e = document.getElementById('page_loading_bar');
			switch (readyState) {
				case 'uninitialized':
					{
						if (!e.classList.contains('uninitialized')) {
							e.className += ' uninitialized';
						}
					}
					break;
				case 'loading':
					{
						if (!e.classList.contains('loading')) {
							e.className += ' loading';
						}
					}
					break;
				case 'interactive':
					{
						if (!e.classList.contains('interactive')) {
							e.className += ' interactive';
						}
					}
					break;
				case 'complete':
					if (!e.classList.contains('complete')) {
						e.className += ' complete';
					}
					setTimeout(function() {
						e.className += ' loaded';
					}, 700);

					clearInterval(readyStateTimer);
					break;
				default:
				case 'uninitialized':
					{
						if (!e.classList.contains('uninitialized')) {
							e.className += ' uninitialized';
						}
					}
					break;
					clearTimeout(readyStateTimer);
			}
		}
	}, 100);
}

var ver = getInternetExplorerVersion();

if (ver === -1 || ver > 9) {
	showLoadingBar();
}