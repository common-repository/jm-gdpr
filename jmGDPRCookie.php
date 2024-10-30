<?php
class jm_GDPRCookie {

	function __construct() {



		add_action("wp_head",[$this,"addToHeader"]);


	}

	function addToHeader(){
		echo '
		<script>
            window.addEventListener("load", function(){
                window.cookieconsent.initialise({
                    "palette": {
                        "popup": {
                            "background": "#000"
                        },
                        "button": {
                            "background": "#f1d600"
                        }
                    },
                    "content": {
                        "message": "'.get_option("jmgdpr_cookie_message").'",
                        "dismiss": "'.get_option("jmgdpr_cookie_ok_text").'",
                        "link": "'.get_option("jmgdpr_cookie_link_text").'",
                        "href": "'.get_option("jmgdpr_cookie_link_href").'"
                    }
                })});
		</script>

		';

	}

}