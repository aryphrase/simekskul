<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

<script>
    tinyMCE.init({
        selector : "textarea",
        plugins: [
         "advlist autolink link image lists charmap hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
   		],
        menubar: false,
        toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link table",
        table_toolbar: "tableprops tabledelete | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol",
        table_default_attributes: {
		    "border": "1"
		},
		table_default_styles: {
			"border-collapsed" : "collapse",
    		"width": "50%"
  		}
    });
</script>