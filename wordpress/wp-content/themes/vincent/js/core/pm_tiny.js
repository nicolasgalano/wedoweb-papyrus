(function() {
	tinymce.create('tinymce.plugins.vincent_tiny', {
		init : function(ed, url) {
			ed.addButton('vincent_dropcap', {
				title : 'Dropcap',
				image : vincent_themeurl + '/img/core/btn_dropcap.png',
				onclick : function() {
					var selected_text = ed.selection.getContent();
					if (selected_text !== '') {
						ed.selection.setContent('<span class="vincent_dropcap">'+ selected_text +'</span>');
					} else {
						ed.selection.setContent('<span class="vincent_dropcap">A</span>');
					}
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		},
	});
	tinymce.PluginManager.add('vincent_tiny', tinymce.plugins.vincent_tiny);
})();