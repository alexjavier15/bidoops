window.DJEasyContactInitCaptcha = function() {
	var items = document.getElementsByClassName('dj-easycontact-g-recaptcha'), item, options;
	for (var i = 0, l = items.length; i < l; i++) {
		item = items[i];
		options = item.dataset ? item.dataset : {
			sitekey: item.getAttribute('data-sitekey'),
			theme:   item.getAttribute('data-theme'),
			size:    item.getAttribute('data-size')
		};
		grecaptcha.render(item, options);
	}
};